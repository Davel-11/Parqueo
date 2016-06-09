<?php

include 'database_con.php';

class mod_users {
    
    function addUser($nombre,$email,$pass){
        //llamar clase conexion
        $op = new database_con;
        $con = $op->connect();
        
        $sql2 = "SELECT email FROM users";
        $result = $con->query($sql2);
        
        $found = FALSE;        
        $x=''; 
        
        if($result->num_rows > 0 ) {              
            while($row = $result->fetch_assoc()){
                if ($row['email']===$email){
                    $found = TRUE;                      
                }  
            }            
        } 
        
        if ($found === TRUE)  {        
             $x = "User already exist ";
             return $x;
        } else {
            $sql = "INSERT INTO users (name, email, pass) VALUES ('$nombre', '$email', '$pass')";

            if ($con->query($sql)=== TRUE ) {                
                $x = "Usuario Agregado Exitosamente ";
                return $x;
                
            } else {
                echo "Error" . $sql . "<br/>" . $con->error;
            }

            $con->close();            
        }
    }
    
    function Login($email,$pass) {
        
        $op = new database_con;
        $con = $op->connect();
        
        $sql = "SELECT email,pass FROM users WHERE email='$email' and pass='$pass' ";
        $result = $con->query($sql);
                
        $x = FALSE;
        
        if($result->num_rows > 0 ) {
            
                $slq2 = "SELECT id,name,email FROM users WHERE email='$email' ";
                $result2 = $con->query($slq2);

                if ($result2->num_rows > 0) {                    
                    session_start(); 
                    while($row = $result2->fetch_assoc()) {
                        $_SESSION["id_user"] = $row['id'];
                        $_SESSION["user"] = $row['name'];
                        $_SESSION["email"] = $row['email'];
                    }
                }
            
                $x = TRUE;
                return $x;                
            } else {
                $x = FALSE;
               return $x;
            }        
         
    }
    
}
