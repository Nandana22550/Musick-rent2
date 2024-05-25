<?php
include 'database.php'; // Sisipkan file crud.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alat Musik</title>
</head>
<body>
    <h1>Data Alat Musik</h1>

    <!-- Form untuk menambah alat musik -->
    <form method="post" action="index.php">
        <input type="text" name="nama_alat" placeholder="Nama Alat">
        <button type="submit" name="submit">Tambah Alat Musik</button>
    </form>

    <?php
    // Jika tombol submit ditekan, tambahkan alat musik baru
    if (isset($_POST['submit'])) {
        $nama_alat = $_POST['nama_alat'];
        if (createAlatMusik($nama_alat)) {
            echo "<p>Data berhasil ditambahkan.</p>";
        } else {
            echo "<p>Gagal menambahkan data.</p>";
        }
    }
    ?>

    <!-- Tabel untuk menampilkan alat musik -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Alat</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Ambil data alat musik dari database
        $alatmusik = readAlatMusik();
        foreach ($alatmusik as $alat) {
            echo "<tr>";
            echo "<td>".$alat['alat_id']."</td>";
            echo "<td>".$alat['nama_alat']."</td>";
            echo "<td><a href='edit.php?id=".$alat['alat_id']."'>Edit</a> | <a href='delete.php?id=".$alat['alat_id']."'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
