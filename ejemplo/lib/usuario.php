<?php
include 'db.php';
/**
 * Clase usario
 */
class Usuario extends db
{

  function __construct()
  {
    parent::__construct();
  }

  //funcion insertar equipo en la bd
  function insertarUsuario($nombre, $apellidos, $usuario, $pass, $rol){
    $sql="INSERT INTO usuarios (id, nombre, apellidos, usuario, pass, fecha_creacion, rol)
          VALUES (NULL, '".$nombre."', '".$apellidos."', '".$usuario."', '".sha1($pass)."', '".date("Y-m-d")."', '".$rol."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from usuarios ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

//Funcion devolver ultimo usuario insertado.
  /*public function DevolverUltimoUsuario()
  {
    $sql="SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
    $DevolverUltimoUsuario=$this->realizarConsulta($sql);
    if($DevolverUltimoUsuario!=null){
      //Montamos la tabla de resultados
      $tablausuario=[];
      while($fila=$DevolverUltimoUsuario->fetch_assoc()){
        $tablausuario[]=$fila;
      }
      return $tablausuario;
    }else{
      return null;
    }
  }*/
    function LoginUsuario($usuario){
      //Construimos la consulta
      $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        if($resultado!=false){
          return $resultado->fetch_assoc();
        }else{
          return null;
        }
      }else{
        return null;
      }
    }
}

 ?>
