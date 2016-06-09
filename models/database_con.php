<?php


class database_con {
    
    function connect(){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database ='parqueo';
        
        $con = new mysqli($host, $user, $pass, $database);
                        
        if ($con->connect_error) {
          die ("Error Connecting". $con->connect_error);
        }        
        //return connection
        return $con;
    }
    
    function connect2(){
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $con = mysql_connect($dbhost, $dbuser, $dbpass); 
        mysql_select_db('parqueo');
        
        if (!$con){
        die ('could not connect'. mysql_error());
        }
        
        return $con;
    }
    
}
