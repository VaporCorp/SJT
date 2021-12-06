//let prenom = "Louis";

//console.log("Bonjour et joyeux anniversaire "+prenom+" !"); // Console log avec concatenation moche

//console.log(`Bonjour et joyeux anniversaire ${prenom} !`); // Console log avec concatenation intégrée

//let maDiv = `<div id='toto'>
//                <p>Lorem ipsum ...</p>
//                <img src='' alt=''>
//            </div>`;
                
//window.onload = function(){ // SYNTAXE D'ES5 (ANCIENNE)
    // Script
//}

//window.onload = ()=>{ // SYNTAXE ES6 (NOUVELLE)
    // Script
//}

//
// objet.evenement= ()=>{  SYNTAXE CLASSIQUE POUR FAIRE APPEL A UN EVENEMENT SUR UNE FONCTION
    // Objet pour l'objet a récupérer
    // Evenement pour l'evenement à écouter (ex: onclick)
//}

// EX
//document.querySelector("h1").onclick = ()=> {

//}

// A EVITER CAR RESTE ACTIF ET EN MEMOIRE TANT QUE PAS SUPP.
// CEPENDANT PLUS DE FLEXIBILITE ET DE CONTROLE.

//document.querySelector("h1").addEventListener('click', function () {
    // Code
//})

// INTERSECTION OBSERVERS

//SectionObserver = new IntersectionObserver (
//    function (entrees) {
//        entrees.array.forEach(function(unique) {
//            console.log(unique);   
//        });
//    }
//)

window.onload = ()=>{

    // 1ère chose à faire : Créer notre observer.
    let sectionObserver = new IntersectionObserver((entries) => {
        console.log(entries); 
        
        // Entries est un tableau donc il faut le parcourir avec un forEach
        entries.forEach((singleEntry) => {
            // Si le ratio d'intersection est supérieur à 0 alors la section est visible dans le viewport (même si non affichée)
            if(singleEntry.intersectionRatio > 0){
                singleEntry.target.classList.add("visible");
            }
            else {
                singleEntry.target.classList.remove("visible");
            }
        });

    });

    // 2ème étape : récupérer toutes les occurrences des éléments que l'on souhaite observer
    let allSections = document.querySelectorAll("section"); // On récupère ici tout les éléments "section"

    // 3ème étape : parcours du tableau d'occurrences afin d'obsercer chaque objet indépendament des autres
    allSections.forEach((singleSection) => { // On récupère toutes les sections en section unique
        sectionObserver.observe(singleSection); // On observe chaque section    
    });
}