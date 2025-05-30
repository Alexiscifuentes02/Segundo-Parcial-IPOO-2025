<?php
    class Empresa{
        private $arrayPlanes;
        private $arrayCanales;
        private $arrayClientes;
        private $arrayContratos;

        // Metodo constructor de la clase Empresa
        public function __construct(){
            $this->arrayPlanes = [];
            $this->arrayCanales = [];
            $this->arrayClientes = [];
            $this->arrayContratos = [];
        }


        // Metodos GET de la clase Empresa
        public function getArrayPlanes(){
            return $this->arrayPlanes;
        }

        public function getArrayCanales(){
            return $this->arrayCanales;
        }

        public function getArrayClientes(){
            return $this->arrayClientes;
        }

        public function getArrayContratos(){
            return $this->arrayContratos;
        }


        // Metodos SET de la clase Empresa
        public function setArrayPlanes($colPlanes){
            $this->arrayPlanes = $colPlanes;
        }

        public function setArrayCanales($colCanales){
            $this->arrayCanales = $colCanales;
        }

        public function setArrayClientes($colClientes){
            $this->arrayClientes = $colClientes;
        }

        public function setArrayContratos($colContratos){
            $this->arrayContratos = $colContratos;
        }


        // Metodo que muestra la informacion de la clase Empresa
        public function __toString(){
            return "Planes: ".$this->mostrarPlanes()."\n". 
                   "Canales: ".$this->mostrarCanales()."\n".
                   "Clientes: \n".$this->mostrarClientes()."\n". 
                   "Contratos: \n".$this->mostrarContratos()."\n";
        }

        // Metodo que muestra la coleccion de Empresa
        public function mostrarPlanes(){
            $cadena = "";
            $colPlanes = $this->getArrayPlanes();
            foreach($colPlanes as $plan){
                $cadena = $cadena. $plan. "\n";
            }
            return $cadena;
        }

        // Metodo que muestra la coleccion de Empresa
        public function mostrarCanales(){
            $cadena = "";
            $colCanales = $this->getArrayCanales();
            foreach($colCanales as $canal){
                $cadena = $cadena. $canal. "\n";
            }
            return $cadena;
        }

        // Metodo que muestra la coleccion de Empresa
        public function mostrarClientes(){
            $cadena = "";
            $colClientes = $this->getArrayClientes();
            foreach($colClientes as $cliente){
                $cadena = $cadena. $cliente. "\n";
            }
            return $cadena;
        }

        // Metodo que muestra la coleccion de Empresa
        public function mostrarContratos(){
            $cadena = "";
            $colContratos = $this->getArrayContratos();
            foreach($colContratos as $contrato){
                $cadena = $cadena. $contrato. "\n";
            }
            return $cadena;
        }

        // 
        public function incorporarPlan($nuevoPlan){
            $colPlanes = $this->getArrayPlanes();
            $i = 0;
            $encontrado = false;
            while($i < count($colPlanes) && !$encontrado){
                $plan = $colPlanes[$i];
                $canalesPlan = $plan->getArrayCanales();
                $datosPlan = $plan->getDatos();
                if($nuevoPlan->getArrayCanales() == $canalesPlan || $nuevoPlan->getDatos() ==  $datosPlan){
                    $encontrado = true;
                }
                $i++;
            }

            if(!$encontrado){
                array_push($colPlanes,$nuevoPlan);
                $this->setArrayPlanes($colPlanes);
            }
        }

        //
        public function BuscarContrato($tipoDoc,$numDoc){
            $colContratos = $this->getArrayContratos();
            $encontrado = false;
            $objContrato = null;
            $i = 0;
            while($i < count($colContratos) && !$encontrado){
                $cliente = $colContratos[$i]->getObjetoCliente(); 
                $numeroDocumento = $cliente->getNumeroDocumento();
                $tipoDocumento = $cliente->getTipoDocumento();
                if($numeroDocumento == $numDoc && $tipoDocumento == $tipoDoc){
                    $encontrado = true;
                    $objContrato = $colContratos[$i];
                }
                $i++;
            }
            return $objContrato;
        }

        // 
        public function incorporarContrato($objPlan,$objCliente,$fechaInicio,$fechaVencimiento,$esWeb){
            $numeroDocumento = $objCliente->getNumeroDocumento();
            $tipoDocumento = $objCliente->getTipoDocumento();
            $colContratos = $this->getArrayContratos();
            $contratoEncontrado = $this->BuscarContrato($numeroDocumento,$tipoDocumento);
            if($contratoEncontrado == null){
                if($esWeb){
                    $nuevoContrato = new ContratoWeb($fechaInicio,$fechaVencimiento,$objPlan,"AL DIA",60000,true,$objCliente,000);
                }else{
                    $nuevoContrato = new Contrato($fechaInicio,$fechaVencimiento,$objPlan,"AL DIA",60000,true,$objCliente,000);
                }
                array_push($colContratos,$nuevoContrato);
                $this->setArrayContratos($colContratos);
            }
        }

        //
        public function retornarPromImporteContratos($codigo){
            $promedio = 0;
            $cantPlanes = 0;
            $suma = 0;
            $colPlanes = $this->getArrayPlanes();
            foreach($colPlanes as $plan){
                $codigoPlan = $plan->getCodigo();
                if($codigo == $codigoPlan){
                    $cantPlanes++;
                    $importe = $plan->getImporte();
                    $suma += $importe;
                }
            }

            if($cantPlanes > 0){
                $promedio = $suma / $cantPlanes;
            }

            return $promedio;
        }

        // 
        public function pagarContrato($nCodigo){
            $i = 0;
            $encontrado = false;
            $importe = 0;
            $colContratos = $this->getArrayContratos();
            while($i < count($colContratos) && !$encontrado){
                if($nCodigo == $colContratos[$i]->getCodigo()){
                    $colContratos[$i]->actualizarEstadoContrato();
                    $importe = $colContratos[$i]->calcularImporte();
                    $encontrado = true;
                }

                $i++;
            }
            return $importe;
        }
    }