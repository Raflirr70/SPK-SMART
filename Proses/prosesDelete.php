<?php
require_once '../Controller/Leptop.php';
require_once '../Controller/Hasil.php';
// srequire_once 'DaftarLeptop.php';
$leptop = new Leptop();
$hasil = new Hasil();

echo $_GET['kondisi'];
if($_GET['kondisi'] === "leptop"){
    $id = $_GET['id'];
    
    $leptop->deleteLeptop($id);    
    echo "Item dengan ID $id berhasil dihapus.";
}else if($_GET['kondisi'] === "hasil"){
    $hasil->clear();

}
header("Location: ../DaftarLeptop.php");

