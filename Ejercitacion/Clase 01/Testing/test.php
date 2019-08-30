<?php
$array = array(4,5,6,7);
unset($array[1]);
$array = array_values($array);
var_dump($array);
$arr1 = array(4,"hola");
$arr2 = array("ho",5);
$arr3 = $arr1;
echo ($arr1 == $arr2)? "true" : "false";
?>