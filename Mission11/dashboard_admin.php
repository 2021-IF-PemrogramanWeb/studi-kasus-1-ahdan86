<?php
require '../functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a class="btn btn-success btn-sm mt-2 mb-3" href="tambah.php">+ Tambah data mahasiswa</a>
    <a class="btn btn-warning btn-sm mt-2 mb-3" href="../Mission10/chart.php">Chart data angkatan</a>
    <br>
    <table class="table table-hover table-striped" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        
        <?php $i=1; ?>
        <?php foreach( $mahasiswa as $row ) : ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a class="btn btn-info btn-sm" href="">ubah</a> | <a class="btn btn-danger btn-sm" href="">hapus</a>
            </td>
            <td><img src="../img/<?= $row["gambar"]; ?>" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["angkatan"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>