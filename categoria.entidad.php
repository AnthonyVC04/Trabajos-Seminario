<?php

     //definiendo una clase categoria
    class Categoria
    {
        //atributos de la clase 
        private $codcat;
        private $nom;
        private $obs;
        
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