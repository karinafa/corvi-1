<?php

require_once '../classes/SearchFindShow.php';
require_once '../classes/UserSessions.php';
require_once '../classes/MyErrorHandler.php';

session_start();

/**
 * 
 * @Global Var
 * 
 */

$correo = "";



function SanityCheck(){
    
    global $correo;
    
if (isset($_SESSION['myemail'])){
//desde sigin.php
    
    //echo "En sanity...";
    
    $correo = $_SESSION['myemail'];

    return 1;

    }
        return 0;
    }

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}


//****
//Valida la session contra Base de Datos

function ShieldSession(){
    
    global $correo;
        
    //echo "Shield..";
    
      
            $sess = new UserSessions(); 
            //Echo "After Sanity...";
            $Ecode =  $sess->CheckSessionInDb(session_id(),$correo);
            //echo $Ecode;
            
        if ($Ecode!="302"){
            
            redirect("https://".$_SERVER['SERVER_NAME']."/corvi/core/acceso.php");
            
        
        }
      
           
      
    
    
    
}

/**
 * Valida si la variablle correo esta seteada como
 * parte de la sesion global
 * 
 */
if (SanityCheck()){
    ShieldSession();
    }
else{
    redirect("https://".$_SERVER['SERVER_NAME']."/corvi/core/acceso.php"); 
}

?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Corvi</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    

   <!--<link type="text/css" rel="stylesheet" media="all" href="../assets/css/estilos.css"> -->
    
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    
      

       

	<!-- helper libraries -->

<style>
    iframe{
        height: 95%;
        width: 100%;
        overflow: hidden;
        margin: 0; padding: 0;
    }
    #layoutContainer {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
}
    
    
</style>
     
        
        
        
        
    
    
   
    
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="signin.php" class="simple-text">
					Corvi
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                                      
	                <li >
	                    <a href="vitrina.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Vitrina</p>
	                    </a>
	                </li>
	                <li>
                            <a href="perfil.php">
	                        <i class="material-icons">person</i>
	                        <p>Perfil de Usuario</p>
	                    </a>
	                </li>
	                <li >
	                    <a href="matricular.php">
	                        <i class="material-icons">add_to_queue</i>
	                        <p>Matricular</p>
	                    </a>
	                </li>
                        <li>
	                    <a href="comprar.php">
	                        <i class="material-icons">add_shopping_cart</i>
	                        <p>Comprar</p>
	                    </a>
	                </li>
                        
                        
                        <li class="active">
	                    <a href="agenda.php">
	                        <i class="material-icons">schedule</i>
	                        <p>Agenda</p>
	                    </a>
	                </li>
                        <li>
	                    <a href="admin.php">
	                        <i class="material-icons">build</i>
	                        <p>Admin</p>
	                    </a>
	                </li>
	                
	               
			
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
                
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Agenda</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Tiene 5 nuevas solicitudes</a></li>
                                                                        <li><a href="#">Aún falta documentación</a></li>
									
								</ul>
							</li>
							<li>
                                                            <?php
                                                                
								echo '<a href="#" onclick="document.getElementById(\'logout\').submit()" class="dropdown-toggle" data-toggle="dropdown">';	 	                                                 
                                                                echo '<i class="material-icons">exit_to_app</i></a>';
	 							echo '<p class="hidden-lg hidden-md">Salir</p>';
                                                                echo '<form id="logout" action="logout.php" method="post">';
                                                                echo '<input type="hidden" name="email" value="'.$correo.'">';
                                                                echo '</form>';
                                                            ?>       
                                                                   
		 						
							</li>
						</ul>

						
					</div>
				</div>
			</nav>
                        
                
                
                
                <div class="content">
                    <div id="header">
			
        </div>
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div id="layoutContainer">

            <iframe id="iframeMainMenu" src="agenda_1.php" frameborder="no"></iframe>
  
        </div>
        
        <div class="clear">
        </div>
      
                </div>


			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="signin.php">
									Inicio
								</a>
							</li>
							<li>
								<a href="signup.php">
									Registro
								</a>
							</li>
                                                        <li>
								<a href="matricular.php">
									Matricular
								</a>
							</li>
                                                        <li>
								<a href="comprar.php">
									Comprar
								</a>
							</li>
                                                        <li>
								<a href="vitrina.php">
									Vitrina
								</a>
							</li>
                                                        <li>
								<a href="agenda.php">
									Agenda
								</a>
							</li>
                                                        						
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> 
					</p>
				</div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	

	
        
        

</html>
