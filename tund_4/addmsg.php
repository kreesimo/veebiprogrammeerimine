<?php
require "functions.php";
  if (isset($_POST["submitMessage"])){
  		if (!empty($_POST["message"])){

  			$notice = "Sõnum olemas!";
        
        $msg = $_POST["message"];
        saveAMsg($msg);
        echo "<br>";
  			
  			
  		} else
  		{
  			$notice = "Palun kirjutage sõnum!";
  		}
  		echo $notice;
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>Sõnumi lisamine</title>
  </head>
  <body>
    <h1>
	  Sõnumi lisamine
	</h1>
	<p>See leht on valminud <a href="http://www.tlu.ee" target="_blank">TLÜ</a> õppetöö raames ja ei oma mingisugust, mõtestatud või muul moel väärtuslikku sisu.</p>
	<hr>
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <label>Sõnum (max 256 märki): </label><br>
	  <textarea rows="4" cols="64" name="message" placeholder="Kirjuta siia sõnum..."></textarea><br>


	  <input name="submitMessage" type="submit" value="Salvesta sõnum">
	</form>
	<p>
	<?php

	?>
	</p>
  </body>
</html>