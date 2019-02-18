<?
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/db.class.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/checkAuth.php");
//require_once($_SERVER["DOCUMENT_ROOT"]."/admin.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/style-auth.css">
</head>
<body>
	
	<div class="div">
		<span class="auth"><h1 class="title">Авторизация</h1></span>
		<span class="info">Для входа введите логин и пароль</span>
		<form method="POST">
			<div class="log-pass-div">
				<div class="log-div">
				<span class="login-lettres">Логин:</span>
			<div class="log">
	           
	            <input type="text" name="login_auth" id="login_auth" placeholder="Ваш логин"> 
	         </div>
	         </div>
	         <div class="pass-div">
	         <span class="pass-lettres">Пароль:</span>
	         <div class="pass">
	            
	            <input type="text" name="pass_auth" id="pass_auth" placeholder="Ваш пароль" >
	         </div>
	         </div>
	         </div>
	         <div class="btn-auth">
         	<input type="submit" class="submit-auth" name="ok-auth" value="Войти">
         	</div>
		</form>
	</div>









 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="assets/js/jquery.nice-select.min.js"></script>
 <script src="assets/js/jquery.maskedinput.min.js"></script>
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/js/jquery.validate.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="assets/js/scripts.js"></script>
</body>
</html>