<?php

include 'config.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script> alert('Pendaftaran berhasil');
        document.location.href = 'login.php';  </script>";
    } else {
        mysqli_error($koneksi);
    }
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
                        <h5 class="card-title text-center">Register</h5>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username" name="username">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Password" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Konfirmasi Password" name="password2">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3" name="register">Login</button>
                            <a href="login.php"> Login </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>