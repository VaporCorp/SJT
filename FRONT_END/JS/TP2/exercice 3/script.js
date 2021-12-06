/* window.onload = ()=>{
    
    let liens = document.querySelectorAll("a");
    
    liens.forEach((lien) => {
        lien.onclick = (callback) => {
            callback.preventDefault();
        }
    })

    this.scrollTo({top:0, behavior:"smooth"})

    // 1ère chose à faire : Créer notre observer.
    let sectionObserver = new IntersectionObserver((entries) => {
        console.log(entries); 
        
        // Entries est un tableau donc il faut le parcourir avec un forEach
        entries.forEach((singleEntry) => {
            // Si le ratio d'intersection est supérieur à 0 alors la section est visible dans le viewport (même si non affichée)
            if(singleEntry.intersectionRatio > 0 && singleEntry.isIntersecting){
                console.log(singleEntry.target);
            }
            else {
                console.log(singleEntry.target);
            }
        });

    });

    // 2ème étape : récupérer toutes les occurrences des éléments que l'on souhaite observer
    let allSections = document.querySelectorAll("section"); // On récupère ici tout les éléments "section"

    // 3ème étape : parcours du tableau d'occurrences afin d'obsercer chaque objet indépendament des autres
    allSections.forEach((singleSection) => { // On récupère toutes les sections en section unique
        sectionObserver.observe(singleSection); // On observe chaque section    
    });
}    */


// --------------------------------------------------- CORRECTION --------------------------------------------------- //

window.onload = ()=>{
    let allLinks = document.querySelectorAll("a");

    allLinks.forEach((singleLink)=>{
        singleLink.onclick = (e)=>{
            e.preventDefault();
            let valeurLienEpure = singleLink.getAttribute("href").replace("#", "");
            let offset = document.getElementById(valeurLienEpure).offsetTop;
            this.scrollTo({top:offset, behavior:"smooth"})
        }
    })

    // 1ère chose à faire : Créer notre observer.
    let sectionObserver = new IntersectionObserver((entries) => {
        console.log(entries); 
        
        // Entries est un tableau donc il faut le parcourir avec un forEach
        entries.forEach((singleEntry) => {
            let lienCible = document.querySelector("a[href='#"+singleEntry.target.getAttribute('id')+"']");
            // Si le ratio d'intersection est supérieur à 0 alors la section est visible dans le viewport (même si non affichée)
            if(singleEntry.intersectionRatio > 0){
                lienCible.classList.add("visible");
            }
            else {
                lienCible.classList.remove("visible");
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