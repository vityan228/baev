<?php
class User 
{

/**
 * Проверка регистрации пользователя ,
 * @param string $login логин который ввел пользователь для входа
 * @param string $password пароль который ввел пользователь для входа под его логином
 * @return string либо ошибку что нет такого пользователя, либо что не рарегестрирован либо переменную для перехода на админскую страницу
 */
static function checkAuth($login,$password)
{
	$password = md5($password);
	$conn=DB::getInstance();
	$sql = "SELECT `login_user`,`password_user` 
	FROM `users` 
	WHERE `login_user`= $login LIMIT 1 ";
	$result = $conn->query($sql);

	if ($result->num_rows === 0)
	{
		echo "Данный пользователь не зарегестрирован";
	}
	else{

		while ($check_auth = $result->fetch_assoc())
		{
			$check[] = $check_auth;
		}
	}

	if ($check[0][password_user] == $password){
		session_start();
		$_SESSION['authorized']=1;
		$relocate=1;
		return $relocate;
	}
	else {
		echo "Введенный логин и пароль не совпадает";
	}
}	

	/**
	 * Добавление пользователя
	 * @param string $login логин нового пользователя
	 * @param string $password пароль нового пользователя
	 * @return array массив с логином и паролем пользователя
	 */
	static function AddUser($login, $password)
	
	{
		$length= strlen($password);
		$password = md5($password);
		$userDistinct=array();

		$conn=DB::getInstance();
		$sql = "SELECT * FROM `users` WHERE `login_user` = '$login'";

		$result = $conn->query($sql);

		if ($result->num_rows === 0) 
		{
			if ($length<3)
				{	echo "Пароль должен быть длинее 4х символов";
				//exit;
		}else{
			$conn=DB::getInstance();
			$sql = "INSERT INTO `users` (`login_user`,`password_user`) VALUES ('$login','$password')";
			$conn->query($sql);
			$users = array();
			$sql = "SELECT * FROM `users` ORDER BY `id_user` DESC LIMIT 1;";
			$result = $conn->query($sql);
			while ($user_name = $result->fetch_assoc())
			{
				$users[] = $user_name;
			}
			return $users;
		} 
	}
	if ($result->num_rows != 0) 
	{
		echo "Пользователь с таким логином уже есть";
			//exit;
	}
}

	/**
	 * Изменение логина и пароля пользователя
	 * @param int $id айди пользователя для поиска пользователя 
	 * @param string $login измененный логин пользователя 
	 * @param string $password измененные пароль пользователя 
	 */
	static function changeUser($id,$login,$password)
	{

		if ($password != "")
		{
			$password = md5($password);

			$conn=DB::getInstance();
			$sql="UPDATE `users` SET `login_user` = '$login', `password_user` = '$password' WHERE `id_user` = '$id' ";
			//mysqli_query($conn,$sql);
			$conn->query($sql);
		} 
		else {
			$conn=DB::getInstance();
			$sql = "UPDATE `users` 
			SET `login_user` = '$login'
			WHERE `id_user` = '$id'";
			//mysqli_query($conn,$sql);
			$conn->query($sql);
		}
	}

	/**
	 * Метод вывода всех пользователей в таблицу
	 * @return array список всех пользователей
	 */
	static function SelectAllUsers()
	{
		$users = array();
		$conn=DB::getInstance();
		$sql = "SELECT  `login_user`,`id_user` FROM `users`";
		$result = $conn->query($sql);
		if ($result->num_rows === 0) 
		{
			echo "net sovpadenii";
			exit;
		}
		while ($user_name = $result->fetch_assoc())
		{
			$users[] = $user_name;
		}
		return $users;
	}

	/**
	 * Удаление пользователя по айди
	 * @param int $id айди пользователя
	 */
	static function deleteUser($id)
	{
		$conn= DB::getInstance();
		$sql = "DELETE FROM  `users` WHERE `id_user` = '$id'";
		//mysqli_query($conn,$sql);
		$conn->query($sql);

	}
	/**
	 * Выбор 1 пользователя для изменения
	 * @param int $id йди пользователя для поиска его в базе 
	 * @return array логин и пароль пользователя
	 */
	static function selectUser($id)
	{
		$user=array();
		$conn = DB::getInstance();
		$sql = "SELECT  `login_user`,`id_user`,`password_user` FROM `users` WHERE `id_user` = '$id'";
		$result = $conn->query($sql);

		while ($user_name = $result->fetch_assoc())
		{
			$user[] = $user_name;
		}

		return $user[0];
	}
}
