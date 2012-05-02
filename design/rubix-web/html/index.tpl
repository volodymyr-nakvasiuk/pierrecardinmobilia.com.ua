<!DOCTYPE html>
{*
Общий вид страницы
Этот шаблон отвечает за общий вид страниц без центрального блока.
*}
<html>
    <head>
        <base href="{$config->root_url}/"/>
        <title>{$meta_title|escape}</title>

        {* Метатеги *}
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="{$meta_description|escape}" />
        <meta name="keywords"    content="{$meta_keywords|escape}" />
        <meta name="viewport" content="width=1024"/>

        {* Стили *}
        <link href="design/{$settings->theme|escape}/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
        <!--[if IE]>
            <link href="design/{$settings->theme|escape}/css/style_ie.css" rel="stylesheet" type="text/css" media="screen"/>
        <![endif]-->
        <link href="design/{$settings->theme|escape}/images/favicon.ico" rel="icon"          type="image/x-icon"/>
        <link href="design/{$settings->theme|escape}/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

        {* JQuery *}
        <script src="js/jquery/jquery.js"  type="text/javascript"></script>

        {* Всплывающие подсказки для администратора *}
        {if $smarty.session.admin == 'admin'}
            <script src ="js/admintooltip/admintooltip.js" type="text/javascript"></script>
            <link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" /> 
        {/if}

        {* Увеличитель картинок *}
        <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

        {* Ctrl-навигация на соседние товары *}
        <script type="text/javascript" src="js/ctrlnavigate.js"></script>           

        {* Аяксовая корзина *}
        <script src="design/{$settings->theme}/js/jquery-ui.min.js"></script>
        <script src="design/{$settings->theme}/js/ajax_cart.js"></script>

        {* js-проверка форм *}
        <script src="/js/baloon/js/baloon.js" type="text/javascript"></script>
        <link   href="/js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 

        {* Автозаполнитель поиска *}
        {literal}
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
        {/literal}


    </head>
    <body>
        <div id="body_bg"><img src="design/{$settings->theme|escape}/images/bg.jpeg" alt="" /></div>
        {*<div id="body_hider"></div>*}

        <!-- Верхняя строка -->
        <div id="top_background">
            <div id="top">
                <div id="logo">
                    <a href="/"><img src="design/{$settings->theme|escape}/images/logo.png" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a>
                </div>

                <!-- Меню -->
                <ul id="menu">
                    {foreach name=page from=$pages item=p}
                        {* Выводим только страницы из первого меню *}
                        {if $p->menu_id == 1}
                            <li {if $page && $page->id == $p->id}class="selected"{/if}>
                                <a data-page="{$p->id}" href="{$p->url}">{$p->name|escape}</a>
                            </li>
                        {/if}
                    {/foreach}
                </ul>
                <!-- Меню (The End) -->
            </div>
        </div>
        <!-- Верхняя строка (The End)-->

        <!-- Вся страница --> 
        <div id="main">

            <!-- Основная часть --> 
            <div id="content">
                {$content}
            </div>
            <!-- Основная часть (The End) --> 

            <div id="left">

                <!-- Меню каталога -->
                <div id="catalog_menu">

                    {* Рекурсивная функция вывода дерева категорий *}
                    {function name=categories_tree}
                    {if $categories}
                        <ul class="deph_{$deph}" id="catalog_ul_menu">
                            {foreach $categories as $c}
                                {* Показываем только видимые категории *}
                                {if $c->visible}
                                    <li class="deph_{$deph}">
                                        {*if $c->image}<img src="{$config->categories_images_dir}{$c->image}" alt="{$c->name}">{/if*}
                                     <div class="deph_{$deph}"><a {if $category->id == $c->id}class="selected"{/if} href="catalog/{$c->url}" {if $c->id>100000}data-product="{$c->id-100000}"{else}data-category="{$c->id}"{/if}>{$c->name}</a></div>
                                        {categories_tree categories=$c->subcategories deph=$deph+1}
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    {/if}
                    {/function}
                    {categories_tree categories=$categories deph=0}
                </div>
                <!-- Меню каталога (The End)-->		

                <!-- Просмотренные товары -->
                {get_browsed_products var=browsed_products limit=20}
                {if $browsed_products}
                    <div id="recent">
                        <h2>Вы просматривали:</h2>
                        <ul id="browsed_products">
                            {foreach $browsed_products as $browsed_product}
                                <li>
                                    <a href="products/{$browsed_product->url}"><img src="{$browsed_product->image->filename|resize:50:50}" alt="{$browsed_product->name}" title="{$browsed_product->name}"></a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                {/if}
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
                    <a href="/"><img src="design/{$settings->theme|escape}/images/flogo.png" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a>
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