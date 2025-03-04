<?php
// Menghitung jumlah dan rata-rata dari beberapa nilai
$nilai = [78, 85, 90, 75, 82];
$nilai = [
    'Budi' => 78,
    'Ani' => 85,
    'Dodi' => 90,
    'Siti' => 75,
    'Rudi' => 82
];
$jumlah = 0;

// Menghitung jumlah
foreach ($nilai as $n) {
    $jumlah += $n;
}

// Menghitung rata-rata
$rata_rata = $jumlah / count($nilai);

echo "Nilai: " . implode(", ", $nilai) . "\n";
echo "Jumlah nilai: $jumlah \n";
echo "Rata-rata nilai: $rata_rata";
?>
