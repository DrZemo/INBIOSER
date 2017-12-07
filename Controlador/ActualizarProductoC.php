<?php
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 06/12/2017
 * Time: 20:56
 */
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

        $consulta = "UPDATE tblProducto 
        SET 
        NOM_Producto = '".strtoupper($nombre)."',
        PRE_Producto = '".$precio."',
        DCN_Producto = '".strtolower($descrip)."',
        Cantidad = '".$cantidad."',
        IMG_Producto = '".$imagen."',
        ID_Empleado = '".$idempleado."'
        WHERE ID_Producto = '".$id."'";

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
