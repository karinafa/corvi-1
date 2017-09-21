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
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    
    <link href="../assets/css/tabs.css" rel="stylesheet" />
    
    

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    
    <!--AJAX -->  
      <script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
      <script src="../assets/js/jquery.form.js"></script>
        
        <script>
            
            $(document).ready(function() {

    // process the form
    $('#actualizar').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'rol'              : $('input[name=rol]').val(),
            'dorm'             : $('input[name=dorm]').val(),
            'mtscuad'    : $('input[name=mtscuad]').val(),
            'banos'      : $('input[name=banos]').val(),
            'gstcmn'      : $('input[name=gstcmn]').val(),
            'mtscuad'      : $('input[name=mtscuad]').val(),
            'piscina'      : $('input[name=piscina]').val(),
            'ctcan'      : $('input[name=ctcan]').val(),
            'direccion'      : $('input[name=direccion]').val(),
            'comuna'      : $('input[name=comuna]').val(),
            'ufprecio'      : $('input[name=ufprecio]').val(),
            'ref'      : $('input[name=ref]').val(),
            'id'      : $('input[name=id]').val(),
            'upd'      : $('input[name=upd]').val(),
            'query'      : $('input[name=query]').val(),
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'matricularp.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 
                $('#errorum_row').show(data.code);
                $('#errorum').text(data.message);

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
            
            </script>
        
    
    
    
    
    
    
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="green" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="signin.html" class="simple-text">
					Corvi
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
                                              
	                <li>
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
                        <li>
	                    <a href="agenda.php">
	                        <i class="material-icons">schedule</i>
	                        <p>Agenda</p>
	                    </a>
	                </li>
                        <li class="active">
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
						<a class="navbar-brand" href="#">Propiedades</a>
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
                
                <!-- Buscador -->
     <?php  
     
     // validar si existe la paginacion
        if (!(isset($_GET["pagenum"]))) 
            { 

                $pagenum = 0; 

            } 
            else
                {
                $pagenum = $_GET["pagenum"];
  
                }
     
     
     
     
                // ESperamos los resultados de todas las casas disponibles
// SearchFindShow
   $errline = new MyErrorHandler();  
   $results = new SearchFindShow();
   $query_flag = "";
     
   if(isset($_POST["query"])){$query_flag =  $_POST["query"];};
   
   if(isset($_GET["query"])){$query_flag =  $_GET["query"];};
   
   $errline->ErrorFile("Global value ". isset($_POST["query"]));
   
if($query_flag != 1){
$sql = "SELECT * FROM `braiz`"; 

$rows = $results->CountAllRows($sql) - 1;

$errline->ErrorFile("Numero de Rows Encontradas $rows");
    



}
else{
    
    
        
        
    if(isset($_POST['rolid'])) {$rolid = $_POST['rolid'];} else {$rolid="";};
    if(isset($_POST['email'])){$email = $_POST['email'];} else {$email="";};
    if(isset($_POST['comuna'])){ $comuna = $_POST['comuna'];}else {$comuna="";};    
    
    
    $errline->ErrorFile("Admin . Post Values ".$rolid." ".$email." ".$comuna);
    
    
    
    
        
    if(isset($_GET['rolid'])) {$comuna = $_GET['rolid'];}; 
    if(isset($_GET['email'])){$email = $_GET['email'];}; 
    if(isset($_GET['comuna'])){ $hasta = $_GET['comuna'];};
    
    $errline->ErrorFile("Admin . Get Values ".$comuna." ".$email." ".$rolid);

    $sql = $results->SearchEngine($comuna, $desde, $hasta, $dorm, $banos);
    
    $rows = $results->CountAllRows($sql) - 1;
    
    $errline->ErrorFile("Numero de Rows Encontradas $rows");
    

    
         
}

// Cantidad de resultados por pagina
$page_rows = 1;

//division por pagina de resultados
$last = ceil($rows/$page_rows);

//$pagenum < 1



 if ($pagenum < 1) 
 { 
    $pagenum = 0;
    
     }
 
    elseif ($pagenum > $last) 
 { 
        $pagenum = $last - 1; 
 }  

 
 //if ($pagenum == 1) { $pagenum = $pagenum - 1 ;}
 
$max = 'limit ' .($pagenum) * $page_rows .',' .$page_rows; 


if($query_flag != 1){
$data_p = $results->DisplayPageResults($max);}
else{
    $data_p = $results->DisplayPageResultswithMax($sql, $max);
}

if(!empty($data_p)){
    $no_value = 1;}
   
/** FIN FUNCIONES DE PAGINACION **/
                
?>             
                
                <div class="content">
                    
                    <div id="errorum_row" style="display: none;" class="row">
                        <div class="col-lg-7">
                                <div class="container-fluid">
                                    <div class="alert alert-danger">
                                            <div  class="container-fluid">
                                                <div class="alert-icon">
                                                <i class="material-icons">error_outline</i>
                                                </div>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                                </button>
                                                <div id="errorum">
                                                    <b>Error Alert:</b> Panel de Errores
                                                </div>
                                                
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                    
                    
                
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
					</div>
					<div class="collapse navbar-collapse">
						<form class="navbar-form nav-align-center" role="search">
							<div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="ID">
								<span class="material-input"></span>
							</div>
                                                        <div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Email">
								<span class="material-input"></span>
							</div>
                                                        <div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Comuna">
								<span class="material-input"></span>
							</div>

							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
						</form>
					</div>
				</div>
		
                
                
                <!-- Buscador -->
                
                
                
                
                <div class="content">
                    <div class="card card-nav-tabs">
	<div class="card-header" data-background-color="purple">
		<div class="nav-tabs-navigation">
			<div class="nav-tabs-wrapper">
				<span class="nav-tabs-title">Items</span>
				<ul class="nav nav-tabs" data-tabs="tabs">
					<li class="active">
						<a href="#profile" data-toggle="tab">
							<i class="material-icons">web_asset</i>
							Datos Generales
						<div class="ripple-container"></div></a>
					</li>
					<li class="">
						<a href="#messages" data-toggle="tab">
							<i class="material-icons">add_a_photo</i>
							Imágenes
						<div class="ripple-container"></div></a>
					</li>
					<li class="">
						<a href="#settings" data-toggle="tab">
							<i class="material-icons">description</i>
							Documentos
						<div class="ripple-container"></div></a>
					</li>
                                        <li class="">
						<a href="#settings" data-toggle="tab">
							<i class="material-icons">forward_10</i>
							Estados de Avance
						<div class="ripple-container"></div></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="card-content">
		<div class="tab-content">
			<div class="tab-pane active" id="profile">
				<div class="card-content">
                                    <form id="actualizar" method="post">
	                                    <div class="row">
	                                        <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Rol</label>
													<input type="text" name="rol" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["rolid"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                        <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Dormitorios</label>
													<input type="text" name="dorm" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["dorm"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                        <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Baños</label>
													<input type="text" name="banos" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["banos"]:""; echo $eprint;?>">
												</div>
	                                        </div>
                                                <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Piscina</label>
													<input type="text" name="piscina" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["piscina"]:""; echo $eprint;?>">
												</div>
	                                        </div>
                                                
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mts Superficie</label>
													<input type="text" name="mtscuad" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["mtscuad"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mts Contruida</label>
													<input type="text" name="mtscrd" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["mtscrd"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Valor UF</label>
													<input type="text" name="ufprecio" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["ufprecio"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Gasto Común</label>
													<input type="text" name="gstcmn" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["gstocmn"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Contribución Anual</label>
													<input type="text" name="ctcan" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["ctcan"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Dirección</label>
													<input type="text" name="direccion" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["direccion"]:""; echo $eprint;?>">
												</div>
	                                        </div>
	                                    </div>
                                            <div class="row">
                                                <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Comuna</label>
													<input type="text" name="comuna" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["comuna"]:""; echo $eprint;?>">
												</div>
	                                        </div>
                                                <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Referencia</label>
													<input type="text" name="ref" class="form-control" value="<?php $eprint = ($no_value == 1)?$data_p["ref"]:""; echo $eprint;?>">
                                                                                                        <input type="hidden" name="query" value="0">
                                                                                                        <input type="hidden" name="id" value="0">
                                                                                                        <input type="hidden" name="upd" value="1">
												</div>
	                                        </div>
                                                
                                                
                                                
                                                </div>

	                                    

	                                    <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
			</div>
			<div class="tab-pane" id="messages">
				<?php    
                                
                                    $FolderId = New UserSessions();
                                    $virtualF = "";
                                    
                                    $thesql = "SELECT email from (( braizperuser
                                    inner join usuario on usuario.rut = braizperuser.fk_rut)
                                    ) where braizperuser.fk_rolid =" .$data_p["rolid"];
                                    
                                    $aResult = New SearchFindShow();
                                    $e = New MyErrorHandler();
                                    
                                    $res = $aResult->DisplaySQLResults($thesql);
                                    
                                    $e->ErrorFile("Resultado de query por RolID->".$res["email"]);
                        
                                    $virtualF = '../virtual/'.$FolderId->GetIDforFolder($res["email"]);
                                    
                                    $e->ErrorFile("Virtual->".$virtualF);
                                    
                                    if ($res["email"]!="") {
                                        
                                    
                                    
                                    if (file_exists($virtualF)){
                                    
                                    if ($handle = opendir($virtualF)) {

                                        while (false !== ($entry = readdir($handle))) { 

                                            if ($entry != "." && $entry != "..") {

                                                echo '<div class="card card-stats ">';
                                                    echo '<div class="card-header" data-background-color="orange">';                                 
                                                            echo '<img src="../virtual/'.$FolderId->GetIDforFolder($correo)."/".$entry.'" alt="Casa" height="42" width="42">';
                                                    echo '</div>';
                                                echo '<div class="card-content">';
                                                    echo '<p class="category">Espacio Usado</p>';
                                                    echo '<h3 class="title">49/50<small>GB</small></h3>';
                                                echo '</div>';
					        echo '</div>';
                                            }						
                                        }
                                      closedir($handle);    
                                    }
                                    }
                                    }
                                    else {
     
                                        echo '<div class="card card-stats ">';
                                                    echo '<div class="card-header" data-background-color="orange">';                                 
                                                            echo 'No hay imagenes';
                                                    echo '</div></div>';
                                        
                                    }

                          
                                       
                                ?>
			</div>
			<div class="tab-pane" id="settings">
                                <div class="card-content table-responsive table-full-width">
                                <table class="table">
                                    <thead class="text-danger">
                                        <th>Documentos</th>
                                        <th>Ingreso</th>
                                        
			</thead>
			<tbody>
				<tr>
					<td><label><strong>Subir Archivo: </strong><input type="file" id="uploadfiles" multiple="multiple" class="btn btn-default"/></label></td>
					<td>Certificado de Hipoteca</td>
					
				</tr>
				<tr>
					<td><label><strong>Subir Archivo: </strong><input type="file" id="uploadfiles" multiple="multiple" class="btn btn-default"/></label></td>
					<td>Copia de Inscripcion de Dominio con Vigencia</td>
				</tr>
				<tr>
					<td><label><strong>Subir Archivo: </strong><input type="file" id="uploadfiles" multiple="multiple" class="btn btn-default"/></label></td>
					<td>Titulos de Dominios de los últimos 10 años</td>
					
				</tr>
				<tr>
					<td><label><strong>Subir Archivo: </strong><input type="file" id="uploadfiles" multiple="multiple" class="btn btn-default"/></label></td>
					<td>Certificado de Expropiación Fiscal</td>
					
				</tr>
				<tr>
					<td><label><strong>Subir Archivo: </strong><input type="file" id="uploadfiles" multiple="multiple" class="btn btn-default"/></label></td>
					<td>Certificado de Avaluo Fiscal</td>
					
				</tr>
				<tr>
					<td><label><strong>Subir Archivo: </strong><input type="file" id="uploadfiles" multiple="multiple" class="btn btn-default"/></label></td>
					<td>Certificado de Deuda</td>
					
				</tr>
			</tbody>
		</table>

	</div>
				<br/>
			</div>
		</div>
	</div>

</div>
                    
                    
                    
                    
                </div>
<div class="collapse navbar-collapse">
                                            
						<form class="navbar-form nav-align-center" role="search">
                                                         
                                                          <?php
                                                        
                                                          if($query_flag!=1){$query_flag="";}else{$query_flag="&query=1&comunag=".$comuna."&desdeg=".$desde."&hastag=".$hasta."&dormg=".$dorm."&banosg=".$banos."";};
                                                          
                                                          $vpagenumber = $pagenum + 1;
                                                          $vlast = $last + 1;
                                                          
                                                          echo " --Página " . $vpagenumber ." de " . $vlast ." -- <p>";
                                                          
                                                          if ($pagenum == 0){
                                                              
                                                          }
                                                          else{
                                                              
                                                           
                                                                $previous = $pagenum - 1;
                                                                if ($previous < 0 ){ $previous = 0; } 
                                       
                                                                echo "<a href='".$_SERVER['PHP_SELF']."?pagenum=0".$query_flag."'><i class=\"material-icons\">skip_previous</i>";							
                                                                echo "<a href='".$_SERVER['PHP_SELF']."?pagenum=".$previous.$query_flag."'><i class=\"material-icons\">fast_rewind</i>";
                                                                
                                                          }      
                                                            
                                                          
                                                          
                                                          if ($pagenum == $last) 
                                                            {

                                                            } 

                                                                else {

                                                                        $next = $pagenum + 1;
                                                                        
                                                                        if ($pagenum == $last){ $next = $last - 1; }

                                                                        echo "<a href='".$_SERVER['PHP_SELF']."?pagenum=".$next.$query_flag."'>";
                                                                        echo "<i class=\"material-icons\">fast_forward</i></a>";

                                                                        echo " ";

                                                                        echo "<a href='".$_SERVER['PHP_SELF']."?pagenum=". ($last - 1) .$query_flag."'>";
                                                                        echo "<i class=\"material-icons\">skip_next</i></a>";

                                                                    } 
                                                          
                                                         
                                                          
                                                          
                                                            
								?>
							
						</form>
					</div>
				</div>
        </div> 
                
                
                

 

			





			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="signin.html">
									Inicio
								</a>
							</li>
							<li>
								<a href="signup.php.html">
									Registro
								</a>
							</li>
                                                        <li>
								<a href="matricular.html">
									Matricular
								</a>
							</li>
                                                        <li>
								<a href="comprar.html">
									Comprar
								</a>
							</li>
                                                        <li>
								<a href="vitrina.html">
									Vitrina
								</a>
							</li>
                                                        <li>
								<a href="agenda.html">
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
