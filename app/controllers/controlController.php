<?php

use app\classes\Validation;
use app\models\Automovel;
use app\models\Seguro;
use app\models\Taxa;

$validation = new Validation;
$auto       = new Automovel;
$seguro     = new Seguro;
$taxa       = new Taxa;

$data       = $validation->validate($_POST);
$automovel  = $auto->getAutomovel($data->num_matricula);
$ultMesTaxa = $taxa->getUltimoMesPagoTaxa($automovel->idautomovel);
$ultTaxaNum = $taxa->getUltimoMesPagoTaxa_Number($automovel->idautomovel);

dd($ultTaxaNum);

if($automovel){
    $layout->addLayout('control');
} else {
    $resultado = "ESTE Nº DE MATRÍCULA NÃO EXISTE!";
	$cor_res="btn btn-dg";
    $layout->addLayout('control');
}