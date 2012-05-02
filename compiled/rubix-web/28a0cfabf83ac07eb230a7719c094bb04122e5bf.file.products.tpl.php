<?php /* Smarty version Smarty-3.0.7, created on 2012-05-01 11:14:38
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:579354214f9f75b81d9c21-93371627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28a0cfabf83ac07eb230a7719c094bb04122e5bf' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/products.tpl',
      1 => 1335850375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '579354214f9f75b81d9c21-93371627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/pcm/data/www/pierrecardinmobilia.com.ua/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Хлебные крошки /-->
<div id="path">
    <a href="/">Главная</a>
    <?php if ($_smarty_tpl->getVariable('category')->value){?>
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
    <?php }elseif($_smarty_tpl->getVariable('brand')->value){?>
        → <a href="brands/<?php echo $_smarty_tpl->getVariable('brand')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('brand')->value->name);?>
</a>
    <?php }elseif($_smarty_tpl->getVariable('keyword')->value){?>
        → Поиск
    <?php }?>
</div>
<!-- Хлебные крошки #End /-->
<?php if ($_smarty_tpl->getVariable('keyword')->value){?>
    <h1>Поиск <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('keyword')->value);?>
</h1>
<?php }elseif($_smarty_tpl->getVariable('page')->value){?>
    <h1><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page')->value->name);?>
</h1>
<?php }else{ ?>
    <h1><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('category')->value->name);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('brand')->value->name);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('keyword')->value);?>
</h1>
<?php }?>
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>


<?php if ($_smarty_tpl->getVariable('current_page_num')->value==1){?>
    <?php echo $_smarty_tpl->getVariable('category')->value->description;?>

<?php }?>

<!--Каталог товаров-->
<?php if ($_smarty_tpl->getVariable('products')->value){?>

    <?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

    <!-- Список товаров-->
    <ul class="products">

        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
            <!-- Товар-->
            <li class="product">

                <div class="product_info">
                    <!-- Название товара -->
                    <h3 class="<?php if ($_smarty_tpl->getVariable('product')->value->featured){?>featured<?php }?>"><a data-product="<?php echo $_smarty_tpl->getVariable('product')->value->id;?>
" href="products/<?php echo $_smarty_tpl->getVariable('product')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('product')->value->name);?>
</a></h3>
                    <!-- Название товара (The End) -->
                </div>

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
            </li>
            <!-- Товар (The End)-->
        <?php }} ?>

    </ul>

    <?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>	
    <!-- Список товаров (The End)-->

<?php }else{ ?>
    Товары не найдены
<?php }?>	
<!--Каталог товаров (The End)-->