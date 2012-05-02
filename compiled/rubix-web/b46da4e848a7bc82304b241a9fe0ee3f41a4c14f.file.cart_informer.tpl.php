<?php /* Smarty version Smarty-3.0.7, created on 2012-04-30 01:56:18
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5406343294f9dd5226682e9-61715748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b46da4e848a7bc82304b241a9fe0ee3f41a4c14f' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/cart_informer.tpl',
      1 => 1335743740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5406343294f9dd5226682e9-61715748',
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
