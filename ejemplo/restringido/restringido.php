<?php
include '../lib/sesion.php';
$sesion=new Sesion();
if (isset($_SESSION['usuario'])==false) {
  header('Location: ../login.php');
}else {

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../css/registro.css" type="text/css">
  </head>
  <body>
    <p>Estoy dentro</p>
    <form class="" action="../accion.php" method="post">
      <input type="hidden" name="accion" value="logOut">
      <input type="submit" name="logOut" value="logOut">
    </form>
  </body>
</html>

 <?php
}
 ?>
