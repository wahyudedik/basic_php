<?php
// Menukar nilai dua variabel 
$a = 5;
$b = 60;

echo "Sebelum ditukar: a = $a, b = $b \n";

list($a, $b) = [$b, $a];

echo "Setelah ditukar : a = $a, b = $b \n";
?>
