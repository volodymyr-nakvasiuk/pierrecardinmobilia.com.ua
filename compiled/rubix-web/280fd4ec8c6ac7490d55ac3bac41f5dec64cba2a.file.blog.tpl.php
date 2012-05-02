<?php /* Smarty version Smarty-3.0.7, created on 2012-05-01 09:22:54
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11863736094f9f8f4e33de83-77896397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '280fd4ec8c6ac7490d55ac3bac41f5dec64cba2a' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/blog.tpl',
      1 => 1335743740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11863736094f9f8f4e33de83-77896397',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/pcm/data/www/pierrecardinmobilia.com.ua/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Заголовок /-->
<h1><?php echo $_smarty_tpl->getVariable('page')->value->name;?>
</h1>

<?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<!-- Статьи /-->
<ul id="blog">
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('posts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>
	<li>
		<h3><a data-post="<?php echo $_smarty_tpl->getVariable('post')->value->id;?>
" href="blog/<?php echo $_smarty_tpl->getVariable('post')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('post')->value->name);?>
</a></h3>
		<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->getVariable('post')->value->date);?>
</p>
		<p><?php echo $_smarty_tpl->getVariable('post')->value->annotation;?>
</p>
	</li>
	<?php }} ?>
</ul>
<!-- Статьи #End /-->    

<?php $_template = new Smarty_Internal_Template('pagination.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
          