window.onload = initElement;
bool = false;
function initElement(){

    document.querySelector(".button3").onclick = displayBlock;
    document.querySelector(".buttonImg").onclick = displayBlock;
    document.querySelector("#envoyer").onclick = displayBlock;

}

function displayBlock(){

   let containerInscription = document.querySelector(".containerInscription")
    let textBanner = document.querySelector(".textBanner");
   let buttonImg = document.querySelector(".buttonImg")
    if (bool === false){
        buttonImg.style.display = "none";
        textBanner.style.display = "none";
        containerInscription.style.display = "block";
        bool = true;
    }else{
        buttonImg.style.display = "block";
        textBanner.style.display = "block";
        containerInscription.style.display = "none";
        bool = false;
    }



}