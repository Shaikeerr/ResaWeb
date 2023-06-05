
var position=0
var minPosition=0
var maxPosition=3

fetch('annonces.json').then(function(response) {
    response.json().then(function(data) {              //Récupère les données du JSON et les stocke dans une variable data
        console.log(data);
        for (let numCase = 0; numCase < data.length; numCase++) {
            const element = data[numCase]    //Execute la fonction analogies avec toutes les valeurs de data
            nouveautes(element)
        }
    })       
})

function nouveautes(x) {
    Slider_new = document.querySelector(".js-boxes")
    Slider_new.innerHTML+="<div class='box'>" + x.image + "<div class=div_prix><h1 class='Prix'>" + x.prix + "</h1>" + "<img class='Rubis' src='img/Rubis.png' alt=''></div>" + "<button class='Bouton'>  Voir l'annonce ↦ </button>" + "<h2>" + x.nom + "</h2>" + "<p>" + x.description + "</p>" + "</div>"
}
photo = document.querySelector(".js-boxes")
Fdroite = document.querySelector(".right")
Fgauche = document.querySelector(".left")

Fdroite.addEventListener("click",decaleDroite)
Fgauche.addEventListener("click",decaleGauche)

function decaleDroite() {
    position+=1
    photo.style.transform="translateX(calc(" + position + "* -33.5%))";
    if (position > maxPosition) {
        retourdebut()
    }
    console.log(position)
}

function decaleGauche() {
    position-=1
    photo.style.transform="translateX(calc(" + position + "* -33.5%))";
    if (position < minPosition) {
        retourfin()
    }
    console.log(position)
}



function retourfin() {
    position=maxPosition+1
    photo.classList.add("no-anime")
    decaleGauche()
}

function retourdebut() {
    position=minPosition-1
    photo.classList.add("no-anime")
    decaleDroite()
}





