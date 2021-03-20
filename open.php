<?php
session_start();
if(!isset($_SESSION["username"])) {
  header("Location: admin.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bewerbung | CrackRP</title>
  </head>
  <body>
    <?php
    if(!empty($_GET["ingame"])) {
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM bewerbungen WHERE INGAME = :ingame");
      $stmt->bindParam(":ingame", $_GET["ingame"]);
      $stmt->execute();
      $row = $stmt->fetch();
    }
    if(isset($_POST["accept"])) {
      require("mysql.php");
      $stmt = $mysql->prepare("UPDATE bewerbungen SET STATUS = 'Akzeptiert'");
      $stmt->execute();
      header("Location: adminpanel.php?sucess=Akzeptiert");
    }
    if(isset($_POST["deny"])) {
      $stmt = $mysql->prepare("UPDATE bewerbungen SET STATUS = 'Abgelehnt'");
      $stmt->execute();
      header("Location: adminpanel.php?sucess=Abgelehnt");
    }
    if(isset($_POST["close"])) {
      header("Location: adminpanel.php");
    }
     ?>
      <form class="box" action="open.php?<?php echo $row["INGAME"] ?>" method="post">
        <h2>Bewerbung:</h2>
        <p>Discord: <?php echo $row["DISCORD"] ?></p>
        <p>Ingame Name: <?php echo $row["INGAME"] ?></p>
        <p>OOC: <?php echo $row["OOC"] ?></p>
        <p>IC: <?php echo $row["IC"] ?></p>
        <input type="submit" name="accept" value="Akzeptieren">
        <input type="submit" name="deny" value="Ablehnen">
        <input type="submit" name="close" value="Schließen">
      </form>
  </body>
</html>
