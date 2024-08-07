// Função para obter a localização do usuário assim que a página é carregada
window.onload = function() {
    getLocation();
};

// Função para obter a localização do usuário
function getLocation() {
    // Verifica se o navegador suporta a geolocalização
    if (navigator.geolocation) {
        // Tenta obter a posição do usuário
        navigator.geolocation.getCurrentPosition(showAddress, showError);
    } else {
        // Caso não suporte, exibe uma mensagem de erro
        console.log("Geolocalização não é suportada pelo seu navegador.");
    }
}

// Função para lidar com o sucesso da obtenção da localização
function showAddress(position) {
    // Extrai as coordenadas
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Monta a URL da API de Geocodificação do Google
    var geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyCCQSz3GxJ922XWd1ZhpxJYgb4bKuMmufQ`;

    // Faz a solicitação HTTP para obter o endereço
    fetch(geocodeUrl)
        .then(response => response.json())
        .then(data => {
            // Verifica se a resposta da API é bem-sucedida
            if (data.status === "OK") {
                // Exibe o endereço na div "local"
                document.getElementById('local').innerHTML =  data.results[0].formatted_address;
            } else {
                console.log("Erro ao obter o endereço: " + data.status);
            }
        })
        .catch(error => {
            console.log("Erro ao obter o endereço:", error);
        });
}

// Função para lidar com erros na obtenção da localização
function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.log("Usuário rejeitou a solicitação de geolocalização.");
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Informações de localização indisponíveis.");
            break;
        case error.TIMEOUT:
            console.log("A solicitação de obtenção de localização do usuário expirou.");
            break;
        case error.UNKNOWN_ERROR:
            console.log("Ocorreu um erro desconhecido ao obter a localização.");
            break;
    }
}
