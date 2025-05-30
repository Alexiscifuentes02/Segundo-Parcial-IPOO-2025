<?php
    class Cliente{
        private $numeroDocumento;
        private $tipoDocumento;

        // Metodo constructor de la clase Cliente
        public function __construct($nNumero,$nTipo){
            $this->numeroDocumento = $nNumero;
            $this->tipoDocumento = $nTipo;
        }

        // Metodos GET de la clase Cliente
        public function getNumeroDocumento(){
            return $this->numeroDocumento;
        }

        public function getTipoDocumento(){
            return $this->tipoDocumento;
        }


        // Metodos SET de la clase Cliente
        public function setNumeroDocumento($nNumero){
            $this->numeroDocumento = $nNumero;
        }

        public function setTipoDocumento($nTipo){
            $this->tipoDocumento = $nTipo;
        }


        // Metodo que muestra la informacion de la clase Cliente
        public function __toString(){
            return "Tipo Documento: ".$this->getTipoDocumento()."\n".
                   "Numero documento: " . $this->getNumeroDocumento(). "\n";
        }
    }