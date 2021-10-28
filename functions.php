<?php 
//koneksi DB
$db = mysqli_connect("localhost", "Ahdan", "indonesia02", "phpmahasiswa");

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

function registrasi($data){
    global $db;

    $username = stripslashes($data["email"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["confirmPass"]);

    //cek username
    $cekId = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($cekId)){
        echo"<script>
            aler('username sudah terdaftar!');
        </script>";
        return false;
    }

    // cek confirmPass
    if($password !== $password2){
        echo "<script>
            alert('konfirmasi password berbeda');
        </script>";
        return false;
    }
    //enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    //add username
    mysqli_query($db, "INSERT INTO users VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($db);
    
}

?>