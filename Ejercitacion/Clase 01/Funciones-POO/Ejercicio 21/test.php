<?php 

require_once "./Auto.php";
$a1 = new Auto("Ford","black");
$a2 = new Auto("Ford","red");
$a3 = new Auto("Fiat","black",100);
$a4 = new Auto("Fiat","black",2000);
$a5 = new Auto("Audi","blue",150,"02/07/1996");
$a3->agregarImpuestos(1500);
$a4->agregarImpuestos(1500);
$a5->agregarImpuestos(1500);
echo "Suma de importes de auto1 y auto2: ".Auto::add($a1,$a2).".<br>";
if($a1->equals($a1,$a2)) {
    echo "El primer auto es igual al segundo.<br>";
}
else {
    echo "El primer auto es distinto del segundo<br>";
}
if($a1->equals($a1,$a5)) {
    echo "El primer auto es igual al quinto.<br>";
}
else {
    echo "El primer auto es distinto del quinto<br>";
}
echo Auto::mostrarAuto($a1);
echo Auto::mostrarAuto($a3);
echo Auto::mostrarAuto($a5);
?>