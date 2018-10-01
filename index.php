<?php
	$name = "Simo";
	$surname = "Kree";
	$todayYear = date("Y");
	$tananeKuu = date("m");
	$tananePaev = date("d");
	$kuuNimed = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
	$todayKuu = $kuuNimed[$tananeKuu -1];
	$hourNow = date("H");
	$partOfDay = "";
	$todayDate = $tananePaev."." .$todayKuu.", " .$todayYear;

	if ($hourNow < 8) {
		$partOfDay = "varajane hommik";
	}
	if ($hourNow >= 8 and $hourNow < 16) {
		$partOfDay = "kooliaeg";
	}
	if ($hourNow >= 16) {
		$partOfDay = "vaba aeg";
	}

	$picNum = mt_rand(1, 43);
	$picURL = "http://www.cs.tlu.ee/~rinde/media/fotod/TLU_600x400/tlu_";
	$picExt = ".jpg";

	$pictureFile = $picURL .$picNum .$picExt;



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

	<h1 class = "heder">
		<?php
			echo $name ." " .$surname ." veebileht";
		?>
	</h1>
	
</header>
<body>
<ul>
  <li><a href="default.asp">Home</a></li>
  <li><a href="tund_3/page.php">tund3_page</a></li>
  <li><a href="tund_3/photo2.php">Tund3_photo</a></li>
  <li><a href="about.asp">About</a></li>
</ul>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames.</p>
	<?php
		echo "<p> Tänane kuupäev on: " .$todayDate ."</p>\n";
		echo "<p> Kell oli avamisel: " .date("H:i") .", käes on " .$partOfDay .".</p> \n<br>";

	?>

	


	<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
	

	<img width = "50%" height ="50%" src="<?php echo($pictureFile); ?>">
</body>

</html>