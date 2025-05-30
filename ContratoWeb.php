<?php 
    class ContratoWeb  extends Contrato{
        private $porcentajeDescuento;

        // Metodo constructor de la clase ContratoWeb
        public function __construct($inicio,$vencimiento,$objPlan,$nEstado,$nCosto,$renueva,$objCliente,$codigo){
            parent::__construct($inicio,$vencimiento,$objPlan,$nEstado,$nCosto,$renueva,$objCliente,$codigo);
            $this->porcentajeDescuento = 0.10;
        }

        // Metodo GET de la clase ContratoWeb
        public function getDescuento(){
            return $this->porcentajeDescuento;
        }


        // Metodo SET de la clase ContratoWeb
        public function setDescuento($nDescuento){
            $this->porcentajeDescuento = $nDescuento;
        }


        // Metodo que muestra la informacion de la clase ContratoWeb
        public function __toString(){
            $cadena = parent::__toString();
            return $cadena. "Porcentaje de Descuento: ".$this->getDescuento()."\n".  
                            "----------------------------------------\n";
        }

        // Metodo que retorna el coeficiente del X
        public function calcularImporte(){
            $importe = parent::calcularImporte();
            $descuento = $importe * $this->getDescuento();
            $importeFinal = $importe - $descuento;
            return $importeFinal;
        }
    }