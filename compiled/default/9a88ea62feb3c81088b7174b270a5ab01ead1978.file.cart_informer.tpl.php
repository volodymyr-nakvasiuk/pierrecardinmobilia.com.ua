<?php /* Smarty version Smarty-3.0.7, created on 2012-04-28 23:55:51
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/default/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20997060764f9c676793a041-15305389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a88ea62feb3c81088b7174b270a5ab01ead1978' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/default/html/cart_informer.tpl',
      1 => 1328299206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20997060764f9c676793a041-15305389',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/pcm/data/www/pierrecardinmobilia.com.ua/Smarty/libs/plugins/modifier.escape.php';
?>

<?php if ($_smarty_tpl->getVariable('cart')->value->total_products>0){?>
	В <a href="./cart/">корзине</a>
	<?php echo $_smarty_tpl->getVariable('cart')->value->total_products;?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier($_smarty_tpl->getVariable('cart')->value->total_products,'товар','товаров','товара');?>

	на <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->getVariable('cart')->value->total_price);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('currency')->value->sign);?>

<?php }else{ ?>
	Корзина пуста
<?php }?>
