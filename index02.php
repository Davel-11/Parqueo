<?php
    session_start();
    
    if(!isset($_SESSION['login'])){
      header("location:index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Control de Parqueo</title>
<meta charset="utf-8">
<link rel="stylesheet" href="resources/cssfile2.css" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->


</head>

<body>

<header>
<h1>Control De Parqueo</h1>
</header>

<nav>
<ul>  
  <li><a href="controllers/log_out.php">Cerrar Sesion</a></li>
</ul>
</nav>

<section class="section2">

<h2 id="bien">Bienvenido <?php echo $_SESSION["user"]; ?></h2>


<article>
<h2>Agregar Información</h2>

<?php
if (isset($_SESSION["dataAdded"])){
echo $_SESSION["dataAdded"];
$_SESSION["dataAdded"] = '';
}
?>

<table>
    <form method="post" action="controllers/con_add_data.php">
        <tr><td>
                <input type="text" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>" readonly>
        </td></tr>
        
        <tr><td>
                <input type="text" name="email" value="<?php echo $_SESSION["email"]; ?>" readonly>
        </td></tr>
        
         <tr><td>
                <input type="text" name="nombre_emp" placeholder="Nombre de Empleado">
        </td></tr>
         
          <tr><td>
                <input type="text" name="num_emp" placeholder="Numero de Empleado">
        </td></tr>
        
         <tr><td>
                <input type="text" name="car_type" placeholder="Tipo de Carro">
        </td></tr>
         
         <tr><td>
                <input type="text" name="color" placeholder="Color">
        </td></tr>
        
         <tr><td>
                <input type="text" name="placa" placeholder="Placa">
        </td></tr>        
                
        <tr><td>
                <input type="submit" value="Ingresar Datos">
        </td></tr>
    </form>
</table>

</article>

<article>
<h2>Tabla Datos</h2>

    <table id='table_data'>
<tr id="tr">
    <td id="td">Id</td>
    <td id="td">Id Del Usuario</td>
    <td id="td">Correo</td>
    <td id="td">Nombre Empleado</td>
    <td id="td">Numero de Empleado</td>
    <td id="td">Tipo de Carro</td>
    <td id="td">Color Del Carro</td>
    <td id="td">Numero de Placa</td>    
    <td id="td">Editar</td>
    <td id="td">Eliminar</td>
</tr >

<?php
if (isset($_SESSION["delete"])){
echo $_SESSION["delete"];
 $_SESSION["delete"] = "";
}

if (isset($_SESSION["dataEdited"])){
echo $_SESSION["dataEdited"];
 $_SESSION["dataEdited"] = "";
}

?>


<?php
include 'models/database_con.php';
$email = $_SESSION["email"];

$op = new database_con;
$con = $op->connect();

$sql = "SELECT * FROM data WHERE email='$email' ";
$res = $con->query($sql);


if ($res->num_rows > 0) {    
    while ($row = $res->fetch_assoc()){
        $id = $row['id'];
        echo '<tr id="tr">';
        echo '<td id="td">' . $row['id'] . '</td >';
        echo '<td id="td">' . $row['id_user'] .'</td >';
        echo '<td id="td">' . $row['email'] . '</td >';
        echo '<td id="td">' . $row['nombre_emp'] . '</td >';
        echo '<td id="td">' . $row['num_emp'] . '</td >';        
        echo '<td id="td">' . $row['car_type'] . '</td >';
        echo '<td id="td">' . $row['color'] . '</td >';
        echo '<td id="td">' . $row['placa'] . '</td >';        
        echo '<td id="td">' . "<a href='controllers/con_load.php?id=$id'>Edit<a>" . '</td >';
        echo '<td id="td">' . "<a href='controllers/con_delete.php?id=$id'>Eliminar<a>" . '</td >';
        echo '</tr id="tr">';
    }        
}

?>
</table>

</article>

<article>
<h2>Buscar Usuario</h2>

    <table>
        <form name='finduser' method="post" action="index02.php">
             <tr><td>
                    <input type="text" name="buscar" placeholder="Ingresa ID Empleado">
            </td></tr>

            <tr><td>
                    <input type="submit" value="Buscar">
            </td></tr>

    </form>
    </table>

    
<?php

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    
    

    $sql = "SELECT * FROM data WHERE num_emp='".$_POST["buscar"]."' AND email='".$email."' ";
    $res = $con->query($sql);


    if ($res->num_rows > 0) { 
        echo "<table id='table_data'>";
        echo "    <tr id='tr'>" ;
        echo '       <td id="td">Id</td>';
        echo '       <td id="td">Id Del Usuario</td> ';
        echo '        <td id="td">Correo</td> ';
        echo '       <td id="td">Nombre Empleado</td> ';
        echo '       <td id="td">Numero de Empleado</td> ';
        echo '       <td id="td">Tipo de Carro</td> ';
        echo '       <td id="td">Color Del Carro</td> ';
        echo '       <td id="td">Numero de Placa</td>  ';  
        echo '       <td id="td">Editar</td> ';
        echo '       <td id="td">Eliminar</td> ';
        echo '     </tr > ';
     
        while ($row = $res->fetch_assoc()){
            $id = $row['id'];
            echo '<tr id="tr">';
            echo '<td id="td">' . $row['id'] . '</td >';
            echo '<td id="td">' . $row['id_user'] .'</td >';
            echo '<td id="td">' . $row['email'] . '</td >';
            echo '<td id="td">' . $row['nombre_emp'] . '</td >';
            echo '<td id="td">' . $row['num_emp'] . '</td >';        
            echo '<td id="td">' . $row['car_type'] . '</td >';
            echo '<td id="td">' . $row['color'] . '</td >';
            echo '<td id="td">' . $row['placa'] . '</td >';        
            echo '<td id="td">' . "<a href='controllers/con_load.php?id=$id'>Edit<a>" . '</td >';
            echo '<td id="td">' . "<a href='controllers/con_delete.php?id=$id'>Eliminar<a>" . '</td >';
            echo '</tr id="tr">';
        }     
        $_POST["buscar"] = "";
    } else {
         echo '<p>No se Encontro Informacion</p>';
    }
    $con->close();

}
?>
</table>    
</article>


</section>

<footer>
<p>&copy; All rights reserved.</p>
</footer>

</body>
</html>
