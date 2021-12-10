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

    choix = ()=> {
        let index = document.getElementById('select').options[document.getElementById('select').selectedIndex].value;
        console.log(index);
        displayNone = ()=> {
            var elems = document.getElementsByClassName('tous');
            for (var i = 0; i < elems.length; i += 1) {
                elems[i].style.display = 'none';
            }
        }
        if( index == "All"){
            var elems = document.getElementsByClassName('tous');
            for (var i=0;i<elems.length;i+=1){
                elems[i].style.display = 'block';
            }
        }
        else if ( index == "Romance"){
            displayNone();
            document.getElementById("Romance").style.display = "block";
        }
        else if ( index == "Sci-fi"){
            displayNone();
            document.getElementById("Sci-fi").style.display = "block";
        }
        else if ( index == "Action"){
            displayNone();
            document.getElementById("Action").style.display = "block";
        }
        else if ( index == "Fantaisy"){
            displayNone();
            document.getElementById("Fantaisy").style.display = "block";
        }
    }
}