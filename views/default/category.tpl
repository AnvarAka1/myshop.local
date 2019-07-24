{*Category page*}
<h1>Товары категории имя</h1>
{foreach $rsProducts as $item}
<div style="float: left; padding: 0 30px 40px 0">
    <a href="/product/{$item['id']}/"><img src="/images/products/{$item['image']}" width="100" /></a><br />
    <a href="/product/{$item['id']}/">{$item['name']}</a>
</div>    
{if $item@iteration mod 3 == 0}
<div style="clear: both"></div>
{/if}
{/foreach}


{foreach $rsChildCats as $childItem}
<h2><a href="/category/{$childItem['id']}/">{$childItem['name']}</a></h2>
{/foreach}