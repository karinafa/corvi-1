<!doctype html>

<?php

require_once '../classes/UserSessions.php';

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

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    
    <link href="../assets/css/gallery.css" rel="stylesheet" />
    
    

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    
    
    
    
    <!-- Core CSS file Vitrina Virtual-->
    <link rel="stylesheet" href="../assets/css/photoswipe.css"> 

    <!-- Viirrina Virual
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite, 
     - preloader.gif (for browsers that do not support CSS animations) -->
    <link rel="stylesheet" href="../assets/css/default-skin.css"> 

    <!-- Core JS file -->
    <script src="../assets/js/photoswipe.min.js"></script> 

    <!-- UI JS file -->
    <script src="../assets/js/photoswipe-ui-default.min.js"></script> 
    <!-- Fin CCS Vitrina Virtual-->
    
    
    <!--AJAX -->  
      <script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
      <script src="../assets/js/jquery.form.js"></script>
      
    <script>
        
    // prepare the form when the DOM is ready 
    $(document).ready(function() { 
    var options = { 
        //target:        '#logout',   // target element(s) to be updated with server response
        dataType:  'json',
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse,  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  json        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind to the form's submit event 
    $('#logout').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    //alert('About to submit: \n\n' + queryString); 
    //CL04
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function showResponse(data)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
     //  '\n\nThe output div should have already been updated with the responseText.'); 
        console.log(data.message);
       $('#errorum_row').show();
       $('#errorum').text(data.message);
} 
    
    
    
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
				<a href="signin.php" class="simple-text">
					Corvi
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">                     
	                <li class="active">
	                    <a href="vitrina.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Vitrina</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="signup.php">
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
						<a class="navbar-brand" href="#">Vitrina de Propiedades</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                                                                
                                                                echo '<i class="material-icons">exit_to_app</i>';
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
                <!-- search container -->
                <div class="content">
                
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
								<input type="text" class="form-control" placeholder="Comuna">
								<span class="material-input"></span>
							</div>
                                                        <div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Desde UF">
								<span class="material-input"></span>
							</div>
                                                        <div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Hasta UF">
								<span class="material-input"></span>
							</div>
                                                        <div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Dormitorios">
								<span class="material-input"></span>
							</div>
                                                    <div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Baños">
								<span class="material-input"></span>
							</div>
                                                    
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
						</form>
					</div>
				</div>
		
                    
               	
                <div class="content">
                        <!-- AGREGAR TABLA -->
                        <div class="col-lg-4" >
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Caracteristicas</h4>
	                                <p class="category">Viviendas</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Características</th>
	                                    	
	                                    	
											<th>Ctn</th>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                        	<td>ID</td>
	                                        	
												<td class="text-primary">1000</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>Hab</td>
	                                        	
												<td class="text-primary">3</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>Baños</td>
	                                        	
												<td class="text-primary">2</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>Piscina</td>
	                                        	
												<td class="text-primary">1</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>Mts2 Construidos</td>
	                                        	
												<td class="text-primary">100</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>Mts2 Terreno</td>
	                                        	
												<td class="text-primary">150</td>
	                                        </tr>
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>
                        
                       <!-- FIN AGREGAR TABLA --> 
                </div>
                    
                    <div class="content">
                        <!-- AGREGAR TABLA -->
                        
                        <div class="col-lg-4" >
                            <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
	                        <div class="card">
	                             
	                            <div class="card-content table-responsive">
                                        
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Características</th>
	                                    	
	                                    	
	
	                                    </thead>
                                            
	                                    <tbody>
	                                        <tr>
	                                        	<td><figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                            <a href="../virtual/1000/MC7541660-0.jpg" itemprop="contentUrl" data-size="400x200">
                                                            <img src="../virtual/1000/MC7541660-0.jpg" itemprop="thumbnail" alt="Desrripción de Imagen" />
                                                            </a>
                                                            <figcaption itemprop="caption description">Imagen 1</figcaption>
                                                            </figure>
                                                            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                            <a href="../virtual/1000/victorian.jpg" itemprop="contentUrl" data-size="400x200">
                                                            <img src="../virtual/1000/victorian.jpg" itemprop="thumbnail" alt="Descripción de Imagen" />
                                                            </a>
                                                            <figcaption itemprop="caption description">Imagen 2</figcaption>
                                                            </figure>
                                                            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                            <a href="../virtual/1000/victorian.jpg" itemprop="contentUrl" data-size="400x200">
                                                            <img src="../virtual/1000/victorian.jpg" itemprop="thumbnail" alt="Descripción de Imagen" />
                                                            </a>
                                                            <figcaption itemprop="caption description">Imagen 3</figcaption>
                                                            </figure>
                                                        </td>
	                                        	
												
	                                        </tr>
	                                        <tr>
	                                        	<td>
                                                        
                                                    </td>
                                                </tr>
	
	                                    </tbody>
	                                </table>
                                        </div>           
	                            </div>
	                        </div>
	                    </div>
                        
                       <!-- FIN AGREGAR TABLA --> 
                </div>
                    
                    <!-- Galería Final-->
                    
                    
                    
                    
                    
                    
                    <!-- Vitrina -->
                    
                    <div class="parent" style="position: relative;">
                            
                            
                  <!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Cerrar (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Compartir"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>          
                            
                            
                            
                            
                            
                            
			
			</div>
              
                    <!-- Fin Vitrina -->
                    
           <!-- BARRA DE BUSQUEDA -->
           
        <div class="card">   
           <div class="container-fluid">
					
               
               
               
					<div class="collapse navbar-collapse">
						<form class="navbar-form nav-align-center" role="search">
							
                                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                                                <i class="material-icons">fast_rewind</i><div class="ripple-container"></div>
								
							</button>
                                                    
                                                        
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
                                                            <i class="material-icons">fast_forward</i>
                                                            <div class="ripple-container"></div>
                                                                
                                                            
								
							</button>
						</form>
					</div>
				</div>
        </div> 
           
           
           
           <!-- FIN BARRA -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
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

	<!--Javascript Gallery -->
        <script src="../assets/js/gallery.js"></script>

	
        
        

</html>
