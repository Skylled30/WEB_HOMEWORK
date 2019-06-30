<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<meta charset="utf-8">
	<style type="text/css">
		form div {
		  margin-bottom: 15px;
		}
	</style>
</head>
<body>
<div class="form-wrap">
	<form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
		<div>
			<h1>Регистрация на участие в конференции</h1>
		</div>
		<div>
			<label>Имя * <input type="text" placeholder="Иван" name="fname" value="<?= isset($_POST['fname']) ? $_POST['fname']:''?>" required></label>
		</div>
		<div>
			<label>Фамилия * <input type="text" placeholder="Иванов" name="sname" value="<?= isset($_POST['sname']) ? $_POST['sname']:''?>" required></label>
		</div>
		<div>
			<label>E-mail * <input type="text" placeholder="mail@mail.ru" name="email" value="<?= isset($_POST['email']) ? $_POST['email']:''?>" required></label>
		</div>
		<div>
			<label>Телефон * <input type="text" placeholder="89123456789" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone']:''?>" required></label>
		</div>
		<div>
			<span>Выберите тематику конференции * </span>
			<label for="topic">
			<select name="topic">
				<option>Бизнес</option>
				<option>Технологии</option>
				<option>Реклама и Маркетинг</option>
			</select>
			</label>
		</div>
		<div>
			<span>Способ оплаты *</span>
			<label for="payment">
			<select name="payment">
				<option>WebMoney</option>
				<option>Яндекс.Деньги</option>
				<option>PayPal</option>
				<option>Кредитная карта</option>
			</select>
			</label>
		</div>
		<div>
			<label>
				<input type="checkbox" name="getMail" value="yes" checked>
				<font>Получать рассылку о конференции?</font>
			</label>
		</div>
		<button type="submit">Отправить</button>
	</form>
</div>
</body>
</html>
