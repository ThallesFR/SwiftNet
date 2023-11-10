// Elementos do DOM
const nova_senha = document.getElementById("nova_senha");
const conf_nova_senha = document.getElementById("conf_nova_senha");
const button = document.getElementById("alterar_senha_button");
const bodyCadastro = document.getElementById("body_index");

// Eventos a serem monitorados
const eventos = ["click", "input", "keyup", "wheel", "mousemove"];

// Elementos do DOM para exibir mensagens de erro
const span_senha = document.getElementById('span_senha');
const span_Confsenha = document.getElementById('span_confSenha');

// Estados de validação das senhas
let senha_valido = false;
let confsenha_valido = false;

const validarInput = (input, confirmaInput, regex, spanErro) => {
    const valor = input.value;
    const testeRegex = regex.test(valor);
    const tamanhoValido = valor.length === 8;

    if (testeRegex && tamanhoValido) {
        input.classList.remove('error_input');
        spanErro.textContent = '';
        return true;
    } else {
        input.classList.add('error_input');
        spanErro.textContent = 'Nova senha inválida, deve conter apenas letras e ter 8 caracteres.';
        confirmaInput.classList.add('error_input');
        return false;
    }
};

/**
 * Função para validar a senha
 */
const validateSenha = () => {
    senha_valido = validarInput(nova_senha, conf_nova_senha, /^[A-Za-z]+$/, span_senha);
};

/**
 * Função para validar a confirmação de senha
 */
const validateConfsenha = () => {
    confsenha_valido = conf_nova_senha.value === nova_senha.value;
    conf_nova_senha.classList.toggle('error_input', !confsenha_valido);

    // Exibir mensagem de erro na span_Confsenha se as senhas não forem iguais
    if (!confsenha_valido) {
        span_Confsenha.textContent = 'As senhas não coincidem.';
    } else {
        span_Confsenha.textContent = ''; // Limpar a mensagem de erro se as senhas coincidirem
    }
};

/**
 * Função para validar o formulário antes de fazer submit
 */
const validar_submit = () => {
    const inputs = document.getElementsByTagName("input");
    let valido = Array.from(inputs).every(campo => campo.value.replace(/\s+/g, '') !== '');

    if (valido && senha_valido && confsenha_valido) {
        button.removeAttribute("disabled");
    } else {
        button.setAttribute("disabled", "disabled");
    }
};

// Adiciona event listeners aos elementos do DOM
document.addEventListener('DOMContentLoaded', function () {
    eventos.forEach(evento => {
        bodyCadastro.addEventListener(evento, validar_submit);
    });

    nova_senha.addEventListener('input', validateSenha);
    conf_nova_senha.addEventListener('input', validateConfsenha);
});
