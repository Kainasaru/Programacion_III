<?php
echo "<h1>Sus datos:</h1><br/>";
echo "Nombre: ".$_POST["name"].".<br/>";
echo "Apellido: ".$_POST["surname"].".<br/>";
echo "Edad: ".( (is_integer($_POST["age"]) && $_POST["age"] >= 0 && $_POST["age"] <= 170)? $_POST["age"] : "Error").".<br/>";
echo "Direcc&oacute;n: ".$_POST["adress"].".<br/>";
echo "Email: ".$_POST["email"].".<br/>";
echo "Curriculum Vitae: ".$_POST["cv"].".<br/>";
?>