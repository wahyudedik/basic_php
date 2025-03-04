<?php
// Membalik string
$kalimat = "Belajar PHP itu menyenangkan";

// Cara 1: Menggunakan fungsi strrev()
$hasil1 = strrev($kalimat);
echo "Kalimat asli: $kalimat \n";
echo "Hasil balik (cara 1): $hasil1 \n";

// Cara 2: Menggunakan loop manual
function balikString($str) {
    $hasil = "";
    $panjang = strlen($str);
    
    for ($i = $panjang - 1; $i >= 0; $i--) {
        $hasil .= $str[$i];
    }
    
    return $hasil;
}

$hasil2 = balikString($kalimat);
echo "Hasil balik (cara 2): $hasil2 \n";

// Cara 3: Membalik urutan kata
$kata = explode(" ", $kalimat);
$kataBalik = array_reverse($kata);
$hasil3 = implode(" ", $kataBalik);

echo "Hasil balik urutan kata: $hasil3";
?>
