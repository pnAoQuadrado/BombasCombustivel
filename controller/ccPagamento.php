<?php

include '../model/daoPagamento.php';
include '../model/daoMes.php';
include '../model/daoAutomovel.php';

extract($_REQUEST);

if (isset($action)) {

    switch ($action) {
        case 'pesquisar':
            {
                $ob = new daoAutomovel();
				$registo=$ob->getAutomoveis($txtPesq);
				
				if($registo == null){
					$resultado = "* Nenhum registo encontrado *";
					$cm = "nao-mostra";
					$acao = "pesquisar";
				}
				else{
					$cm = "mostra";
					$acao = "pagar";
					$id_auto = $registo[0]['idautomovel'];
					$matr = $registo[0]['num_matricula'];
					$matr = strtoupper($matr);
					$nome = $registo[0]['nome'];
					$nome = strtoupper($nome);
					$bi = $registo[0]['num_bi'];
					$bi = strtoupper($bi);
					$tel = $registo[0]['telefone'];
					
				}
				header("Location:../view/pagamento.php");
            }
			break;
		
		case 'pagar':
			{
				$ob = new daoPagamento($id, $data, $mes, $id_auto);
                $ob->pagarSeguro();
                header("Location:../view/bombas.php");
			}
			break;
    }
}
?>