<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 23/11/2017
 * Time: 00:10
 */
session_start();

include('../Modelo/Conexion.php');
$con = new Conexion();


if (isset($_SESSION['idcliente']) && isset($_POST['comprar'])) {
    $idcliente = $_SESSION['idcliente'];
    $fecha = $_POST['fecha'];
    $total = $_POST['total'];
    $cantotal = $_POST['canttotal'];
    $cantidadBodega = $_POST['CantidadBodega'];
    $idProductos = $_POST['idProductos'];
    $cantidadQuer = $_POST['cantidadesQuer'];
/*
 * si el cliente factura la compra se crea una id de factura teniendo en cuenta la fecha el id del cliente
 *  y el valor de la compra, se guardan los datos de la factura en la table tblFactura y se guardan los productos
 * de la compra en la tabla tblDETALLEFACTURA, posteriormente se actualiza la cantidad de productos disponibles y
 *  se finaliza la compra :)
 */
    $idFact = $fecha."".$idcliente."".$total;

    $inserFactura = "INSERT INTO tlbFactura(ID_FACTURA,ID_Cliente,FECHAR,CANTIDAD,TOTAL) VALUES ('".$idFact."','".$idcliente."','".$fecha."','".$cantotal."','".$total."')";
    mysqli_query($con->conectarMysql(),$inserFactura);
    for ($i = 0; $i < sizeof($idProductos); $i++){
        echo $cantidadQuer[$i]."<br>";
        $inserDetFact = "INSERT INTO tblDETALLE_FACTURA(ID_FACTURA,ID_Producto,CANTIDAD) VALUES ('".$idFact."','".$idProductos[$i]."','".$cantidadQuer[$i]."')";
        $UpdateProducto = "UPDATE tblProducto SET Cantidad = ".($cantidadBodega[$i]-$cantidadQuer[$i])." WHERE ID_Producto='".$idProductos[$i]."'";
        mysqli_query($con->conectarMysql(),$inserDetFact);
        mysqli_query($con->conectarMysql(),$UpdateProducto);
        echo ($cantidadBodega[$i]-$cantidadQuer[$i]);
    }
    header("Location: ../Vista/Mensages/CompraFinalisada.php");
    /** EN caso de oprimir el boton generar pdf hará lo siguiente, esta parte aun esta en pruebas */
}elseif (isset($_SESSION['idcliente']) && isset($_POST['generarPDF'])){
    require_once('../Vista/tcpdf/tcpdf.php');
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('INBIOSER');
    $pdf->SetTitle('cotizacion');

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(20, 20, 20, false);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->addPage();

    $content = '';

    $content .= '
		<div class="row">
        	<div class="col-md-12">
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>DNI</th>
            <th>A. PATERNO</th>
            <th>A. MATERNO</th>
            <th>NOMBRES</th>
            <th>AREA</th>
            <th>SUELDO</th>
          </tr>
        </thead>
	';



    $pdf->writeHTML($content, true, 0, true, 0);

    $pdf->lastPage();
    $pdf->output('Reporte.pdf', 'I');

}else{
    header("Location: ../Vista/Errores/SinPermiso.php");
}

?>
