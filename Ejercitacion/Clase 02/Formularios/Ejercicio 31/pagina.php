<?php
$superficie = ($_GET["base"] > 0 && $_GET["altura"] > 0)? $_GET["base"] * $_GET["altura"] : "ERROR";
echo "La superficie de su rectángulo es: $superficie<br/>";
?>