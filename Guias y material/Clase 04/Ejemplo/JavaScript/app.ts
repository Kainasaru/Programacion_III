/// <reference path="ajax.ts" />

namespace Main{
    
    let ajax : Ajax = new Ajax();

    export function EstablecerConexion():void {
        
        let parametros:string = `queHago=establecerConexion`;

        ajax.Post("administracion.php", 
                    Success, 
                    parametros, 
                    Fail);            
    }

    export function EjecutarConsulta():void {
        
        let parametros:string = `queHago=ejecutarConsulta`;

        ajax.Post("administracion.php", 
                    Success, 
                    parametros, 
                    Fail);            
    }

    export function MostrarConsulta():void {
        
        let parametros:string = `queHago=mostrarConsulta`;

        ajax.Post("administracion.php", 
                    Success, 
                    parametros, 
                    Fail);            
    }

    export function EjecutarInsert():void {
        
        let parametros:string = `queHago=ejecutarInsert`;

        ajax.Post("administracion.php", 
                    Success, 
                    parametros, 
                    Fail);            
    }        
    
    export function EjecutarUpdate():void {
        
        let parametros:string = `queHago=ejecutarUpdate`;

        ajax.Post("administracion.php", 
                    Success, 
                    parametros, 
                    Fail);            
    }        
    export function EjecutarDelete():void {
        
        let parametros:string = `queHago=ejecutarDelete`;

        ajax.Post("administracion.php", 
                    Success, 
                    parametros, 
                    Fail);            
    }                
    
    function Success(retorno:string):void {
        console.clear();
        console.log(retorno);
        (<HTMLDivElement>document.getElementById("divResulado")).innerHTML = retorno;
    }

    function Fail(retorno:string):void {
        console.clear();
        console.log(retorno);
        alert("Ha ocurrido un ERROR!!!");
    }
    
}