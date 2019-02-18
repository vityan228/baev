<?php

Class Application 
{
	/**
	 * Подсчет итоговой стоимости при выбранных параметрах
	 * @param int $square  цена за метра
	 * @param int $lamp  цена за лампу
	 * @param int $chandelier цена за люстру
	 * @param int $tube  цена за трубу
	 * @param int $corner цена за угол
	 * @param int $fact  цена за фактуру
	 * @return int возвращает итоговую стоимость
	 */
	static function setFullPrice($square,$lamp,$chandelier,$tube,$corner,$fact)
	{
		$price = array();
		$conn = DB::getInstance();
		$sql = "SELECT * FROM `settings`";
		$result = $conn->query($sql);

		while ($setting_name = $result->fetch_assoc())
		{
			$price[] = $setting_name;
		}

		if ($fact =="Глянцевая"){
			$facture = $price[0]["price_glossy"];
		}
		elseif ($fact == "Матовая"){
			$facture = $price[0]["price_matt"];
		}
		$fullPrice = (($price[0]["price_square_m"] * $square)*($facture)) +($price[0]["price_lamp"]*$lamp) +	($price[0]["price_chandelier"] * $chandelier)+($price[0]["price_tube"]*$tube)+($price[0]["price_corner"] *$corner);
		return $fullPrice;
	}

    /**
     * Отправление письма на эл.почту
     * @param text $text текст заявки 
     */
	static function mailApplication($text)
	{
		$to = "vik-baev@yandex.ru";
		$subject = "Новая заявка";
		$charset = "utf-8";
		$headerss ="Content-type: text/html; charset=$charset\r\n";
		$headerss.="MIME-Version: 1.0\r\n";
		$headerss.="Date: ".date('D, d M Y h:i:s O')."\r\n";
		mail($to, $subject, $text, $headerss);

	}
	/**
	 * обавить заявку в базу данных
	 * @param string $city город заказчика
	 * @param date $birthday дата рождения
	 * @param string $phone телефон заказчика
	 * @param text $text текст заявки
	 * @param date $date дата доставки
	 * @param string $ip_user айпи пользователя
	 */
	static function leftApplication($city,$birthday,$phone,$text,$date,$ip_user)
	{
			//$date = date();
		
		$conn = DB::getInstance();
		$sql = "INSERT INTO `request`(`city`, `birthday`, `phone`, `text`, `date`, `ip_user`) VALUES ('$city','$birthday','$phone','$text','$date','$ip_user')";
		//mysqli_query($conn,$sql);
		$conn->query($sql);	
	}
	/**
	 * Вывод всех заявок
	 * @return array массив всех заявок
	 */
	static function selectAllApplications()
	{
		$applications = array();
		$conn=DB::getInstance();
		$sql = "SELECT  * FROM `request`";
		$result = $conn->query($sql);
		while ($application = $result->fetch_assoc())
		{
			$applications[] = $application;
		}

		return $applications;
	}
	/**
	 * Удаление заявки
	 * @param int $id айди заявки для поиска и удаления
	 */
	static function deleteApplication($id)	
	{
		$conn = DB::getInstance();
		$sql = "DELETE FROM  `request` WHERE `id_request` = '$id'";
		//mysqli_query($conn,$sql);
		$conn->query($sql);
		
	}	
}
