<?php /* Smarty version Smarty-3.0.7, created on 2012-05-02 10:27:38
         compiled from "/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5013498864fa0effa7ab1e9-10861516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bb60535957495807c42b1b65110e8263a9f6bb8' => 
    array (
      0 => '/var/www/pcm/data/www/pierrecardinmobilia.com.ua//design/rubix-web/html/index.tpl',
      1 => 1335947255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5013498864fa0effa7ab1e9-10861516',
  'function' => 
  array (
    'categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'has_nocache_code' => 0,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/pcm/data/www/pierrecardinmobilia.com.ua/Smarty/libs/plugins/modifier.escape.php';
?><!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo $_smarty_tpl->getVariable('config')->value->root_url;?>
/"/>
        <title><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_title')->value);?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_description')->value);?>
" />
        <meta name="keywords"    content="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('meta_keywords')->value);?>
" />
        <meta name="viewport" content="width=1024"/>
        <link href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
        <!--[if IE]>
            <link href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/css/style_ie.css" rel="stylesheet" type="text/css" media="screen"/>
        <![endif]-->
        <link href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/favicon.ico" rel="icon"          type="image/x-icon"/>
        <link href="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <script src="js/jquery/jquery.js"  type="text/javascript"></script>
        <?php if ($_SESSION['admin']=='admin'){?>
            <script src ="js/admintooltip/admintooltip.js" type="text/javascript"></script>
            <link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" /> 
        <?php }?>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <script type="text/javascript" src="js/ctrlnavigate.js"></script>
        <script src="design/<?php echo $_smarty_tpl->getVariable('settings')->value->theme;?>
/js/jquery-ui.min.js"></script>
        <script src="design/<?php echo $_smarty_tpl->getVariable('settings')->value->theme;?>
/js/ajax_cart.js"></script>
        <script src="/js/baloon/js/baloon.js" type="text/javascript"></script>
        <link   href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css" />
        
            <script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
            <style>
                .autocomplete-w1 { position:absolute; top:0px; left:0px; margin:6px 0 0 6px; /* IE6 fix: */ _background:none; _margin:1px 0 0 0; }
                .autocomplete { border:1px solid #999; background:#FFF; cursor:default; text-align:left; overflow-x:auto;  overflow-y: auto; margin:-6px 6px 6px -6px; /* IE6 specific: */ _height:350px;  _margin:0; _overflow-x:hidden; }
                .autocomplete .selected { background:#F0F0F0; }
                .autocomplete div { padding:2px 5px; white-space:nowrap; }
                .autocomplete strong { font-weight:normal; color:#3399FF; }
            </style>	
            <script>
            $(function() {
                    //  Автозаполнитель поиска
                    $(".input_search").autocomplete({
                            serviceUrl:'ajax/search_products.php',
                            minChars:1,
                            noCache: false, 
                            onSelect:
                                    function(value, data){
                                             $(".input_search").closest('form').submit();
                                    },
                            fnFormatResult:
                                    function(value, data, currentValue){
                                            var reEscape = new RegExp('(' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', ''].join('|') + ')', 'g');
                                            var pattern = '(' + currentValue.replace(reEscape, '$1') + ')';
                                            return (data.image?"<img align=absmiddle src='"+data.image+"'> ":'') + value.replace(new RegExp(pattern, 'gi'), '<strong>$1</strong>');
                                    }	
                    });
            });
            </script>
        


    </head>
    <body>
        <div id="body_bg"><img src="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/bg.jpeg" alt="" /></div>

        <!-- Верхняя строка -->
        <div id="top_background">
            <div id="top">
                <div id="logo">
                    <a href="/"><img src="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/logo.png" title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->site_name);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->site_name);?>
"/></a>
                </div>

                <!-- Меню -->
                <ul id="menu">
                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
                        <?php if ($_smarty_tpl->getVariable('p')->value->menu_id==1){?>
                            <li <?php if ($_smarty_tpl->getVariable('page')->value&&$_smarty_tpl->getVariable('page')->value->id==$_smarty_tpl->getVariable('p')->value->id){?>class="selected"<?php }?>>
                                <a data-page="<?php echo $_smarty_tpl->getVariable('p')->value->id;?>
" href="<?php echo $_smarty_tpl->getVariable('p')->value->url;?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('p')->value->name);?>
</a>
                            </li>
                        <?php }?>
                    <?php }} ?>
                </ul>
                <!-- Меню (The End) -->
            </div>
        </div>
        <!-- Верхняя строка (The End)-->

        <!-- Вся страница --> 
        <div id="main">

            <!-- Основная часть --> 
            <div id="content">
                <?php echo $_smarty_tpl->getVariable('content')->value;?>

            </div>
            <!-- Основная часть (The End) --> 

            <div id="left">

                <!-- Меню каталога -->
                <div id="catalog_menu">
                    <?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                    <?php if ($_smarty_tpl->getVariable('categories')->value){?>
                        <ul class="deph_<?php echo $_smarty_tpl->getVariable('deph')->value;?>
" id="catalog_ul_menu">
                            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
                                <?php if ($_smarty_tpl->getVariable('c')->value->visible){?>
                                    <li class="deph_<?php echo $_smarty_tpl->getVariable('deph')->value;?>
">
                                     <div class="deph_<?php echo $_smarty_tpl->getVariable('deph')->value;?>
"><a <?php if ($_smarty_tpl->getVariable('category')->value->id==$_smarty_tpl->getVariable('c')->value->id){?>class="selected"<?php }?> href="catalog/<?php echo $_smarty_tpl->getVariable('c')->value->url;?>
" <?php if ($_smarty_tpl->getVariable('c')->value->id>100000){?>data-product="<?php echo $_smarty_tpl->getVariable('c')->value->id-100000;?>
"<?php }else{ ?>data-category="<?php echo $_smarty_tpl->getVariable('c')->value->id;?>
"<?php }?>><?php echo $_smarty_tpl->getVariable('c')->value->name;?>
</a></div>
                                        <?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->getVariable('c')->value->subcategories,'deph'=>$_smarty_tpl->getVariable('deph')->value+1));?>

                                    </li>
                                <?php }?>
                            <?php }} ?>
                        </ul>
                    <?php }?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>

                    <?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->getVariable('categories')->value,'deph'=>0));?>

                </div>
                <!-- Меню каталога (The End)-->		

                <!-- Просмотренные товары -->
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_browsed_products'][0][0]->get_browsed_products(array('var'=>'browsed_products','limit'=>20),$_smarty_tpl);?>

                <?php if ($_smarty_tpl->getVariable('browsed_products')->value){?>
                    <div id="recent">
                        <h2>Вы просматривали:</h2>
                        <ul id="browsed_products">
                            <?php  $_smarty_tpl->tpl_vars['browsed_product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('browsed_products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['browsed_product']->key => $_smarty_tpl->tpl_vars['browsed_product']->value){
?>
                                <li>
                                    <a href="products/<?php echo $_smarty_tpl->getVariable('browsed_product')->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->getVariable('browsed_product')->value->image->filename,50,50);?>
" alt="<?php echo $_smarty_tpl->getVariable('browsed_product')->value->name;?>
" title="<?php echo $_smarty_tpl->getVariable('browsed_product')->value->name;?>
"></a>
                                </li>
                            <?php }} ?>
                        </ul>
                    </div>
                <?php }?>
                <!-- Просмотренные товары (The End)-->
                <!-- Просмотренные товары -->

            </div>			

        </div>
        <!-- Вся страница (The End)--> 

        <!-- Футер -->
        <div id="footer_bg">
            <div id="footer">
                <div id="contacts">
                    <ul>
                        <li>
                            РОССИЯ, МОСКВА<br/>
                            тел. +7(985)2335262
                        </li>
                        <li>
                            БЕЛОРОУССИЯ, МИНСК<br/>
                            тел. +375 17-292-06-26
                        </li>
                        <li>
                            КАТАР, ДОХА<br/>
                            тел. +974441-4447
                        </li>
                    </ul>
                    <ul>
                        <li>
                            ВЕЛИКОБРИТАНИЯ, ЛОНДОН<br/>
                            тел. +44 208-859-0022
                        </li>
                        <li>
                            ГРЕЦИЯ, КРИТ<br/>
                            тел. 2810 37-25-00
                        </li>
                        <li>
                            ИРАН, ТЕГЕРАН<br/>
                            тел. 00 98 21 887-81-367
                        </li>
                    </ul>
                    <ul>
                        <li>
                            КИПР<br/>
                            тел. 0392824-55-00
                        </li>
                        <li>
                            СИРИЯ, ДАМАСК<br/>
                            тел. +963 11 22-18-900
                        </li>
                    </ul>
                    <ul>
                        <li>
                            ГЕРМАНИЯ, ЕСЕН<br/>
                            тел. +49(0)201-63-46-14-14
                        </li>
                        <li>
                            ТУРЦИЯ, АНКАРА<br/>
                            тел. +90312-350-40-44
                        </li>
                    </ul>
                    <ul>
                        <li>
                            БЕЛЬГИЯ, БРЮСЕЛЬ<br/>
                            тел. 0032(0)23-58-52-78
                        </li>
                        <li>
                            АЗЕРБАЙДЖАН, БАКУ<br/>
                            тел. +99 412 497-37-80
                        </li>
                    </ul>
                    <div id="copyright">
                        &copy; 2012 БУТИК МЕБЕЛИ &laquo;PIERRE CARDIN&raquo;
                    </div>
                </div>
                <div id="flogo">
                    <a href="/"><img src="design/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->theme);?>
/images/flogo.png" title="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->site_name);?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('settings')->value->site_name);?>
"/></a>
                    <div id="paris">PARIS</div>
                </div>
            </div>
        </div>
        <!-- Футер (The End)--> 
        <script type="text/javascript">
            $("#catalog_ul_menu > li > div.deph_0").click(function(){
            if(false == $(this).next().is(':visible')) {
            $('#catalog_ul_menu ul.deph_1').slideUp(500);
        }
        $(this).next().slideToggle(500);
    });
 
    $('#catalog_ul_menu li a.selected').closest('li.deph_0').find('ul.deph_1:first').show();
    //$('#catalog_ul_menu li.deph_0 a:first').attr('href', 'javascript:void(0);');
    $(window).load(function(){
        $('#body_hider').fadeOut(1000);
    });
        </script>
    </body>
</html>