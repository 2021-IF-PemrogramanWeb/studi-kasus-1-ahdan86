<?php
session_start();
require '../functions.php';

//check cookie
if(isset($_COOKIE['inihayo']) && isset($_COOKIE['apahayo'])){
    $id = $_COOKIE['apahayo'];
    $key = $_COOKIE['inihayo'];

    //ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: ../Mission11/index.php");
    exit;
}

if(isset($_POST["login"])){
    $username = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            alert('Invalid Email Format!');
        </script>";
        $flag = 1;
    }

    if(!$flag){
        $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

        if(mysqli_num_rows($result) === 1){
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
                //Set session
                $_SESSION["login"] = true;

                // if remember me checked
                if(isset($_POST["remember"])){
                    //buat cookie

                    setcookie('apahayo',$row["id"], time() + 60);
                    setcookie('inihayo',hash('sha256', $row["username"]), time() + 60);

                }

                header("Location: ../Mission11/index.php");
                exit;
            }
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <title>Login Page</title>
    </head>
    <body class="login-page" style="min-height: 496.8px; background-color: #03bafc">
        <div class="container py-5 h-100" id="login-box">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem">
                        <div class="card-body">
                            <h3 class="mb-2">Sign in</h3>
                            <p>Sign in untuk masuk ke halaman admin</p>
                            <?php if( isset($error) ) : ?>
                                <div class="alert alert-danger">User / Pass salah!</div>
                            <?php endif; ?>
                            <form action="" method="post">
                                <div id="emailHelp" class="form-text">Email kamu pasti akan dirahasiakan.</div>
                                <div class="form-outline mb-3">
                                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" />
                                    <label for="email" class="form-label">Email address</label>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" class="form-control" id="inputPassword" name="password" />
                                    <label for="email" class="form-label">Password</label>
                                </div>
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember" />
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="login" >Login</button>
                                <br>
                                <a href="register.php">Belum punya akun?</a>
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
