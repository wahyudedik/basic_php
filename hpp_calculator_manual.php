<?php
// Kalkulator HPP sederhana dengan penyimpanan array dan input manual

// Inisialisasi struktur data
$products = [];
$next_id = 1;

// Fungsi untuk membuat produk baru
function buatProduk($nama, $bahan_baku = [], $tenaga_kerja = [], $overhead = [])
{
    // global berfungsi untuk mengakses variabel global dari dalam fungsi
    global $products, $next_id;

    $produk = [
        'id' => $next_id, // ID produk
        'name' => $nama, // Nama produk
        'materials' => $bahan_baku,    // Bahan baku
        'labor' => $tenaga_kerja,      // Biaya tenaga kerja
        'overhead' => $overhead,        // Biaya overhead
        'created_at' => date('Y-m-d H:i:s') // Waktu pembuatan produk
    ];

    $products[$next_id] = $produk;
    $next_id++;

    return $produk['id'];
}

// Fungsi untuk membaca produk
function dapatkanProduk($id)
{
    global $products;

    if (isset($products[$id])) {
        return $products[$id];
    }

    return null;
}

// Fungsi untuk mendapatkan semua produk
function dapatkanSemuaProduk()
{
    global $products;
    return $products;
}

// Fungsi untuk memperbarui produk
function perbaruiProduk($id, $nama = null, $bahan_baku = null, $tenaga_kerja = null, $overhead = null)
{
    global $products;

    if (!isset($products[$id])) {
        return false;
    }

    if ($nama !== null) {
        $products[$id]['name'] = $nama;
    }

    if ($bahan_baku !== null) {
        $products[$id]['materials'] = $bahan_baku;
    }

    if ($tenaga_kerja !== null) {
        $products[$id]['labor'] = $tenaga_kerja;
    }

    if ($overhead !== null) {
        $products[$id]['overhead'] = $overhead;
    }

    return true;
}

// Fungsi untuk menghapus produk
function hapusProduk($id)
{
    global $products;

    if (isset($products[$id])) {
        unset($products[$id]);
        return true;
    }

    return false;
}

// Fungsi untuk menghitung HPP produk
function hitungHPP($id)
{
    global $products;

    if (!isset($products[$id])) {
        return 0;
    }

    $produk = $products[$id];
    $total = 0;

    // Hitung biaya bahan baku
    foreach ($produk['materials'] as $item) {
        $total += $item['quantity'] * $item['price'];
    }

    // Hitung biaya tenaga kerja
    foreach ($produk['labor'] as $item) {
        $total += $item['quantity'] * $item['price'];
    }

    // Hitung biaya overhead
    foreach ($produk['overhead'] as $item) {
        $total += $item['quantity'] * $item['price'];
    }

    return $total;
}

// Fungsi untuk menampilkan detail produk
function tampilkanProduk($id)
{
    global $products;

    if (!isset($products[$id])) {
        echo "Produk tidak ditemukan.\n";
        return;
    }

    $produk = $products[$id];
    $hpp = hitungHPP($id);

    echo "ID Produk: {$produk['id']}\n";
    echo "Nama: {$produk['name']}\n";
    echo "Dibuat pada: {$produk['created_at']}\n";
    echo "HPP: Rp " . number_format($hpp, 2, ',', '.') . "\n";

    echo "\nBahan Baku:\n";
    foreach ($produk['materials'] as $key => $item) {
        $total = $item['quantity'] * $item['price'];
        echo "- {$item['name']}: {$item['quantity']} {$item['unit']} x Rp " .
            number_format($item['price'], 2, ',', '.') .
            " = Rp " . number_format($total, 2, ',', '.') . "\n";
    }

    echo "\nTenaga Kerja:\n";
    foreach ($produk['labor'] as $key => $item) {
        $total = $item['quantity'] * $item['price'];
        echo "- {$item['name']}: {$item['quantity']} {$item['unit']} x Rp " .
            number_format($item['price'], 2, ',', '.') .
            " = Rp " . number_format($total, 2, ',', '.') . "\n";
    }

    echo "\nOverhead:\n";
    foreach ($produk['overhead'] as $key => $item) {
        $total = $item['quantity'] * $item['price'];
        echo "- {$item['name']}: {$item['quantity']} {$item['unit']} x Rp " .
            number_format($item['price'], 2, ',', '.') .
            " = Rp " . number_format($total, 2, ',', '.') . "\n";
    }

    echo "\nTotal HPP: Rp " . number_format($hpp, 2, ',', '.') . "\n";
}

// Fungsi untuk mendapatkan input pengguna
function dapatkanInputPengguna($prompt)
{
    echo $prompt;
    return trim(fgets(STDIN));
}

// Fungsi untuk mendapatkan input numerik
function dapatkanInputNumerik($prompt)
{
    while (true) {
        $input = dapatkanInputPengguna($prompt);
        if (is_numeric($input)) {
            return floatval($input);
        }
        echo "Mohon masukkan angka yang valid.\n";
    }
}

// Fungsi untuk menambahkan produk baru secara manual
function tambahProdukManual()
{
    // Dapatkan nama produk
    $nama = dapatkanInputPengguna("Masukkan nama produk: ");

    // Dapatkan bahan baku
    $bahan_baku = [];
    echo "\n-- BAHAN BAKU --\n";
    $jumlah_bahan = dapatkanInputNumerik("Berapa jenis bahan baku yang akan ditambahkan? ");

    for ($i = 0; $i < $jumlah_bahan; $i++) {
        echo "\nBahan #" . ($i + 1) . "\n";
        $nama_bahan = dapatkanInputPengguna("Nama bahan: ");
        $jumlah = dapatkanInputNumerik("Jumlah: ");
        $satuan = dapatkanInputPengguna("Satuan (misal: kg, liter, pcs): ");
        $harga = dapatkanInputNumerik("Harga per satuan (Rp): ");

        $bahan_baku[] = [
            'name' => $nama_bahan,
            'quantity' => $jumlah,
            'unit' => $satuan,
            'price' => $harga
        ];
    }

    // Dapatkan biaya tenaga kerja
    $tenaga_kerja = [];
    echo "\n-- BIAYA TENAGA KERJA --\n";
    $jumlah_tenaga_kerja = dapatkanInputNumerik("Berapa jenis biaya tenaga kerja yang akan ditambahkan? ");

    for ($i = 0; $i < $jumlah_tenaga_kerja; $i++) {
        echo "\nTenaga Kerja #" . ($i + 1) . "\n";
        $deskripsi = dapatkanInputPengguna("Deskripsi tenaga kerja: ");
        $jumlah = dapatkanInputNumerik("Jumlah: ");
        $satuan = dapatkanInputPengguna("Satuan (misal: jam, hari, orang): ");
        $harga = dapatkanInputNumerik("Biaya per satuan (Rp): ");

        $tenaga_kerja[] = [
            'name' => $deskripsi,
            'quantity' => $jumlah,
            'unit' => $satuan,
            'price' => $harga
        ];
    }

    // Dapatkan biaya overhead
    $overhead = [];
    echo "\n-- BIAYA OVERHEAD --\n";
    $jumlah_overhead = dapatkanInputNumerik("Berapa jenis biaya overhead yang akan ditambahkan? ");

    for ($i = 0; $i < $jumlah_overhead; $i++) {
        echo "\nOverhead #" . ($i + 1) . "\n";
        $deskripsi = dapatkanInputPengguna("Deskripsi overhead: ");
        $jumlah = dapatkanInputNumerik("Jumlah: ");
        $satuan = dapatkanInputPengguna("Satuan: ");
        $harga = dapatkanInputNumerik("Biaya per satuan (Rp): ");

        $overhead[] = [
            'name' => $deskripsi,
            'quantity' => $jumlah,
            'unit' => $satuan,
            'price' => $harga
        ];
    }

    // Buat produk
    $id = buatProduk($nama, $bahan_baku, $tenaga_kerja, $overhead);
    echo "\nProduk berhasil dibuat dengan ID: $id\n";

    return $id;
}

// Fungsi untuk memperbarui produk secara manual
function perbaruiProdukManual($id)
{
    global $products;

    if (!isset($products[$id])) {
        echo "Produk tidak ditemukan.\n";
        return false;
    }

    // Dapatkan nama produk
    $nama = dapatkanInputPengguna("Masukkan nama produk baru (atau tekan Enter untuk membiarkan sama): ");
    if (empty($nama)) {
        $nama = null;
    }

    // Tanya apakah pengguna ingin memperbarui bahan baku
    $perbarui_bahan = dapatkanInputPengguna("\nPerbarui bahan baku? (y/n): ");
    $bahan_baku = null;

    if (strtolower($perbarui_bahan) === 'y') {
        $bahan_baku = [];
        echo "\n-- BAHAN BAKU --\n";
        $jumlah_bahan = dapatkanInputNumerik("Berapa jenis bahan baku yang akan ditambahkan? ");

        for ($i = 0; $i < $jumlah_bahan; $i++) {
            echo "\nBahan #" . ($i + 1) . "\n";
            $nama_bahan = dapatkanInputPengguna("Nama bahan: ");
            $jumlah = dapatkanInputNumerik("Jumlah: ");
            $satuan = dapatkanInputPengguna("Satuan (misal: kg, liter, pcs): ");
            $harga = dapatkanInputNumerik("Harga per satuan (Rp): ");

            $bahan_baku[] = [
                'name' => $nama_bahan,
                'quantity' => $jumlah,
                'unit' => $satuan,
                'price' => $harga
            ];
        }
    }

    // Tanya apakah pengguna ingin memperbarui tenaga kerja
    $perbarui_tenaga = dapatkanInputPengguna("\nPerbarui biaya tenaga kerja? (y/n): ");
    $tenaga_kerja = null;

    if (strtolower($perbarui_tenaga) === 'y') {
        $tenaga_kerja = [];
        echo "\n-- BIAYA TENAGA KERJA --\n";
        $jumlah_tenaga_kerja = dapatkanInputNumerik("Berapa jenis biaya tenaga kerja yang akan ditambahkan? ");

        for ($i = 0; $i < $jumlah_tenaga_kerja; $i++) {
            echo "\nTenaga Kerja #" . ($i + 1) . "\n";
            $deskripsi = dapatkanInputPengguna("Deskripsi tenaga kerja: ");
            $jumlah = dapatkanInputNumerik("Jumlah: ");
            $satuan = dapatkanInputPengguna("Satuan (misal: jam, hari, orang): ");
            $harga = dapatkanInputNumerik("Biaya per satuan (Rp): ");

            $tenaga_kerja[] = [
                'name' => $deskripsi,
                'quantity' => $jumlah,
                'unit' => $satuan,
                'price' => $harga
            ];
        }
    }

    // Tanya apakah pengguna ingin memperbarui overhead
    $perbarui_overhead = dapatkanInputPengguna("\nPerbarui biaya overhead? (y/n): ");
    $overhead = null;

    if (strtolower($perbarui_overhead) === 'y') {
        $overhead = [];
        echo "\n-- BIAYA OVERHEAD --\n";
        $jumlah_overhead = dapatkanInputNumerik("Berapa jenis biaya overhead yang akan ditambahkan? ");

        for ($i = 0; $i < $jumlah_overhead; $i++) {
            echo "\nOverhead #" . ($i + 1) . "\n";
            $deskripsi = dapatkanInputPengguna("Deskripsi overhead: ");
            $jumlah = dapatkanInputNumerik("Jumlah: ");
            $satuan = dapatkanInputPengguna("Satuan: ");
            $harga = dapatkanInputNumerik("Biaya per satuan (Rp): ");

            $overhead[] = [
                'name' => $deskripsi,
                'quantity' => $jumlah,
                'unit' => $satuan,
                'price' => $harga
            ];
        }
    }

    // Perbarui produk
    $hasil = perbaruiProduk($id, $nama, $bahan_baku, $tenaga_kerja, $overhead);

    if ($hasil) {
        echo "\nProduk berhasil diperbarui.\n";
    } else {
        echo "\nGagal memperbarui produk.\n";
    }

    return $hasil;
}

// Menu utama
function tampilkanMenuUtama()
{
    while (true) {
        echo "\n========= KALKULATOR HPP =========\n";
        echo "HPP adalah Total Biaya yang dikeluarkan untuk menghasilkan suatu produk.\n";
        echo "1. Tambah produk baru\n";
        echo "2. Lihat semua produk\n";
        echo "3. Lihat detail produk\n";
        echo "4. Perbarui produk\n";
        echo "5. Hapus produk\n";
        echo "6. Keluar\n";
        echo "=======================================\n";

        $pilihan = dapatkanInputPengguna("Masukkan pilihan Anda (1-6): ");

        switch ($pilihan) {
            case '1':
                tambahProdukManual();
                break;

            case '2':
                tampilkanSemuaProduk();
                break;

            case '3':
                $id = dapatkanInputNumerik("Masukkan ID produk: ");
                tampilkanProduk($id);
                break;

            case '4':
                $id = dapatkanInputNumerik("Masukkan ID produk yang akan diperbarui: ");
                perbaruiProdukManual($id);
                break;

            case '5':
                $id = dapatkanInputNumerik("Masukkan ID produk yang akan dihapus: ");
                if (hapusProduk($id)) {
                    echo "Produk berhasil dihapus.\n";
                } else {
                    echo "Gagal menghapus produk. Produk mungkin tidak ada.\n";
                }
                break;

            case '6':
                echo "Keluar dari program. Terima kasih!\n";
                exit(0);

            default:
                echo "Pilihan tidak valid. Silakan coba lagi.\n";
        }
    }
}

// Fungsi untuk menampilkan semua produk
function tampilkanSemuaProduk()
{
    global $products;

    if (empty($products)) {
        echo "Tidak ada produk yang ditemukan.\n";
        return;
    }

    echo "\n===== Daftar Produk =====\n";
    foreach ($products as $id => $product) {
        $hpp = hitungHPP($id);
        echo "{$product['id']}. {$product['name']} - HPP: Rp " . number_format($hpp, 2, ',', '.') . "\n";
    }
}

// Mulai program
echo "Selamat datang di Kalkulator HPP\n";
tampilkanMenuUtama();
