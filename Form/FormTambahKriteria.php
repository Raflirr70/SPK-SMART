<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kriteria</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Kriteria</h1>
        <div class="form-card">
            <?php
            if (isset($_POST['id'])) {
                $id_laptop = $_POST['id'];
            }
            ?>
            <form method="POST" action="../Proses/prosesPenambahanKriteria.php">
                <input style="display:none" type="text" name="id_leptop" value="<?= $id_laptop ?>">
                <div class="form-group">
                    <label for="ram">RAM</label>
                    <input type="text" name="ram" required>
                </div>
                <div class="form-group">
                    <label for="core">CORE</label>
                    <input type="text" name="core" required>
                </div>
                <div class="form-group">
                    <label for="pemakaian">PEMAKAIAN</label>
                    <input type="text" name="pemakaian" required>
                </div>
                <div class="form-group">
                    <label for="bobot">BOBOT LAPTOP</label>
                    <input type="text" name="bobot" required>
                </div>
                <div class="form-group">
                    <label for="harga">HARGA LAPTOP</label>
                    <input type="text" name="harga" required>
                </div>
                <button class="btn" type="submit" name="submit">Submit</button>
            </form>
            <a class="back-link" href="../Daftarleptop.php">Kembali</a>
        </div>
    </div>
</body>
</html>