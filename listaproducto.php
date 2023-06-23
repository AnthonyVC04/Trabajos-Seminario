<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php

    require_once 'producto.entidad.php';
    require_once 'producto.model.php';

    // Logica
    $alm = new Producto();
    $model = new ProductoModel();
    if(isset($_REQUEST['action']))
    {
        switch($_REQUEST['action'])
        {
            case 'actualizar':
            $alm->__SET('codpro', $_REQUEST['codpro']);
            $alm->__SET('nom', $_REQUEST['nom']);
            $alm->__SET('mar', $_REQUEST['mar']);
            $alm->__SET('pre', $_REQUEST['pre']);
            $alm->__SET('codprov', $_REQUEST['codpro']);
            $alm->__SET('codcat', $_REQUEST['codcat']);
            $alm->__SET('sto', $_REQUEST['sto']);
            $model->Actualizar($alm);
            header('Location: producto.php');
            break;
            case 'registrar':
            $alm->__SET('codpro', $_REQUEST['codpro']);
            $alm->__SET('nom', $_REQUEST['nom']);
            $alm->__SET('mar', $_REQUEST['mar']);
            $alm->__SET('pre', $_REQUEST['pre']);
            $alm->__SET('codprov', $_REQUEST['codpro']);
            $alm->__SET('codcat', $_REQUEST['codcat']);
            $alm->__SET('sto', $_REQUEST['sto']);
            $model->Registrar($alm);
            header('Location: producto.php');
            break;
            case 'eliminar':
            $model->Eliminar($_REQUEST['codpro']);
            header('Location: producto.php');
            break;
            case 'editar':
            $alm = $model->Obtener($_REQUEST['codpro']);
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
                                    <tr>
                                        <th>C&Oacute;DIGO</th>
                                        <th>NOMBRES</th>
                                        <th>MARCA</th>
                                        <th>PRECIO</th>		
                                        <th>C.PROVEEDOR</th>		
                                        <th>C.CATEGORIA</th>		
                                        <th>STOCK</th>							
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                    <tr>
                                        <td><?php echo $r->__GET('codpro'); ?></td>
                                        <td><?php echo $r->__GET('nom'); ?></td>
                                        <td><?php echo $r->__GET('mar'); ?></td>
                                        <td><?php echo $r->__GET('pre'); ?></td>
                                        <td><?php echo $r->__GET('codprov'); ?></td>
                                        <td><?php echo $r->__GET('codcat'); ?></td>
                                        <td><?php echo $r->__GET('sto'); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div> 
                <div class="col-md-1 text-center">
                <i class="fa-solid fa-user fa-4x fa-flip" style="margin-top:20px; color: #31B0D5;"></i>
                    <header>
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
