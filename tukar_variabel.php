<?php
// Menukar nilai dua variabel
$a = 5;
$b = 60;

echo "Sebelum ditukar: a = $a, b = $b \n";

// // Cara tanpa variabel temporary
// $a = $a + $b;
// $b = $a - $b;
// $a = $a - $b;

// echo "Setelah ditukar: a = $a, b = $b \n";

// Cara 2: Tanpa variabel sementara (PHP specific)
list($a, $b) = [$b, $a];

echo "Setelah ditukar : a = $a, b = $b \n";
?>
