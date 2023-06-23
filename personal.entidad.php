<?php
//definiendo una clase : cliente
    class Personal
    {
        // atributos de la clase 
        private $codper;
        private $nom;
        private $ape;
        private $dir;
        private $fnac;
        private $sex;

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