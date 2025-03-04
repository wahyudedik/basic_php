<?php
// Mengurutkan array
$angka = [5, 3, 8, 1, 9, 2, 7];

echo "Array awal: " . implode(", ", $angka) . "\n";

// Mengurutkan secara ascending (dari kecil ke besar)
sort($angka);
echo "Setelah diurutkan (ascending): " . implode(", ", $angka) . "\n";

// Mengurutkan secara descending (dari besar ke kecil)
rsort($angka);
echo "Setelah diurutkan (descending): " . implode(", ", $angka) . "\n";

// Array asosiatif
$nilaiSiswa = [
    "Budi" => 85,
    "Ani" => 92,
    "Dodi" => 78,
    "Siti" => 90
];

echo "Nilai siswa awal: \n";
foreach ($nilaiSiswa as $nama => $nilai) {
    echo "$nama: $nilai\n";
}

// Mengurutkan berdasarkan nilai (value)
asort($nilaiSiswa); // ascending
echo "Setelah diurutkan berdasarkan nilai (ascending): \n";
foreach ($nilaiSiswa as $nama => $nilai) {
    echo "$nama: $nilai\n";
}

// Mengurutkan berdasarkan nama (key)
ksort($nilaiSiswa); // ascending
echo "Setelah diurutkan berdasarkan nama (ascending): \n";
foreach ($nilaiSiswa as $nama => $nilai) {
    echo "$nama: $nilai\n";
}
?>
