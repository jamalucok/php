<?php
//koneksi database
// $koneksi =mysqli_connect("localhost", "root", "", "db_sekolahsmk");

// //membuat fungsi query dalam bentuk array \
// function query($query)
// {
//     //koneksi database
//     global $koneksi;

//     $result = mysqli_query($koneksi, $query);

//     //membuat variabel array
//     $rows = [];

//     //mengambil semua data dalam bentuk array
//     while ($row =mysqli_fetch_assoc($result)) {
//         $rows [] = $row;
//     }

//     return $rows;
// }
// //membuat fungsi tambah
// function tambah($data)
// {

//     global $koneksi;
//     $nama_guru = htmlspecialchars($data['nama_guru']);
//     $nip = htmlspecialchars($data['nip']);
//     $jabatan = htmlspecialchars($data['jabatan']);
//     $bidang_keahlian = htmlspecialchars($data['bidang_keahlian']);
   


//     //mengecek apakah NIM sudah ada di dalam tabel
//     $query_cek_nip = "SELECT * FROM guru WHERE nip = '$nip'";
//     $result = mysqli_query($koneksi, $query_cek_nip);

//     //jika NIM sudah ada, kembalikan 0
//     if (mysqli_num_rows($result) > 0) {
//         return 0;
//     } else {
//         //jika NIM belum ada, masukkan data ke dalam tabel
//         $sql_guru = "INSERT INTO guru(nama_guru,nip,jabatan,bidang_keahlian)
//         VALUES ('$nama_guru','$nip','$jabatan','$bidang_keahlian')";
//         mysqli_query($koneksi, $sql_guru);

//         //mengembaliakn jumlah baris yang terpengaruh oleh operasi query (1 jika berhasil, 0 jika gagal)
//         return mysqli_affected_rows($koneksi);
//     }
// }
// function tambahjurusan($data)
// {
//     global $koneksi;
//     $jurusan = htmlspecialchars($data['jurusan']);

//     $sql_jurusan = "INSERT INTO jurusan (nama_jurusan) VALUES ('" .$jurusan . "')";
//     mysqli_query($koneksi, $sql_jurusan);
//     return mysqli_affected_rows($koneksi);
// }

//     //membuat fungsi hapus
//     function hapus($nim)
//     {
//         global $koneksi;

//         mysqli_query($koneksi, "DELETE FROM guru WHERE nim = $nip");
//         return mysqli_affected_rows($koneksi);
//     }

//     function hapusjurusan($nim)
//     {
//         global $koneksi;

//         mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan = $nim");
//         return mysqli_affected_rows($koneksi);
//     }

//     //membuat fungsi ubah
//     function ubah($data)
//     {
//         global $koneksi;

//         $nama_guru = htmlspecialchars($data['nama_guru']);
//         $nip = htmlspecialchars($data['nip']);
//         $jabatan = htmlspecialchars($data['jabatan']);
//         $bidang_keahlian = htmlspecialchars($data['bidang_keahlian']);

//         $sql = "UPDATE guru SET nama_guru = '$nama_guru', jabatan = '$jabatan', bidang_keahlian = '$bidang_keahlian', WHERE nip = $nip";

//         mysqli_query($koneksi, $sql);

//         return mysqli_affected_rows($koneksi);
//     }
    ?>

<?php
//koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_sekolahsmk");

//membuat fungsi query dalam bentuk array
function query($query)
{
    //koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    //membuat variabel array
    $rows = [];

    //mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//membuat fungsi tambah
function tambah($data)
{

    global $koneksi;
    $nama_siswa = htmlspecialchars($data['nama_siswa']);
    $nis = htmlspecialchars($data['nis']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars($data['alamat']);

    //mengecek apakah NIS sudah ada di dalam tabel
    $query_cek_nis = "SELECT * FROM siswa WHERE nis = '$nis'";
    $result = mysqli_query($koneksi, $query_cek_nis);

    //jika NIP sudah ada, kembalikan 0
    if (mysqli_num_rows($result) > 0) {
        return 0;
    } else {
        //jika NIP belum ada, masukkan data ke dalam tabel
        $sql_siswa = "INSERT INTO siswa(nama_siswa,nis,kelas,jurusan,alamat)
        VALUES ('$nama_siswa','$nis','$kelas','$jurusan','$alamat')";
        mysqli_query($koneksi, $sql_siswa);

        //mengembalikan jumlah baris yang terpengaruh oleh operasi query (1 jika berhasil, 0 jika gagal)
        return mysqli_affected_rows($koneksi);
    }
}

function tambahjurusan($data)
{
    global $koneksi;
    $jurusan = htmlspecialchars($data['jurusan']);

    $sql_jurusan = "INSERT INTO jurusan (nama_jurusan) VALUES ('" . $jurusan . "')";
    mysqli_query($koneksi, $sql_jurusan);
    return mysqli_affected_rows($koneksi);
}

//membuat fungsi hapus
function hapus($nis)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM siswa WHERE nis = '$nis'");
    return mysqli_affected_rows($koneksi);
}

function hapusjurusan($id_jurusan)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan = '$id_jurusan'");
    return mysqli_affected_rows($koneksi);
}

//membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nama_siswa = htmlspecialchars($data['nama_siswa']);
    $nis = htmlspecialchars($data['nis']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "UPDATE siswa SET nama_siswa = '$nama_siswa', kelas = '$kelas', jurusan = '$jurusan', alamat = '$alamat' WHERE nis = '$nis'";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
?>



