{* Product page *}

<h3>{$rsProduct['name']}</h3>

    <img src="/images/products/{$rsProduct['image']}" alt="{$rsProduct['name']}" width="575"/>
    Стоимость: {$rsProduct['price']} 
    <a id="removeCart_{$rsProduct['id']}"  class="removeCart {if !$itemInCart}hideme{/if}" href="#">Удалить из корзины</a>
    <a id="addCart_{$rsProduct['id']}" class="addCart {if $itemInCart}hideme{/if}" href="#">Добавить в корзину</a>
   
    <p>{$rsProduct['description']}</p>

