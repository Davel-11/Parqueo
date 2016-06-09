<?php

include 'database_con.php';

class mod_data {
    
    function addData( $p1, $p2, $p3, $p4, $p5, $p6 , $p7){
    
        $op = new database_con();
        $con = $op->connect2();               

        $sql = "INSERT INTO data (id_user, email, car_type, color, placa, num_emp, nombre_emp) VALUES ('$p1','$p2','$p3','$p4','$p5','$p6','$p7') ";

        
        $res = mysql_query($sql, $con);

        if (!$res) {
            die('could not enter data' . mysql_error());
        }

        mysql_close();
    
    }
    
    function DeleteUser($id){
        
        $op = new database_con();
        $con = $op->connect2();
        
        $sql = "DELETE FROM data WHERE id='$id' ";
               
        $res = mysql_query($sql, $con);
        
        if (!$res) {
            die('could not delete data' . mysql_error());
        }
        return "<p class='mensaje'>Borrado Exitosamente</p>";
        mysql_close();                
    }
    
    function editData($id, $car_type, $color, $placa, $num_emp, $nombre_emp) {
        
        //1. Inicializar Conexion
        $op = new database_con;
        $con = $op->connect();
        
        //2. SQL statement
        $sql = 'UPDATE data SET car_type="'.$car_type.'", color="'.$color.'", placa="'.$placa.'", num_emp="'.$num_emp.'", nombre_emp="'.$nombre_emp.'" WHERE id="'.$id.'" ';                
        
        //3. Confirmar Query
        if ($con ->query($sql) === TRUE ) {
            return "<p class='editado'>Usuario Editado Exitosamente</p>"; 
        } else {
            return "Error al Actulizar el registro " .$con->error;
        }
        
        $con->close();
    }
    
}
