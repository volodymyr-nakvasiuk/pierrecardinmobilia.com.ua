<?PHP

require_once('api/Admin.php');

// Этот класс выбирает модуль в зависимости от параметра Section и выводит его на экран
class IndexAdmin extends Admin
{
	// Конструктор
	public function __construct()
	{
	    // Вызываем конструктор базового класса
		parent::__construct();
		
		@list($l->domains, $l->expiration, $l->comment) = explode('#', '', 3);

		$l->domains = explode(',', $l->domains);

		$h = getenv("HTTP_HOST");
		if(substr($h, 0, 4) == 'www.') $h = substr($h, 4);

		$l->valid = true;

		$this->design->assign('license', $l);

		$this->design->set_templates_dir('admin/design/html');
		//$this->design->set_compiled_dir('admin/design/compiled');
		
		$this->design->assign('settings',	$this->settings);
		$this->design->assign('config',	$this->config);

 		// Берем название модуля из get-запроса
		$module = $this->request->get('module', 'string');
		$module = preg_replace("/[^A-Za-z0-9]+/", "", $module);
		
		// Если не запросили модуль - используем модуль ProductsAdmin
		if(empty($module) || !is_file('admin/'.$module.'.php'))
			$module = 'ProductsAdmin';

		// Подключаем файл с необходимым модулем
		require_once('admin/'.$module.'.php');  
		
		// Создаем соответствующий модуль
		if(class_exists($module))
			$this->module = new $module();
		else
			die("Error creating $module class");

	}

	function fetch()
	{
		$currency = $this->money->get_currency();
		$this->design->assign("currency", $currency);

		$content = $this->module->fetch();
		$this->design->assign("content", $content);
		
		// Счетчики для верхнего меню
		//$new_orders_counter = $this->orders->count_orders(array('status'=>0));
		//$this->design->assign("new_orders_counter", $new_orders_counter);
		
		//$new_comments_counter = $this->comments->count_comments(array('approved'=>0));
		//$this->design->assign("new_comments_counter", $new_comments_counter);
				
	
		return $this->body = $this->design->fetch('index.tpl');
	}
}