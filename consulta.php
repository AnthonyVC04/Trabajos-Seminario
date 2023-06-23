<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<title>BIENVENIDOS</title>
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
                <div class="col-md-2">
               
                        <img src="INICIO/img/img-header/logo-servel-electric.png" class="img img-responsive"><br><br>
                        <a href="#" class="btn btn-info btn-block" role="button">Foros</a><br> <br> 
                        <a href="#" class="btn btn-info btn-block" role="button">Personal</a><br><br> 
                        <a href="#" class="btn btn-info btn-block" role="button">Normas técnicas</a><br> <br>
                        <a href="#" class="btn btn-info btn-block" role="button">Boletines</a><br> <br>
                        <a href="#" class="btn btn-info btn-block" role="button">Sistema ISO</a> <br><br>
                        <a href="#" class="btn btn-info btn-block" role="button">Sugerencias</a> <br><br>
                        <a href="logout.php" class="btn btn-danger btn-block" role="button">Cerrar sesión</a> <br>

                      
                </div>
                <div class="col-md-9">
                    <h1>CONSORCIO</h1>
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="iniciar.php">CONSORCIO</a>
                            </div>
                                <ul class="nav navbar-nav">
                                <li><a href="panel.php">Inicio</a></li>
                                <li><a href="registro.php">Registro</a></li>
                                <li><a href="lista.php">Lista</a></li>
                                <li  class="active"><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h3>Cliente</h3>
                            <img src="img/cliente.jpg" class="img img-responsive">
                            <p align="center"><a href="consultacliente.php">Ingresar a cliente</a></p>
                        </div>
                        <div class="col-md-3">
                             <h3>Personal</h3>
                             <img src="img/personal.jpg" class="img img-responsive">
                             <p align="center"><a href="consultapersonal.php">Ingresar a personal</a></p>
                        </div>
                        <div class="col-md-3">
                             <h3>Producto</h3>
                             <img src="img/producto.png" class="img img-responsive">
                             <p align="center"><a href="consultaproducto.php">Ingresar a producto</a></p>
                        </div>
                        <div class="col-md-3">
                             <h3>Boleta</h3>
                             <img src="img/usuario.png" class="img img-responsive">
                             <p align="center"><a href="#">Ingresar a boleta</a></p>
                        </div>
                    </div>  
                    
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h3>Proveedor</h3>
                            <img src="img/provehedor.png" class="img img-responsive">
                            <p align="center"><a href="consultaproveedor.php">Ingresar proveedor</a></p>
                        </div>
                        <div class="col-md-3">
                             <h3>Categoria</h3>
                             <img src="img/Categoria.jpg" class="img img-responsive">
                             <p align="center"><a href="consultacategoria.php">Ingresar categoria</a></p>
                        </div>
                       
                        <div class="col-md-3">
                             <h3>Detalle de Boleta</h3>
                             <img src="img/inventario.png" class="img img-responsive">
                             <p align="center"><a href="#">Ingresar detalle de boleta </a></p>
                        </div>
                    </div>  
                </div>
                <div class="col-md-1">
                <i class="fa-solid fa-user fa-4x fa-flip" style="margin-top:20px; color: #31B0D5;"></i>
                    <header>
                        <h2><small>Bienvenido </small><b><?php echo $_SESSION['usuario']; ?></b></h2>
					</header>                   
                </div>
            </div>
        </div>
        <div class="container">
           <div class="row">
               <div class="col-md-12">
                   				
				</div>			
            </div>
        </div>			
	</body>
</html>
<?php
}
else{
echo '<script>window.location="iniciar.php"; </script>';
}
$profile=$_SESSION['usuario'];
?>
