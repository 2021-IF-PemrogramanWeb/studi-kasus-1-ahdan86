<?php
require '../functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('user baru berhasil dibuat!);
        </script>";
    }else{
        echo mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
        <link rel="stylesheet" href="../css/mdb.min.css" />
        <title>Register Page</title>
    </head>
    <body class="login-page" style="min-height: 496.8px; background-color: #03bafc">
        <div class="container py-5 h-100" id="login-box">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem">
                        <div class="card-body">
                            <h3 class="mb-5">Register</h3>
                            <p>Register jika belum punya akun</p>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control"  aria-describedby="emailHelp" name="email" />
                                    <div id="emailHelp" class="form-text">Email kamu pasti akan dirahasiakan.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control"  name="password" />
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPass" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPass" />
                                </div>
                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
