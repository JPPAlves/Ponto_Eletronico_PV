const imgs = Array.from(document.querySelectorAll(".frame img"));
const bullets = Array.from(document.querySelectorAll(".bullet"));
const controlBox = document.querySelector(".control");
const form = document.querySelector("form");
const submitBtnTxt = document.querySelector(".submit .txt");
const submitBtnSpinner = document.querySelector(".submit .spinner");
let interval;
let idx = 0;

// Função para ativar a imagem correspondente ao índice
const activeImg = idx => {
  imgs.forEach(img => img.classList.remove("active"));
  imgs[idx].classList.add("active");
};

// Função para ativar a bala correspondente ao índice
const activeBullets = idx => {
  bullets.forEach(bullet => bullet.classList.remove("active"));
  bullets[idx].classList.add("active");
};

// Função para avançar o slider automaticamente
const autoPlay = () => {
  interval = setInterval(() => {
    idx++; // Avança para o próximo slide

    // Verifica se chegou ao último slide
    if (idx === imgs.length) {
      idx = 0; // Volta ao primeiro slide
    }

    activeImg(idx);
    activeBullets(idx);
  }, 6000);
};


// Evento de clique nas balas
bullets.forEach((bullet, _idx) => {
  bullet.addEventListener("click", () => {
    activeImg(_idx);
    activeBullets(_idx);
    idx = _idx;
  });
});

// Eventos de pausa e retomada do slider quando o mouse entra e sai da área do controle
controlBox.addEventListener("mouseenter", () => {
  clearInterval(interval);
});
controlBox.addEventListener("mouseleave", () => {
  autoPlay();
});

// Evento de envio do formulário
form.addEventListener("submit", e => {
  e.preventDefault();
  submitBtnTxt.style.display = "none";
  submitBtnSpinner.style.display = "initial";
  submit.classList.add("disabled");
  form.reset();

  setTimeout(() => {
    submitBtnTxt.style.display = "initial";
    submitBtnSpinner.style.display = "none";
    submit.classList.remove("disabled");
  }, 500);
});

// Iniciar a reprodução automática do slider
autoPlay();
