const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
    if (document.title === 'Lynn Corp - Login') {
      document.title = 'Lynn Corp - Sign Up';
    } else if (document.title === 'Lynn Corp - Sign Up') {
      document.title = 'Lynn Corp - Login';
    }
  });
});


let index = 1;

function moveSlider() {
  let currentImage = document.querySelector(`.img-${index}`);
  const images = document.querySelectorAll(".image");
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  bullets[index - 1].classList.add("active");

  index++;

  if (index > 3) {
    index = 1;
  }
}

setInterval(moveSlider, 3000);
bullets.forEach((bullet, bulletIndex) => {
  bullet.addEventListener("click", () => {
    index = bulletIndex + 1;
    moveSlider();
  });
});

moveSlider();