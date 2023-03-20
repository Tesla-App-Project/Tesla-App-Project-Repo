function toggleStatus() {
  var status = document.getElementById("status");
  if (status.innerHTML === "Arrêt") {
    status.innerHTML = "Marche";
  } else {
    status.innerHTML = "Arrêt";
  }
}



function toggleVentilateStatus() {
  var status = document.getElementById("ventilate-status");
  if (status.innerHTML === "Aérer") {
    status.innerHTML = "Fermer";
  } else {
    status.innerHTML = "Aérer";
  }
}


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

let delayTime;
let delayTime2;
const auto_button = document.getElementById('seat-heat-l--auto')
const auto_button2 = document.getElementById('seat-heat-r--auto')

image.addEventListener("mousedown", function() {
  delayTime = new Date().getTime();
});

image2.addEventListener("mousedown", function() {
  delayTime2 = new Date().getTime();
});

image.addEventListener("click", function() {
  let endTime = new Date().getTime();
  let clickDuration = endTime - delayTime;

  if (clickDuration < 300) {
    auto_button.style.display = "none";
  } else {
    auto_button.style.display = "block";
    state_1 = 0;
    image.src = A_images[state_1];
  }
});

image2.addEventListener("click", function() {
  let endTime = new Date().getTime();
  let clickDuration = endTime - delayTime2;

  if (clickDuration < 300) {
    auto_button2.style.display = "none";
  } else {
    auto_button2.style.display = "block";
    state_2 = 0;
    image2.src = A_images[state_2];
  }
});
