<?php
require '../functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari dipress

if( isset($_POST["cari"]) ){
    $mahasiswa = cari($_POST["keyword"]);
    // echo $_POST["keyword"];
}

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
    <style>

    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand p-2">Dashboard Admin</a>
        <button class="btn btn-outline-danger my-2 my-sm-0 me-2 " type="submit" name="logout">Logout</button>
    </nav>
    
    <a class="btn btn-success btn-sm mt-2 mb-3 ms-2" href="tambah.php">+ Tambah data mahasiswa</a>
    <a class="btn btn-warning btn-sm mt-2 mb-3 " href="../Mission10/chart.php">Chart data angkatan</a>
    
    <form action="" method="post">
        <div class="input-group mt-2 mb-3 ms-2">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" name="keyword" autofocus/>
                <label class="form-label" for="form1">Search Siswa...</label>
            </div>
            <button type="submit" class="btn btn-primary" name="cari">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
    
    <br>

    <table class="table table-hover table-striped table-responsive-sm" border="1" cellpadding="10" cellspacing="0">
        <thead>    
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
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach( $mahasiswa as $row ) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                    return confirm('Yakin untuk menghapus?');">Hapus</a>
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
        </tbody>
    </table>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
</body>
</html>