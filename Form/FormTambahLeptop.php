<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Leptop</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Leptop</h1>
        <div class="form-card">
            <form method="POST" action="../Proses/prosesPenambahanLeptop.php">
                <div class="form-group">
                    <label for="nama">NAMA LAPTOP</label>
                    <input type="text" name="nama" required>
                </div>
                <button class="btn" type="submit" name="submit">Submit</button>
            </form>
            <a class="back-link" href="../Daftarleptop.php">Kembali</a>
        </div>
    </div>
</body>
</html>