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
    //CREA UN OBEJTO DE LA CLASE PROVEEDOR Y PROVEEDOR MODEL
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

		<script src="js/bootstrap.min.js">  </script>
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
                    <!-- TITULO -->
                    <h1>CONSORCIO</h1>
                    <!-- BARRA DE NAVEGACION -->
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">CONSORCIO</a>
                            </div>
                                <ul class="nav navbar-nav">
                                <li><a href="panel.php">Inicio</a></li>
                                <li class="active"><a href="registro.php">Registro</a></li>
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- FORMULARIO PARA POROCESAR DATOS Y ENVIARLO EN METODO POST -->
                            <form action="?action=<?php echo $alm->codprov ?'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                <center><h2>Ingrese los datos requeridos</h2></center>
                                <!-- AGRUPAR LOS ELEMETOS DEL FORMULARIO -->
                                <fieldset class="form-group">
                                      <!-- CASILLA PARA INGRESAR CODIGO||CODIGO AUTOINCREMENTABLE  -->

                                    <input type="hidden" name="codprov" placeholder="Código "
                                     required size="10" class="form-control"
                                      value="<?php echo $alm->__GET('codprov'); ?>"><br>
                                  <!-- CASILLA PARA INGRESA NOMBRE DEL PROVEEDOR -->
                                    <label for="nom" >Nombre de proveedor :</label>

                                    <input type="text" name="nom" placeholder="Nombre " 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('nom'); ?>"><br>
                                     <!-- CASILLA PARA INGRESA NOMBRE DEL REPARTIDOR-->
                                    <label for="nom" >nombre repartidor :</label>

                                    <input type="text" name="rep" placeholder="repartidor" 
                                    required size="50" class="form-control"
                                     value="<?php echo $alm->__GET('rep'); ?>"><br>
                                     <!-- CASILLA PARA INGRESA EL NUMERO DE TELEFONO -->

                                    <label for="nom" >telefono :</label>
                                    
                                    <input type="text" name="tel" placeholder="########" 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('tel'); ?>"><br>
                                     <!-- CASILLA PARA INGRESAR LA FECHA DE REGISTRO -->
                                    <label for="nom" >fecha de registro :</label>
                                    
                                    <input type="date" name="freg" placeholder="fecha de registro" 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('freg'); ?>"><br>
                                        <!-- CASILLA PARA INGRESAR LA DIRECCION-->
                                    <label for="nom" >direccion :</label>
                                    
                                    <input type="text" name="dir" placeholder="direccion" 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('dir'); ?>"><br>
                                    <!-- CASILLA PARA INGRESAR EL CORREO -->

                                    <label for="nom" >correo</label>
                                    
                                    <input type="email" name="ema" placeholder="correo" 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('ema'); ?>"><br>

                                    


                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir Proveedor" class="btn btn-info"><br><br>
                                 </center>
                            </form>
                        </div>
                    </div>

                    <script>
                        function confirmdelete(){
                        var respuesta = confirm("estas seguro de eliminar el proveedor");
                        if(respuesta == true)
                        {
                             return true;
                         }else{
                             return false;
                             }
                     }
                    </script>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">	
                            <header>
                                <h2>REGISTRO</h2>
                            </header>
                               <!-- TABLA PARA MOSTRAR TODAS LOS PROVEEDORES REGISTRADOS -->
                            <table class="table table-condensed">
                                <thead>
                                    <!-- ENCABEZADO DE LA TABLA  -->
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>NOMBRE</th>
                                        <th>REPARTIDOR</th>
                                        <th>TELEFONO</th>	
                                        <th>FECHA</th>	
                                        <th>DIRECCION</th>	
                                        <th>CORREO</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                 <!-- LISTA LOS OBJETOS DE PROVEEDOR, EXACTAMENTE EL METODO LISTAR ,PARA MOSTRAR RESULTADOS -->
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <!-- IMPRIME TODOS LOS DATOS REGISTRADOS  -->
                                    <td><?php echo $r->__GET('codprov'); ?></td>
                                    <td><?php echo $r->__GET('nom'); ?></td>
                                    <td><?php echo $r->__GET('rep'); ?></td>
                                    <td><?php echo $r->__GET('tel'); ?></td>
                                    <td><?php echo $r->__GET('freg'); ?></td>
                                    <td><?php echo $r->__GET('dir'); ?></td>
                                    <td><?php echo $r->__GET('ema'); ?></td>
                                    <td>
                                        <a href="?action=editar&codprov=<?php echo $r->codprov; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="?action=eliminar&codprov=<?php echo $r->codprov; ?>"  onclick="return confirmdelete() " >Eliminar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
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
