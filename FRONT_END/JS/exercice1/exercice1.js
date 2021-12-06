let prenom = "Louis";

console.log("Bonjour et joyeux anniversaire "+prenom+" !"); // Console log avec concatenation moche

console.log(`Bonjour et joyeux anniversaire ${prenom} !`); // Console log avec concatenation intégrée

let maDiv = `<div id='toto'>
                <p>Lorem ipsum ...</p>
                <img src='' alt=''>
            </div>`;
                
window.onload = function(){ // SYNTAXE D'ES5 (ANCIENNE)
    // Script
}

window.onload = ()=>{ // SYNTAXE ES6 (NOUVELLE)
    // Script
}

//
objet.evenement= ()=>{ // SYNTAXE CLASSIQUE POUR FAIRE APPEL A UN EVENEMENT SUR UNE FONCTION
    // Objet pour l'objet a récupérer
    // Evenement pour l'evenement à écouter (ex: onclick)
}

// EX
document.querySelector("h1").onclick = ()=> {

}

// A EVITER CAR RESTE ACTIF ET EN MEMOIRE TANT QUE PAS SUPP.
// CEPENDANT PLUS DE FLEXIBILITE ET DE CONTROLE.

document.querySelector("h1").addEventListener('click', function () {
    // Code
})