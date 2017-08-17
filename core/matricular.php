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
    
    
    
    <!--AJAX FORM-->  
      <script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
      <script src="../assets/js/jquery.form.js"></script>
        
        <script>
        
    // prepare the form when the DOM is ready 
    $(document).ready(function() { 
    var options = { 
        //target:        '#errorum',   // target element(s) to be updated with server response
        dataType:  'json',     
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
    $('#vdata').submit(function() { 
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
    return false; 
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
                                               
	                <li>
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
	                <li class="active">
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
						<a class="navbar-brand" href="#">Propiedades</a>
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
									<span class="notification">2</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Tiene 2 nuevas solicitudes</a></li>
                                                                        <li><a href="#">Aún falta documentación</a></li>
									
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">exit_to_app</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
							</li>
						</ul>

						
					</div>
				</div>
			</nav>
                
                
                
                
                
                <div class="content">
                    
                    <div class="container-fluid">
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
                </div>
                    
                    
                    
                    <div class="card card-nav-tabs">
	<div class="card-header" data-background-color="purple">
		<div class="nav-tabs-navigation">
			<div class="nav-tabs-wrapper">
				<span class="nav-tabs-title">Tareas:</span>
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
				</ul>
			</div>
		</div>
	</div>

	<div class="card-content">
		<div class="tab-content">
			<div class="tab-pane active" id="profile">
				<div class="card-content">
                                    <form id="vdata" action="matricularp.php" method="post">
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Dormitorios</label>
													<input type="text" name="dorm" class="form-control">
												</div>
	                                        </div>
	                                        
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Baños</label>
													<input type="text" name="banos" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mts Superficie</label>
													<input type="text" name="mtscuad" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mts Contruida</label>
													<input type="text" name="mtscrd" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Valor UF</label>
													<input type="text" name="ufprecio" class="form-control" >
												</div>
	                                        </div>
                                                <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Piscina</label>
													<input type="text" name="piscina" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Gasto Común</label>
													<input type="text" name="gstcmn" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Contribución Anual</label>
													<input type="text" name="ctcan" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Dirección</label>
													<input type="text" name="direccion" class="form-control" >
												</div>
	                                        </div>
	                                    </div>
                                            <div class="row">
                                                <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Comuna</label>
													<input type="text" name="comuna" class="form-control" >
												</div>
	                                        </div>
                                                <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Referencia</label>
													<input type="text" name="ref" class="form-control" >
												</div>
	                                        </div>
                                                
                                                </div>

	                                    

	                                    <button type="submit" class="btn btn-primary pull-right">Ingresar</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
			</div>
			<div class="tab-pane" id="messages">
				<div class="card card-stats ">
                                    <div class="card-header" data-background-color="orange">
                                        
                                        <img src="../virtual/1000/h-w1020_h770_q80.jpg" alt="Casa" height="42" width="42">
                                    </div>
                                <div class="card-content">
                                        <p class="category">Used Space</p>
                                        <h3 class="title">49/50<small>GB</small></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i> <a href="#">Get More Space...</a>
                                    </div>
                                </div>
                                </div>
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
