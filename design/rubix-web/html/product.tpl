{* Страница товара *}

<!-- Хлебные крошки /-->
<div id="path">
	<a href="./">Главная</a>
	{foreach from=$category->path item=cat}
	→ <a href="catalog/{$cat->url}">{$cat->name|escape}</a>
	{/foreach}
	{if $brand}
	→ <a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>
	{/if}
	→  {$product->name|escape}                
</div>
<!-- Хлебные крошки #End /-->

<h1 data-product="{$product->id}">{$product->name|escape}</h1>

<div class="product">

	<!-- Большое фото -->
	{if $product->image}
	<div class="image">
		<a href="{$product->image->filename|resize:800:600:w}" class="zoom" data-rel="group"><img src="{$product->image->filename|resize:630:630}" alt="{$product->product->name|escape}" /></a>
	</div>
	{/if}
	<!-- Большое фото (The End)-->

	<!-- Описание товара -->
	<div class="description">
	
		{$product->body}
	</div>
	<!-- Описание товара (The End)-->

	<!-- Дополнительные фото продукта -->
	{if $product->images|count>1}
	<div class="images">
		{* cut удаляет первую фотографию, если нужно начать 2-й - пишем cut:2 и тд *}
		{foreach $product->images|cut as $i=>$image}
			<a href="{$image->filename|resize:800:600:w}" class="zoom" data-rel="group"><img src="{$image->filename|resize:100:100}" alt="{$product->name|escape}" /></a>
		{/foreach}
	</div>
	{/if}
	<!-- Дополнительные фото продукта (The End)-->
</div>
<!-- Описание товара (The End)-->

{* Связанные товары *}
{if $related_products}
<h2>Так же советуем посмотреть</h2>
<!-- Список каталога товаров-->
<ul class="tiny_products">
	{foreach $related_products as $product}
	<!-- Товар-->
	<li class="product">
		
		<!-- Фото товара -->
		{if $product->image}
		<div class="image">
			<a href="products/{$product->url}"><img src="{$product->image->filename|resize:200:200}" alt="{$product->name|escape}"/></a>
		</div>
		{/if}
		<!-- Фото товара (The End) -->

		<!-- Название товара -->
		<h3><a data-product="{$product->id}" href="products/{$product->url}">{$product->name|escape}</a></h3>
		<!-- Название товара (The End) -->
	</li>
	<!-- Товар (The End)-->
	{/foreach}
</ul>
{/if}

{literal}
<script>
$(function() {
	// Зум картинок
	$("a.zoom").fancybox({ 'hideOnContentClick' : true });
});
</script>
{/literal}
