<?php
session_start();
if(!isset($_SESSION["username"])) {
  header("Location: index..php");
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
    if(!empty($_GET["discord"])) {
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM bewerbungen WHERE discord = :discord");
      $stmt->bindParam(":discord", $_GET["discord"]);
      $stmt->execute();
      $row = $stmt->fetch();
      ?>
      <form class="box" action="open.php" method="post">
        <h2>Bewerbung:</h2>
        <?php echo $row["DISCORD"] ?>
        <p>Discord: <?php echo $row["DISCORD"] ?></p>
        <p>Ingame Name: <?php echo $row["INGAME"] ?></p>
      </form>
      <?php
    } else {
      header("Location: index.php");
    }

     ?>
  </body>
</html>
