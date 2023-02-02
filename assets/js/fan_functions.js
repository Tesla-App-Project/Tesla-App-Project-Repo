function changeStopButton() {
  const btn = document.getElementById('btn');

  btn.addEventListener('click', function handleClick() {
    const initialText = 'Arrêt';

    if (btn.textContent.toLowerCase().includes(initialText.toLowerCase())) {
      btn.textContent = 'Marche';
    } else {
      btn.textContent = initialText;
    }
  });
}

function changeVentilateButton() {
  const btn2 = document.getElementById('btn2');

  btn2.addEventListener('click', function handleClick() {
    const initialText = 'Aérer';

    if (btn2.textContent.toLowerCase().includes(initialText.toLowerCase())) {
      btn2.textContent = 'Fermer';
    } else {
      btn2.textContent = initialText;
    }
  });
}

function onClickLeftButton() {
  str = document.getElementById("number").innerHTML;
  str = str.substring(0, str.length - 2);

  if (str > 10) { str--; }

  if (str == 10) { document.getElementById("boutonGauche").innerText = "_"; }

  if (str < 30) { document.getElementById("boutonDroit").innerText = ">"; }

  document.getElementById("number").innerHTML = str + "°C"
}

function onClickRightButton() {
  str = document.getElementById("number").innerHTML;
  str = str.substring(0, str.length - 2);

  if (str < 30) { str++; }

  if (str == 30) { document.getElementById("boutonDroit").innerText = "_"; }

  if (str > 0) { document.getElementById("boutonGauche").innerText = "<"; }

  document.getElementById("number").innerHTML = str + "°C"
}

checks = document.getElementsByTagName('input');
A_images = [
  './assets/images/seat-heat/no_heat.png',
  './assets/images/seat-heat/low_heat.png',
  './assets/images/seat-heat/medium_heat.png',
  './assets/images/seat-heat/high_heat.png',
];

image = document.getElementById('img-seat-heat-l')
image.onclick = function() {
  onClickChangeImage();
}

image2 = document.getElementById('img-seat-heat-r')
image2.onclick = function() {
  onClickChangeImage2();
}

let state_1 = 1;
let state_2 = 1;

function onClickChangeImage() {
  image.src = A_images[state_1];
  state_1++;
  if (state_1 == A_images.length)
    state_1 = 0;
}

function onClickChangeImage2() {
  image2.src = A_images[state_2];
  state_2++;
  if (state_2 == A_images.length)
    state_2 = 0;
}