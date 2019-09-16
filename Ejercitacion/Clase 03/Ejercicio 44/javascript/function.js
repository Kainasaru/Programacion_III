window.onbeforeunload = function () {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "./subir.php");
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("session=destroy");
};
