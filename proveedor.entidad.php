<?php
    //definiendo una clase categoria
    class Proveedor
    {
         //atributos de la clase 
        private $codprov;
        private $nom;
        private $rep;
        private $tel;
        private $freg;
        private $dir;
        private $ema;
        
        //getter
        public function __GET($k){
            return $this->$k;
        }
        //setter
        public function __SET($k,$v){
            return $this->$k = $v;
        }
    }
?>