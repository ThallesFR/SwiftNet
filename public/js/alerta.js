////////////////////////////////////////////// alertas ////////////////////////////////
function alerta(text_1, text_2) {
    let alerta_id = document.getElementById('alertas');
    let titulo_alerta = document.getElementById('alertas_titulo');
    let texto_alerta = document.getElementById('alertas_text');

    titulo_alerta.textContent = text_1;
    texto_alerta.textContent = text_2;

}
