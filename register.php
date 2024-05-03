<?php 
require 'function.php';

// jika tombol registar diklik
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);//disarankan menggunakan hash yang lebih kuat daripada md5

    //Query untuk memeriksa apakah username sudah digunakan sebelumnya
    $check_query = "SELECT * FROM admin WHERE username ='$username'";
    $result = mysqli_query($koneksi, $check_query);

    //jika username sudah ada, tampilkan pesan kesalahan
    if(mysqli_num_rows($result) > 0) {
        $eror = true;
    } else {
        //jika username belum digunakan, lakukan penyisipan data 
        $insert_query = "INSERT INTO admin(username, password) VALUES ('$username', '$password')";
        if(mysqli_query($koneksi, $insert_query)) {
            //set pesan sukses
            $succes = true;
        } else {
            //jika terjadi kesalahan saat penyisipan data, tampilkan pesan kesalahan
            $error = true;
        }     
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Own CSS -->
    <link rel="stylesheet" href="css/login.css">

    <title>Register</title>

</head>
<body>


<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="guru.php">DATA SEKOLAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- close navba -->

    <div class="container" style="margin-left: -120px; width: 60%;">
        <div class="row my-5">
            <div class="col-md-6 text-center login" style="background-image: url('img/bg/4.jpg');">
                <h4 class="fw-bold">Register | Admin</h4>
                <?php if (isset($success)) : ?>
                    <!-- tampilkan pesan sukses jika pendaftaran berhasil -->
                    <div class="alert alert-success" role="alert">
                        pendaftara berhasil silahkan login.
                    </div>
                <?php endif; ?>

                <?php if (isset($error)) : ?>
                    <!-- tampilkan pesan kesalahan jika login gagal -->
                    <div class="alert alert-danger" role="alert">
                        Usernama atau Password sudah digunakan!
                    </div>
                <?php endif; ?>

                <form action="proses_register.php" method="post">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                    </div>
                    <div class="form-group my-5">
                        <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit" name="Register">Register</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
