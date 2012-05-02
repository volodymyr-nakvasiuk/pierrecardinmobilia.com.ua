<?php /* Smarty version Smarty-3.0.7, created on 2012-05-01 08:20:29
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19295204094f9f80adc82249-15855619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05fa24ae74fb46e929e32c2ef3e19a740aaa1aff' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/product.tpl',
      1 => 1335853136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19295204094f9f80adc82249-15855619',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/pcm/data/www/pierrecardinmobilia.com.ua/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Хлебные крошки /-->
<div id="path">
	<a href="./">Главная</a>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category')->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
	→ <a href="catalog/<?php echo $_smarty_tpl->getVariable('cat')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('cat')->value->name);?>
</a>
	<?php }} ?>
	<?php if ($_smarty_tpl->getVariable('brand')->value){?>
	→ <a href="catalog/<?php echo $_smarty_tpl->getVariable('cat')->value->url;?>
/<?php echo $_smarty_tpl->getVariable('brand')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('brand')->value->name);?>
</a>
	<?php }?>
	→  <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
                
</div>
<!-- Хлебные крошки #End /-->

<h1 data-product="<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
</h1>

<div class="product">

	<!-- Большое фото -->
	<?php if ($_smarty_tpl->getVariable('product')->value->image){?>
	<div class="image">
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,800,600,'w');?>
" class="zoom" data-rel="group"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,630,630);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->product->name);?>
" /></a>
	</div>
	<?php }?>
	<!-- Большое фото (The End)-->

	<!-- Описание товара -->
	<div class="description">
	
		<?php echo $_smarty_tpl->getVariable('product')->value->body;?>

	</div>
	<!-- Описание товара (The End)-->

	<!-- Дополнительные фото продукта -->
	<?php if (count($_smarty_tpl->getVariable('product')->value->images)>1){?>
	<div class="images">
		<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cut'][0][0]->cut_modifier($_smarty_tpl->getVariable('product')->value->images); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('image')->value->filename,800,600,'w');?>
" class="zoom" data-rel="group"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('image')->value->filename,100,100);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
" /></a>
		<?php }} ?>
	</div>
	<?php }?>
	<!-- Дополнительные фото продукта (The End)-->
</div>
<!-- Описание товара (The End)-->
<?php if ($_smarty_tpl->getVariable('related_products')->value){?>
<h2>Так же советуем посмотреть</h2>
<!-- Список каталога товаров-->
<ul class="tiny_products">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('related_products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
	<!-- Товар-->
	<li class="product">
		
		<!-- Фото товара -->
		<?php if ($_smarty_tpl->getVariable('product')->value->image){?>
		<div class="image">
			<a href="products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('product')->value->image->filename,200,200);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
"/></a>
		</div>
		<?php }?>
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a data-product="<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" href="products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
</a></h3>
		<!-- Название товара (The End) -->
	</li>
	<!-- Товар (The End)-->
	<?php }} ?>
</ul>
<?php }?>


<script>
$(function() {
	// Зум картинок
	$("a.zoom").fancybox({ 'hideOnContentClick' : true });
});
</script>

