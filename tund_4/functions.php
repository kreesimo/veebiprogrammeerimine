<?php

require "../../../config.php";

$database = "if18_simo_kr_1";

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

?>