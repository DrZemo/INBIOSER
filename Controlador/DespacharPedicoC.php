<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 17/11/2017
 * Time: 22:27
 */

session_start();

include('../Modelo/Conexion.php');
$con = new Conexion();



if (!empty($_POST['IDfactura']) && !empty($_POST['IDcliente'])){
    $IdFact = $_POST['IDfactura'];
    $IdCliente = $_POST['IDcliente'];

    $consultFecha = "SELECT year(F.FECHAR) as anno,month(F.FECHAR) as mes,day(F.FECHAR) as dia FROM tlbFactura F WHERE F.ID_FACTURA = '".$IdFact."'";
    $resp = mysqli_query($con->conectarMysql(),$consultFecha);
    $fechaEnvio;
    $insert;
    while ($row = mysqli_fetch_array($resp)){
        $anno = $row['anno'];
        $mes = $row['mes'];
        $dia = $row['dia'];
        if($mes==12){
            $anno = $anno + 1;
            $mes = 1;
            $fechaEnvio = $anno."-".$mes."-".$dia;
            echo $fechaEnvio;
            $insert = "INSERT INTO tblEnvio(ID_FACTURA,FechaEntrega) VALUES ('".$IdFact."','".$fechaEnvio."')";
            mysqli_query($con->conectarMysql(),$insert);
        }else{
            $mes = $mes + 1;
            $fechaEnvio = $anno."-".$mes."-".$dia;
            echo $fechaEnvio;
            $insert = "INSERT INTO tblEnvio(ID_FACTURA,FechaEntrega) VALUES ('".$IdFact."','".$fechaEnvio."')";
            mysqli_query($con->conectarMysql(),$insert);
        }
    }
    header("Location: ../Vista/ConsultarFacturas.php");
}else{
    echo ":(";
}

