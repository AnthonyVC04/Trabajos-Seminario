<?php
    class CategoriaModel
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

        //METODO LISTAR LISTAR
        public function Listar(){
            try
            {

              $result = array();
              //CONSULTA SQL PARA MOSTRAR TODOS LOS DATOS DE CATEGORIA 
              $stm = $this->pdo->prepare("SELECT * FROM categoria");
              //EJECUTAR LA CONSULTA
              $stm->execute();
              //REVICION DE RESULTADOS 
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    //ALMACENA OBJETO CATEGORIA
                  $alm = new categoria();

                  //ASIGNAR VALORES A LOS ATRIBUTOS
                  $alm->__SET('codcat', $r->codcat);
                  $alm->__SET('nom', $r->nom);
                  $alm->__SET('obs', $r->obs);
                  
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
        public function Obtener($codcat)
        {
            try
            {
                //PREPARA UNA SENTECIA DONDE SELLECCIONA LAS COLUMNAS
                //DE TB CATEGORIA  
                $stm = $this->pdo
                ->prepare("SELECT * FROM categoria WHERE codcat= ?");
                //EJECUTA LA ORDEN
                $stm->execute(array($codcat));

                //RECUPERA UNA FILA DE RESULTADOS DE LA CONSULTA QUE SE ALMACENO EN STM
                $r = $stm->fetch(PDO::FETCH_OBJ);
                 //OBJETO CATEGORIA
                $alm = new categoria();
                // Asignar valores a los atributos
                $alm->__SET('codcat', $r->codcat);
                $alm->__SET('nom', $r->nom);
                $alm->__SET('obs', $r->obs);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }

        //METODO ELIMINAR
        public function Eliminar($codcat)
        {
            try
            {
                //PREPRARA CONSULTA 
                $stm = $this->pdo
                ->prepare("DELETE FROM categoria WHERE codcat = ?");
                //EJECUTA LA CONSULTA STM
                $stm->execute(array($codcat));
            } 
            catch (Exception $e)
            {
                //imprime mensaje de error
                die($e->getMessage());
            }
        }

        //METODO ACTUALIZAR
        public function Actualizar(categoria $data)
        {
            try
            {
               //CONSULTA PARA ACTUALIZAR LA TABLA CATEGORIA 
               //ACTUALIZA DOS COLUMNAS 
                $sql = "UPDATE categoria SET
                nom = ?,
                obs = ?
                WHERE codcat = ?";
                //ejecuta la consulta preparada 
                
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('nom'),
                $data->__GET('obs'),
                $data->__GET('codcat')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        
        //METODO REGISTRAR
        public function Registrar(categoria $data)
        {
            try
            {
                //CONSULTA SQL PARA INSERTAR DATOS
                $sql = "INSERT INTO categoria(nom,obs) VALUES ( ?, ?)";
                //EJECUTA LLA CONSULTA PREPARADA 
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('nom'),
                $data->__GET('obs'),
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