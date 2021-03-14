<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | CrackRP</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <?php
  if(isset($_POST["submit"])) {
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :username");
    $stmt->bindParam(":username", $_POST["username"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count != 0) {
      //Username ist vergeben
      $row = $stmt->fetch();
      if($_POST["password"] == $row["PASSWORD"]){
        session_start();
        $_SESSION["username"] = $row["USERNAME"];
        header("Location: adminpanel.php");
      } else {
        //Passwort ist falsch
        echo "Login fehlgeschlagen Benutzername / Passwort ist falsch!";
      }
    } else {
      //Username existiert nicht
      echo "Login fehlgeschlagen Benutzername / Passwort ist falsch!";
    }
  }
   ?>
  <body>
    <form class="box" action="admin.php" method="post">
      <h1>Login</h1>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>
