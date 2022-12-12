
function ConnexionOnClick() {
  if (document.getElementById("ConnexionButton").srcset == "./assets/images/Connexion.png") {
    document.getElementById("ConnexionButton").srcset = "./assets/images/ConnexionRed.png";
    document.getElementById("littleRedConnexion").hidden = false;
  } else {
    document.getElementById("ConnexionButton").srcset = "./assets/images/Connexion.png";
    document.getElementById("littleRedConnexion").hidden = true;
  }
}

function FanOnClick() {
  if (document.getElementById("FanButton").srcset == "./assets/images/Fan.png") {
    document.getElementById("FanButton").srcset = "./assets/images/FanLight.png";
    document.getElementById("OnText").hidden = false;

    str = document.getElementById("InText").innerHTML;
    document.getElementById("InText").innerHTML = "- " + str;
  } else {
    document.getElementById("FanButton").srcset = "./assets/images/Fan.png";
    document.getElementById("OnText").hidden = true;

    str = document.getElementById("InText").innerHTML;
    str = str.substring(2);
    document.getElementById("InText").innerHTML = str;
  }
}

function ElecOnClick() {
  if (document.getElementById("ElecBouton").srcset == "./assets/images/Thunder.png") {
    document.getElementById("ElecBouton").srcset = "./assets/images/ThunderLight.png";
    document.getElementById("Elec_Aff").hidden = false;
    document.getElementById("simone").style.opacity = "0.5";
  } else {
    document.getElementById("ElecBouton").srcset = "./assets/images/Thunder.png";
    document.getElementById("Elec_Aff").hidden = true;
    document.getElementById("simone").style.opacity = "1";
  }
}

function LeftButtonOnClick() {
  str = document.getElementById("number").innerHTML;
  str = str.substring(0, str.length - 2);

  if (str > 0) { str--; }

  if (str == 0) { document.getElementById("LeftButton").innerText = "_"; }

  if (str < 16) { document.getElementById("RightButton").innerText = ">"; }

  document.getElementById("number").innerHTML = str + " A"
}

function RightButtonOnClick() {
  str = document.getElementById("number").innerHTML;
  str = str.substring(0, str.length - 2);

  if (str < 16) { str++; }

  if (str == 16) { document.getElementById("RightButton").innerText = "_"; }

  if (str > 0) { document.getElementById("LeftButton").innerText = "<"; }

  document.getElementById("number").innerHTML = str + " A"
}