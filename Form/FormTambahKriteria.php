<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="../Proses/prosesPenambahanKriteria.php">
        <table>
            <?php
            if (isset($_POST['id'])) {
                $id_laptop = $_POST['id'];
            }
            ?>
            <input style="display:none" type="text" name="id_leptop" value="<?= $id_laptop ?>">
            <tr>
                <td><label for="ram" name="ram">RAM</label></td>
                <td>:</td>
                <td><input type="text" name="ram"></td>
            </tr>
            <tr>
                <td><label for="core" name="core">CORE</label></td>
                <td>:</td>
                <td><input type="text" name="core"></td>
            </tr>
            <tr>
                <td><label for="pemakaian" name="pemakaian">PEMAKAIAN</label></td>
                <td>:</td>
                <td><input type="text" name="pemakaian"></td>
            </tr>
            <tr>
                <td><label for="bobot" name="bobot">BOBOT LAPTOP</label></td>
                <td>:</td>
                <td><input type="text" name="bobot"></td>
            </tr>
            <tr>
                <td><label for="harga" name="harga">HARGA LAPTOP</label></td>
                <td>:</td>
                <td><input type="text" name="harga"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
    
</body>
</html>