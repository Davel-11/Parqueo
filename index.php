<!DOCTYPE html>
<html lang="en">
<head>
<title>Control de Parqueo</title>
<meta charset="utf-8">
<link rel="stylesheet" href="resources/cssfile.css" type="text/css">
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
  <li><a href="">Home</a></li>
  <li><a href="">Quienes Somos</a></li>
  <li><a href="">Contacto</a></li>
</ul>
</nav>

    <section class="section">

<h2 id="bien">Bienvenido</h2>

    <aside>
  <div id='aside1'> 
        <h2>Ingresa</h2>
        <table>    
            <form name='fromSigIn' method="POST" action="controllers/con_login.php">       
                <tr><td>Correo:</td></tr>
                <tr><td><input type="email" required name="email"></td></tr>

                <tr><td>Contraseña:</td></tr>
                <tr><td><input type="password" required name="pass"></td></tr>
                  
                <tr><td><br/><input type="submit" value='Ingresar' ></td></tr>
                
                <tr><td><br/>
                    <?php
                    session_start();
                    if(isset($_SESSION["login"])){                                                                     
                    echo $_SESSION["login"];
                    session_unset(); 
                    session_destroy();                                        
                    }?>
                 </td></tr>
                
            </form>   
        </table>
  </div>
    
    <div id='aside2'> 
        <h2>Crea una Cuenta</h2>
        <table>    
            <form name='fromSigIn' method="POST" action="controllers/cont_add_user.php">       
                <tr><td>Nombre:</td></tr>
                <tr><td><input type="text" required name="nombre" minlength="3"></td></tr>
                
                <tr><td>Correo:</td></tr>
                <tr><td><input type="email" required name="email" ></td></tr>

                <tr><td>Contraseña:</td></tr>
                <tr><td><input type="password" required name="pass" minlength="7"></td></tr>
              
                <tr><td><br/><input type="submit" value='Crear' ></td></tr>
                <tr><td><br/>
                    <?php                    
                    if(isset($_SESSION["userCreated"])){                                                                     
                    echo $_SESSION["userCreated"];
                    session_unset(); 
                    session_destroy();                     
                    }?>
                 </td></tr>
                
            </form>
        </table>
    </div>
</aside>

    <article>
<h2>Ejemplo:</h2>
<img src="data.png" alt="data" style="width:100%;height:85%;">
</article>



</section>

<footer>
<p>All rights reserved.</p>
</footer>

</body>
</html>
