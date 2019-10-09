
 document.getElementById('erro').style.display = 'none';
 document.getElementById('erro').innerHTML = "";

function validacao(){
    var retorno = true;
    var matricula = document.getElementById('search').value;
    document.getElementById('erro').style.display = 'none';
    document.getElementById('erro').innerHTML = "";

    if(matricula == null || matricula.length == 0 ||  /^\s+$/.test(matricula)){
        document.getElementById('erro').style.display = 'block';
        document.getElementById('erro').innerHTML = "* Digite o Nº da chapa de matrícula *";
        retorno = false;
    }

    return retorno;
}