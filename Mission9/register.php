<?php
require '../functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('user baru berhasil dibuat!');
            document.location.href = 'login.php';
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
                            <a class="btn btn-primary btn-sm" href="login.php">Kembali ke login page</a>
                            <form action="" method="post">
                                <div id="emailHelp" class="form-text">Email kamu pasti akan dirahasiakan.</div>
                                <div class="form-outline mb-3">
                                    <input type="email" class="form-control"  aria-describedby="emailHelp" name="email" />
                                    <label for="email" class="form-label">Email address</label>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" class="form-control"  name="password" />
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" class="form-control" name="confirmPass" />
                                    <label for="confirmPass" class="form-label">Confirm Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
    </body>
</html>
