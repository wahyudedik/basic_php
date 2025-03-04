<!-- 
contoh soal :
1. jika saya memiliki data berikut:
januari :
 biaya penjualan = 45.667
 biaya operational = 34.546

 februari :
  biaya penjualan = 34.434
  biaya operational = 76.768

maret : 
 biaya penjualan = 78.645
 biaya operational = 98.998 -->

<?php
// Data biaya operational
$biaya_operational = array(34.546, 76.768, 98.998);

// Menghitung rata-rata
$total_biaya = array_sum($biaya_operational);
$jumlah_bulan = count($biaya_operational);
$rata_rata = $total_biaya / $jumlah_bulan;

// Menghitung persentase untuk setiap bulan
$persentase = array();
foreach ($biaya_operational as $biaya) {
    $persentase[] = ($biaya / $total_biaya) * 100;
}

// Menampilkan hasil
echo "Rata-rata biaya operational: " . number_format($rata_rata, 3) . "\n";
echo "Persentase per bulan:\n";
echo "Januari: " . number_format($persentase[0], 2) . "%\n";
echo "Februari: " . number_format($persentase[1], 2) . "%\n";
echo "Maret: " . number_format($persentase[2], 2) . "%\n";
echo "Total persentase semua bulan: " . number_format(array_sum($persentase), 2) . "%\n"; ?>