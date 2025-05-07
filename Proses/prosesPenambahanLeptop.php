<?php
require_once "../Controller/Leptop.php";
$leptop = new leptop();

if (isset($_POST['submit'])) {
    $namas = [
        'nama' => $_POST['nama']
    ];
    $leptop->tambahLeptop($namas);
    header("Location: ../DaftarLeptop.php");
} else {
    echo "Form belum disubmit.";
}

?>
