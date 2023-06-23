<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
   <!-- llamamos a la funcion de conexion -->
   <?php 
                         include ('serv.php');
                         $res=$db->prepare("SELECT * FROM cliente");
                         $res1=$db->prepare("SELECT * FROM personal");
                         $res2=$db->prepare("SELECT * FROM usuario");

                         $res->execute();
                         $res1->execute();
                         $res2->execute();
                                      
    ?>
                        <!-- termina la llamada -->
<?php
    require_once 'boleta.entidad.php';
    require_once 'boleta.model.php';
    // Logica
    $alm = new Boleta();
    $model = new BoletaModel();
    if(isset($_REQUEST['action']))
    {
        switch($_REQUEST['action'])
        {
            case 'actualizar':
                $alm->__SET('nrobol', $_REQUEST['nrobol']);
                $alm->__SET('fecbol', $_REQUEST['fecbol']);
                $alm->__SET('codcli', $_REQUEST['codcli']);
                $alm->__SET('codper', $_REQUEST['codper']);  
                $alm->__SET('desbol', $_REQUEST['desbol']); 
                $alm->__SET('nombol', $_REQUEST['nombol']); 
                $alm->__SET('idusuario', $_REQUEST['idusuario']); 
                             
                $model->Actualizar($alm);
                header('Location: boleta.php');
                break;

            case 'registrar':
                $alm->__SET('nrobol', $_REQUEST['nrobol']);
                $alm->__SET('fecbol', $_REQUEST['fecbol']);
                $alm->__SET('codcli', $_REQUEST['codcli']);
                $alm->__SET('codper', $_REQUEST['codper']);  
                $alm->__SET('desbol', $_REQUEST['desbol']); 
                $alm->__SET('nombol', $_REQUEST['nombol']); 
                $alm->__SET('idusuario', $_REQUEST['idusuario']); 
                              
                $model->Registrar($alm);
                header('Location: boleta.php');
                break;
            case 'eliminar':
                $model->Eliminar($_REQUEST['nrobol']);
                header('Location: boleta.php');
                break;
            case 'editar':
                $alm = $model->Obtener($_REQUEST['nrobol']);
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
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
        <div class="container">
           <div class="row">
                <div class="col-md-2">
                    <center>
                        <img src="INICIO/img/img-header/logo-servel-electric.png" class="img img-responsive"><br><br>
                        <a href="#" class="btn btn-info" role="button">Foros</a><br> <br> 
                        <a href="#" class="btn btn-info" role="button">Personal</a><br><br> 
                        <a href="#" class="btn btn-info" role="button">Normas técnicas</a><br> <br>
                        <a href="#" class="btn btn-info" role="button">Boletines</a><br> <br>
                        <a href="#" class="btn btn-info" role="button">Sistema ISO</a> <br><br>
                        <a href="#" class="btn btn-info" role="button">Sugerencias</a> <br><br>
                        <a href="logout.php" class="btn btn-info" role="button">Cerrar sesión</a> <br>

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
                                <li class="active"><a href="registro.php">Registro</a></li>
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                     


                    <div class="row">
                        <div class="col-md-12">
                            <form action="?action=<?php echo $alm->nrobol ?'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                <center><h2>Ingrese los datos requeridos</h2></center>
                                <fieldset class="form-group">

                                    <input type="hidden" name="nrobol" placeholder="Código "
                                     required size="10" class="form-control"
                                      value="<?php echo $alm->__GET('nrobol'); ?>"><br>

                                      

                                    <!-- otra consulta llamar a la funcion de conexion-->

                                    <label for="codcli" >Codigo del Cliente :</label>

                                    <select name="codcli" values="<?php echo $alm->__GET('codcli'); ?>" 
                                             size="1" class="form-control" >
                                    <option required >seleccione cliente</option>
                                    <?php 
                                       foreach($res  as $r){

                                        echo"<option values=".$r[0].">".$r[0].":" .$r["nom"]."</option>";
                                       }
                                      ?>
                                      
                                     </select>

                                    <br>
                                    <br>
                                    <label for="codper" >Codigo del Personal:</label>

                                    <select name="codper" values="<?php echo $alm->__GET('codper'); ?>" 
                                         size="1" class="form-control">
                                    <option required>Seleccione Personal</option>
                                    <?php 
                                       foreach($res1  as $r){
                                        echo"<option values=".$r[0].">".$r[0].":" .$r["nom"]."</option>";
                                       }
                                      ?>
                                      
                                     </select>
                                  
                                    <br><br>

                                    
                                    <label  for="idusuario" >Id usuario :</label>   
                                    <select name="idusuario" values="<?php echo $alm->__GET('idusuario'); ?>" 
                                             size="1" class="form-control">
                                    <option required>Seleccione Usuario</option>
                                    <?php 
                                       foreach($res2  as $r){
                                        echo"<option values=".$r[0].">".$r[0].":" .$r["usuario"]."</option>";
                                       }                                     
                                      ?>
                                      
                                     </select>
                                     <br>
                                     <br>

                                     <label for="fecbol" >Fecha de boleta :</label>
                                    <input type="date" name="fecbol" placeholder="" 
                                    required size="10" class="form-control" 
                                    value="<?php echo $alm->__GET('fecbol'); ?>"><br>


                                     <label for="desbol" >Descripcion de la Boleta :</label>
                                    
                                    <input type="text" name="desbol" placeholder="descripcion-del-boleta" 
                                    required size="10" class="form-control" 
                                    value="<?php echo $alm->__GET('desbol'); ?>"><br>

                                    <label for="nombol" >Nombre del cliente :</label>
                                    
                                    <input type="text" name="nombol" placeholder="nombre-cliente" 
                                    required size="10" class="form-control" 
                                    value="<?php echo $alm->__GET('nombol'); ?>"><br>

                                    
                                    

                                    

                                    
                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir-boleta"><br><br>
                                 </center>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">	
                            <header>
                                <h2>REGISTRO</h2>
                            </header>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>NRO-BOLETA</th>
                                        <th>FECH-BOLETA</th>
                                        <th>COD-CLI</th>
                                        <th>COD-PER</th>	
                                        <th>DES-BOL</th>	
                                        <th>NOM-BOL</th>	
                                        <th>ID-USUARIO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <td><?php echo $r->__GET('nrobol'); ?></td>
                                    <td><?php echo $r->__GET('fecbol'); ?></td>
                                    <td><?php echo $r->__GET('codcli'); ?></td>
                                    <td><?php echo $r->__GET('codper'); ?></td>
                                    <td><?php echo $r->__GET('desbol'); ?></td>
                                    <td><?php echo $r->__GET('nombol'); ?></td>
                                    <td><?php echo $r->__GET('idusuario'); ?></td>
                                    <td>
                                        <a href="?action=editar&nrobol=<?php echo $r->nrobol; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="?action=eliminar&nrobol=<?php echo $r->nrobol; ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="col-md-1">
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