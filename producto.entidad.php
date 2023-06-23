<?php
    class Producto
    {
        private $codpro;
        private $nom;
        private $mar;
        private $pre;
        private $codprov;
        private $codcat;
        private $sto;
        
        public function __GET($k){
            return $this->$k;
        }
        public function __SET($k,$v){
            return $this->$k = $v;
        }
    }
?>