<?
require_once($_SERVER["DOCUMENT_ROOT"]."/assets/class/db.class.php");

class Calculator
{
	/**
	 * Обновляет цены в базе данных
	 * @param int $square цена за метр
	 * @param int $lamp цена за лампу
	 * @param int $chandelier цена за люстру 
	 * @param int $tube цена за трубу
	 * @param int $corner цена за угол
	 * @param int $glossy цена за глянцевую поверхность
	 * @param int $matt цена за матовую поверхность
	 */
	static function UpdateSettings($square,$lamp,$chandelier,$tube,$corner,$glossy,$matt)
	{

		$conn=DB::getInstance();
		$sql="UPDATE `settings` 
			SET price_square_m = ('$square'),
			price_lamp = ('$lamp'),
			price_chandelier = ('$chandelier'),
			price_tube = ('$tube'),
			price_corner = ('$corner'),
			price_glossy = ('$glossy'),
			price_matt = ('$matt')";
		$conn->query($sql);
	}

	/**
	 * Метод для вывода всех цена настроек
	 * @return array массив всех цен
	 */
	static function selectSettings()
	{
		$settings = array();
		$conn = DB::getInstance();
		$sql = "SELECT * FROM `settings`";
		$result = $conn->query($sql);
		while ($setting_name = $result->fetch_assoc())
		{
			$settings[] = $setting_name;
		}

		return $settings[0];
	}





/**
 * Вывод на странице всех добавленных цветов
 */
	static function showAllColor(){
		$color_array = array();
		$conn=DB::getInstance();
		$sql = "SELECT `color` FROM `settings`";
		$allColor = $conn->query($sql);
		while ($setting_name = $allColor->fetch_assoc())
		{
			$color_array[] = $setting_name;
		}
		return (array)(json_decode($color_array[0][color]));
	}
	/**
	 * Удаление цвета
	 * @param string $color цвет на которой нажали
	 * @return string удаленный цвет
	 */
	static function deleteColor($color)
	{
		$color_array =array();
		$conn=DB::getInstance();
		$sql= "SELECT `color` FROM `settings`";
		$color_db = $conn->query($sql);
		while ($setting_name = $color_db->fetch_assoc())
		{
			$color_array[] = $setting_name;
		}

		$color_array = json_decode($color_array[0][color],true);
		unset($color_array[array_search($color,$color_array)]);
		$color_json = json_encode($color_array,JSON_UNESCAPED_UNICODE);
		$conn->query("UPDATE `settings` SET `color` = '$color_json'");
	}

	/**
	 * Добавление нового цвета 
	 * @param string $color имя нового цвета 
	 * @return string название цвета для добавления
	 */	
	static function addColor($color)
	{
		$color_array =array();
		$conn=DB::getInstance();
		$sql="SELECT `color` FROM `settings`";
		$color_bd = $conn->query($sql);
		while ($setting_name = $color_bd->fetch_assoc())
		{
			$color_array[] = $setting_name;
		}
		$color_array = json_decode($color_array[0][color],true);
		if (!empty($color_array)){
			$new_color = array_search($color,$color_array);
			}else{
				$color_array[1]=$color;
				$color_json = json_encode($color_array,JSON_UNESCAPED_UNICODE);
				$conn->query("UPDATE `settings` SET `color` = '$color_json'");
				
				return $color;
				exit;
				}
		if ($new_color == ""){
			array_push($color_array, $color);
			$color_json = json_encode($color_array,JSON_UNESCAPED_UNICODE);
			$conn->query("UPDATE `settings` SET `color` = '$color_json'");
			return $color;
		}
		else{
			echo "Уже есть такой цвет";
		}
	}

}

