<?php
require("functions.php");
 if(!isset($_SESSION["userId"])){
    header("Location: index2.php");
    exit();

  }

  //väljalogimine
  if(isset($_GET["logout"])) {
    session_destroy();
    header("Location: index2.php");
    exit();
  }
 $notice = readallunvalidatedmessages(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Anonüümsed sõnumid</title>
</head>
<body>
  <h1>Sõnumid</h1>
  <p>Siin on minu <a href="http://www.tlu.ee">TLÜ</a> õppetöö raames valminud veebilehed. Need ei oma mingit sügavat sisu ja nende kopeerimine ei oma mõtet.</p>
  <hr>
  <ul>
  	  
  <?php echo $notice; ?>
  </ul>
  

  <hr>
  <a href="main.php">Tagasi pealehele</a>
</body>
</html>