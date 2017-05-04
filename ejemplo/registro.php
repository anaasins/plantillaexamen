<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/registro.css" type="text/css">
  </head>
  <body>
    <form action="accion.php" method="post">
        <input type="hidden" name="accion" value="registro">
        Nombre:<input type="text" name="nombre" value=""><br><br>
        Apellidos:<input type="text" name="apellidos" value=""><br><br>
        Usuario:<input type="text" name="usuario" value=""><br><br>
        Contraseña:<input type="password" name="pass" value=""><br><br>
        Vuelve a escribir la contraseña:<input type="password" name="pass2" value=""><br><br>
        <input type="submit" name="Registrarse" value="Registrarse">
    </form>
  </body>
</html>
