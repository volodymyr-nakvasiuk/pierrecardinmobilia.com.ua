<?PHP

/**
 * Admin CMS
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://simp.la
 * @author 		Denis Pikusov
 *
 * Этот класс использует шаблон index.tpl,
 * который содержит всю страницу кроме центрального блока
 * По get-параметру module мы определяем что сожержится в центральном блоке
 *
 */

require_once('View.php');

class IndexView extends View
{	
	public $modules_dir = 'view/';

	public function __construct()
	{
		parent::__construct();
	}

		
	/**
	 *
	 * Отображение
	 *
	 */
	function fetch()
	{
		// Содержимое корзины
		$this->design->assign('cart',		$this->cart->get_cart());
	
                // Категории товаров
		$categories = $this->categories->get_categories_tree();
                $this->apply_products_to_categories(&$categories);
		$this->design->assign('categories', $categories);
		
		// Страницы
		$pages = $this->pages->get_pages(array('visible'=>1));		
		$this->design->assign('pages', $pages);
							
		// Текущий модуль (для отображения центрального блока)
		$module = $this->request->get('module', 'string');
		$module = preg_replace("/[^A-Za-z0-9]+/", "", $module);

		// Если не задан - берем из настроек
		if(empty($module))
			return false;
		//$module = $this->settings->main_module;

		// Создаем соответствующий класс
		if (is_file($this->modules_dir."$module.php"))
		{
				include_once($this->modules_dir."$module.php");
				if (class_exists($module))
				{
					$this->main = new $module($this);
				} else return false;
		} else return false;

		// Создаем основной блок страницы
		if (!$content = $this->main->fetch())
		{
			return false;
		}		

		// Передаем основной блок в шаблон
		$this->design->assign('content', $content);		
		
		// Передаем название модуля в шаблон, это может пригодиться
		$this->design->assign('module', $module);
				
		// Создаем текущую обертку сайта (обычно index.tpl)
		$wrapper = $this->design->smarty->getTemplateVars('wrapper');
		if(empty($wrapper))
			$wrapper = 'index.tpl';
			
		$this->body = $this->design->fetch($wrapper);
		return $this->body;
	}
        
        function apply_products_to_categories($categories)
        {
            foreach ($categories as &$category)
            {
                $filter = array();
                $filter['visible'] = 1;
                $filter['category_id'] = $category->id;
                $filter['sort'] = 'name';
                $filter['page'] = 1;
                $filter['limit'] = 1000;
                
                $subProducts = array();
                
                foreach($this->products->get_products($filter) as $p)
                {
                    $subProducts[] = $this->products->product_to_category($p);
                }
                
                if (isset($category->subcategories))
                {
                    $this->apply_products_to_categories(&$category->subcategories);
                }
                else
                {
                    $category->subcategories = array();
                }
                $category->subcategories = array_merge($category->subcategories, $subProducts);
            }
        }
}
