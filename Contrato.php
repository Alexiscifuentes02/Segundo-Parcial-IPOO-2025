<?php
    class Contrato{
        private $fechaInicio;
        private $fechaVencimiento;
        private $objetoPlan;
        private $estado;
        private $costo;
        private $renueva;
        private $objetoCliente;
        private $codigoContrato;

        // Metodo constructor de la clase Contrato
        public function __construct($inicio,$vencimiento,$objPlan,$nEstado,$nCosto,$renueva,$objCliente,$nCodigo){
            $this->fechaInicio = $inicio;
            $this->fechaVencimiento = $vencimiento;
            $this->objetoPlan = $objPlan;
            $this->estado = $nEstado;
            $this->costo = $nCosto;
            $this->renueva = $renueva;
            $this->objetoCliente = $objCliente;
            $this->codigoContrato = $nCodigo;

        }


        // Metodos GET de la clase Contrato
        public function getFechaInicio(){
            return $this->fechaInicio;
        }

        public function getFechaVencimiento(){
            return $this->fechaVencimiento;
        }

        public function getObjetoPlan(){
            return $this->objetoPlan;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function getCosto(){
            return $this->costo;
        }

        public function getRenueva(){
            return $this->renueva;
        }

        public function getObjetoCliente(){
            return $this->objetoCliente;
        }

        public function getCodigo(){
            return $this->codigoContrato;
        }


        // Metodos SET de la clase Contrato
        public function setFechaInicio($inicio){
            $this->fechaInicio = $inicio;
        }

        public function setFechaVencimiento($vencimiento){
            $this->fechaVencimiento = $vencimiento;
        }

        public function setObjetoPlan($objPlan){
            $this->objetoPlan = $objPlan;
        }

        public function setEstado($nEstado){
            $this->estado = $nEstado;
        }

        public function setCosto($nCosto){
            $this->costo = $nCosto;
        }

        public function setRenueva($renueva){
            $this->renueva = $renueva;
        }

        public function setObjetoCliente($objCliente){
            $this->objetoCliente = $objCliente;
        }

        public function setCodigo($nCodigo){
            $this->codigoContrato = $nCodigo;
        }


        // Metodo que muestra la informacion de la clase Contrato
        public function __toString(){
            return "FechaInicio: ".$this->getFechaInicio()."\n". 
                   "Fecha Vencimiento: ".$this->getFechaVencimiento()."\n".
                   "Plan: \n".$this->getObjetoPlan()."\n". 
                   "Estado: ".$this->getEstado()."\n". 
                   "Costo: ".$this->getCosto()."\n". 
                   "Renueva: ".$this->getRenueva()."\n".
                   "Cliente: \n".$this->getObjetoCliente()."\n". 
                   "Codigo Contrato: ".$this->getCodigo()."\n";
        }



        //
        public function diasContratoVencido(){
            $fechaActual = new DateTime('2025-06-30');
            $fechaVencimiento = $this->getFechaVencimiento();
            if($fechaVencimiento < $fechaActual){
                 $resultado = $fechaActual->diff($fechaVencimiento);
            }else{
                 $resultado = 0;
            }
            return $resultado;
       }

        // 
        public function actualizarEstadoContrato(){
            $estado = $this->getEstado();
            $dias = $this->diasContratoVencido();
            if($dias == 0){
                $estado = "AL DIA";
            }elseif($dias > 0 && $dias < 10){
                $estado = "MOROSO";
            }elseif($dias > 10){
                $estado = "SUSPENDIDO";
            }else{
                $estado = "FINALIZADO";
            }
            $this->setEstado($estado);
            return $estado;
        }

        //
        public function calcularImporte(){
            $importeCanales = 0;
            $importePlan = $this->getObjetoPlan()->getImporte();
            $colCanales = $this->getObjetoPlan()->getArrayCanales();
            foreach($colCanales as $canal){
                $importeCanales += $canal->getImporte();
            }
            $importeFinal = $importePlan + $importeCanales;
            return $importeFinal;
        }
    }