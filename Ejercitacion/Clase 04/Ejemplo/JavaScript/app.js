"use strict";
/// <reference path="ajax.ts" />
var Main;
(function (Main) {
    var ajax = new Ajax();
    function EstablecerConexion() {
        var parametros = "queHago=establecerConexion";
        ajax.Post("administracion.php", Success, parametros, Fail);
    }
    Main.EstablecerConexion = EstablecerConexion;
    function EjecutarConsulta() {
        var parametros = "queHago=ejecutarConsulta";
        ajax.Post("administracion.php", Success, parametros, Fail);
    }
    Main.EjecutarConsulta = EjecutarConsulta;
    function MostrarConsulta() {
        var parametros = "queHago=mostrarConsulta";
        ajax.Post("administracion.php", Success, parametros, Fail);
    }
    Main.MostrarConsulta = MostrarConsulta;
    function EjecutarInsert() {
        var parametros = "queHago=ejecutarInsert";
        ajax.Post("administracion.php", Success, parametros, Fail);
    }
    Main.EjecutarInsert = EjecutarInsert;
    function EjecutarUpdate() {
        var parametros = "queHago=ejecutarUpdate";
        ajax.Post("administracion.php", Success, parametros, Fail);
    }
    Main.EjecutarUpdate = EjecutarUpdate;
    function EjecutarDelete() {
        var parametros = "queHago=ejecutarDelete";
        ajax.Post("administracion.php", Success, parametros, Fail);
    }
    Main.EjecutarDelete = EjecutarDelete;
    function Success(retorno) {
        console.clear();
        console.log(retorno);
        document.getElementById("divResulado").innerHTML = retorno;
    }
    function Fail(retorno) {
        console.clear();
        console.log(retorno);
        alert("Ha ocurrido un ERROR!!!");
    }
})(Main || (Main = {}));
//# sourceMappingURL=app.js.map