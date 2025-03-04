<?php
// contoh bilangan prima = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29]
// Cek apakah sebuah bilangan adalah bilangan prima
function cekPrima($angka) {
    if ($angka <= 1) {
        return false;
    }
    
    if ($angka <= 3) {
        return true;
    }
    
    if ($angka % 2 == 0 || $angka % 3 == 0) {
        return false;
    }
    
    $i = 5;
    while ($i * $i <= $angka) {
        if ($angka % $i == 0 || $angka % ($i + 2) == 0) {
            return false;
        }
        $i += 6;
    }
    
    return true;
}

// Contoh penggunaan
$angka = 18;
if (cekPrima($angka)) {
    echo "$angka adalah bilangan prima";
} else {
    echo "$angka bukan bilangan prima";
}
?>
