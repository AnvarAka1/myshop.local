 {* Left column *}
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Меню:</div>
                {foreach $rsCategories as $item}
                    <a href="/category/{$item['id']}/">{$item['name']}</a><br/>
                    {if isset($item['children'])}
                    {foreach $item['children'] as $itemChild}
                        --<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br/>
                    {/foreach}
                    {/if}
                {/foreach}
            </div>
            
            {if isset($arUser)}
            <div id="userBox">
                <a href="/user/" id="userLink">{$arUser['displayName']}</a><br/>
                <a href="/user/logout/" id="logout">Выход</a>
            </div>
        
        {else}
            <div id="userBox" class="hideme">
        
                <a href="#" id="userLink"></a><br/>
                <a href="/user/logout/" id="logout">Выход</a>
            </div>

        
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <input id="loginEmail" name="loginEmail" type="text" value=""/><br/>
            <input id="loginPwd" name="loginPwd" type="password" value=""/><br/>
            <input id="loginInput" type="button" value="Войти" />
        </div>
    
         <div id="registerBox">
         <div class="menuCaption showHidden"><a href="#" id="regToggle">Регистрация</a></div>
         <div id="registerBoxHidden">
             E-Mail:<br />
             <input type="text" id="email" name="email" value="" /><br />
             Пароль:<br />
             <input type="password" id="pwd1" name="pwd1" value="" /><br />
             Повторить пароль:<br />
             <input type="password" id="pwd2" name="pwd2" value="" /><br />
             <input id="regInput" type="button" value="Зарегистрироваться" />
         </div>
     </div>

     {/if}
            <div class="menuCaption">Корзина</div>
            <a href="/cart/" title="Перейти в корзину">В корзине</a>
            <span id="cartCntItems">
            {if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
            </span>
        </div>