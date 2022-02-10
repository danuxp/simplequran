<?php

require 'config.php';

if (isset($_POST["login"])) {

    $username = $_POST['username'];
    $pass = $_POST['password'];

    // lihat di database
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'  ");

    // cek username 
    if (mysqli_num_rows($query) === 1) {

        // cek password
        $cekpw = mysqli_fetch_assoc($query);
        if (password_verify($pass, $cekpw['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" name="username">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Password" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3" name="login">Login</button>
                            <a href="register.php"> Register </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>