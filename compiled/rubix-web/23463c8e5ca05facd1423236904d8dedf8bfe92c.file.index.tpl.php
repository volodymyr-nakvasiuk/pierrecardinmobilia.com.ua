<?php /* Smarty version Smarty-3.0.7, created on 2012-05-02 10:24:47
         compiled from "admin/design/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2931776144fa0ef4fc519d9-61422504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23463c8e5ca05facd1423236904d8dedf8bfe92c' => 
    array (
      0 => 'admin/design/html/index.tpl',
      1 => 1335947079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2931776144fa0ef4fc519d9-61422504',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $_smarty_tpl->getVariable('meta_title')->value;?>
</title>
<link rel="icon" href="design/images/favicon.ico" type="image/x-icon">
<link href="design/css/style.css" rel="stylesheet" type="text/css" />

<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery.form.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="design/js/jquery/jquery-ui.css" media="screen" />

<meta name="viewport" content="width=1024">

</head>
<body>

<a href='<?php echo $_smarty_tpl->getVariable('config')->value->root_url;?>
' class='admin_bookmark'></a>

<!-- Вся страница --> 
<div id="main">

	<!-- Главное меню -->
	<ul id="main_menu"> 
		<li><a href="index.php?module=ProductsAdmin"><img src="design/images/menu/catalog.png"><b>Каталог</b></a></li>
		<li><a href="index.php?module=PagesAdmin"><img src="design/images/menu/pages.png"><b>Страницы</b></a></li>
		<li><a href="index.php?module=BlogAdmin"><img src="design/images/menu/blog.png"><b>Новости</b></a></li>
		<li>
		<a href="index.php?module=CommentsAdmin"><img src="design/images/menu/comments.png"><b>Комментарии</b></a>
		<?php if ($_smarty_tpl->getVariable('new_comments_counter')->value){?>
		<div class='counter'><span><?php echo $_smarty_tpl->getVariable('new_comments_counter')->value;?>
</span></div>
		<?php }?>
		</li>
		<li><a href="index.php?module=BackupAdmin"><img src="design/images/menu/wizards.png"><b>Бекап</b></a></li>
		<li><a href="index.php?module=ThemeAdmin"><img src="design/images/menu/design.png"><b>Дизайн</b></a></li>
		<li><a href="index.php?module=SettingsAdmin"><img src="design/images/menu/settings.png"><b>Настройки</b></a></li>
	</ul>
	<!-- Главное меню (The End)-->
	
	
	<!-- Таб меню -->
	<ul id="tab_menu">
		<?php echo Smarty::$_smarty_vars['capture']['tabs'];?>

	</ul>
	<!-- Таб меню (The End)-->
	
 
	
	<!-- Основная часть страницы -->
	<div id="middle">
		<?php echo $_smarty_tpl->getVariable('content')->value;?>

	</div>
	<!-- Основная часть страницы (The End) --> 
</div>
<!-- Вся страница (The End)--> 

</body>
</html>

<script>
$(function() {
	// Logout для IE
	if ($.browser.msie)
	$("#logout").click( function() {
		try{document.execCommand("ClearAuthenticationCache");}
		catch (exception){} 
	});
	else
		$("#logout").hide();
		
});
</script>


