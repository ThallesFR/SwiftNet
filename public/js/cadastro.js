//////////// INDEX

/* 
   -LOCAL STORAGE: linha 18
   -Regex MASCARAS: linha 33
   -Cep validação: linha 95
   -Mascaras: linha 170
   -Validação dos campos: linha 241
   -darck mode: linha 562
*/
//------------------------ Functions ------------------------------------------------------------------//////
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
///////////////////////////////////////////////////////////////        MASCARAS                      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////------------regex das mascaras -------------------///////////////
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

/////-------------------------------------------------- funções de mascara------------------------------////////////////////////////////////////

   function mask(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmask()", 1)
}

function execmask() {
    v_obj.value = v_fun(v_obj.value)
}
    // Definindo uma lista de campos a serem refatorados, cada campo com seu ID, tamanho máximo e, opcionalmente, uma máscara.
    const camposParaRefatorar = [
        { id: 'tel_fixo', maxLength: 19, mascara: masktel }, // Campo de telefone fixo
        { id: 'tel_cel', maxLength: 19, mascara: masktel }, // Campo de telefone celular
        { id: 'cpf', maxLength: 14, mascara: maskcpf },     // Campo de CPF
        { id: 'CEP', maxLength: 9, mascara: maskcep },     // Campo de CEP
        { id: 'nome', maxLength: 90 },                     // Campo de nome
        { id: 'nomemae', maxLength: 90 },                 // Campo de nome da mãe
        { id: 'complemento', maxLength: 90 },             // Campo de complemento de endereço
        { id: 'login', maxLength: 6, mascara: maskapenas_letras }, // Campo de login (com máscara de letras)
        { id: 'email', maxLength: 100 },                 // Campo de endereço de e-mail
        { id: 'UF', maxLength: 2, mascara: maskapenas_letras },    // Campo de UF (com máscara de letras)
        { id: 'cidade', maxLength: 90 },                // Campo de cidade
        { id: 'bairro', maxLength: 90 },                // Campo de bairro
        { id: 'rua', maxLength: 90 },                   // Campo de rua
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////   CEP validção  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
        CEP_valido = false
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
            CEP_valido = false
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const function_events = () => {//------------------------ EXECUÇÃO DAS FUNÇÕES COMO EVENTOS------------------------------------------//////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////-----------------------------------------------------------------   VALIDAÇÂO DOS CAMPOS ---------------------------------------------------------------------------//////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////  VALIDAR SUBMIT ////////////////////////////////////////////////////////

    validar_submit()//--------------------------------- EXECUTA FUNÇÃO SUBMIT AO ABRIR A PAGINA-------/

    function validar_submit() {///--------------------------------------------------------------- FUNÇÃO PARA HABILITAR SUBMIT----------//
        sexo();
        let valido = 0;
        let input = document.getElementsByClassName("campos_obrigatorios");

        for (let index = 0; index < input.length; index++) {//----------LOCALIZA INPUTS VAZIOS-----//
            const campo = input[index];
            if (campo.value.replace(/\s+/g, '') == '') {
                valido -= 1;
            }
            else { valido += 1; }
        }

        if (valido == input.length && sexo_valido != false && email_valido != false && senha_valido != false  //-----------REABILITA SUBMIT SE ATENDIDAS AS CONDIÇÕES----//
            && confsenha_valido != false && cpf_valido != false && nome_valido != false
            && nomemae_valido != false && tel_fixo_valido != false && tel_cel_valido != false
            && login_valido != false && CEP_valido != false && datanasci_valido != false) {
            id("botaocadastrar").removeAttribute("disabled",);
        }

        else {
            id("botaocadastrar").setAttribute("disabled", "disabled");//------------ SENÃO DESABILITA ---------////
        }
    }

    ///------------------------------------------------ executa a função submit----///
    const validateSUBMIT = () => { validar_submit(); }
    id("body_index").addEventListener('click', validateSUBMIT);
    const validateSubmit = () => { validar_submit(); }
    id("body_index").addEventListener('input', validateSubmit);
    const validateSUbmit = () => { validar_submit(); }
    id("body_index").addEventListener('keyup', validateSUbmit);
    const validateSUbmiT = () => { validar_submit(); }
    id("body_index").addEventListener('wheel', validateSUbmiT);
    const validateSUbmIT = () => { validar_submit(); }
    id("body_index").addEventListener('mousemove', validateSUbmIT);

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
            nomemae_valido = false;
            incluir_error("nomemae");
        } else {
            nomemae_valido = true;
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
            datanasci_valido = false;
            incluir_error('datanasci');
        } else {
            datanasci_valido = true;
            remover_error("datanasci");
        }
    };

    id("datanasci").addEventListener('input', validateDatansci);

    ///////////////////// SEXO //////////////////////////////////////////
    function sexo() {

        if (document.getElementsByName("usuario_sexo")[0].checked == false
            && document.getElementsByName("usuario_sexo")[1].checked == false
            && document.getElementsByName("usuario_sexo")[2].checked == false) {
            sexo_valido = false;
        }
        else { sexo_valido = true }
    }
    /////////////////////// CPF  ///////////////////////////////////
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
            tel_fixo_valido = false;
            incluir_error("tel_fixo");
        } else {
            tel_fixo_valido = true;
            remover_error('tel_fixo');
        }
    }
    id("tel_fixo").addEventListener('input', validateFix);

    ///////////////////// TEL CEL  //////////////////////////////////////////
    const validateCel = (event) => {
        const input = event.currentTarget;

        if (input.value.length < 18) {
            tel_cel_valido = false;
            incluir_error("tel_cel");
        } else {
            tel_cel_valido = true;
            remover_error("tel_cel");
        }
    }
    id("tel_cel").addEventListener('input', validateCel);

    /////////////////////////////// CEP /////////////////////////////// 
    const validateCEP = (event) => {
        const input = event.currentTarget;

        if (input.value.length != 9) {
            CEP_valido = false;
            incluir_error("CEP");
        } else {
            CEP_valido = true;
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
                confsenha_valido = false;
                incluir_error("confsenha");
            } else {
                confsenha_valido = true;
                remover_error('confsenha');
            }
        } else {
            senha_valido = false;
            incluir_error("senha");
            confsenha_valido = false; // Reseta a validação da confirmação de senha
            incluir_error("senha");
        }
    }

    id("senha").addEventListener('input', validateSenha);

    ///////////////////////   CONFIRMAÇÃO DA SENHA ////////////////////////////////
    const validateConfsenha = (event) => {
        const input = event.currentTarget;

        if (input.value != id("senha").value) {
            confsenha_valido = false;
            incluir_error("confsenha");
        } else {
            confsenha_valido = true;
            remover_error("confsenha");
        }
    }
    id("confsenha").addEventListener('input', validateConfsenha);
}//----fechamento da function_events-------//

window.onload = function_events;/////////////////////////////////////////////////////////// EXECUÇÃO DAS FUNCTION EVENTS AO ABRIR A JANELA /////////////