window.onload = ()=>{

  let newDiv = document.createElement("div");
  newDiv.setAttribute('id', 'retourHautPage');
  newDiv.innerHTML = "<p>&rsaquo;</p>";

  // 2ème étape : au scroll

  window.onscroll = ()=>{
    // Si le scroll vertical est supérieur à 100px
    if (this.scrollY > 100 ){
      document.body.append(newDiv); // On créé la div

      newDiv.onclick = ()=> {
        this.scrollTo({top:0, behavior:"smooth"})
      }
    }

    // Si le scroll vertical est inférieur à 100px
    else {
      newDiv.remove(); // On supprime la div
    }
  }
}