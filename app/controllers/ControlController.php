<?php

namespace App\controllers;

use App\models\Automovel;
use App\models\Seguro;
use App\models\Taxa;

class ControlController extends Controller {

    public function index($data) {
        $this->SetPageTitle("Control");

        $auto   = new Automovel;
        $seguro = new Seguro;
        $taxa   = new Taxa;

        $automovel       = $auto->getAutomovel($data->num_matricula);
        $ultMesTaxa      = $taxa->getUltimoMesPagoTaxa($automovel->idautomovel);
        $ultTaxaNum      = $taxa->getUltimoMesPagoTaxa_Number($automovel->idautomovel);
        $ultMesSeguro    = $seguro->getUltimoMesPagoSeguro($automovel->idautomovel);
        $ultMesSeguroNum = $seguro->getUltimoMesPagoSeguro_Number($automovel->idautomovel);
        $mes_actual      = strftime("%m");
        $mes_taxa        = strtoupper($ultMesTaxa->descricao);
        $mes_seg         = strtoupper($ultMesSeguro->descricao);

        $this->viewContent->automovel = $automovel;
        $this->viewContent->mes_taxa  = $mes_taxa;
        $this->viewContent->mes_seg   = $mes_seg;
        
        if($automovel){
            if($ultTaxaNum->idmes >= $mes_actual) {
                $this->viewContent->res_taxa = 'Regularizado';
                $this->viewContent->cor_label_2 ='texto-verde';
            } else {
                $this->viewContent->res_taxa = 'Não Regularizado';
                $this->viewContent->cor_label_2 ='texto-vermelho';
            }

            if($ultMesSeguroNum->idmes >= $mes_actual){
                $this->viewContent->res_seg = 'Regularizado';
                $this->viewContent->cor_label_1 ='texto-verde';
            }
            else{
                $this->viewContent->res_seg = 'Não Regularizado';
                $this->viewContent->cor_label_1 ='texto-vermelho';
            }

            if($ultMesSeguroNum->idmes < $mes_actual){
                $this->viewContent->resultado = "NÃO AUTORIZADO A ABASTECER";
                $this->viewContent->cor_res="btn btn-dg";
            }
            else{
                $this->viewContent->resultado = "AUTORIZADO A ABASTECER";
                $this->viewContent->cor_res="btn btn-success";
            }
        } else {
            $this->viewContent->resultado = "ESTE Nº DE MATRÍCULA NÃO EXISTE!";
            $this->viewContent->cor_res="btn btn-dg";
        }
        $this->RenderView("control", "layouts/main");
    }
}