<?php

use app\classes\Validation;
use app\models\Automovel;
use app\models\Seguro;
use app\models\Taxa;

#$validation = new Validation;
$auto       = new Automovel;
$seguro     = new Seguro;
$taxa       = new Taxa;

$data            = $validation->validate($_POST);
$automovel       = $auto->getAutomovel($data->num_matricula);
$ultMesTaxa      = $taxa->getUltimoMesPagoTaxa($automovel->idautomovel);
$ultTaxaNum      = $taxa->getUltimoMesPagoTaxa_Number($automovel->idautomovel);
$ultMesSeguro    = $seguro->getUltimoMesPagoSeguro($automovel->idautomovel);
$ultMesSeguroNum = $seguro->getUltimoMesPagoSeguro_Number($automovel->idautomovel);
$mes_actual      = strftime("%m");
$mes_taxa        = strtoupper($ultMesTaxa->descricao);
$mes_seg         = strtoupper($ultMesSeguro->descricao);

if($automovel){
    if($ultTaxaNum->idmes >= $mes_actual) {
        $res_taxa = 'Regularizado';
		$cor_label_2 ='texto-verde';
    } else {
        $res_taxa = 'Não Regularizado';
        $cor_label_2 ='texto-vermelho';
    }

    if($ultMesSeguroNum->idmes >= $mes_actual){
        $res_seg = 'Regularizado';
        $cor_label_1 ='texto-verde';
    }
    else{
        $res_seg = 'Não Regularizado';
        $cor_label_1 ='texto-vermelho';
    }

    if($ultMesSeguroNum->idmes < $mes_actual){
        $resultado = "NÃO AUTORIZADO A ABASTECER";
        $cor_res="btn btn-dg";
    }
    else{
        $resultado = "AUTORIZADO A ABASTECER";
        $cor_res="btn btn-success";
    }
    $layout->addLayout('control');
} else {
    $resultado = "ESTE Nº DE MATRÍCULA NÃO EXISTE!";
	$cor_res="btn btn-dg";
    $layout->addLayout('control');
}