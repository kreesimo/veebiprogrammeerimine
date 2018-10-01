<?php
	$tananeKuu = date("m")+1;
	$name = "Tundmatu";
	$surname = "inimene";
	$dirToRead = "../../../../rinde/public_html/veebiprogrammeerimine2018s/pics/";
	$picUrl ="../../../../~rinde/veebiprogrammeerimine2018s/pics/";
	$allFiles = array_slice(scandir($dirToRead), 2);
	//var_dump($allFiles);
	$kuuNimed = ["Jaanuar", "Veebruar", "Märts", "Aprill", "Mai", "Juuni", "Juuli", "August", "September", "Oktoober", "November", "Detsember"];
	
	
	if(isset($_POST["firstName"])){
		$name = $_POST["firstName"];
		$birthmonth = $_POST["birthMonth"];
		$sunnikuu = $kuuNimed[$birthmonth-1];
	}
	if(isset($_POST["lastName"])){
		$surname = $_POST["lastName"];
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8">
	
	  
	
	<link href='https://fonts.googleapis.com/css?family=Abhaya%20Libre' rel='stylesheet'>
	
</head>
<header>
<hr>
	<h1 class = "heder">
		<?php
			echo $name ." " .$surname;
		?>
	</h1>
	
</header>
<body>

	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames.</p>


	<p>Mu sõbral on ka veebileht. Vaata seda <a target="_blank" href="../~domiskl">siit</a>.
<br>
	

	<?php
		echo '<img src ="' .$picUrl .$allFiles[mt_rand(0,3)] .'" alt="pilt"><br>';
		
	?>
	<form method="POST">

	<label>Eesnimi</label>
	<input name="firstName" type="text" value="">
	<label>Perekonnanimi</label>
	<input name="lastName" type="text" value="">
	<label>Sünniaasta</label>
	<input type="number" name="birthYear" min="1910" max ="2004" value="1999">
	<label>Sünnikuu</label>
	

	
    <?php
    echo "<select name='birthMonth'>";
    for ($i = 0; $i < 12; $i++) {
        $time = strtotime(sprintf('%d months', $i));   
        $label = date('F', $time);   
        $value = date('n', $time);

        echo "<option value='$value'>$label</option>";

    }  
    echo "</select>";
    ?>  
	
	<br>
	<!-- Submit nupp -->
	<input name="submitData" type="submit" value ="Saada andmed">

	</form>

	<?php
		if(isset($_POST["firstName"])){

			echo "<br><p>Olete elanud järgnevatel aastatel: </p>";
			echo "<br><p>Olete sündinud: ".$sunnikuu ." </p>";

			echo "<ul> \n";
			for ($i = $_POST["birthYear"]; $i <= date("Y") ; $i++) { 
				echo "<li>". $i." </li> \n";
			}
		}
	
	?>
<!--
<p>Juhuslik pilt indexisse, kuu nimetus numbri asemel, rippmenüü kuunimedega photo.php, peab saama valida sünnikuud "dropdown menu", automaatselt praegune kuu ees.</p>-->
</body>

</html>

