<?php 
session_start();
//jika tidak bisa loginmaka balik ke login.php
//jika masuk ke halam ini melalui url, maka langsung  menuju halam login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// memanggil atau membutuhkan file function.php
require 'function2.php';

// jika fungsi tambah jika data tersimpan,maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST)) {
        echo "<script>
                 alert('Data Siswa berhasil ditambahkan!');
                 document.location.href = 'siswa.php';
              </script>";
    } else {
        //jika fungsi tambah jika data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                 alert('Data Siswa gagal ditambahkan!');
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
            <a class="navbar-brand" href="siswa.php">DATA SEKOLAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <li class="nav-item">
                           <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'guru.php' ? 'active' : ''; ?>" aria-current="page" href="guru.php">Guru</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'siswa.php' ? 'active' : ''; ?>" aria-current="page" href="siswa.php">Siswa</a>
                        </li>
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'jurusan.php' ? 'active' : ''; ?>" href="jurusan.php">Jurusan</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="https://jamalucok.github.io/abdulrokib77.github.io/">Tentang Saya</a>
                    </li> -->
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
                 <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Siswa</h3>
             </div>
         </div>
         <div class="row my-2">
             <div class="col-md">
                 <form action="" method="post" enctype="multipart/form-data">
                     <div class="mb-3">
                         <label for="nama_siswa" class="form-label">Nama Siswa</label>
                         <input type="text" class="form-control w-50" id="nis" placeholder="Masukkan Nama Siswa" min="1"      name="nama_siswa" autocomplete="off" required>
                     </div>
                     <div class="mb-3">
                         <label for="nis" class="form-label">NIS</label>
                         <input type="text" class="form-control form-control-md w-50" id="nis" placeholder="Masukkan NIS" name="nis" autocomplete="off" required>
                     </div>
                     <div class="mb-3">
                         <label for="kelas" class="form-label">Kelas</label>
                         <input type="text" class="form-control w-50" id="jabatan" placeholder="Masukkan Kelas"  name="kelas" maxlength="50" autocomplete="off" required>
                     </div>
                     <div class="mb-3">
                         <label for="jurusan" class="form-label">Jurusan</label>
                         <select name="jurusan" id="jurusan" class="form-select w-50">
                             <?php 
                             $sql = "SELECT * FROM jurusan"; // change 'you_table' to the name of your table
                             $result = mysqli_query($koneksi, $sql);
                             if ($result) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                                     echo "<option value='" . $row['nama_jurusan'] . "'>" . $row['nama_jurusan'] . "</ option>";
                                 }
                             } else {
                                 echo "Error: " . mysqli_error($koneksi);
                             }
                        ?>     
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="alamat" class="form-label">Alamat</label>
                         <input type="text" class="form-control w-50" id="alamat" placeholder="Masukkan Alamat" name="alamat" maxlength="50" autocomplete="off" required>
                     </div>
                     <div class="mb-3">
                         <a href="siswa.php" class="btn btn-secondary">Kembali</a>
                         <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
                        <!-- <?php 
                        $sql = "SELECT * FROM jurusan"; // Ganti 'your_table' dengan nama tabel Anda
                        $result = mysqli_query($koneksi, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id_jurusan'] . "'>" . $row['nama_jurusan'] . "</option>";
                            }
                        } else {
                            echo "Error: " . mysqli_error($koneksi);
                        }
                        ?>     
                    </select>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control w-50" id="semester" placeholder="Masukkan Semester" name="semester" max="12" min="1" autocomplete="off" required> 
                </div>
                <div class="mb-3">
                    <a href="rokib.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>  -->
    <!-- Close Container -->
    
</body>

</html>
