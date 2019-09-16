<?php 
session_start();
if( isset($_POST["destroy"]) ) {
    $file = fopen("./images/".session_id()."/table.txt","w");
    fwrite($file,$_SESSION["tabla"]);
    fclose($file);
    session_unset();
}
else if( isset($_POST["cargar"])) {
    echo $_SESSION["imagen"]; // Retorno la url de la imagen seleccionada
}
else {
    $_SESSION["imagen"] = $_POST["imgurl"]; //Seteo la url de al imagen seleccionada
}
?>