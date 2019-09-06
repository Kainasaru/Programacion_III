<?php
require_once "./Enigma.php";
if( isset($_POST["msg"]) && isset($_POST["file"]) ) {
    Enigma::encriptar($_POST["msg"],$_POST["file"]);
}
else if( isset($_POST["file2"])) {
    echo "El mensaje es: ".Enigma::desemcriptar($_POST["file2"]);
}
?>
