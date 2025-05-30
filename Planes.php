<?php
    class Planes{
        private $codigo;
        private $arrayCanales;
        private $importe;
        private $incluyeDatos;
        private $mgDatos;

        // Metodo constructor de la clase Planes
        public function __construct($nCodigo,$nImporte,$incluye){
            $this->codigo = $nCodigo;
            $this->arrayCanales= [];
            $this->importe = $nImporte;
            $this->incluyeDatos = $incluye;
            $this->mgDatos = 100;
        }


        // Metodos GET de la clase Planes
        public function getCodigo(){
            return $this->codigo;
        }

        public function getArrayCanales(){
            return $this->arrayCanales;
        }

        public function getImporte(){
            return $this->importe;
        }

        public function getIncluyeDatos(){
            return $this->incluyeDatos;
        }

        public function getDatos(){
            return $this->mgDatos;
        }


        // Metodos SET de la clase Planes
        public function setCodigo($nCodigo){
            $this->codigo = $nCodigo;
        }

        public function setArrayCanales($colCanales){
            $this->arrayCanales = $colCanales;
        }

        public function setImporte($nImporte){
            $this->importe = $nImporte;
        }

        public function setIncluyeDatos($incluye){
            $this->incluyeDatos = $incluye;
        }

        public function setDatos($nDatos){
            $this->mgDatos = $nDatos;
        }


        // Metodo que muestra la informacion de la clase Planes
        public function __toString(){
            return "Codigo: ".$this->getCodigo()."\n". 
                   "Canales: ".$this->mostrarCanales()."\n".
                   "Importe: ".$this->getImporte()."\n". 
                   "Incluye Datos: ".$this->getIncluyeDatos()."\n". 
                   "Datos: ".$this->getDatos()."\n";
        }


        // Metodo que muestra la coleccion de X
        public function mostrarCanales(){
            $cadena = "";
            $colCanales = $this->getArrayCanales();
            foreach($colCanales as $canal){
                $cadena = $cadena. $canal. "\n";
            }
            return $cadena;
        }
    }