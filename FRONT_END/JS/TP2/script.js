window.onload = ()=>{
    document.querySelector("#makeBigger").onclick = () =>{
        let monImage = document.querySelector("img");
        if(monImage.getAttribute('src') == 'img/big.jpg') {
            monImage.setAttribute('src', 'img/small.jpg');
            document.querySelector("#makeBigger").innerHTML = "Agrandir l'image";
        }
        else{
            document.querySelector("#makeBigger").innerHTML = "Rétrécir l'image";
            monImage.setAttribute('src', 'img/big.jpg');
        }
    }
    document.querySelector("#darkMode").onclick = ()=>{
        document.body.classList.toggle("dark");
        let statut;

        if(document.body.classList.contains("dark")){
            statut = "Mode clair";
        }
        else {
            statut = "Mode sombre";
        }
        
        document.querySelector("#darkMode").innerHTML = statut 
    }
    
    document.querySelector("a").onclick = (callback)=>{
        callback.preventDefault();

        document.querySelector("a").classList.toggle("textAdded");

        let texteEnPlus = "Voici ce que je souhaite afficher en plus !";

        if(document.querySelector("a").classList.contains("textAdded")){
            document.querySelector("#loadMore").append(texteEnPlus);
            document.querySelector("a").innerHTML = "Afficher -";
        }

        else {
            let oldText = document.querySelector("#loadMore").innerHTML += texteEnPlus;
            let newText = oldText.replace(texteEnPlus, "");
        }
        document.querySelector("#loadMore").innerHTML = newText;
        document.querySelector("a").innerHTML = ""
    }

    allTD = document.querySelectorAll("td");
    allTD.forEach(function(singleTD){
        singleTD.onclick = ()=> {
            singleTD.classList.toggle("red");
        };
    });

    document.getElementById("envoyer").onclick = ()=>{
        var inputVal = document.querySelector("input").value;
        document.form.innerHTML = `<p>${inputVal}</p>`;
    }
}