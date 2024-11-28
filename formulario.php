<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $db= new mysqli('localhost','root','','ej1');
        if (isset($_POST["enviar2"])) {
            if (($resultado = $db->query('Select nombre from usuarios where nombre="'.$_POST["i1"].'";')) && (($resultado2 = $db->query('Select contrasena from usuarios where contrasena="'.$_POST["i2"].'";')))) {
                if($resultado->num_rows == 1 && $resultado2->num_rows == 1){
                    echo "ha entrado"; 
                }else{
                    echo "Usuario o contraseña no encontrado registrese";
                    if (isset($_POST["enviar"])) {
                        echo "LLEGO2";
                        if (strlen($_POST["i2"]) >= 6&& strlen($_POST["i2"]) <= 20) {
                            echo "LLEGO";
                            if ($_POST["i2"]===$_POST["i3"]) {
            
                                $db= new mysqli('localhost','root','','ej1');
    
                                if ($resultado = $db->query('Select nombre from usuarios where nombre="'.$_POST["i1"].'";')) {
                                    
                                    $db->query('insert into usuarios values("'.$_POST["i1"].'","'.$_POST["i2"].'");');
                                }
                            }
                        }
                    }else{
    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="">mete el nombre:</label>
                        <input type="text" name="i1">
                        <br>
                        <label for="">mete la contraseña:</label>
                        <input type="text" name="i2">
                        <br>
                        <label for="">mete la contraseña:</label>
                        <input type="text" name="i3">
                        <br>
                        <input type="submit" value="enviar" name="enviar">
                    </form>
    <?php
                    }
                }
            }else{
    ?>        
                <!-- <form action="" method="post" enctype="multipart/form-data">
                    <label for="">mete el nombre:</label>
                    <input type="text" name="i1">
                    <br>
                    <label for="">mete la contraseña:</label>
                    <input type="text" name="i2">
                    <br>
                    <input type="submit" value="enviar" name="enviar2">
                </form> -->
    <?php
            }
        }else{
    ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">mete el nombre:</label>
                    <input type="text" name="i1">
                    <br>
                    <label for="">mete la contraseña:</label>
                    <input type="text" name="i2">
                    <br>
                    <input type="submit" value="enviar" name="enviar2">
                </form>
    <?php
        }
    ?>
    
</body>
</html>