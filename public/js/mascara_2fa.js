////////////////////////////////////////////------------regex das mascaras -------------------///////////////
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


/////-------------------------------------------------- funções de mascara------------------------------////////////////////////////////////////

function mask(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmask()", 1)
}

function execmask() {
    v_obj.value = v_fun(v_obj.value)
}

document.addEventListener("DOMContentLoaded", function() {
    // Restante do seu código aqui...

    const camposParaRefatorar = [
        { id: 'CEP', maxLength: 9, mascara: maskcep },     // Campo de CEP
        { id: 'nomemae', maxLength: 90 }, // Campo de nome da mãe
    ];

    camposParaRefatorar.forEach(campo => {
        const elemento = document.getElementById(campo.id);

        if (elemento) {
            elemento.setAttribute('maxlength', campo.maxLength);

            if (campo.mascara) {
                elemento.addEventListener('input', function () {
                    mask(this, campo.mascara);
                });
            }
        }
    });
});
