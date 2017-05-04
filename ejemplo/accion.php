<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Action</title>
    <link rel="stylesheet" href="css/registro.css" type="text/css">
  </head>
  <body>
    <?php
    include '/lib/usuario.php';
    include '/lib/sesion.php';
    $usuario=new Usuario();
    $sesion=new Sesion();
      if (isset($_POST['accion'])) {
        if ($_POST['accion']=='registro') {
          if ($_POST['pass']==$_POST['pass2']) {
            $resultado=$usuario->Insertarusuario($_POST["nombre"],  $_POST["apellidos"], $_POST["usuario"], $_POST["pass"], "admin");
            if ($resultado==null) {
              echo "Error";
            }else {
              echo "Nombre: " .$resultado['nombre'] ."<br><br>";
              echo "Apellidos: " .$resultado['apellidos'] ."<br><br>";
              echo "usuario: " .$resultado['usuario'] ."<br><br>";
              }
            }else {
              echo "<a href='registro.php'>Algo falla, revisa tu contraseña.</a>";
          }
          }

        elseif ($_POST['accion']=='login') {
          $registrado=$usuario->LoginUsuario($_POST['usuario']);
          if ($registrado!=null) {
            if ($registrado['pass']==sha1($_POST['pass'])) {
              echo "Usuario encontrado";
              $sesion->addUsuario($registrado['usuario']);
            }else {
              echo "Las contraseñas no coinciden";
            }
          }else {
            echo "Usuario no encontrado";
          }
        }elseif ($_POST['accion']=="logOut") {
        $sesion->logOut();
        echo "<h2>LogOut</h2></br>";
        echo "<a href=login.php>Volver al formulario de login</a>";
        }
      }

     ?>
  </body>

</html>
