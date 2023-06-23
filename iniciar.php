<?php
session_start();
include ('serv.php');
if (isset($_SESSION['user'])){
echo '<script>window.location="panel.php"; </script>';
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SIATMEDIA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		  <!--iconos -->
		  <script src="https://kit.fontawesome.com/4ab0829245.js" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
            <div class="container">
            	<div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="INICIO/img/img-header/logo-servel-electric.png" 
								class="img-responsive " 
								alt="Siatmedia" style="text-align:center">
						<h2 style="color:#FB7C00" class="fw-bold">Login Servelet</h2>
						<h3>Exclusivo para Servelet</h3>
						<p>Ingrese a la plataforma de negocios</p>
					</div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4 text-center">
                        <h3>INICIAR SESIÓN</h3>
				        <br>
						<i class="fa-solid fa-warehouse fa-4x fa-flip" style="margin-bottom:10px; color:#FB7C00"></i>
				        <form method="post" action="validar.php">
                            <div class="form-group">
				            <input type="text" name="usuario" value="" placeholder="Usuario" class="form-control"/><br>
				            <input type="password" name="clave" value="" placeholder="Password" class="form-control"/><br>
				            <footer>
				                
				                    <input type="submit" value="Ingresar" name="login"  class="btn btn-info"/>
				                    <a href="INICIO/index.php"><p>Regresar</p></a>
								
				            </footer>
				            </div>
						</form>
					</div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>			
		
	</body>
</html>
