<?php 
//koneksi DB
$db = mysqli_connect("localhost", "root", "", "phpmahasiswa");

// Fetch data from table
function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek no img uploaded
    if($error === 4){
        echo "<script>
                alert('Pilih file img terlebih dahulu');
            </script>";
        return false;
    }

    // Cek uploaded is img

    $extValid = ['jpg', 'jpeg', 'png'];
    $extUpload = explode('.', $namaFile);
    $extUpload = strtolower(end($extUpload));
    if( !in_array($extUpload, $extValid) ){
        echo "<script>
                alert('Hanya Boleh upload file gambar (.jpg, .png, .jpeg)');
            </script>";
        return false;
    }

    //Cek img size
    if($ukuranFile > 2097152){
        echo "<script>
                alert('Size gambar terlalu besar!');
            </script>";
        return false;
    }

    // gambar valid
    $namaFileNew = uniqid();
    $namaFileNew .= '.';
    $namaFileNew .= $extUpload;


    move_uploaded_file($tmpName, '../img/' . $namaFileNew );
    
    return $namaFileNew;
}

function tambah($data){
    global $db;

    // ambil data
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    
    // upload gambar 
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    // query insert
    $query = "INSERT INTO mahasiswa
                VALUES
                (NULL,'$nama', '$nrp', '$email','$jurusan', 
                '$gambar', '$angkatan')
            ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapus($id){
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($db);
}

function ubah($data){
    global $db;

    // ambil data
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $angkatan = htmlspecialchars($data["angkatan"]);

    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek if user choose new img or not
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else{
        $gambar = upload();
    }

    // query insert
    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar',
                angkatan = '$angkatan' WHERE id = $id
            ";
    mysqli_query($db, $query);

    echo mysqli_error($db);

    return mysqli_affected_rows($db);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' 
            OR nrp LIKE '%$keyword%'
            OR email LIKE '%$keyword%'
            OR jurusan LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data){
    global $db;
    $username = stripslashes($data["email"]);
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            alert('Invalid Email Format!');
        </script>";
        return false;
    }
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["confirmPass"]);

    //cek username
    $cekId = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($cekId)){
        echo "<script>
            alert('Email sudah terdaftar!');
        </script>";
        return false;
    }

    // cek confirmPass
    if($password !== $password2){
        echo "<script>
            alert('Konfirmasi password berbeda');
        </script>";
        return false;
    }
    //enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    //add username
    mysqli_query($db, "INSERT INTO users VALUES (NULL, '$username', '$password')");
    return mysqli_affected_rows($db);
    
}

?>