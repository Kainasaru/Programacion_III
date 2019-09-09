<?php
$rows = $_POST["rows"];
$cols = $_POST["cols"];
$result = "<h1>Su tabla</h1><table border='1'><tbody>";
for($i = 0 ; $i < $rows ; $i++)  {
    $result .= "<tr>";
    for($j = 0 ; $j < $cols ; $j++) {
        $result .= "<td>(".($i+1).";".($j+1).")</td>";
    }
    $result .= "</tr>";
}
$result .= "</tbody></table>";
echo $result;
?>