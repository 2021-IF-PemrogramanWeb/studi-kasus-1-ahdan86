<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: ../Mission9/login.php");
    exit;
}

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
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />
    <title>Dashboard Admin</title>
    <style>

    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand p-2">Dashboard Admin</a>
        <a class="btn btn-outline-danger my-2 my-sm-0 me-2 " href="../Mission9/logout.php">Logout</a>
    </nav>
    
    <div class="container mt-2">
        <div class="row justify-content-between">
            <div class="col-4">
                <a class="btn btn-success btn-sm mt-2 mb-3" href="tambah.php">+ Tambah data mahasiswa</a>
                <a class="btn btn-warning btn-sm mt-2 mb-3 " href="../Mission10/chart.php">Chart data angkatan</a>
            </div>
            
            <div class="col-lg-4 col-7">
                <form action="" method="post">
                    <div class="input-group mt-2 mb-3">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control" name="keyword" autofocus/>
                            <label class="form-label" for="form1">Siswa, NRP dsb...</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="cari">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="table-responsive text-center">
            <table class="table table-hover" id="dataTable" border="1" cellpadding="10" cellspacing="0">
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
        </div>
    </div>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
</body>
</html>