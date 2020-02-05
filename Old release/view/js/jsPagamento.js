
document.getElementById('erro').style.display = 'none';

function validacao(){
    var retorno = true;
    var mes = document.getElementById('cmbMes').selectedIndex;

    if(mes ==null || mes == 0){
        document.getElementById('erro').style.display = 'block';
        document.getElementById('erro').innerHTML = '* Especifique o mês a pagar *';
        retorno = false;
    }

    return retorno;
}