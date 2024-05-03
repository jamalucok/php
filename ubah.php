<!-- 
session_start();
//jika tidak bisa login maka balik ke login.php
//jika masuk kehalaman ini malalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

//mengambil atau membutuhkan file function.php
require 'function.php';

//mengambil data dari nim dengan fungsi get
$nip = $_GET['nip'];

//mengambil data dari table mahasiswa dari nim
$guru = query("SELECT * FROM guru WHERE nip =$nip")[0];

//jika fungsi ubah jika data terbaru,maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data siswa berhasil diubah!')
        document.location.href = 'guru.php';
        </script>";
    } else {
        //jika fungsi ubah jika data tidak berubah,maka muncul alert di bawah
         echo "<script>
        alert('Data mahasiswa gagal diubah!');
        </script>";
    }
}

 -->

<?php 
session_start();
//jika tidak bisa login maka balik ke login.php
//jika masuk kehalaman ini malalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

//mengambil atau membutuhkan file function.php
require 'function.php';

//mengambil data dari nim dengan fungsi get
if(isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    //mengambil data dari table mahasiswa dari nim
    $guru = query("SELECT * FROM guru WHERE nip = '$nip'")[0];
}

//jika fungsi ubah jika data terbaru,maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data Guru berhasil diubah!');
        document.location.href = 'guru.php';
        </script>";
    } else {
        //jika fungsi ubah jika data tidak berubah,maka muncul alert di bawah
         echo "<script>
        alert('Data Guru gagal diubah!');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrop -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Bootstrop icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Tambah Data</title>
</head>

<body>
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="guru.php">DATA SEKOLAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                       <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'guru.php' ? 'active' : ''; ?>" aria-current="page" href="guru.php">guru</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'siswa.php' ? 'active' : ''; ?>" aria-current="page" href="siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'jurusan.php' ? 'active' : ''; ?>" href="jurusan.php">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>   
        </div>
    </nav>

    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
         <div class="row my-2">
             <div class="col-md">
                 <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Guru</h3>
             </div>
             <hr>
         </div>
         <div class="row my-2">
             <div class="col-md">
                 <form action="" method="post" enctype="multipart/form-data">
                     <div class="mb-3">
                         <label for="nip" class="form-label">NIP</label>
                         <input type="number" class="form-control w-50" id="nip" value="<?= $guru['nip']; ?>" name="nip" readonly>
                     </div>
                         <div class="mb-3">
                         <label for="nama_guru" class="form-label">Nama Guru</label>
                         <input type="text" class="form-control w-50" id="nama_guru" value="<?= $guru['nama_guru']; ?>" name="nama_guru" autocomplete="off" required>                      
                    </div>
                    <div class="mb-3">
                         <label for="jabatan" class="form-label">Jabatan</label>
                         <input type="textr" class="form-control w-50" id="jabatan" value="<?= $guru['jabatan']; ?>" name="jabatan" autocomplete="off" required>                    
                    </div>
                    <div class="mb-3">
                         <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
                         <select name="bidang_keahlian" id="bidang_keahlian" class="form-select w-50">
                            <?php 
                            $sql = "SELECT * FROM jurusan"; // chage your_table to the name of your table
                            $result = mysqli_query($koneksi, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" .$row['nama_jurusan'] . "'>" .$row['nama_jurusan'] . "</option>";
                                }
                            } else {
                                echo "Error: " . mysqli_error($koneksi);
                            } 
                            ?>
                    </select> 
                    </div>
               </div>
                <hr>
                    <a href="guru.php" style="margin-right:10px; width: 100px;" class="btn btn-secondary">Kembali</a>
                    <button type="submit" style="width: 100px;" class="btn btn-warning" name="ubah">Ubah</button>
            </form>
        </div>
    </div>
    </div> 
<!-- close container -->

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9U17kGkf1S0CWuKcCD3818YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>

                    