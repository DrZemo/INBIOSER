<?php
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 22:48
 */
session_start();
if($_SESSION['empleado']){
    session_destroy();
    header("location: /Inbioser/Vista/index.php");
}elseif ($_SESSION['cliente']){
    session_destroy();
    header("location: /Inbioser/Vista/index.php");
}
?>
