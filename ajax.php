<?

require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/user.class.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/db.class.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/calculator.class.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/application.class.php");

$type = clean($_POST[type]);

function clean($value = "") {
	$value = trim($value);
	$value = stripslashes($value);
	$value = strip_tags($value);
	$value = htmlspecialchars($value);

	return $value;
}
if ($type=="add-user")   // добавления пользователя
{
	$login = clean($_POST['login']);
	$password = clean($_POST['pass']);
	if (($login=="") or ($password=="")){
		exit;
	}else{

		$qwe = User::AddUser($login, $password);
		if ($qwe!=""){
			print_r($qwe);
			echo "<tr class='give-child'><td class='first-colum' >".$qwe[0][id_user]."</td><td class='second-colum' >".$qwe[0][login_user]."</td><td class='third-colum'><i class='fas fa-edit select-user' data-id=".$qwe[0][id_user]."></i><i class='fas fa-times delete-user' data-id = ".$qwe[0][id_user]."></i></td></tr>";
		}else{
			exit;
		}
	}
}



elseif ($type=="check-auth")
{
	$login=clean($_POST['login']);
	$password=clean($_POST['password']);
//User::checkAuth($login,$password);
	$reloc = User::checkAuth($login,$password);
/*if ($reloc=!0){
	header("Location: admin.php");
	exit;
}*/

}

elseif ($type=="calc")// изменение параметров настроек
{


	$square=clean($_POST['price_square_m']);
	$lamp=clean($_POST['price_lamp']);
	$chandelier=clean($_POST['price_chandelier']);
	$tube=clean($_POST['price_tube']);
	$corner=clean($_POST['price_corner']);
	$glossy=clean($_POST['price_glossy']);
	$matt=clean($_POST['price_matt']);

	Calculator::UpdateSettings($square,$lamp,$chandelier,$tube,$corner,$glossy,$matt);	
}


elseif ($type=="delete-user")// удаление пользователя
{

	$id = clean($_POST['data_id']);
	User::deleteUser($id);
}

elseif ($type=="delete-application")// удаление заявки
{

	$id = clean($_POST['data_id']);
	Application::deleteApplication($id);
}

elseif ($type=="change-user")// изменение данных пользователя
{
	$id = clean($_POST['id']);
	$login = clean($_POST['login']);
	$password =clean($_POST['password']);
	User::changeUser($id,$login,$password);
}


elseif ($type=="delete-color")// удаление цвета
{
	$color = clean($_POST['data_color']);
	Calculator::deleteColor($color);
}


elseif ($type=="add-color")// добавление цвета
{
	$color = clean($_POST['color']);
	//Calculator::addColor($color);

	$name_color = Calculator::addColor($color);
	echo "<div class='div-color'><br>".$name_color."<i class='fas fa-times delete-color' data-color=".$name_color."></i></div>";

}


elseif ($type=="select")// вывод 1 пользователя
{

	$id = clean($_POST['data_id']);
	$user = User::selectUser($id);
	echo json_encode($user);
}


elseif ($type =="price-application")// вычитание итоговой стоимости
{
	$square =clean($_POST['input_square']);
	$lamp =clean($_POST['input_light']);
	$chandelier =clean($_POST['input_light1']);
	$tube =clean($_POST['input_trub']);
	$corner =clean($_POST['input_corner']);
	$fact = clean($_POST['input_facture']);
	$result =  Application::setFullPrice($square,$lamp,$chandelier,$tube,$corner,$fact);
	echo 	$result;
}

elseif ($type =="push-application")// добавление заявки в базу
{
	$city = clean($_POST['city']);
	$birthday= clean($_POST['birthday']);
	$phone= clean($_POST['user_phone']);
	$text = $_POST['text'];
	$date=clean($_POST['date']);
	$ip_user=clean($_SERVER['SERVER_ADDR']);

	
	
	Application::mailApplication($text);
	Application::leftApplication($city,$birthday,$phone,$text,$date,$ip_user);
	
}

?>
