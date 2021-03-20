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
    <title>Adminpanel | CrackRP</title>
    <link rel="stylesheet" href="css/adminpanel.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
  </head>
  <body>
    <?php
    if(!empty($_GET["delete"])) {
      require("mysql.php");
      $stmt = $mysql->prepare("DELETE FROM `bewerbungen` WHERE DISCORD = :discord");
      $stmt->bindParam(":discord", $_GET["delete"]);
      $stmt->execute();
      echo "Die Bewerbung wurde erfolgreich gelöscht";
    }
     ?>
     <form class="box" action="adminpanel.php" method="post">
       <table>
         <tr>
           <th>Name</th>
           <th>Discord Name</th>
           <th>Status</th>
           <th>Aktionen</th>
         </tr>
         <?php
         require("mysql.php");
         $stmt = $mysql->prepare("SELECT * FROM bewerbungen");
         $stmt->execute();
         while ($row = $stmt->fetch()) {
           ?>
           <tr>
             <td><?php echo $row["INGAME"]?></td>
             <td><?php echo $row["DISCORD"]?></td>
             <td><?php echo $row["STATUS"] ?></td>
             <td><a href="open.php?ingame=<?php echo $row["INGAME"] ?>"><i class="fas fa-external-link-alt"></i></a><a href="adminpanel.php?delete=<?php echo $row["DISCORD"] ?>"><i class="fas fa-trash-alt"></i></a></td>
           </tr>
           <?php
         }
          ?>
       </table>
     </form>
  </body>
</html>
