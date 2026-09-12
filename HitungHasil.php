<?php
require_once "Controller/Leptop.php";
require_once "Controller/kriteria.php";
require_once "Controller/Hasil.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Leptop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Rekomendasi Leptop</h1>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="5">Kriteria</th>
                        <th rowspan="2">Nilai Akhir</th>
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
                    $hasil = new Hasil();
                    $no = 1;
                    $datas = $hasil->getHasil();
                    
                    foreach ($datas as $data) {
                        $leptop = new leptop();
                        $Ls = $leptop->getLeptop();
                        foreach($Ls as $l){
                            if($l['id'] === $data['id_laptop']){
                                    $rank = $no;
                                    $rankClass = $rank === 1 ? 'rank-1' : ($rank === 2 ? 'rank-2' : ($rank === 3 ? 'rank-3' : ''));
                                    echo '<tr class="' . $rankClass . '">
                                    <td>' . $no++ . '</td>
                                    <td>' . $l['nama'] . '</td>';
                                $kriteria = new kriteria();
                                $status = false;
                                $ks = $kriteria->getKriteria();
                
                                foreach( $ks as $k) {
                                    if($k['id_laptop'] === $data['id_laptop']){
                                        echo "<td>$k[ram]</td>
                                        <td>$k[core]</td>
                                        <td>$k[pemakaian]</td>
                                        <td>$k[bobot]</td>
                                        <td>$k[harga]</td>";
                                        break;
                                    }
                                }
                                
                            }
                        }
                        echo "<td>$data[nilai]</td>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <a class="back-link" href="Proses/prosesDelete.php?kondisi=hasil">Kembali</a>
    </div>
</body>
</html>