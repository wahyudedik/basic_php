<?php
// Mencetak pola segitiga
$tinggi = 5;

// Pola 1: Segitiga siku-siku
echo "Pola 1: Segitiga siku-siku\n";
for ($i = 1; $i <= $tinggi; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}

echo "\n";

// Pola 2: Segitiga siku-siku terbalik
echo "Pola 2: Segitiga siku-siku terbalik\n";
for ($i = $tinggi; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
?>
