<?php
    class ProveedorModel
    {
        private $pdo;
        public function __CONSTRUCT()
        {
            try 
            {
                $this->pdo = new PDO('mysql:host=localhost;dbname=consorcio','root','');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        //METODO LISTAR 
        public function Listar(){
            try
            {

              $result = array();
              //CONSULTA SQL PARA MOSTRAR TODOS LOS DATOS DE PROVEEDOR
              $stm = $this->pdo->prepare("SELECT * FROM proveedor");
               //EJECUTA LA CONSULTA
              $stm->execute();
               //REVICION DE RESULTADOS 
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                     //ALMACENA OBJETO PROVEDOR
                  $alm = new proveedor();
                  //ASIGNAR VALORES A LOS ATRIBUTOS
                  $alm->__SET('codprov', $r->codprov);
                  $alm->__SET('nom', $r->nom);
                  $alm->__SET('rep', $r->rep);
                  $alm->__SET('tel', $r->tel);
                  $alm->__SET('freg', $r->freg);
                  $alm->__SET('dir', $r->dir);
                  $alm->__SET('ema', $r->ema);
                   //ARREGLO QUE RECIBE LOS DATOS DEL OBJETO
                  //DEVUELVE EL LISTADO 
                  $result[] = $alm;
                }
                return $result;
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
        }
            //METODO OBTENER LOS DATOS 
        public function Obtener($codprov)
        {
            try
            {
                //PREPARA UNA SENTECIA DONDE SELLECCIONA LAS COLUMNAS
                //DE TB PROVEEDOR  
                $stm = $this->pdo
                ->prepare("SELECT * FROM proveedor WHERE codprov = ?");
                 //EJECUTA LA ORDEN
                $stm->execute(array($codprov));
                //RECUPERA UNA FILA DE RESULTADOS DE LA CONSULTA QUE SE ALMACENO EN STM
                $r = $stm->fetch(PDO::FETCH_OBJ);
                 //almacena el OBJETO proveedor
                $alm = new proveedor();
                 // Asignar valores a los atributos
                $alm->__SET('codprov', $r->codprov);
                $alm->__SET('nom', $r->nom);
                $alm->__SET('rep', $r->rep);
                $alm->__SET('tel', $r->tel);
                $alm->__SET('freg', $r->freg);
                $alm->__SET('dir', $r->dir);
                $alm->__SET('ema', $r->ema);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }
           //METODO ELIMINAR
        public function Eliminar($codprov)
        {
            try
            {
                //PREPRARA CONSULTA 
                $stm = $this->pdo
                ->prepare("DELETE FROM proveedor WHERE codprov = ?");
                //EJECUTA LA CONSULTA STM
                $stm->execute(array($codprov));
            } 
            catch (Exception $e)
            {
                //imprime mensaje de error
                die($e->getMessage());
            }
        }
        
         //METODO ACTUALIZAR
        public function Actualizar(proveedor $data)
        {
            try
            {

                //CONSULTA PARA ACTUALIZAR LA TABLA CATEGORIA 
               //ACTUALIZA las COLUMNAS 
                $sql = "UPDATE proveedor SET 
                nom = ?,
                rep = ?,
                tel = ?,
                freg = ?,
                dir = ?,
                ema = ?
                WHERE codprov = ?";
                //ejecuta la consulta preparada 
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('nom'),
                $data->__GET('rep'),
                $data->__GET('tel'), 
                $data->__GET('freg'),               
                $data->__GET('dir'),
                $data->__GET('ema'),
                $data->__GET('codprov')
                
              
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

        //METODO REGISTRAR
        public function Registrar(proveedor $data)
        {
            try
            {
                //CONSULTA SQL PARA INSERTAR DATOS
                $sql = "INSERT INTO proveedor (nom,rep,tel,freg,dir,ema) VALUES ( ?, ?, ?, ?, ?, ?)";
                //EJECUTA LA CONSULTA PREPARADA 
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('nom'),
                $data->__GET('rep'),
                $data->__GET('tel'),
                $data->__GET('freg'),
                $data->__GET('dir'),
                $data->__GET('ema'),
                )
                );
            }   
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
    }   
?>