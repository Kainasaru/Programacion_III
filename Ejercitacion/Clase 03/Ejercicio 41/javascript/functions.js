function saveSelectedImg(imagen) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "./procesar.php", false);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("imgurl=" + imagen.src);
}
function mostrarImagen(img) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("img").src = xhttp.response;
        }
    };
    xhttp.open("POST", "./procesar.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("cargar=true");
}
window.onbeforeunload = function () {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "./procesar.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("destroy=session");
};
