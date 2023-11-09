//------------------------ Functions de apoio ------------------------------------------------------------------//////
function id(el) {
    return document.getElementById(el);
}

function incluir_error(id_) {
    id(id_).classList.add('error_input');
}

function remover_error(id_) {
    id(id_).classList.remove('error_input');
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////          MASCARAS                      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////// Regex das mascaras /////////////////////////
function masktel(v) {
    v = v.replace(/\D/g, "")
    v = v.replace(/^(\d)/, "+$1")
    v = v.replace(/(.{3})(\d)/, "$1 ($2")
    v = v.replace(/(.{7})(\d)/, "$1) $2")
    if (v.length == 12) {
        v = v.replace(/(.{1})$/, "-$1")
    } else if (v.length == 13) {
        v = v.replace(/(.{2})$/, "-$1")
    } else if (v.length == 14) {
        v = v.replace(/(.{3})$/, "-$1")
    } else if (v.length == 15) {
        v = v.replace(/(.{4})$/, "-$1")
    } else if (v.length > 15) {
        v = v.replace(/(.{4})$/, "-$1")
    }
    return v;
}

function maskcep(v) {
    v = v.replace(/\D/g, "");
    v = v.replace(/(\d{5})(\d)/, "$1-$2");
    return v;
}

function maskapenas_letras(v) {
    v = v.replace(/\d/g, "");
    return v;
}

function maskapenas_numeros(v) {
    v = v.replace(/\D/g, "");
    return v;
}

function maskcpf(v) {
    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")
    //Coloca um ponto entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2")
    //Coloca um ponto entre o terceiro e o quarto dígitosde novo (para o segundo bloco de números)
    v = v.replace(/(\d{3})(\d)/, "$1.$2")
    //Coloca um hífen entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    return v
}

//////////////////////////////////////// funções  de palicação das mascaras ////////////////////////////////////////////////////////////

// Função para aplicar uma máscara a um campo de entrada
function mask(o, f) {
    v_obj = o;  // Armazena o objeto de entrada (campo) na variável v_obj.
    v_fun = f;  // Armazena a função de máscara na variável v_fun.
    setTimeout("execmask()", 1);  // Aguarda 1 milissegundo antes de chamar a função execmask().
}

// Função para executar a máscara no campo
function execmask() {
    v_obj.value = v_fun(v_obj.value);  // Aplica a função de máscara ao valor do campo e atribui o resultado de volta ao campo.
}

// Definindo uma lista de campos a serem refatorados, cada campo com seu ID, tamanho máximo e, opcionalmente, uma máscara.
const camposParaRefatorar = [
    { id: 'tel_fixo', maxLength: 19, mascara: masktel }, // Campo de telefone fixo
    { id: 'tel_cel', maxLength: 19, mascara: masktel }, // Campo de telefone celular
    { id: 'cpf', maxLength: 14, mascara: maskcpf },     // Campo de CPF
    { id: 'CEP', maxLength: 9, mascara: maskcep },     // Campo de CEP
    { id: 'nome', maxLength: 60 },                     // Campo de nome
    { id: 'nomemae', maxLength: 60 },                 // Campo de nome da mãe
    { id: 'complemento', maxLength: 60 },             // Campo de complemento de endereço
    { id: 'login', maxLength: 6, mascara: maskapenas_letras }, // Campo de login (com máscara de letras)
    { id: 'email', maxLength: 100 },                 // Campo de endereço de e-mail
    { id: 'UF', maxLength: 2, mascara: maskapenas_letras },    // Campo de UF (com máscara de letras)
    { id: 'cidade', maxLength: 60 },                // Campo de cidade
    { id: 'bairro', maxLength: 60 },                // Campo de bairro
    { id: 'rua', maxLength: 60 },                   // Campo de rua
    { id: 'numero_entrada', maxLength: 20, mascara: maskapenas_numeros }, // Campo de número de entrada (com máscara de números)
    { id: 'senha', maxLength: 8 },                  // Campo de senha
    { id: 'confsenha', maxLength: 8 },             // Campo de confirmação de senha
];


// Iterando sobre a lista de campos para aplicar as configurações em cada um.
camposParaRefatorar.forEach(campo => {
    const elemento = id(campo.id); // Obtém o elemento do DOM com base no ID.
    elemento.setAttribute('maxlength', campo.maxLength); // Define o tamanho máximo do campo.
    if (campo.mascara) {
        elemento.onkeypress = function () {
            mask(this, campo.mascara); // Se houver uma máscara, aplica-a ao pressionar teclas.
        };
    }
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////     Validações dos campos               /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////// API CEP /////////////////////////////////////////////
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    id('rua').value = ("");
    id('bairro').value = ("");
    id('cidade').value = ("");
    id('UF').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        id('rua').value = (conteudo.logradouro);
        id('bairro').value = (conteudo.bairro);
        id('cidade').value = (conteudo.localidade);
        id('UF').value = (conteudo.uf);
        id("CEP").classList.remove('error_input');
    } //end if.
    else {
        //CEP não Encontrado. 
        cep_valido = false
        id("CEP").classList.add('error_input');
        limpa_formulário_cep();
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            id('rua').value = "...";
            id('bairro').value = "...";
            id('cidade').value = "...";
            id('UF').value = "...";
            //Cria um elemento javascript.
            var script = document.createElement('script');
            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            cep_valido = false
            id("CEP").classList.add('error_input');
            //cep é inválido.
            limpa_formulário_cep();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};



///////////////////////        Validação do Form                /////////////////////////////////////////////////
window.onload= function load_page(){


function validarCampos() {
    const camposObrigatorios = document.querySelectorAll(".campos_obrigatorios");

    const camposPreenchidos = Array.from(camposObrigatorios).every(campo => campo.value.trim() !== '');

    console.log(sexo_valido.value);
    const todosValidos = camposPreenchidos /* && sexo_valido */&& email_valido && senha_valido
        && confSenha_valido && cpf_valido && nome_valido && nomeMae_valido && telFixo_valido
        && telCel_valido && login_valido && cep_valido && dataNasc_valido;

    const botaoCadastrar = id("botaocadastrar");
    botaoCadastrar.disabled = !todosValidos;
}

function validateCadastro() {
    validarCampos();
}

    document.addEventListener('DOMContentLoaded', function () {
    const bodyCadastro = id("body_index");
    const eventos = ["click", "input", "keyup", "wheel", "mousemove"];

    eventos.forEach(evento => {
        bodyCadastro.addEventListener(evento, validateCadastro);
    });
});




///////////////////// NOME ///////////////////////////////////////////
const validateNome = (event) => {
    const input = event.currentTarget;
    const regex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/;
    const nomeTest = regex.test(input.value.replace(/\s+/g, ''));

    if (!nomeTest || input.value.length < 15) {
        nome_valido = false;
        incluir_error("nome");
    } else {
        nome_valido = true;
        remover_error("nome");
    }
}
id("nome").addEventListener('input', validateNome);

///////////////////// NOME  DA MÃE //////////////////////////////////
const validateNomemae = (event) => {
    const input = event.currentTarget;
    const regex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/;
    const nomemaeTest = regex.test(input.value.replace(/\s+/g, ''));

    if (!nomemaeTest || input.value.length < 15) {
        nomeMae_valido = false;
        incluir_error("nomemae");
    } else {
        nomeMae_valido = true;
        remover_error("nomemae");
    }
}
id("nomemae").addEventListener('input', validateNomemae);

////////////////////////////////////////DATA NASCIMENTO /////////////////
const validateDatansci = (event) => {
    const input = event.currentTarget;
    const dataNascimento = input.value;

    const dataNascimentoDate = new Date(dataNascimento);
    const dataAtual = new Date();
    const idadeMinima = 18;

    const diffEmAnos = dataAtual.getFullYear() - dataNascimentoDate.getFullYear();
    const diffEmMeses = dataAtual.getMonth() - dataNascimentoDate.getMonth();
    const diffEmDias = dataAtual.getDate() - (dataNascimentoDate.getDate() + 1);

    if (dataNascimento === '' || diffEmAnos < idadeMinima || (diffEmAnos === idadeMinima && (diffEmMeses < 0 || (diffEmMeses === 0 && diffEmDias < 0)))) {
        dataNasc_valido = false;
        incluir_error('datanasci');
    } else {
        dataNasc_valido = true;
        remover_error("datanasci");
    }
};

id("datanasci").addEventListener('input', validateDatansci);

///////////////////// SEXO //////////////////////////////////////////
/*
function sexo() {

    if (document.getElementsByName("sexo")[0].checked == false
        && document.getElementsByName("sexo")[1].checked == false
        && document.getElementsByName("sexo")[2].checked == false) {
        sexo_valido = false;
    }
    else { sexo_valido = true }
};
*/////////////////////// CPF  ///////////////////////////////////
//----------------------------------lógica CPF-------------//
function validarCPF(cpf) {
    cpf = id("cpf").value.replace(/[^\d]+/g, '');
    if (cpf == '') return false;
    // Elimina CPFs invalidos conhecidos	
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    // Valida 1o digito	
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito	
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}
//-------------------------------aminação//
const validateCpf = () => {

    if (validarCPF() == false) {
        cpf_valido = false
        incluir_error("cpf");

    } else {
        cpf_valido = true
        remover_error('cpf');
    }
}
id("cpf").addEventListener('input', validateCpf);

///////////////////// TEL FIX //////////////////////////////////////////
const validateFix = (event) => {
    const input = event.currentTarget;

    if (input.value.length < 18) {
        telFixo_valido = false;
        incluir_error("tel_fixo");
    } else {
        telFixo_valido = true;
        remover_error('tel_fixo');
    }
}
id("tel_fixo").addEventListener('input', validateFix);

///////////////////// TEL CEL  //////////////////////////////////////////
const validateCel = (event) => {
    const input = event.currentTarget;

    if (input.value.length < 18) {
        telCel_valido = false;
        incluir_error("tel_cel");
    } else {
        telCel_valido = true;
        remover_error("tel_cel");
    }
}
id("tel_cel").addEventListener('input', validateCel);

/////////////////////////////// CEP /////////////////////////////// 
const validateCEP = (event) => {
    const input = event.currentTarget;

    if (input.value.length != 9) {
        cep_valido = false;
        incluir_error("CEP");
    } else {
        cep_valido = true;
        remover_error("CEP");
    }
}
id("CEP").addEventListener('input', validateCEP);

////////////////////////// EMAIL /////////////////////////////////////////
const validateEmail = (event) => {
    const input = event.currentTarget;
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const emailTest = regex.test(input.value);

    if (!emailTest) {
        email_valido = false;
        incluir_error("email");
    } else {
        email_valido = true;
        remover_error("email");
    }
}
id("email").addEventListener('input', validateEmail);

///////////////////// LOGIN /////////////////////////////////////////////
const validateLogin = (event) => {
    const input = event.currentTarget;
    const regex = /^[A-Za-z ]+$/;
    const loginTest = regex.test(input.value);


    if (!loginTest || input.value.length != 6) {
        login_valido = false;
        incluir_error("login");
    } else {
        login_valido = true;
        remover_error("login");
    }
}
id("login").addEventListener('input', validateLogin);

///////////////////////////// SENHA ////////////////////////////////////////
const validateSenha = (event) => {
    const input = event.currentTarget;
    const senha = input.value;

    const regex = /^[A-Za-z]+$/;
    const senhaTest = regex.test(senha);
    const tamanhoValido = senha.length === 8;

    if (senhaTest && tamanhoValido) {
        senha_valido = true;
        remover_error("senha");

        if (id('confsenha').value !== senha) {
            confSenha_valido = false;
            incluir_error("confsenha");
        } else {
            confSenha_valido = true;
            remover_error('confsenha');
        }
    } else {
        senha_valido = false;
        incluir_error("senha");
        confSenha_valido = false; // Reseta a validação da confirmação de senha
        incluir_error("senha");
    }
}

id("senha").addEventListener('input', validateSenha);

///////////////////////   CONFIRMAÇÃO DA SENHA ////////////////////////////////
const validateConfsenha = (event) => {
    const input = event.currentTarget;

    if (input.value != id("senha").value) {
        confSenha_valido = false;
        incluir_error("confsenha");
    } else {
        confSenha_valido = true;
        remover_error("confsenha");
    }
}
id("confsenha").addEventListener('input', validateConfsenha);



}


