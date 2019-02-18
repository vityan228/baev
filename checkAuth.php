<?php
/*require_once($_SERVER["DOCUMENT_ROOT"]."/ajax.php");
session_start();
$log = clean($_POST['login_auth']);
$pass = clean($_POST['pass_auth']);


$check=array();

if(isset($_POST['ok-auth']))
{
	$result = mysqli_query(BD::Getdb(),
		"SELECT `login_user`,`password_user` 
		FROM `users` 
		WHERE `login_user`= ('$log') LIMIT 1 ");

	if ($result->num_rows === 0)
	{
		echo "<script>alert(\"Не зарегестрированный логин\");</script>";
	}

	else{

		while ($check_auth = $result->fetch_assoc())
		{
			$check[] = $check_auth;

		}

	}

	foreach ($check as  $value) {

		if ($value[password_user] == md5($pass)){
			$_SESSION['authorized']=1;
			header("Location: admin.php");
			exit();
		}
		else {
			echo "<script>alert(\"Пароль не совпадает\");</script>";
		}
	}
}*/

?>*/