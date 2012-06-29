{* Список товаров *}

<!-- Хлебные крошки /-->
<div id="path">
    <a href="/">{if $lang}Main page{else}Главная{/if}</a>
    {if $category}
        {foreach from=$category->path item=cat}
            → <a overlay="1" style="text-transform: lowercase;" href="catalog/{$cat->url}">{$cat->name|escape}</a>
        {/foreach}  
        {if $brand}
            → <a overlay="1" style="text-transform: lowercase;" href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>
        {/if}
    {elseif $brand}
        → <a overlay="1" style="text-transform: lowercase;" href="brands/{$brand->url}">{$brand->name|escape}</a>
    {elseif $keyword}
        → Поиск
    {/if}
</div>
<!-- Хлебные крошки #End /-->


{* Заголовок страницы *}
{if $keyword}
    <h1 style="text-transform: lowercase;">Поиск {$keyword|escape}</h1>
{elseif $page}
    <h1 style="text-transform: lowercase;">{$page->name|escape}</h1>
{else}
    <h1 style="text-transform: lowercase;">{$category->name|escape} {$brand->name|escape} {$keyword|escape}</h1>
{/if}


{* Описание страницы (если задана) *}
{$page->body}

{if $current_page_num==1}
    {* Описание категории *}
    {$category->description}
{/if}

<!--Каталог товаров-->
{if $products}

    {include file='pagination.tpl'}

    <!-- Список товаров-->
    <ul class="products">

        {foreach $products as $product}
            <!-- Товар-->
            <li class="product">

                <div class="product_info">
                    <!-- Название товара -->
                    <h3 class="{if $product->featured}featured{/if}"><a overlay="1" data-product="{$product->id}" href="products/{$product->url}">{$product->name|escape}</a></h3>
                    <!-- Название товара (The End) -->
                </div>

                <!-- Фото товара -->
                {if $product->image}
                    <div class="image">
                        <a overlay="1" href="products/{$product->url}"><img src="{$product->image->filename|resize:200:136:a}" alt="{$product->name|escape}"/></a>
                    </div>
                {/if}
                <!-- Фото товара (The End) -->
            </li>
            <!-- Товар (The End)-->
        {/foreach}

    </ul>

    {include file='pagination.tpl'}	
    <!-- Список товаров (The End)-->

{else}
    Товары не найдены
{/if}	
<!--Каталог товаров (The End)-->