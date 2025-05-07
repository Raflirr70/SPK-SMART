<?php
require_once "../Controller/Hasil.php";
$hasil = new Hasil();

$hasil->hitungHasil();
header("Location: ../HitungHasil.php");