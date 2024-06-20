function registerPonto() {
    var location = document.getElementById('local').innerHTML;
    
    var time = new Date().toLocaleTimeString(); 
    var today = new Date().toDateString(); 

    // Envia os dados via AJAX para o arquivo PHP
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Exibe a resposta do servidor
            console.log(this.responseText);
            updateHora(time, today);
        }
    };

    xhttp.open("POST", "saveLocation.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("location=" + location + "&time=" + time + "&today=" + today);
}

function updateHora(time, today) {
    var rhora = document.querySelector('.Rhora h6');
    var batidas = localStorage.getItem(today + '_batidas'); 
    if (!batidas) {
        batidas = 0;
    }

    batidas = parseInt(batidas) + 1; // Incrementa o número de batidas

    // Atualiza a hora na div
    rhora.innerText = time;

    // Armazena o número de batidas do dia
    localStorage.setItem(today + '_batidas', batidas);
}
