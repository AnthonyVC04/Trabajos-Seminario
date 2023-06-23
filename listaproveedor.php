<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php

    require_once 'proveedor.entidad.php';
    require_once 'proveedor.model.php';

    // Logica
     //CREA UN OBEJTO DE LA CLASE PROVEEDOR Y PROVEEDOR MODEL}
    //SE UTILIZA PARA INTERACTUAR CON LA BASE DE DATOS Y ACTUALIZAR ,REGISTRAR,O ELIMINAR
    $alm = new Proveedor();
    $model = new ProveedorModel();
    if(isset($_REQUEST['action']))
    {
        switch($_REQUEST['action'])
        {
            case 'actualizar':
            $alm->__SET('codprov', $_REQUEST['codprov']);
            $alm->__SET('nom', $_REQUEST['nom']);
            $alm->__SET('rep', $_REQUEST['rep']);
            $alm->__SET('tel', $_REQUEST['tel']);
            $alm->__SET('freg', $_REQUEST['freg']);
            $alm->__SET('dir', $_REQUEST['dir']);
            $alm->__SET('ema', $_REQUEST['ema']);
            $model->Actualizar($alm);
            header('Location: proveedor.php');
            break;
            case 'registrar':
            $alm->__SET('codprov', $_REQUEST['codprov']);
            $alm->__SET('nom', $_REQUEST['nom']);
            $alm->__SET('rep', $_REQUEST['rep']);
            $alm->__SET('tel', $_REQUEST['tel']);
            $alm->__SET('freg', $_REQUEST['freg']);
            $alm->__SET('dir', $_REQUEST['dir']);
            $alm->__SET('ema', $_REQUEST['ema']);
           
            $model->Registrar($alm);
            header('Location: proveedor.php');
            break;
            case 'eliminar':
            $model->Eliminar($_REQUEST['codprov']);
            header('Location: proveedor.php');
            break;
            case 'editar':
            $alm = $model->Obtener($_REQUEST['codprov']);
            break;
        }
    }
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
                    <center>
                        <img src="img/consorcio.png" class="img img-responsive"><br><br>
                        <a href="#" class="btn btn-info btn-block" role="button">Foros</a><br> <br> 
                        <a href="#" class="btn btn-info btn-block" role="button">Personal</a><br><br> 
                        <a href="#" class="btn btn-info btn-block" role="button">Normas técnicas</a><br> <br>
                        <a href="#" class="btn btn-info btn-block" role="button">Boletines</a><br> <br>
                        <a href="#" class="btn btn-info btn-block" role="button">Sistema ISO</a> <br><br>
                        <a href="#" class="btn btn-info btn-block" role="button">Sugerencias</a> <br><br>
                        <a href="logout.php" class="btn btn-danger btn-block" role="button">Cerrar sesión</a> <br>

                    </center>
                      
                </div>
                <div class="col-md-9">
                    <h1>CONSORCIO</h1>
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">CONSORCIO</a>
                            </div>
                                <ul class="nav navbar-nav">
                                <li><a href="panel.php">Inicio</a></li>
                                <li><a href="registro.php">Registro</a></li>
                                <li class="active"><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-condensed">
                                <thead>
                                     <!-- ENCABEZADOS DE LA TABLA  -->
                                    <tr>
                                        <th>C&Oacute;DIGO</th>
                                        <th>NOMBRE</th>
                                        <th>REPARTIDOR</th>
                                        <th>TELEFONO</th>	
                                        <th>FECHA</th>	
                                        <th>DIRECCION</th>	
                                        <th>CORREO</th>	
                                       							
                                    </tr>
                                </thead>
                                <!-- LISTA LOS OBJETOS DE proveedor , EXACTAMENTE EL METODO LISTAR ,PARA MOSTRAR RESULTADOS -->
                                <?php foreach($model->Listar() as $r): ?>
                                    <tr>
                                        <!-- IMPRIME LOS RESULTADOS  -->
                                        <td><?php echo $r->__GET('codprov'); ?></td>
                                        <td><?php echo $r->__GET('nom'); ?></td>
                                        <td><?php echo $r->__GET('rep'); ?></td>
                                        <td><?php echo $r->__GET('tel'); ?></td>
                                        <td><?php echo $r->__GET('freg'); ?></td>
                                        <td><?php echo $r->__GET('dir'); ?></td>
                                        <td><?php echo $r->__GET('ema'); ?></td>
                                    </tr>
                                    <!-- FINALIZA EL BUCLE  -->
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div> 
                <div class="col-md-1">
                    
                    <header class="text-center">
                    <i class="fa-solid fa-user fa-4x fa-flip" style="margin-top:20px; color: #31B0D5;"></i>
                        <h2><small>Bienvenido </small><b><?php echo $_SESSION['usuario']; ?></b></h2>
					</header>                   
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