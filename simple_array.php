<?php
// membuat fungsi
function simpleArraySum($ar)
{
    $data = 0;
    foreach ($ar as $value) { 
        $data += $value;
    }
    return $data;
}
// sample input
$ar = [1, 2, 3, 4, 10, 11];  // isi array
$result = simpleArraySum($ar); // response dari variable 'ar'
echo $result;
?>

