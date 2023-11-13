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

