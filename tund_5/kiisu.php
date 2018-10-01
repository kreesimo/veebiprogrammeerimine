<?php
require "functions.php";
  if (isset($_POST["addCat"])){
  		if (!empty($_POST["name"]) and !empty($_POST["color"]) and !empty($_POST["length"]) ){

  			$notice = "Sõnum olemas!";
        
        $name = $_POST["name"];
        $color = $_POST["color"];
        $length = $_POST["length"];
        addcat($name,$color,$length);
        echo "<br>";
  			
  			
  		} else
  		{
  			$notice = "Palun täitke väljad!";
  		}
  		echo $notice;
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<title>Kiisu lisamine</title>
  </head>
  <body>

	
	<hr>
	
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  
	  <textarea name="name" placeholder="Kirjuta siia kiisu nimi..."></textarea><br>
	  <textarea name="color" placeholder="Kirjuta siia kiisu värvus..."></textarea><br>
	  <textarea name="length" placeholder="Kirjuta siia kiisu saba pikkus(cm)..."></textarea><br>


	  <input name="addCat" type="submit" value="Salvesta">
	</form>
	<p>
	<?php

	?>
	</p>
  </body>
</html>