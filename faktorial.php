<?php
// Menghitung faktorial sebuah bilangan
function faktorial($n) {
    $hasil = 1;
    for ($i = 1; $i <= $n; $i++) {
        $hasil *= $i;
    }
    return $hasil;
}

$angka = 5;
echo "Faktorial dari $angka adalah " . faktorial($angka);
?>
