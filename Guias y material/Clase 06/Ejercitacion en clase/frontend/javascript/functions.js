function login() {
    var correo = document.getElementById("correo").value;
    var clave = document.getElementById("clave").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.response == 1) {
                document.getElementById("result").style.color = "green";
                document.getElementById("result").innerHTML = "Login exitoso";
                document.getElementById("result").hidden = false;
            }
            else {
                document.getElementById("result").style.color = "red";
                document.getElementById("result").innerHTML = "Datos incorrectos";
                document.getElementById("result").hidden = false;
            }
        }
    };
    xhttp.open("POST", "../backend/nexo.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("option=existeUsuario&correo=" + correo + "&clave=" + clave);
}
function register() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var clave = document.getElementById("clave").value;
    var correo = document.getElementById("correo").value;
    var perfil = document.getElementById("perfil").value;
    var estado = document.getElementById("estado").value;
    var fotoBinary = document.getElementById("foto").files[0];
    var form = new FormData();
    var xhttp = new XMLHttpRequest();
    form.append("loginData", "{\"nombre\":\"" + nombre + "\",\"apellido\":\"" + apellido + "\",\"clave\":\"" + clave + "\",\"perfil\":" + perfil + ",\"estado\":" + estado + ",\"correo\":\"" + correo + "\"}");
    form.append("foto", fotoBinary);
    form.append("option", "insertarUsuario");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.response == 1) {
                document.getElementById("result").style.color = "green";
                document.getElementById("result").innerHTML = "Registro exitoso";
                document.getElementById("result").hidden = false;
            }
            else {
                document.getElementById("result").style.color = "red";
                document.getElementById("result").innerHTML = "El email ya existe";
                document.getElementById("result").hidden = false;
            }
        }
    };
    xhttp.open("POST", "../backend/nexo.php", true);
    xhttp.setRequestHeader("enctype", "multipart/form-data");
    xhttp.send(form);
}
