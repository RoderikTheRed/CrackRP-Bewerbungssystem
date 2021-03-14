<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bewerbung | CrackRP</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="images/logo.png" type="image/png">
  </head>
  <body>
    <?php
    if(!empty($_GET["sucess"])) {
      ?><h2><?php echo "Bewerbung wurde erfolgreich abgesendet! Bitte schreiben sie !sync in den #Bot-Commands Kanal wenn du den aktuellen Status deiner Bewerbung wissen möchtest!";  ?></h2><?php
    }
    if(isset($_POST["lspd"])) {
      header("Location: lspd.php");
    }
    if(isset($_POST["lsmc"])) {
      header("Location: lsmc.php");
    }
    if(isset($_POST["ansehen"])) {
      header("Location: admin.php");
    }
     ?>
    <form class="box" action="index.php" method="post">
      <h1>Bewerbungsformular für Legale Fraktionen auf CrackRP</h1>
      <p>Wähle die Fraktion aus:</p>
      <input type="submit" name="lspd" value="LSPD"></input>
      <input type="submit" name="lsmc" value="LSMC"></input>
      <input type="submit" name="ansehen" value="Admin Login"></input>
    </form>
  </body>
</html>
