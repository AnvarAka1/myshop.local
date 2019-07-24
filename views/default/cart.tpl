<h1>Корзина</h1>

{if !$rsProducts}
В корзине пусто.
{else}

<h3>Данные заказа</h3>
<form>
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Цена</td>
            <td>Действие</td>
        </tr>

        {foreach $rsProducts as $item}
        <tr>
            <td>{$item@iteration}</td>
            <td>
                <a href="/product/{$item['id']}/">{$item['name']}</a>
            </td>
            <td>
                <input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" class="itemCnt" type="text" value={1}>
            </td>
            <td>
                <span id="itemPrice_{$item['id']}" value={$item['price']}>{$item['price']}</span>
            </td>
            <td>
                <span id="itemRealPrice_{$item['id']}" class="itemRealPrice">{$item['price']}</span>
            </td>
            <td>
                <a href="#" id="addCart_{$item['id']}" class="addCart hideme">Восстановить</a>
                <a href="#" id="removeCart_{$item['id']}" class="removeCart">Удалить</a>
            </td>       
        <tr>
        {/foreach}

    </table>

    <button type="submit">Оформить заказ</button>

</form>
{/if}