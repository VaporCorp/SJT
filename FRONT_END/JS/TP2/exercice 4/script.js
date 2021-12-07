window.onload = ()=>{
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
        else if ( index == "Mammiferes"){
            displayNone();
            document.getElementById("Mammiferes").style.display = "block";
        }
        else if ( index == "Poissons"){
            displayNone();
            document.getElementById("Poissons").style.display = "block";
        }
        else if ( index == "Oiseaux"){
            displayNone();
            document.getElementById("Oiseaux").style.display = "block";
        }
        else if ( index == "Reptiles"){
            displayNone();
            document.getElementById("Reptiles").style.display = "block";
        }
    }
}