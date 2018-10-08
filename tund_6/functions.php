<?php

require "../../../config.php";

$database = "if18_simo_kr_1";
	
	
	//alustame uut sessiooni
	session_start();


	function signin($email, $password){
		$notice = "";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, firstname, lastname, password FROM vpusers WHERE email=?");
		echo $mysqli->error;
		$stmt->bind_param("s", $email);
		$stmt->bind_result($idFromDb, $fNameFromDb, $lNameFromDb, $pwdFromDb);
		if($stmt->execute()){
			//kui päring õnnestus
			if($stmt->fetch()){
				//kui fetch tuli, siis selline kasutaja on olemas
				if(password_verify($password, $pwdFromDb)){
					//kui paroolid kattuvad
					//määran sessioonimuutujad
					$_SESSION["userId"] = $idFromDb;
					$_SESSION["userFirstName"] = $fNameFromDb;
					$_SESSION["userLastName"] = $lNameFromDb;
					$_SESSION["userEmail"] = $email;
					$stmt->close();
					$mysqli->close();
					//liigume sisselogitutele mõeldud pealehele main.php
					header("Location: main.php");
					exit();
				} else{
					$notice = "Vale parool";
				}
			} else {
				$notice = "Sellist kasutajat pole andmebaasis (" .$email .")" .$stmt->error;
			}
		} else {
			//kui ei õnnestunud
			$notice = "Sisselogimisel tekkis tehniline viga".$stmt->error;
		}

		$stmt->close();
		$mysqli->close();
		return $notice;
	}//sisselogimine lõpeb [signin()]

	function signup($name, $surname, $email, $gender, $birthDate, $password){
	$notice = "";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("INSERT INTO vpusers (firstname, lastname, birthdate, gender, email, password) VALUES(?,?,?,?,?,?)");
	echo $mysqli->error;
	//krüpteerin parooli, kasutades juhuslikku soolamisfraasi (salting string)
	$options = [
	  "cost" => 12,
	  "salt" => substr(sha1(rand()), 0, 22),
	  ];
	$pwdhash = password_hash($password, PASSWORD_BCRYPT, $options);
	echo "Kuupäev: ".$birthDate;
	
	$stmt->bind_param("sssiss", $name, $surname, $birthDate, $gender, $email, $pwdhash);
	if($stmt->execute()){
		$notice = "ok";
	} else {
	  $notice = "error" .$stmt->error;	
	}
	echo $email;
	$stmt->close();
	$mysqli->close();
	return $notice;
  }

	function saveAMsg($msg) {
		
		$notice = ""; //teade, mis antakse salvestamise kohta


		//loome ühenduse andmebaasiserveriga
		$mysqlcon = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);


		//valmistame ette SQL päringu
		$sqlquery = $mysqlcon->prepare("INSERT INTO vpamsg (message) VALUES(?)");
			echo $mysqlcon->error;
		$sqlquery->bind_param("s", $msg); //s - string ; i - integer ; d - decimal

		if($sqlquery->execute()) {
			$notice = 'Sõnum: "' .$msg .'" on salvestatud.';
		} else {
			$notice = 'Sõnumi salvestamisel tekkis tõrge: ' .$sqlquery->error; 
		}
		
		$sqlquery->close();
		$mysqlcon->close();
	}

	// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
		function addcat($name,$color,$length) {
		
		$notice = ""; //teade, mis antakse salvestamise kohta


		//loome ühenduse andmebaasiserveriga
		$mysqlcon = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);


		//valmistame ette SQL päringu
		$sqlquery = $mysqlcon->prepare("INSERT INTO kiisu (kiisunimi,kiisuvarv,sabapikkus) VALUES(?,?,?)");
			echo $mysqlcon->error;
		$sqlquery->bind_param("ssi", $name,$color,$length); //s - string ; i - integer ; d - decimal

		if($sqlquery->execute()) {
			$notice = 'Salvestatud.' .$color ."kiisu" .$name ."salvestati andmebaasi, tema sabapikkuseks on " .$length ."cm.";
		} else {
			$notice = 'Salvestamisel tekkis tõrge: ' .$sqlquery->error; 
		}
		
		$sqlquery->close();
		$mysqlcon->close();
	}
	function test_input($data) {
  
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>