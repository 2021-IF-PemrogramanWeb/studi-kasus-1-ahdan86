<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: ../Mission9/login.php");
    exit;
}

require '../functions.php';

if( isset($_POST["submit"]) ){
    // cek data berhasil ditambahkan
   if(tambah($_POST) > 0){
       echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>";
   } else {
       echo "<script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data mahasiswa</title>
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
</head>
<body>
    <div class="card card-body mx-auto" style="width: 25rem;">
        <h1>Tambah data mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" name="nrp" id="nrp" class="form-control" required/>
                <label for="nrp" class="form-label">NRP : </label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="nama" id="nama" class="form-control" required/>
                <label for="nama" class="form-label">Nama : </label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="email" id="email" class="form-control" required/>
                <label for="email" class="form-label">Email : </label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="jurusan" id="jurusan" class="form-control" required/>
                <label for="jurusan" class="form-label">Jurusan : </label>
            </div>
            
            <div class="form-outline mb-4">
                <input type="number" name="angkatan" id="angkatan" class="form-control" required/>
                <label for="angkatan" class="form-label">Angkatan : </label>
            </div>
            
            <div class="mb-4">
                <label for="gambar" class="form-label">Gambar : </label>
                <input type="file" name="gambar" id="gambar" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Tambah Data</button>
        </form>
    </div>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
</body>
</html>