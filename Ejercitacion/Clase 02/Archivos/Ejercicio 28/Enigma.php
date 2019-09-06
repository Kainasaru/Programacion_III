<?php
/*Crear la clase Enigma, la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
Su método estático Encriptar, recibirá un mensaje y a cada número del código ASCII de cada carácter 
del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un archivo de texto
 (el path también se recibirá por parámetro). Retornará TRUE si pudo guardar correctamente el archivo 
 encriptado, FALSE, caso contrario.
El método estático Desencriptar, recibirá sólo el path de dónde se leerá el archivo. Realizar el proceso
 inverso para restarle a cada número del código ASCII de cada carácter leído 200, para poder retornar el 
 mensaje y ser mostrado desesncriptado.-->*/
class Enigma {
    public static function encriptar($message, $filePath ) {
        $ret = false;
        for($i = 0 ; $i < strlen($message) ; $i++) {
            $message[$i] = chr( ord($message[$i]) + 200);
        }
        if( ($arch = fopen($filePath,"w")) ) {
            if( fwrite($arch,$message) !== false ) {
                if( fclose($arch) !== false ) {
                    $ret = true;
                }
            }
        }
        return $ret;
    }
    public static function desemcriptar( $filePath ) {
        $arch = fopen($filePath,"r");
        $message = fread($arch,filesize($filePath));
        fclose($arch);
        for($i = 0 ; $i < strlen($message) ; $i++) {
            $message[$i] = chr( ord($message[$i]) - 200);
        }
        return $message;
    }
    
}
?>