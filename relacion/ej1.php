<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    // 1. Crear un documento PHP que muestre por pantalla la información de todos
    // los clientes de la base de datos. No se deberá mostrar la contraseña del
    // cliente.
        require_once "clases.php";
        $bd = new mysqli('localhost','root','','relacion');
        $cliente = new cliente($bd);
        $cliente->get_datos();


        
        
    ?>
    
</body>
</html>