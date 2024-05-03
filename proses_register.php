<?php 
require 'function.php';

// Mengambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// pengecekan kelengkapan data
if (empty($username) || empty($password)) {
    header("location: register.php");
} else {
    // Query untuk memeriksa apakah username sudah digunakan sebelumnya
    $check_query = "SELECT * FROM admin WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // jika usernema suda ada, arahkan kembali ke halaman registar
    if(mysqli_num_rows($result) > 0) {
        echo "<script>alert('ursername sudah digunakan!); window.location='register.php';</script>";
    } else {
        // jika username belum digunakan, lakukan penyisipan data
        $insert_query = "INSERT INTO admin(username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($koneksi, $insert_query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);
        if(mysqli_stmt_execute($stmt)) {
            // jika penyisipan data berhasil, tampilkan popup sukses dan arahkan ke halam rokib
            echo "<script>alert('Username berhasil ditambahkan!'); window.location='guru.php';</script>";
        } else {
            // jika terjadi kesalahan saat penyisipan data, tampilkan pesan kesalahan 
            echo "<script>alert('Gagal menambahkan username!'); window.location='register.php';</script>";
            exit();
        }
    }
}
?>