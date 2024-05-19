if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        document.getElementById('localizacao').value = latitude + ', ' + longitude;
        document.getElementById('endereco').innerText = 'Localização carregada';

        // Esperar até que os dados estejam prontos antes de enviar a solicitação
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar o envio do formulário padrão

            // Obter dados do formulário
            var data = new FormData(document.querySelector('form'));

            // Adicionar latitude e longitude ao FormData
            data.append('latitude', latitude);
            data.append('longitude', longitude);

            // Verificar quais checkboxes de tipo foram marcados
            var tipoEntrada = document.getElementById('entrada').checked;
            var tipoSaida = document.getElementById('saida').checked;

            // Limpar o campo de tipo para evitar duplicação
            data.delete('tipo');

            // Adicionar o tipo correto ao FormData
            if (tipoEntrada) {
                data.append('tipo', 'entrada');
            }
            if (tipoSaida) {
                data.append('tipo', 'saida');
            }

            // Enviar os dados para o script PHP
            fetch('saveincluir.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => response.text())
                .then(result => {
                    console.log(result);
                    // Se desejar, redirecionar ou exibir uma mensagem de sucesso
                })
                .catch(error => {
                    console.error('Erro ao enviar dados:', error);
                });
        });
    }, function(error) {
        document.getElementById('endereco').innerText = 'Não foi possível carregar a localização';
    });
} else {
    document.getElementById('endereco').innerText = 'Geolocalização não é suportada pelo seu navegador';
}
// Função para manipular o clique no botão "Registrar Ponto"
function handleRegistrarPontoClick() {
    // Exibir caixa de diálogo de confirmação
    var confirmacao = confirm("Deseja realmente registrar este ponto?");

    // Se o usuário confirmar, recarregar a página
    if (confirmacao) {
        location.reload();
    }
}

// Adicionar evento de clique ao botão "Registrar Ponto"
document.getElementById("registrarPontoBtn").addEventListener("click", handleRegistrarPontoClick);