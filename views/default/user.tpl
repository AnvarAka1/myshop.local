<h1>Ваши регистрационные данные:</h1>

<table id="userInfoTable">
    <tr>
        <td>Логин (email)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" name="name"  id="newName" value="{$arUser['name']}" /></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input type="text" name="phone" id="newPhone" value="{$arUser['phone']}" /></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea name="address" id="newAddress">{$arUser['address']}</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" name="pwd1" id="newPwd1" value=""></td>
    </tr>
    <tr>
        <td>Повтор пароля</td>
        <td><input type="password" name="pwd2" id="newPwd2" value=""></td>
    </tr>
    <tr>
        <td>Для того чтобы сохранить данные введите текущий пароль</td>
        <td><input type="password" name="curPwd" id="curPwd" value=""></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button"  id="saveChangesButton" value="Сохранить изменения"></td>
    </tr>

</table>

