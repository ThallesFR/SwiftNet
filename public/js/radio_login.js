
// Adiciona um evento de mudança aos radio buttons
document.querySelectorAll('input[name="flexRadioDefault"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        // Obtém o elemento <a> e o contêiner
        var statusContainer = document.getElementById('statusContainer');
        var statusMessage = document.getElementById('statusMessage');

        // Verifica qual radio button está checado
        if (document.getElementById('flexRadioDefault1').checked) {
            // Se "Master" estiver checado, remove o elemento <a>
            if (statusMessage) {
                statusContainer.removeChild(statusMessage);
            }
        } else {
            // Se "Comum" estiver checado, verifica se o elemento <a> já existe
            if (!statusMessage) {
                // Se não existir, cria e adiciona ao contêiner
                var newStatusMessage = document.createElement('a');
                newStatusMessage.id = 'statusMessage';
                newStatusMessage.href = '#';
                newStatusMessage.textContent = 'Não possui conta ? Cadastre-se aqui';
                statusContainer.appendChild(newStatusMessage);
            }
        }
    });
});
