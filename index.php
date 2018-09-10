<?php
	$name = "Simo";
	$surname = "Kree";
	$todayDate = date("d.m.Y");
	$hourNow = date("H");
	$partOfDay = "";

	if ($hourNow < 8) {
		$partOfDay = "varajane hommik";
	}
	if ($hourNow >= 8 and $hourNow < 16) {
		$partOfDay = "kooliaeg";
	}
	if ($hourNow >= 16) {
		$partOfDay = "vaba aeg";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8">
	<title>
	<?php
		echo $name;
		echo " ";
		echo $surname;
	?>
	  veebileht</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<link href='https://fonts.googleapis.com/css?family=Abhaya%20Libre' rel='stylesheet'>
	
</head>
<header>
	<h1>
		<?php
			echo $name ." " .$surname;
		?>
	</h1>
</header>
<body>

	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames.</p>
	<?php
		echo "<p> Tänane kuupäev on: " .$todayDate ."</p>\n";
		echo "<p> Kell oli avamisel: " .date("H:i") .", käes on " .$partOfDay .".</p> \n";

	?>
	<img width = "80%" height ="60%" src="http://dominiksklyarov.com/wp-content/uploads/2017/06/IMG_9237-2.jpg">
	<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
	
</body>

</html>