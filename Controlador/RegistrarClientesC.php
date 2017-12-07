<!---
/**
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 23:09
 */--->
<?php
include('../Modelo/Conexion.php');
$conection = new Conexion();

if ($conection->conectarMysql() == false){
    header("Location: ../Vista/Errores/FalloConexionDB.php");
}else{
    $id = $_POST['id'];
    $nombre = $_POST['usuario'];
    $pass = $_POST['contraseña'];
    $email = $_POST['email'];
    $tarcred = $_POST['targ'];
    $direc = $_POST['direc'];


    $consulta = "INSERT INTO tblCliente(ID_Cliente,NOMAPE_Cliente,PASS_Cliente,CORREO,Targeta,DIRECCION) VALUES('".$id."','".strtoupper($nombre)."','".$pass."','".$email."','".$tarcred."','".$direc."')";
    $resultado = mysqli_query($conection->conectarMysql(),$consulta);


    if ($resultado !=  null){
        header("Location: ../Vista/Mensages/DatosIngresadosExitosamente.php");
    }else{
        header("Location: ../Vista/Errores/FalloIngresoDatos.php");
    }

}
?>
