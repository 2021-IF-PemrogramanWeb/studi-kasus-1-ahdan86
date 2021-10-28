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

?>