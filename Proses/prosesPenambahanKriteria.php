<?php
require_once "../Controller/Kriteria.php";
$kriteria = new kriteria();

if (isset($_POST['submit'])) {
    $datas = [
        'id_laptop' => $_POST['id_leptop'],
        'ram' => $_POST['ram'],
        'core' => $_POST['core'],
        'pemakaian' => $_POST['pemakaian'],
        'bobot' => $_POST['bobot'],
        'harga' => $_POST['harga']
    ];

    $kriteria->tambahKriteria($datas);
    header("Location: ../DaftarLeptop.php");
} else {
    echo "Form belum disubmit.";
}
?>
