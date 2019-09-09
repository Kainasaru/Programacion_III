<?php
if( $_POST["pass1"] == $_POST["pass2"] ) {
    header("Location: ./welcome.php");
}
else  { 
    header("Location: ./index.php");
}
?>
