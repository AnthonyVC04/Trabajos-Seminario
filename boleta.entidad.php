<?php
//definiendo una clase : cliente
    class Boleta
    {
        // atributos de la clase 
        private $nrobol;
        private $fecbol;
        private $codcli;
        private $codper;
        private $desbol;
        private $nombol;
        private $idusuario;

        // gets
        
        public function __GET($k){
            return $this->$k;
        }
        //sets
        public function __SET($k,$v){
            return $this->$k = $v;
        }
    }
?>