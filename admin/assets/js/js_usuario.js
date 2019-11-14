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
	var senha = document.getElementById('cSenha').value;
	var user = document.getElementById('cUser').value;
	var conf_senha = document.getElementById('cConf').value;
	var permissao = document.getElementById('cPerm').selectedIndex;
	var acao = document.getElementById('b_acao').value;

	//(/^\s+$/.test(valor)) --> o texto introduzido não só tenha espaço em branco
	if (nome == null || nome.length == 0 || /^\s+$/.test(nome)) {
		erros[0].style.display = 'block';
		erros[0].innerHTML = 'Digite o nome do proprietário';
		retorno = false;
	}

	if(acao != 'alterar' && acao != 'eliminar'){
		if (senha == null || senha.length == 0 || /^\s+$/.test(senha)) {
			erros[1].style.display = 'block';
			erros[1].innerHTML = 'Digite a senha';
			retorno = false;
		}
	}
    
    
    if (user == null || user.length == 0 || /^\s+$/.test(user)) {
		erros[2].style.display = 'block';
		erros[2].innerHTML = 'Digite o nome de usuário';
		retorno = false;
	}
	
	if(acao != 'alterar' && acao != 'eliminar'){
		if (conf_senha == null || conf_senha.length == 0 || /^\s+$/.test(conf_senha)) {
			erros[3].style.display = 'block';
			erros[3].innerHTML = 'Confirma a senha';
			retorno = false;
		}
		else if (senha != conf_senha) {
			erros[3].style.display = 'block';
			erros[3].innerHTML = 'Senha não confirmada';
			retorno = false;
		}
	}
	
	if(permissao == null || permissao == 0){
		erros[4].style.display = 'block';
		erros[4].innerHTML = 'Escolha a permissão';
		retorno = false;
	}
	return retorno;
}