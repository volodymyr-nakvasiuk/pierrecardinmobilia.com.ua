<?php /* Smarty version Smarty-3.0.7, created on 2012-04-28 23:55:50
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/default/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4317562984f9c676638f883-05260809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7356917cfbeabc6b71c9a7998b0b77d3d5d19b99' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/default/html/page.tpl',
      1 => 1328299282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4317562984f9c676638f883-05260809',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/pcm/data/www/pierrecardinmobilia.com.ua/Smarty/libs/plugins/modifier.escape.php';
?>

<!-- Заголовок страницы -->
<h1 data-page="<?php echo $_smarty_tpl->getVariable('page')->value->id;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page')->value->header);?>
</h1>

<!-- Тело страницы -->
<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

