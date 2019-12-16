var erros = document.getElementsByClassName('erro');
for(var i = 0; i < erros.length; i++){
	erros[i].style.display = 'none';
}

// função para validar o formulário de cadastro de autor
function validacao() {

	var erros = document.getElementsByClassName('erro');
	for(var i = 0; i < erros.length; i++){
		erros[i].style.display = 'none';
	}

	var retorno = true; 

	var matricula = document.getElementById('cMatricula').value;
	var prop = document.getElementById('cProp').selectedIndex;

	//(/^\s+$/.test(valor)) --> o texto introduzido não só tenha espaço em branco

	if (matricula == null || matricula.length == 0 || /^\s+$/.test(matricula)) {
		erros[0].style.display = 'block';
		erros[0].innerHTML = 'Digite o número da matrícula';
		retorno = false;
	}

	if (prop == null || prop == 0) {
		erros[1].style.display = 'block';
		erros[1].innerHTML = 'Escolha o proprietário';
		retorno = false;
	}

	return retorno;
}