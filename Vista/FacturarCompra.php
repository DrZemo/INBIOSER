<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 22/11/2017
 * Time: 23:38
 */
session_start();
if (@!$_SESSION['cliente']){
    header("Location: ../Vista/Errores/SinPermiso.php");
}


if (isset($_SESSION['idcliente'])) {
    $idcliente = $_SESSION['idcliente'];
}else{
    header("Location: ../Vista/Errores/SinPermiso.php");
}

include('../Modelo/Conexion.php');

$conection = new Conexion();

?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>


<body>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- este formulario primero lee los datos enviados del formulario index.php, el formulario recibe
      en un método POST los valores enviados por el index que corresponden a los id de los productos seleccionados
       los cuales son un arreglo, si estos no estan vacios el programa guarda la información en sus correspondientes
       variables, teniendo en cuenta la cantidad seleccionada y el id del producto se crea un bucle for que recorre
        desde $i = 0 hasta llegar a que $i sea menor que el tamaño del arreglo que contiene los productos,
         en el interior del bucle se crea una consulta que teniendo en cuenta el id del producto consulta
         su precio y cantidad existente y una variable llamada $cantotal acumula todas las cantidades requeridas
         de los productos seleccionados, esto con el fin de validar que el cliente no seleccione más productos de
         los que realmente existe, si el cliente selecciona más productos de los que hay en existencia se le envía
          a la página CantidadNoDisponible.php  guarda los datos arrojados de la consulta en un arreglo llamado
          $result y este a tu vez es recorrido   el programa calcula el precio, mientras que una variable llamada
          $total acumula el precio de cada producto por la cantidad, luego los datos son imprimidos en una tabla
           teniendo en cuenta su nombre, precio y valor. --->
<div class="container">
    <form action="../Controlador/FacturarCompraC.php" method="post" enctype="multipart/form-data">
        <div class="mt-5 mb-5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Cotización INBIOSER</h1>
                    <img src="img/logo.png">
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <!-- los productos selecciondos se muestran en una tabla -->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Precio Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
/*valida la existencia de productos enviados por el index,*/
                        if (!empty($_POST['producto'])){
                            /*iguala los productos selecionados a un arreglo ya que ests pueden ser muchos*/
                            $checkProducto = $_POST['producto'];
                            /*obtiene la cantidad de productos querida por un cliente*/
                            $cantidadQuer = $_POST['cantidadQuerida'];

                            $indicado = $_POST['indicador'];
                            /*se inician las variables que contaran el total de productos y el total del valor */
                            $total = 0; $n = 0; $cantotal = 0;
                            /* recore el arreglo de los productos seleccionados por el cliente */
                            for($i = 0; $i < sizeof($checkProducto); $i++){
                                /*consulta el valor de los productos y la cantidad exisente */
                                $consulta = mysqli_query($conection->conectarMysql(),"SELECT NOM_Producto, PRE_Producto, Cantidad FROM tblProducto WHERE ID_Producto = '".$checkProducto[$i]."'");
                                $cantotal = $cantotal + $cantidadQuer[$i];
                                /*recorre el resultado de la consulta */
                                while ($result = mysqli_fetch_array($consulta)){
                                    /*verifica que la cantidad querida del producto no sea mayor a la cantidad existente,
                                    si lo es el progrema envia al cliente a un formulario que le informa que la cantidad no esta disponible,
                                    */
                                    if  ($result['Cantidad']<$cantidadQuer[$i]){
                                        header("Location: ../Vista/Errores/CantidadNoDisponible.php");
                                    }
                                    ?>
                                    <input name="CantidadBodega[]" type="text" hidden value="<?php echo $result['Cantidad']; ?>">
                                    <input name="idProductos[]" type="text" hidden value="<?php echo $checkProducto[$i]; ?>">
                                    <input name="cantidadesQuer[]" type="text" hidden value="<?php echo $cantidadQuer[$i]; ?>">
                                    <?php
                                    $total = $total + ($result['PRE_Producto'] * $cantidadQuer[$i]);
                                    /*imprime en filas los datos de los productos con su costo ya calculado*/

                                        echo '    
                <tr>
                <th scope="row">'.($i+1).'</th>
                <td>'.$result['NOM_Producto'].'</td>
                <td>'.$cantidadQuer[$i].'</td>
                <td>'.number_format($result['PRE_Producto']).'</td>
                <td>'.number_format($result['PRE_Producto']*$cantidadQuer[$i]).'</td>
                </tr>
                ';
                                }
                            }
                        }else{
                            header("Location: ../Vista/Errores/SinArticulos.php");
                        }
                        ?>
                        <tr>
                            <th scope="row"><?php echo ($i+1); ?></th>
                            <td><strong>Total</strong></td>
                            <td><?php echo $cantotal ;?></td>
                            <td></td>
                            <td><?php echo number_format($total) ;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--- PROBLEMAS PARA GENERAR EL PDF, COMPATIVILIDAD DE VERCIONES DE PHP--->
                    <button name="generarPDF" type="submit" class="btn btn-danger">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        Generar PDF
                    </button>
                    <button name="comprar" type="submit" class="btn btn-primary">
                        <i class="fa fa-handshake-o mr-2" aria-hidden="true"></i>
                        Comprar
                    </button>
                </div>
            </div>
        </div>

        <input name="fecha" type="text" hidden value="<?php echo date("Y/m/d");?>">
        <input name="total" type="text" hidden value="<?php echo $total;?>">
        <input name="canttotal" type="text" hidden value="<?php echo $cantotal;?>">
    </form>
</div>
</body>
</html>

