/* CRIANDO NOSSA FUNÇÃO MÁGICA */
function atualizaHora() {

    // Variáveis para trabalhar com a data do sistema
    var agora = new Date();
    var horaAtual = agora.getHours();
    var dia = agora.getDay();
  
    // Manipuladores do DOM
    var corpo       = document.getElementsByTagName('body'); // para alterar o tema do site
    var iconlogo    = document.getElementById('iconlogo'); // para alterar o ícone
    var mensagem    = document.querySelector('.mensagem>p'); // para mudar a mensagem
    var relogio     = document.querySelector('.relogio>p'); // para exibir o relógio
    var calendario  = document.querySelector('.calendario>p'); // para exibir a data atual
  
    // Configuração de exibição da data e hora
    var configLocal = 'pt-BR'; // Configuração do local
    var configDate  = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
  
    /* 
      TEMAS (cor e imagem de fundo)
      =======
      Teste os temas descomentando uma das linhas abaixo. 
      Depois salve o arquivo e atualize a página em seu navegador.
    */
  
    // horaAtual = 6;   /* Bom dia */
    // horaAtual = 12;  /* Boa tarde */
    // horaAtual = 18;  /* Boa noite */
    // horaAtual = 0;   /* Boa madrugada */
  
    // Teste para alterar o tema de acordo com a hora do dia
    if ( horaAtual < 6 ) {
      
      // BOA MADRUGADA
      mensagem.innerText = 'Boa madrugada.'; // Altera a mensagem
      iconlogo.className = 'icondia boamadrugada'; // Altera o ícone usando CSS
      corpo[0].className = 'madrugada'; // Altera o tema
  
    } else if ( horaAtual < 12 ) {
      
      // BOM DIA
      mensagem.innerText = 'Bom dia!'; // ...
      iconlogo.className = 'icondia bomdia'; // ...
      corpo[0].className = 'manha'; // ...
  
    } else if ( horaAtual < 18 ) {
  
      // BOA TARDE
      mensagem.innerText = 'Boa tarde.';
      iconlogo.className = 'icondia boatarde';
      corpo[0].className = 'tarde';
  
    } else {
      
      // BOA NOITE
      mensagem.innerText = 'Boa noite!';
      iconlogo.className = 'icondia boanoite';
      corpo[0].className = 'noite';
    }
  
    // Exibe o relógio com hora atual do sistema
    relogio.innerText = agora.toLocaleTimeString(configLocal);
  
    // Exibe calendário formatado
    calendario.innerText = agora.toLocaleDateString(configLocal, configDate);
  
  }
  
  // Chama a funcao no momento que a pagina é carregada
  atualizaHora();
  
  // Segue atualizando a hora chamando a função a cada segundo
  setInterval(atualizaHora, 1000);