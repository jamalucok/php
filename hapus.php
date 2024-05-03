<?php 
session_start();

//jika tidak bisa login maka balik ke login.php
//jika masuk ke dalam halaman ini melalui url,maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

//memanggil atau membutuhkan file function.php
require 'function.php';

//validasi apakah parameter nim telah disertakan dalam URl 
if (!isset($_GET['nip'])) {
    echo "<script>
             alert('Parameter nip tidak di temukan!');
             window.location.href = 'guru.php';
             </script>";
    exit;
}

//memanggil data dari nim dengan fungsi get
$nip = $_GET['nip'];

//jika fungsi hapus berhasil mengahpus data,tampilakan alert berhasil
if (hapus($nip) > 0) {
    echo "<script>
    alert('Data Guru berhasil dihapus!');
    window.location.href = 'guru.php';
    </script>";
} else{
    //jika fungsi hapus gagal menghapus data, tampilakan alert gagal
    echo "<script>
    alert('Data Guru gagal dihapus!');
    window.location.href = 'guru.php';
    </script>";
}
?>