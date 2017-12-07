<!---
/**
 /**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 23:21
 */
 */--->
<?php
session_start();

include('../Modelo/Conexion.php');

$conection = new Conexion();
if (isset($_SESSION['id_empleado'])) {
    $idempleado = $_SESSION['id_empleado'];

    if ($conection->conectarMysql() == false){
        header("Location: ../Vista/Errores/FalloConexionDB.php");
    }else{
        $cantidad = 0;
        echo $_SESSION['id_empleado'];
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descrip = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        $imagen = $_FILES['imagen']['name'];
        $ruta = $_FILES['imagen']['tmp_name'];


        $destino = "fotos/".$imagen;
        copy($ruta,$destino);

        $consulta = "INSERT INTO tblProducto(ID_Producto,NOM_Producto,PRE_Producto,DCN_Producto,Cantidad,IMG_Producto,ID_Empleado) 
VALUES('".$id."','".strtoupper($nombre)."','".$precio."','".strtolower($descrip)."','".$cantidad."','".$imagen."','".$idempleado."')";

        $resultado = mysqli_query($conection->conectarMysql(),$consulta);

        if ($resultado !=  null){
            header("Location: ../Vista/index.php");
        }else{
            header("Location: ../Vista/Errores/FalloIngresoDatos.php");
        }
    }
}else{
    header("Location: ../Vista/Errores/SinSession.php");
}
?>