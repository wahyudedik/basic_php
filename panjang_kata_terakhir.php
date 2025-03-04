<?php
$n = "hello world";
$arrN = explode(" ", $n);
$panjang = strlen($arrN[count($arrN) - 1]);
echo $panjang;


$s = "   fly me   to   the moon  ";
$n = trim($s);
$arrN = explode(" ", $n);
$panjang = strlen($arrN[count($arrN) - 1]);
echo $panjang;

$n = "luffy is still joyboy";
$arrN = explode(" ", $n);
$panjang = strlen($arrN[count($arrN) - 1]);
echo $panjang;
