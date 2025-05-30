<?php
    class Canales{
        private $tipoCanal;
        private $importe;
        private $esHd;

        // Metodo constructor de la clase Canales
        public function __construct($nTipo,$nImporte,$esHd){
            $this->tipoCanal = $nTipo;
            $this->importe = $nImporte;
            $this->esHd = $esHd;
        }


        // Metodos GET de la clase Canales
        public function getTipoCanal(){
            return $this->tipoCanal;
        }

        public function getImporte(){
            return $this->importe;
        }

        public function getEsHd(){
            return $this->esHd;
        }



        // Metodos SET de la clase Canales
        public function setTipoCanal($nTipo){
            $this->tipoCanal = $nTipo;
        }

        public function setImporte($nImporte){
            $this->importe = $nImporte;
        }

        public function setEsHd($esHd){
            $this->esHd = $esHd;
        }


        // Metodo que muestra la informacion de la clase Canales
        public function __toString(){
            return "Tipo Canal: ".$this->getTipoCanal()."\n". 
                   "Importe: ".$this->getImporte()."\n". 
                   "Es HD?: ".$this->getEsHd()."\n";
        }

    }