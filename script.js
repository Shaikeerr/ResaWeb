
var position=0
var minPosition=0
var maxPosition=3

photo = document.querySelector(".js-boxes")
Fdroite = document.querySelector(".right")
Fgauche = document.querySelector(".left")

Fdroite.addEventListener("click",decaleDroite)
Fgauche.addEventListener("click",decaleGauche)

function decaleDroite() {
    position+=1
    photo.style.transform="translateX(calc(" + position + "* -500px))";
    if (position > maxPosition) {
        retourdebut()
    }
    console.log(position)
}

function decaleGauche() {
    position-=1
    photo.style.transform="translateX(calc(" + position + "* -px))";
    if (position < minPosition) {
        retourfin()
    }
    console.log(position)
}



function retourfin() {
    position=maxPosition
    photo.classList.add("no-anime")
    decaleGauche()
}

function retourdebut() {
    position=minPosition
    photo.classList.add("no-anime")
    decaleDroite()
}


decaleDroite()



