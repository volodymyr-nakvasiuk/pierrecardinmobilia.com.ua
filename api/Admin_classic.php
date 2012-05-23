<?php

/**
 * Основной класс для доступа ко всем возможностям Admincms
 *
 * @copyright 	2011 Denis Pikusov
 * @link 		http://admincms.ru
 * @author 		Denis Pikusov
 *
 */

require_once('api/Config.php');
require_once('api/Request.php');
require_once('api/Database.php');
require_once('api/Settings.php');
require_once('api/Design.php');
require_once('api/Money.php');
require_once('api/Pages.php');
require_once('api/Blog.php');
require_once('api/Catalog.php');
require_once('api/Features.php');
require_once('api/Cart.php');
require_once('api/Image.php');
require_once('api/Delivery.php');
require_once('api/Payment.php');
require_once('api/Orders.php');
require_once('api/Users.php');

class Admin
{
	public $config;		/**< Экземпляр класса Conifg */
	public $request;	/**< Экземпляр класса Request */
	public $db;			/**< Экземпляр класса Database  */
	public $settings;	/**< Экземпляр класса Settings  */
    public $lang = '';
	public $design;		/**< Экземпляр класса Design  */
	public $user;		/**< Экземпляр класса User  */
	public $money;		/**< Экземпляр класса Currencies  */
	public $pages;		/**< Экземпляр класса ArticlesModel  */
	public $blog;		/**< Экземпляр класса ArticlesModel  */
	public $catalog;	/**< Экземпляр класса Catalog  */
	public $features;	/**< Экземпляр класса Features  */
	public $cart;		/**< Экземпляр класса Cart  */
	public $image;		/**< Экземпляр класса Cart  */
	public $delivery;	/**< Экземпляр класса Cart  */
	public $payment;	/**< Экземпляр класса Cart  */
	public $orders;		/**< Экземпляр класса Cart  */
	public $users;		/**< Экземпляр класса Cart  */
	
	private static $admin_instance;

	/**
	 * В конструкторе создаем нужные объекты.
	 * При повторном вызове конструктора устанавливаем ссылки на уже существующие экземпляры.
	 * Немного напоминает синглтон - члены класса Admin всегда ссылаются на одни и те же объекты.
	 */
	 
	public function __construct()
	{
		if(self::$admin_instance)
		{
			$this->config		= &self::$admin_instance->config;
			$this->request		= &self::$admin_instance->request;
			$this->db			= &self::$admin_instance->db;
			$this->settings		= &self::$admin_instance->settings;
			$this->design		= &self::$admin_instance->design;
			$this->image		= &self::$admin_instance->image;
			$this->money		= &self::$admin_instance->money;
			$this->pages		= &self::$admin_instance->pages;
			$this->blog			= &self::$admin_instance->blog;
			$this->catalog		= &self::$admin_instance->catalog;
			$this->features		= &self::$admin_instance->features;
			$this->cart			= &self::$admin_instance->cart;
			$this->delivery		= &self::$admin_instance->delivery;
			$this->payment		= &self::$admin_instance->payment;
			$this->orders		= &self::$admin_instance->orders;
			$this->users		= &self::$admin_instance->users;
		}
		else
		{
			self::$admin_instance = $this;

			$this->config		= new Config();
			$this->request		= new Request();
			$this->db			= new Database();
			$this->settings		= new Settings();
			$this->design		= new Design();
			$this->image		= new Image();
			$this->money		= new Money();
			$this->pages		= new Pages();
			$this->blog			= new Blog();
			$this->catalog		= new Catalog();	
			$this->features		= new Features();						
			$this->cart			= new Cart();
			$this->delivery		= new Delivery();
			$this->payment		= new Payment();
			$this->orders		= new Orders();
			$this->users		= new Users();
		}
	}
}