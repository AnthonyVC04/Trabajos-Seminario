<?php
    include ('serv.php');

    class ProductoModel
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
              $stm = $this->pdo->prepare("SELECT * FROM producto");
              $stm->execute();
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                  $alm = new producto();
                  $alm->__SET('codpro', $r->codpro);
                  $alm->__SET('nom', $r->nom);
                  $alm->__SET('mar', $r->mar);
                  $alm->__SET('pre', $r->pre);
                  $alm->__SET('codprov', $r->codprov);
                  $alm->__SET('codcat', $r->codcat);
                  $alm->__SET('sto', $r->sto);
                  
                  $result[] = $alm;
                }
                return $result;
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
        }
        public function Obtener($codpro)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("SELECT * FROM producto WHERE codpro = ?");
                $stm->execute(array($codpro));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                $alm = new producto();
                $alm->__SET('codpro', $r->codpro);
                $alm->__SET('nom', $r->nom);
                $alm->__SET('mar', $r->mar);
                $alm->__SET('pre', $r->pre);
                $alm->__SET('codprov', $r->codprov);
                $alm->__SET('codcat', $r->codcat);
                $alm->__SET('sto', $r->sto);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }
        public function Eliminar($codpro)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("DELETE FROM producto WHERE codpro = ?");
                $stm->execute(array($codpro));
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Actualizar(producto $data)
        {
            try
            {

                $sql = "UPDATE producto SET
                nom = ?,
                mar = ?,
                pre = ?,
                codprov = ?,
                codcat = ?,
                sto = ?
                WHERE codpro = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('nom'),
                $data->__GET('mar'),
                $data->__GET('pre'),               
                $data->__GET('codprov'),
                $data->__GET('codcat'),
                $data->__GET('sto'),
                $data->__GET('codpro')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Registrar(producto $data)
        {
            try
            {
                $sql = "INSERT INTO producto (nom,mar,pre,codprov,codcat,sto) VALUES ( ?, ?, ?, ?, ?, ?)";
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('nom'),
                $data->__GET('mar'),
                $data->__GET('pre'),
                $data->__GET('codprov'),
                $data->__GET('codcat'),
                $data->__GET('sto'),
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