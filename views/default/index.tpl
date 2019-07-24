  {* We call foreach name=products to get access to it through smarty *}
  {* Then use $smarty.foreach.products.iteration mod 3 == 0 *}
  {* Or use $item@iteration mod 3 == 0*}
{foreach $rsProducts as $item name=products}
  <div style="float: left; padding: 0 30px 40px 0">
         <a href="/product/{$item['id']}/">
            <img src="images/products/{$item['image']}" style="width: 100" />
        </a><br/>
         <a href="/product/{$item['id']}/">
             {$item['name']}
        </a> 
      </div>  

{if $item@iteration mod 3 == 0}
<div style="clear:both"><div>

{/if}
{/foreach}

       
