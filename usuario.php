<?php
include "db.php";
/**
 *
 */
class Usuario extends db
{
  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }
  //Insertamos un nuevo usuario
  function INSERT($nombre,$apellidos,$usuario,$pass,$edad=18,$rol="usuario"){
    //Construimos la consulta
    $sql="INSERT INTO usuario (id, usuario, nombre, apellidos, edad, rol, pass)
          VALUES (NULL, '".$usuario."', '".$nombre."', '".$apellidos."', ".$edad.", '".$rol."', '".sha1($pass)."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from usuario ORDER BY id DESC";
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
  //DEvolvemos un nuevo usuario
  function LOGIN($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuario WHERE usuario='".$usuario."'";
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

  function SELECT(){
   //Construimos la consulta
   $sql="SELECT * from usuario";
   //Realizamos la consulta
   $resultado=$this->realizarConsulta($sql);
   if($resultado!=null){
     //Montamos la tabla de resultados
     $tabla=[];
     while($fila=$resultado->fetch_assoc()){
       $tabla[]=$fila;
     }
     return $tabla;
   }else{
     return null;
   }
 }
}

public function UPDATE($usuario, $nombre, $apellidos, $rol)
{
  $sql="UPDATE usuarios SET nombre='" .$nombre ."', apellidos='" .$apellidos ."', rol= '".$rol."' WHERE usuario='" .$usuario ."'";
  $actualizarperfil=$this->realizarConsulta($sql);
  if ($actualizarperfil=!false) {
    return true;
  }else {
    return false;
  }
}

public function DELETE()
{
  $sql="DELETE FROM tabla WHERE";
  $delete=$this->realizarConsulta($sql);
  if ($delete=!false) {
    return true;
  }else {
    return false;
  }
}

}
 ?>
