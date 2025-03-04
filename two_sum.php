<?php

function twoSum($arrayAngka, $targetJumlah)
{
    $temukanAngka = [];

    for ($indeks = 0; $indeks < count($arrayAngka); $indeks++) {
        $angkaKomplemen = $targetJumlah - $arrayAngka[$indeks];

        if (isset($temukanAngka[$angkaKomplemen])) {
            return [$temukanAngka[$angkaKomplemen], $indeks];
        }

        $temukanAngka[$arrayAngka[$indeks]] = $indeks;
    }

    return [];
}

// Test with the given example
$arrayAngka = [3, 2, 4];
$targetJumlah = 6;
$hasilPencarian = twoSum($arrayAngka, $targetJumlah);

echo "Output: [" . implode(',', $hasilPencarian) . "]\n";
