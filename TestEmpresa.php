<?php
    include_once 'Cliente.php';
    include_once 'Canales.php';
    include_once 'Planes.php';
    include_once 'Contrato.php';
    include_once 'ContratoWeb.php';
    include_once 'Empresa.php';

    
    $objetoEmpresa= new Empresa();


    $objetoCanal1 = new Canales("Noticias",60000,true);
    $objetoCanal2 = new Canales("Noticias",40000,true);
    $objetoCanal3 = new Canales("Musical",20000,true);


    $objetoPlan1 = new Planes(111,12450,true);
    $objetoPlan2 = new Planes(222,10000,false);
   
    $objetoCliente = new Cliente(51259145,"DNI");

    $objetoContrato1 = new Contrato(("2023/08/26"),("2024/03/10"),$objetoPlan1,"MOROSO",104590,false,$objetoCliente,12450);
    $objetoContrato2 = new ContratoWeb(("2020/05/13"),("2025/08/05"),$objetoPlan2,"SUSPENDIDO",190490,true,$objetoCliente,17680);
    $objetoContrato3 = new ContratoWeb(("2022/11/16"),("2026/04/03"),$objetoPlan1,"AL DIA",112450,false,$objetoCliente,10849);

    $importe1 = $objetoContrato1->calcularImporte();
    echo $importe1;

    $importe2 = $objetoContrato2->calcularImporte();
    echo $importe1;

    $importe3 = $objetoContrato3->calcularImporte();
    echo $importe1;

    $nuevoPlan = $objetoEmpresa->incorporarPlan($objetoPlan1);

    $nuevoContrato = $objetoEmpresa->incorporarContrato($objetoPlan2,$objetoCliente,("2025/05/30"),("2025/06/29"),false);
    $nuevoContrato2 = $objetoEmpresa->incorporarContrato($objetoPlan1,$objetoCliente,("2025/05/30"),("2025/06/29"),true);
    
    $pagoContrato = $objetoEmpresa->pagarContrato(12450);
    $pagoContrato2 = $objetoEmpresa->pagarContrato(10849);

    $importeContratos = $objetoEmpresa->retornarPromImporteContratos(111);

    // 4)
    echo $objetoFinanciera;

    // 5)


    // 6)


    // 7) 


    // 8)


    // 9) 


    // 10)


    // 11)
    

    // 12)
 
