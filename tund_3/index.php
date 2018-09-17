<?php
$weekdays = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev", "Pühapäev"];
	$name = "Simo";
	$surname = "Kree";
	$todayDate = date("d.m.Y");
	$hourNow = date("H");
	$weekDay = $weekdays[date("N")-1];
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
  <li><a href="news.asp">News</a></li>
  <li><a href="contact.asp">Contact</a></li>
  <li><a href="about.asp">About</a></li>
</ul>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames.</p>
	<?php
		echo "<p> Täna on: " .$weekDay .", " .$todayDate ."</p>\n";
		echo "<p> Kell oli avamisel: " .date("H:i") .", käes on " .$partOfDay .".</p> \n";

	?>

	<img width = "50%" height ="50%" src="http://www.cs.tlu.ee/~rinde/media/fotod/TLU_600x400/tlu_4.jpg">


	<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
	<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
		<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
			<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
				<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.</p>

	<img width = "50%" height ="50%" src="<?php echo($pictureFile); ?>">
</body>

</html>