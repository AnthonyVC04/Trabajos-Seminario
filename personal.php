<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<?php
    require_once 'personal.entidad.php';
    require_once 'personal.model.php';
    // Logica
    $alm = new Personal();
    $model = new PersonalModel();
    if(isset($_REQUEST['action']))
    {
        switch($_REQUEST['action'])
        {
            case 'actualizar':
                $alm->__SET('codper', $_REQUEST['codper']);
                $alm->__SET('nom', $_REQUEST['nom']);
                $alm->__SET('ape', $_REQUEST['ape']);
                $alm->__SET('dir', $_REQUEST['dir']);
                $alm->__SET('fnac', $_REQUEST['fnac']);
                $alm->__SET('sex', $_REQUEST['sex']);
                $model->Actualizar($alm);
                header('Location: personal.php');
                break;

            case 'registrar':
                $alm->__SET('codper', $_REQUEST['codper']);
                $alm->__SET('nom', $_REQUEST['nom']);
                $alm->__SET('ape', $_REQUEST['ape']);
                $alm->__SET('dir', $_REQUEST['dir']);
                $alm->__SET('fnac', $_REQUEST['fnac']);
                $alm->__SET('sex', $_REQUEST['sex']);               
                $model->Registrar($alm);
                header('Location: personal.php');
                break;
            case 'eliminar':
                $model->Eliminar($_REQUEST['codper']);
                header('Location: personal.php');
                break;
            case 'editar':
                $alm = $model->Obtener($_REQUEST['codper']);
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
        <script type="text/javascript">

  function confirmdelete(){
    var respuesta = confirm("estas seguro de eliminar al Personal");
    if(respuesta == true)
    {
      return true;
    }else{
      return false;
    }
  }

  </script>
	</head>
	<body>
        <div class="container">
           <div class="row">
                <div class="col-md-2">
                    <center>
                        <img src="INICIO/img/img-header/logo-servel-electric.png" class="img img-responsive"><br><br>
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
                                <li class="active"><a href="registro.php">Registro</a></li>
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="?action=<?php echo $alm->codper ?'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                <center><h2>Ingrese los datos requeridos</h2></center>
                                <fieldset class="form-group">
                                    <input type="hidden" name="codper" placeholder="Código " required size="10" class="form-control" value="<?php echo $alm->__GET('codper'); ?>"><br>
                                    <label for="nom" >Nombre de personal :</label>
                                    <input type="text" name="nom" placeholder="Nombre" required size="50" class="form-control" value="<?php echo $alm->__GET('nom'); ?>"><br>
                                    <label for="ape" >Apellido de personal :</label>
                                    <input type="text" name="ape" placeholder="Apellido" required size="50" class="form-control" value="<?php echo $alm->__GET('ape'); ?>"><br>
                                    <label for="dir" >Dirección de personal :</label>
                                    <input type="text" name="dir" placeholder="Dirección" required size="50" class="form-control" value="<?php echo $alm->__GET('dir'); ?>"><br>
                                    <label for="fnac" >Fecha de nacimiento :</label>
                                    <input type="date" name="fnac" placeholder="" required size="50" class="form-control" value="<?php echo $alm->__GET('fnac'); ?>"><br>
                                    <label for="sex" >Sexo de personal :</label>
                                    <input type="text" name="sex" placeholder="M" required size="50" class="form-control" value="<?php echo $alm->__GET('sex'); ?>"><br>
                                    <br>
                                    <br>
                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir Personal" class="btn btn-info"><br><br>
                                 </center>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">	
                            <header>
                                <h2>REGISTRO</h2>
                            </header>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>NOMBRES</th>
                                        <th>APELLIDOS</th>
                                        <th>DIRECCIÓN</th>
                                        <th>FECHA NAC</th>
                                        <th>SEXO</th>	
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <td><?php echo $r->__GET('codper'); ?></td>
                                    <td><?php echo $r->__GET('nom'); ?></td>
                                    <td><?php echo $r->__GET('ape'); ?></td>
                                    <td><?php echo $r->__GET('dir'); ?></td>
                                    <td><?php echo $r->__GET('fnac'); ?></td>
                                    <td><?php echo $r->__GET('sex'); ?></td>
                                    <td>
                                        <a href="?action=editar&codper=<?php echo $r->codper; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="?action=eliminar&codper=<?php echo $r->codper; ?>" onclick="return confirmdelete() ">Eliminar</a>
                                    </td>
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
