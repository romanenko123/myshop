{* страница пользователя *}

	<h1>Ваши регистрационные данные</h1>
	<table id="updateUserData" border="0">
		<tr>
			<td>Логин (email)</td>
			<td>{$arUser['email']}</td>
		</tr>
		<tr>
			<td>Имя</td>
			<td><input type="text" name="name" id="newName" value="{$arUser['name']}"></td>
		</tr>
		<tr>
			<td>Тел</td>
			<td><input type="text" name="phone" id="newPhone" value="{$arUser['phone']}"></td>
		</tr>
		<tr>
			<td>Адрес</td>
			<td><textarea name="adress" id="newAdress">{$arUser['adress']}</textarea></td>
		</tr>
		<tr>
			<td>Новый пароль</td>
			<td><input name="pwd1" type="password" id="newPwd1" value=""></td>
		</tr>
		<tr>
			<td>Повторите пароль</td>
			<td><input name="pwd2" type="password" id="newPwd2" value=""></td>
		</tr>
		<tr>
			<td>Для сохранения изменений введите текущий пароль</td>
			<td><input name="curPwd" type="password" id="curPwd" value=""></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="button" onclick="updateUserData();" value="Сохранить изменения"></td>
		</tr>
	</table>
