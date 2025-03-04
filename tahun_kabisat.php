<?php
// Mengecek apakah tahun adalah tahun kabisat
function cekKabisat($tahun) {
    if (($tahun % 4 == 0 && $tahun % 100 != 0) || $tahun % 400 == 0) {
        return true;
    } else {
        return false;
    }
}

$tahun = 2025;
if (cekKabisat($tahun)) {
    echo "$tahun adalah tahun kabisat";
} else {
    echo "$tahun bukan tahun kabisat";
}
?>
