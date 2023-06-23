<?php
//session
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php
    //LLAMA A LA CONEXION
    include ('serv.php');
    require_once 'producto.entidad.php';
    require_once 'producto.model.php';

    // consulta
    //ejecuta la sentencia preparada
    $cons = $db->prepare("SELECT * FROM proveedor");
    $cons->execute();
    $cons2 = $db->prepare("SELECT * FROM categoria");
    $cons2->execute();
    
    // Logica
    //CREA UN OBEJTO DE LA CLASE PRODUCTO Y PRODUCTO MODEL}
    //SE UTILIZA PARA INTERACTUAR CON LA BASE DE DATOS Y ACTUALIZAR ,REGISTRAR,O ELIMINAR
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
                $alm->__SET('codprov', $_REQUEST['codprov']); 
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
                $alm->__SET('codprov', $_REQUEST['codprov']); 
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
		<script src="js/bootstrap.min.js"> </script>
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
                            <!-- FORMULARIO CON METODO POST -->
                            <form action="?action=<?php echo $alm->codpro ?'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                <center><h2>Ingrese los datos requeridos</h2></center>
                                  <!-- AGRUPAR LOS ELEMETOS DEL FORMULARIO -->
                                <fieldset class="form-group">
                                    <!-- CASILLA PARA INGRESAR CODIGO||CODIGO AUTOINCREMENTABLE  -->
                                    <input type="hidden" name="codpro" placeholder="Código "
                                     required size="10" class="form-control"
                                      value="<?php echo $alm->__GET('codpro'); ?>"><br>
                                <!-- CASILLA PARA INGRESA NOMBRE DEL PRODUCTO  -->
                                    <label for="nom" >Nombre de producto :</label>

                                    <input type="text" name="nom" placeholder="Nombre" 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('nom'); ?>"><br>
                                     <!-- CASILLA PARA INGRESAR LA MARCA DEL RODUCTO-->
                                    <label for="nom" >Marca de producto :</label>

                                    <input type="text" name="mar" placeholder="Marca" 
                                    required size="50" class="form-control"
                                     value="<?php echo $alm->__GET('mar'); ?>"><br>
                                           <!-- CASILLA PARA INGRESAR EL PRECIO DEL PRODUCTO  -->
                                    <label for="nom" >Precio de producto :</label>
                                    
                                    <input type="text" name="pre" placeholder="00.00" 
                                    required size="50" class="form-control" 
                                    value="<?php echo $alm->__GET('pre'); ?>"><br>



                                         <!-- CASILLA PARA INGRESAR EL CODIGO DEL PROVEEDOR -->
                                    <label for="codprov" >codigo del proveedor :</label>    
                                    <!-- GENERA UN MENU DESPEGABLE CON UNA LISTA DE OPCIONES DONDE -->
                                    <!-- ESTAN LOS DATOS ALMACENADOS EN LA VARIABLE $CONS Y $CONS2 -->
                                    <!-- QUE CORRESPONDEN A LOS DATOS DE LA BASE DE DATOS -->
                                    <select  required size="1" class="form-control" name="codprov">
                                        <?php  foreach($cons as $r){
                                            $codigo = $r[0];
                                            $nombre = $r[1];
                                            echo"<option value=\"$codigo\">$codigo - $nombre</option>";
                                        }
                                        ?>
                                    </select>
                                         <!-- CASILLA PARA INGRESAR EL CODIGO DE CATEGORIA-->
                                    <label for="codprov" >codigo  categoria :</label>
                                      <select  required size="1" class="form-control" name="codcat">
                                        
                                        <?php  foreach($cons2 as $r){
                                            $codigo = $r[0];
                                            $nombre = $r[1];
                                            echo"<option value=\"$codigo\">$codigo - $nombre</option>";
                                        }
                                        ?>
                                    </select>

                                     <!-- CASILLA PARA INGRESA NUMERO DE STOCK -->
                                     <label for="nom" >Numero de stock :</label>

                                      <input type="text" name="sto" placeholder="Stock" 
                                       required size="50" class="form-control" 
                                       value="<?php echo $alm->__GET('sto'); ?>"><br>
                                    

                                    


                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir Producto"  class="btn btn-info"><br><br>
                                 </center>
                            </form>
                        </div>
                    </div>
                    <script>
                        function confirmdelete(){
                        var respuesta = confirm("estas seguro de eliminar el producto");
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
                            <!-- TABLA PARA MOSTRAR TODOS LOS PRODUCTOS REGISTRADOS -->
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <!-- ENCABEZADO DE LA TABLA  -->
                                        <th>CÓDIGO</th>
                                        <th>NOMBRES</th>
                                        <th>MARCA</th>
                                        <th>PRECIO</th>	
                                        <th>COD_PROV</th>	
                                        <th>COD_CAT</th>	
                                        <th>STOCK</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                  <!-- LISTA LOS OBJETOS DE PRODUCTO EXACTAMENTE EL METODO LISTAR ,PARA MOSTRAR RESULTADOS -->
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <td><?php echo $r->__GET('codpro'); ?></td>
                                    <td><?php echo $r->__GET('nom'); ?></td>
                                    <td><?php echo $r->__GET('mar'); ?></td>
                                    <td><?php echo $r->__GET('pre'); ?></td>
                                    <td><?php echo $r->__GET('codprov'); ?></td>
                                    <td><?php echo $r->__GET('codcat'); ?></td>
                                    <td><?php echo $r->__GET('sto'); ?></td>
                                    <td>
                                        <a href="?action=editar&codpro=<?php echo $r->codpro; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="?action=eliminar&codpro=<?php echo $r->codpro; ?>"  onclick="return confirmdelete() ">Eliminar</a>
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
