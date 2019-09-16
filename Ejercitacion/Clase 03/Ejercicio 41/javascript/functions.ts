function saveSelectedImg(imagen : HTMLImageElement ) {
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    xhttp.open("POST","./procesar.php",false);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhttp.send(`imgurl=${imagen.src}`);
}

function mostrarImagen(img : HTMLImageElement) {
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            (<HTMLImageElement>document.getElementById("img")).src = xhttp.response;
        }
    };
    xhttp.open("POST","./procesar.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhttp.send("cargar=true");

}

window.onbeforeunload = () => {
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    xhttp.open("POST","./procesar.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhttp.send("destroy=session");
}

