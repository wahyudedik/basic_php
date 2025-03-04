<?php
// Menghitung jumlah digit dalam sebuah angka
function jumlahDigit($angka)
{
    $jumlah = 0;

    // Mengonversi angka ke string
    $angkaStr = (string)$angka;

    // Menghitung jumlah digit
    for ($i = 0; $i < strlen($angkaStr); $i++) {
        $jumlah += (int)$angkaStr[$i];
    }

    return $jumlah;
}

$angka = 12345;
echo "Jumlah digit dari $angka adalah " . jumlahDigit($angka);
