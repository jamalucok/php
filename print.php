<?php 

//memanggil atau membutuhkan file function.php
require 'function.php';

//menampilkan semua data dari tabel mahasiswa berdasarkan nim 
$guru= query("SELECT * FROM guru ORDER BY nip ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data</title>
</head>
<style>
    .ab{
        background-color: red;
    }
</style>
    <!-- Bootstrop -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Bootstrop icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

<body> 

<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="guru.php">DATA SEKOLAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'guru.php' ? 'active' : ''; ?>" aria-current="page" href="guru.php">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'siswa.php' ? 'active' : ''; ?>" aria-current="page" href="siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'jurusan.php' ? 'active' : ''; ?>" href="jurusan.php">Jurusan</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="https://jamalucok.github.io/abdulrokib77.github.io/"     target="_blank">Tentang Saya</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Data Guru</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="addData.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <a href="export.php" target="_blank" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a>
                <a href="print.php" target="_blank" class="btn btn-success ms-1"><i class="bi bi-printer"></i>&nbsp;Print Data</a>      
            </div>
<div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%" border="1" cellspadding="0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>nama_guru</th>
                            <th>nip</th>
                            <th>jabatan</th>
                            <th>bidang keahlian</th>                    
                            <th>keterangan</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($guru as $row) : ?>
                            <tr align="center">
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_guru']; ?></td>
                                <td><?= $row['nip']; ?></td>
                                <td><?= $row['jabatan']; ?></td>
                                <td><?= $row['bidang_keahlian']; ?></td>
                                 <td>
                                    <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['nip']; ?>" style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</button> |

                                    <a href="ubah.php?nip=<?= $row['nip']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |

                                    <a href="hapus.php?nip=<?= $row['nip']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama_guru']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>

                                    <!-- <a href="print.php?nim=//<//$row['nim']; ?" class="btn btn-primary btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin mengprint data < //$row['nama']; ?> ?');"><i class="bi bi-printer"></i>&nbsp;Print</a> -->
                                </td>
                        </tr>  
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                        </div>

                        <script>
                            window.onload = function() {
                                window.print();
                            }
                        </script>

                        <script>
                            window.print();
                        </script>
</body>
</html>