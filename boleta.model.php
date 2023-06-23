<?php
    class BoletaModel
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
              $stm = $this->pdo->prepare("SELECT * FROM boleta");
              $stm->execute();
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                  $alm = new boleta();
                  $alm->__SET('nrobol', $r->nrobol);
                  $alm->__SET('fecbol', $r->fecbol);
                  $alm->__SET('codcli', $r->codcli);
                  $alm->__SET('codper', $r->codper);
                  $alm->__SET('desbol', $r->desbol);
                  $alm->__SET('nombol', $r->nombol);
                  $alm->__SET('idusuario', $r->idusuario);
                  
                  $result[] = $alm;
                }
                return $result;
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
        }
        public function Obtener($cod)
        {
            try
            {
                $stm = $this->pdo->prepare("SELECT * FROM boleta WHERE nrobol = ?");
                $stm->execute(array($cod));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                $alm = new boleta();
                  $alm->__SET('nrobol', $r->nrobol);
                  $alm->__SET('fecbol', $r->fecbol);
                  $alm->__SET('codcli', $r->codcli);
                  $alm->__SET('codper', $r->codper);
                  $alm->__SET('desbol', $r->desbol);
                  $alm->__SET('nombol', $r->nombol);
                  $alm->__SET('idusuario', $r->idusuario);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }
        public function Eliminar($cod)
        {
            try
            {
                $stm = $this->pdo->prepare("DELETE FROM boleta WHERE nrobol = ?");
                $stm->execute(array($cod));
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Actualizar(boleta $data)
        {
            try
            {

                $sql = "UPDATE boleta SET
                fecbol = ?,
                codcli = ?,
                codper = ?,
                desbol = ?,
                nombol = ?,
                idusuario=?
                WHERE nrobol = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                   
                $data->__GET('fecbol'),
                $data->__GET('codcli'),
                $data->__GET('codper'), 
                $data->__GET('desbol'),               
                $data->__GET('nombol'),
                $data->__GET('idusuario'),
                $data->__GET('nrobol') 
                
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Registrar(boleta $data)
        {
            try
            {
                $sql = "INSERT INTO boleta (fecbol,codcli,codper,desbol,nombol,idusuario) VALUES ( ?, ?, ?, ?, ?, ?)";
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('fecbol'),
                $data->__GET('codcli'),
                $data->__GET('codper'),
                $data->__GET('desbol'),
                $data->__GET('nombol'),
                $data->__GET('idusuario'),
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