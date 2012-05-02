<?php /* Smarty version Smarty-3.0.7, created on 2012-04-30 01:56:17
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12687339344f9dd521a0d1a1-01580003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7f76f7df34b6ac123c89f55ace5ac38765f159b' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/page.tpl',
      1 => 1335743740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12687339344f9dd521a0d1a1-01580003',
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

