function registerPonto() {
    var location = document.getElementById('local').innerHTML;
    var time = new Date().toLocaleTimeString(); // Obter apenas a hora atual
    var today = new Date().toDateString(); // Obter a data atual em formato de string

    // Envia os dados via AJAX para o arquivo PHP
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Exibe a resposta do servidor
            console.log(this.responseText);
            updateHora(time, today); // Atualiza a hora na div com o tipo de batida
        }
    };
    xhttp.open("POST", "saveLocation.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("location=" + location + "&time=" + time + "&today=" + today);
}

function updateHora(time, today) {
    var rhora = document.querySelector('.Rhora h6');
    var batidas = localStorage.getItem(today + '_batidas'); // Obtém o número de batidas do dia

    if (!batidas) {
        batidas = 0;
    }

    batidas = parseInt(batidas) + 1; // Incrementa o número de batidas

   // Determina se é entrada ou saída com base no número de batidas
  var tipoBatida = batidas % 2 === 1 ? 'Entrada' : 'Saída';

    // Atualiza a hora na div
    rhora.innerText = time + ' (' + tipoBatida + ')';

    // Armazena o número de batidas do dia
    localStorage.setItem(today + '_batidas', batidas);
}
