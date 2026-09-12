<?php
require_once "Controller/Leptop.php";
require_once "Controller/kriteria.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Leptop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Leptop</h1>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="5">Kriteria</th>
                        <th rowspan="2">hapus</th>
                    </tr>
                    <tr>
                        <th>Ram</th>
                        <th>Core</th>
                        <th>Max Pemakaian</th>
                        <th>Bobot</th>
                        <th>harga</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $leptop = new leptop();
                    $no = 1;
                    $datas = $leptop->getLeptop();
                    foreach ($datas as $data) {
                        echo "<tr>
                            <td>" . $no++ . "</td>
                            <td>$data[nama]</td>";
                        $kriteria = new kriteria();
                        $status = false;
                        $ks = $kriteria->getKriteria();

                        foreach( $ks as $k) {
                            if($k['id_laptop'] === $data['id']){
                                $status = true;
                                break;
                            }
                        }
                        if( $status ){
                        echo "<td>$k[ram]</td>
                            <td>$k[core]</td>
                            <td>$k[pemakaian]</td>
                            <td>$k[bobot]</td>
                            <td>$k[harga]</td>";
                        }
                        else {
                        echo "<td colspan=\"5\">
                            <form method=\"POST\" action=\"Form/FormTambahKriteria.php\">
                                <input type=\"hidden\" name=\"id\" value=\"$data[id]\">
                                <button type=\"submit\" class=\"btn btn-outline\">kriteria</button>
                            </form>";
                        }
                        echo "<td><a class=\"btn btn-danger\" href=\"Proses/prosesDelete.php?id=" . $data['id'] . "&kondisi=leptop\" 
                                onclick=\"return confirm('Yakin?')\">
                                Delete
                            </a></td>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="action-row">
            <a class="btn" href="Form/FormTambahLeptop.php">Tambah Leptop</a>
            <a class="btn btn-secondary" href="Proses/prosesHitungHasil.php">Hitung Hasil</a>
        </div>
    </div>
</body>
</html>