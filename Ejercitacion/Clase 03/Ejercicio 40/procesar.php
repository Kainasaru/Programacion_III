<?php 
session_start();
if( isset($_POST["destroy"]) ) {
    session_unset();
}
else if( isset($_POST["cargar"])) {
    echo $_SESSION["imagen"];
}
else {
    $_SESSION["imagen"] = $_POST["imgurl"];
}
?>