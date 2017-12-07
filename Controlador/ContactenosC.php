<?php
/**
 * Created by PhpStorm.
 * User: CAMILO
 * Date: 04/12/2017
 * Time: 22:18
 */
if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensage'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensage = $_POST['mensage'];

    $titulo = "INBIOSER Mensage";

    $contenido =
        " 
        <head>
    <title>INBIOSER</title>
    <link rel=\"shortcut icon\" href=\"../Vista/img/logo.png\">
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Font awesome -->
    <link rel=\"stylesheet\" href=\"font-awesome-4.7.0/css/font-awesome.min.css\">
    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css\" integrity=\"sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ\" crossorigin=\"anonymous\">
    </head>
    
    
    <body>  
        <div class=\"container\">
        
            <div class=\"mt-5 mb-5\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h1>INBIOSER </h1>
                        <i class=\"fa fa-connectdevelop fa-5x\" aria-hidden=\"true\"></i>
                    </div>
                    <div class=\"modal-body\">
                        <!--Nombre-->
                       <h1>Hola señ@r ".$nombre.", hemos recibito su mensage</h1>
                       <p>pronto responderemos al mensage : ".$mensage."</p>
                    </div>
                    <div class=\"modal-footer\">
                        <p>INBIOSER 2017</p>
                    </div>
                </div>
            </div>
        
        </div>
    </body>
        ";

    $encabezado = "MINE-Version: 1.0\r\n";
    $encabezado .= "Content-type: text\html; charset-UTF-8\r\n";
    $encabezado .= "Reply-To: no-reply@inbioser";

    $envio = mail($email,$titulo,$contenido,$encabezado);

    if($envio == true){
        header("Location: ../Vista/Mensages/DatosEnviadosExitosamente.php");
    }else{
        header("Location: ../Vista/Errores/ContactenosError.php");
    }

}else{
    header("Location: ../Vista/Errores/ContactenosError.php");
}
