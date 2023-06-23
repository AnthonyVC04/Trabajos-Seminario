<?php
    class ClienteModel
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
        public function Listar(){
            try
            {

              $result = array();
              // esto es una consulta sql
              $stm = $this->pdo->prepare("SELECT * FROM cliente");
              //ejecutar consulta
              $stm->execute();
              //revicion de resultados
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    //objeto cliente
                  $alm = new cliente();
                  //asignar valores  a los atributos
                  $alm->__SET('codcli', $r->codcli);
                  $alm->__SET('nom', $r->nom);
                  $alm->__SET('ape', $r->ape);
                  $alm->__SET('dir', $r->dir);
                  $alm->__SET('fnac', $r->fnac);
                  $alm->__SET('sex', $r->sex);

                  //arreglo recive datos del objeto
                  // devuelve el listado 
                  
                  $result[] = $alm;
                }
                return $result;
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
        }

        // metodo obtener
        public function Obtener($codcli)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("SELECT * FROM cliente WHERE codcli = ?");

                $stm->execute(array($codcli));

                $r = $stm->fetch(PDO::FETCH_OBJ);

                $alm = new cliente();

                $alm->__SET('codcli', $r->codcli);
                $alm->__SET('nom', $r->nom);
                $alm->__SET('ape', $r->ape);
                $alm->__SET('dir', $r->dir);
                $alm->__SET('fnac', $r->fnac);
                $alm->__SET('sex', $r->sex);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }
        /// eliminar
        public function Eliminar($codcli)
        {
            try
            {
                $stm = $this->pdo
                //ejecuta la orden
                ->prepare("DELETE FROM cliente WHERE codcli = ?");
                $stm->execute(array($codcli));
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        //actualizar cliente
        public function Actualizar(cliente $data)
        {
            try
            {

                $sql = "UPDATE cliente SET
                nom = ?,
                ape = ?,
                dir = ?,
                fnac= ?,
                sex = ?
                WHERE codcli = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('nom'),
                $data->__GET('ape'),
                $data->__GET('dir'),                
                $data->__GET('fnac'),
                $data->__GET('sex'),
                $data->__GET('codcli')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        //metodo registrar
        public function Registrar(cliente $data)
        {
            try
            {
                $sql = "INSERT INTO cliente (nom,ape,dir,fnac,sex) VALUES ( ?, ?, ?,?,?)";
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('nom'),
                $data->__GET('ape'),
                $data->__GET('dir'),
                $data->__GET('fnac'),
                $data->__GET('sex'),
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