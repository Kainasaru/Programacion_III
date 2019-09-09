<?php
function agregarComas($array, $itemsPorLinea) {
    $data = "";
    $counter = 0;
    for($i = 0 ; $i < count($array) ; $i++) {
        if($itemsPorLinea == $counter) {
            $data .= "<br/>";
            $counter = 0;
        }
        $data .= ($i == count($array)-1)? $array[$i]."." : $array[$i].", ";
        $counter++;
    }
    return $data;
}
?>