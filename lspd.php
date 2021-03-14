<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bewerbung LSPD | CrackRP</title>
    <link rel="stylesheet" href="css/lspd.css">
    <link rel="icon" href="images/logo.png" type="image/png">
  </head>
  <body>
    <?php
      if(isset($_POST["submit"])) {
        require("mysql.php");
        $stmt = $mysql->prepare("INSERT INTO bewerbungen (DISCORD, INGAME, OOC, IC, STATUS) VALUES (:discord, :ingame, :ooc, :ic, 'Ausstehend')");
        $stmt->bindParam(":discord", $_POST["discord"]);
        $stmt->bindParam(":ingame", $_POST["ingame"]);
        $stmt->bindParam(":ooc", $_POST["ooc"]);
        $stmt->bindParam(":ic", $_POST["ic"]);
        $stmt->execute();
        header("Location: index.php?sucess=1");
      }
     ?>
    <form class="box" action="lspd.php" method="post">
      <h1>Bewerbung Los Santos Police Department</h1>
      <input type="text" name="discord" placeholder="Discord-Name" required>
      <input type="text" name="ingame" placeholder="Ingame Name" required>
      <h2>OOC-Teil:</h2>
      <textarea name="ooc" rows="8" cols="80" required></textarea>
      <h2>IC-Teil:</h2>
      <textarea name="ic" rows="8" cols="80" required></textarea>
      <br>
      <input type="submit" name="submit" value="Absenden">
      <p>Info: Discord Name bitte mit #-Nummer angeben ansonsten kannst du nicht vom Bot angesprochen werden!</p>
    </form>
  </body>
</html>
