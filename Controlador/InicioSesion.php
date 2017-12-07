<?php
/**
 * Created by PhpStorm.
 * User: CAMILO MEJIA MONSALVE
 * Date: 22/11/2017
 * Time: 22:39
 */

    session_start();

    include('../Modelo/Conexion.php');
    $con = new Conexion();
    /*recibimos el usuario y la contraseña del inicio sesión */
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    /*validamos que no esten vacios y si lo estan redireccionamos al cliente a otra página donde mostramos el error */
    if (empty($usuario)&&empty($contraseña)){
        header("Location: ../Vista/Errores/SinDatos.php");
    }else {
        $resultado = mysqli_query($con->conectarMysql(), " SELECT * FROM tblEmpleado WHERE ID_Empleado = '" . $usuario . "' ");
        $row = mysqli_fetch_array($resultado);
        /*
         * buscamos que el usuario exista en la base de datos verificando que esté en la tabla empleado
         *  y si no está ahí lo buscamos en la tabla clientes, si en ninguno de los dos encuentra el id el
         *  usuario no existe y redirecciona al cliente una página que le muestra el error, seguidamente de validar el usuario se valida su contraseña
         * */
        if ($row['ID_Empleado'] == $usuario) {
            if ($row["PAS_Empleado"] == $contraseña) {
                /*ahora iniciamos la sesión con el id del empleado y su nombre de usuario
                 * */
                $_SESSION['id_empleado']=$row['ID_Empleado'];
                $_SESSION['empleado'] = $row["USUARIO_Empleado"];
                header("Location: ../Vista/index.php");
            } else {
                header("Location: ../Vista/Errores/ContraseñaHerronea.php");
            }
        } else {
            $resultado = mysqli_query($con->conectarMysql(), " SELECT * FROM tblCliente WHERE ID_Cliente = '" . $usuario . "' ");
            $row = mysqli_fetch_array($resultado);
            if ($row[ID_Cliente] == $usuario){
                if ($row["PASS_Cliente"] == $contraseña) {
                    /*ahora iniciamos la sesión con el id del empleado y su nombre de usuario
                     * */
                    $_SESSION['idcliente'] = $row['ID_Cliente'];
                    $_SESSION['cliente'] = $row[NOMAPE_Cliente];
                    header("Location: ../Vista/index.php");
                } else {
                    header("Location: ../Vista/Errores/ContraseñaHerronea.php");
                }
            }else{
                header("Location: ../Vista/Errores/UsuarioHerroneo.php");
            }
        }
    }

?>
