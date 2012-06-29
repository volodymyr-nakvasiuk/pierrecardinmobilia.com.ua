{* Список новостей *}

<!-- Заголовок /-->
<h1>{$page->name}</h1>

{include file='pagination.tpl'}

<!-- Статьи /-->
<ul id="blog">
	{foreach $posts as $post}
	<li>
		<p>{$post->date|date}</p>
		<p>{$post->annotation}</p>
	</li>
	{/foreach}
</ul>
<!-- Статьи #End /-->    

{include file='pagination.tpl'}

{literal}
<script>
$(function() {
	// Зум картинок
	$("a.zoom").fancybox({ 'hideOnContentClick' : true });
});
</script>
{/literal}