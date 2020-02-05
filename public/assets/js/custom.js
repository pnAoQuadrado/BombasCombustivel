// JSBombas
document.getElementById('erro').style.display = 'none';
document.getElementById('erro').innerHTML = "";

function validacao(){
   var retorno = true;
   var matricula = document.getElementById('search').value;
   document.getElementById('erro').style.display = 'none';
   document.getElementById('erro').innerHTML = "";

   if(matricula == null || matricula.length == 0 ||  /^\s+$/.test(matricula)){
       document.getElementById('erro').style.display = 'block';
       document.getElementById('erro').innerHTML = "Digite o Nº da chapa de matrícula";
       retorno = false;
   }

   return retorno;
}

// JSHome
//document.getElementById('gb-1').style.display = 'none';
//document.getElementById('gb-2').style.display = 'none';
//document.getElementById('gb-3').style.display = 'none';

// JSPagamento
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