<?php
// Sample data
$data = [
    'Januari' => [
        'total_penjualan' => 67000,
        'biaya_layanan' => 3350
    ],
    'Februari' => [
        'total_penjualan' => 59500,
        'biaya_layanan' => 3570
    ],
    'Maret' => [
        'total_penjualan' => 61300,
        'biaya_layanan' => 3065
    ]
];

// Calculate percentage for each month
$persentase_per_bulan = [];
$total_persentase = 0;

foreach ($data as $bulan => $nilai) {
    $persentase = ($nilai['biaya_layanan'] / $nilai['total_penjualan']) * 100;
    $persentase_per_bulan[$bulan] = $persentase;
    $total_persentase += $persentase;
}

// Calculate average percentage
$rata_rata_persentase = $total_persentase / count($data);

// Display results
echo "Persentase biaya layanan per bulan:\n";
foreach ($persentase_per_bulan as $bulan => $persentase) {
    echo "$bulan: " . number_format($persentase, 2) . "%\n";
}

echo "\nRata-rata persentase biaya layanan: " 
. number_format($rata_rata_persentase, 2) . "%\n";

// Alternative calculation method (for verification)
$total_penjualan_all = 0;
$total_biaya_layanan_all = 0;

foreach ($data as $nilai) {
    $total_penjualan_all += $nilai['total_penjualan'];
    $total_biaya_layanan_all += $nilai['biaya_layanan'];
}

$persentase_keseluruhan = ($total_biaya_layanan_all / $total_penjualan_all) * 100;
echo "Persentase biaya layanan dari total keseluruhan: " 
. number_format($persentase_keseluruhan, 2) . "%\n";
?>