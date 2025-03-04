<?php

$romanValues = [
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'L' => 50,
    'C' => 100,
    'D' => 500,
    'M' => 1000
];

$input = "III";
$hasil = 0;
$nilaisebelumnya = 0;

for ($i = strlen($input) - 1; $i >= 0; $i--) {
    $nilaisekarang = $romanValues[$input[$i]];
    
    if ($nilaisekarang >= $nilaisebelumnya) {
        $hasil += $nilaisekarang;
    } else {
        $hasil -= $nilaisekarang;
    }
    
    $nilaisebelumnya = $nilaisekarang;
}

echo $hasil;
