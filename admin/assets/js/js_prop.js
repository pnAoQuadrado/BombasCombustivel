var erros = document.getElementsByClassName('erro');
for(var i = 0; i < erros.length; i++){
	erros[i].style.display = 'none';
}

// função para validar o formulário de cadastro de proprietários
function validacao() {

	var erros = document.getElementsByClassName('erro');
	for(var i = 0; i < erros.length; i++){
		erros[i].style.display = 'none';
	}

	var retorno = true; 

	var nome = document.getElementById('cNome').value;
	var bi = document.getElementById('cBi').value;
    var tel = document.getElementById('cTel').value;

	//(/^\s+$/.test(valor)) --> o texto introduzido não só tenha espaço em branco
	if (nome == null || nome.length == 0 || /^\s+$/.test(nome)) {
		erros[0].style.display = 'block';
		erros[0].innerHTML = 'Digite o nome do proprietário';
		retorno = false;
	}

    if (bi == null || bi.length == 0 || /^\s+$/.test(bi)) {
		erros[1].style.display = 'block';
		erros[1].innerHTML = 'Digite o número do bilhete';
		retorno = false;
    }
    
    if (tel == null || tel.length == 0 || /^\s+$/.test(tel)) {
		erros[2].style.display = 'block';
		erros[2].innerHTML = 'Digite o número de telefone';
		retorno = false;
    }
    else if(isNaN(tel)){
        erros[2].style.display = 'block';
		erros[2].innerHTML = 'Este campo não pode ter números';
		retorno = false;
    }
    else if(tel.length > 9){
        erros[2].style.display = 'block';
		erros[2].innerHTML = 'Este campo tem números em excesso';
		retorno = false; 
    }
    
	return retorno;
}