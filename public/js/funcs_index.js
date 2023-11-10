/////////////////////////////////////////////// elemento invisível

function trocaDisplay(id) {
    let element = document.getElementById(id);

    if (element.classList.contains("invisivel")) {
        // Se o elemento estiver com a classe "invisivel", troque para "visivel"
        element.classList.remove("invisivel");
        element.classList.add("visivel");
    } else {
        // Se o elemento estiver com a classe "visivel", troque para "invisivel"
        element.classList.remove("visivel");
        element.classList.add("invisivel");
    }
}

////////////////////////////////////////////// alertas ////////////////////////////////

const alerta_id = document.getElementById('alertas');
const titulo_alerta = document.getElementById('alertas_titulo');
const texto_alerta =document.getElementById('alertas_text');



function alerta(text_1, text_2, classe){

    if(classe == "danger"){
        alerta_id.classList.add('alert alert-danger alert-dismissible fade show fixed-top');
    }else{
       alerta_id.classList.add('alert alert-success alert-dismissible fade show fixed-top')
    }

    titulo_alerta.textContent(text_1);
    texto_alerta.textContent(text_2);

    trocaDisplay("alertas");

}

