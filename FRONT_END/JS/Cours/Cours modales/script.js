window.onload= ()=>{
    let bouton = document.querySelector('button');

    bouton.onclick = ()=>{ // Quand on clique sur le bouton on affiche la modal via toggle de la classe show
        let titre = bouton.getAttribute("data-titre");
        document.querySelector("#modale #head h3").innerHTML = titre;
        toggleModal();
    }

    document.querySelector("#voile").onclick = ()=>{ // On dit que quand on clique sur le voile on toggle la classe show pour retirer la modal
        toggleModal();
    }
    document.querySelector("#croix").onclick = ()=>{ // On dit que quand on clique sur le voile on toggle la classe show pour retirer la modal
        toggleModal();
    }

    toggleModal = ()=>{
        document.querySelector("#voile").classList.toggle("show");
        document.querySelector("#modale").classList.toggle("show");
    }
}