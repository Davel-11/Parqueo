
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Usuario</h1>
        <?php
        session_start();         
        ?>
        <table>
            <form name="form_edit" method="post" action="controllers/con_edit.php">
                <tr>
                    <td>Carro Acual:</td>
                    <td><input type="text" value='<?php echo $_SESSION["x1"]?>' name="car_type"></td>
                </tr>
                <tr>
                    <td>Color Acual:</td>
                    <td><input type="text" value='<?php echo $_SESSION["x2"]?>' name="color"></td>
                </tr>
                
                <tr>
                    <td>Placa Acual:</td>
                    <td><input type="text" value='<?php echo $_SESSION["x3"]?>' name="placa"></td>
                </tr>
                
                <tr>
                    <td>Numero De Empleado:</td>
                    <td><input type="text" value='<?php echo $_SESSION["x4"]?>' name="num_emp"></td>
                </tr>
                
                <tr>
                    <td>Nombre Empleado:</td>
                    <td><input type="text" value='<?php echo $_SESSION["x5"]?>' name="nombre_emp"></td>
                </tr>
                
                <tr>
                    
                    <td><br/><input type="submit" value='Actualizar Información'></td>
                </tr>
            </form>
        </table>
    </body>
</html>
