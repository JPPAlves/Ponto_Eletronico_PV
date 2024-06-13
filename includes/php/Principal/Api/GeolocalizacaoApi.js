  // Função para inicializar o mapa
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -15.788, lng: -47.929}, // Coordenadas de Brasília, Brasil
        zoom: 15 // Nível de zoom padrão
    });

    var marker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
                
            };

            console.log(pos);
            marker.setPosition(pos);
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, marker, map.getCenter());
        });
    } else {
        handleLocationError(false, marker, map.getCenter());
    }
  }

  // Função para lidar com erros de localização
  function handleLocationError(browserHasGeolocation, marker, pos) {
    marker.setPosition(pos);
    marker.setAnimation(google.maps.Animation.BOUNCE);
    alert(browserHasGeolocation ?
              'Erro: O serviço de geolocalização falhou.' :
              'Erro: Seu navegador não suporta geolocalização.');
  }

  