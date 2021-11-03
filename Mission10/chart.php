<?php
session_start();
require'../functions.php';

if( !isset($_SESSION["login"]) ){
    header("Location: ../Mission9/login.php");
    exit;
}

$angkatan = query("SELECT angkatan, COUNT(angkatan) as banyak FROM mahasiswa GROUP BY angkatan ORDER BY angkatan ASC");
// var_dump($angkatan);

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
    <title>Chart data</title>
</head>
<body>
    <div style="width: 700px">
        <canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        //Setup Block
        const array = <?php echo json_encode($angkatan); ?>;
        const label= [];
        const banyak = [];
        for(let i = 0; i<array.length; i++){
            label.push(array[i]["angkatan"]);
            banyak.push(array[i]["banyak"]);
        }
        console.log(label);
        const data = {
            labels: label,
            datasets: [{
                label: 'Banyak angkatan',
                data: banyak,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };
        // Config Block
        const config = {
            type: 'bar',data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        // Render Block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>