function login() {
    let correo : string = (<HTMLInputElement>document.getElementById("correo")).value;
    let clave : string = (<HTMLInputElement>document.getElementById("clave")).value;
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            if(xhttp.response == 1) {
                document.getElementById("result").style.color = "green";
                (<HTMLDivElement>document.getElementById("result")).innerHTML = "Login exitoso";
                document.getElementById("result").hidden = false;
            }
            else {
                document.getElementById("result").style.color = "red";
                (<HTMLDivElement>document.getElementById("result")).innerHTML = "Datos incorrectos";
                document.getElementById("result").hidden = false;
            }
        }
    }
    xhttp.open("POST","../backend/nexo.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhttp.send(`option=existeUsuario&correo=${correo}&clave=${clave}`);
}

function register() {
    let nombre : string = (<HTMLInputElement>document.getElementById("nombre")).value;
    let apellido : string = (<HTMLInputElement>document.getElementById("apellido")).value;
    let clave : string = (<HTMLInputElement>document.getElementById("clave")).value;
    let correo : string = (<HTMLInputElement>document.getElementById("correo")).value;
    let perfil : string = (<HTMLInputElement>document.getElementById("perfil")).value;
    let estado : string = (<HTMLInputElement>document.getElementById("estado")).value;
    let fotoBinary : any= (<HTMLInputElement>document.getElementById("foto")).files[0];
    let form : any = new FormData();
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    form.append("loginData",`{"nombre":"${nombre}","apellido":"${apellido}","clave":"${clave}","perfil":${perfil},"estado":${estado},"correo":"${correo}"}`);
    form.append("foto",fotoBinary);
    form.append("option","insertarUsuario");
    xhttp.onreadystatechange =  () => {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            if(xhttp.response == 1) {
                document.getElementById("result").style.color = "green";
                (<HTMLDivElement>document.getElementById("result")).innerHTML = "Registro exitoso";
                document.getElementById("result").hidden = false;
            }
            else {
                document.getElementById("result").style.color = "red";
                (<HTMLDivElement>document.getElementById("result")).innerHTML = "El email ya existe";
                document.getElementById("result").hidden = false;
            }
        }
    }
    xhttp.open("POST","../backend/nexo.php",true);
    xhttp.setRequestHeader("enctype","multipart/form-data");
    xhttp.send(form);

}