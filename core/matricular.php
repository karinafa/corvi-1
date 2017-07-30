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
	                    <a href="signin.php">
	                        <i class="material-icons">person</i>
	                        <p>Inicio</p>
	                    </a>
	                </li>                      
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
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
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
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
							</li>
						</ul>

						
					</div>
				</div>
			</nav>
                
                
                <div class="content">
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
	                                <form>
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Dormitorios</label>
													<input type="text" class="form-control">
												</div>
	                                        </div>
	                                        
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Baños</label>
													<input type="email" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mts Superficie</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mts Contruida</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label class="control-label">Valor UF</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Gasto Común</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Contribución Anual</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Dirección</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>
                                            <div class="row">
                                                <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Comuna</label>
													<input type="text" class="form-control" >
												</div>
	                                        </div>
                                                <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Referencia</label>
													<input type="text" class="form-control" >
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
                                        <i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
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
