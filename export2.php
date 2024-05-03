<?php
//memanggil atau membutuhkan file function.php
require 'function2.php';

//menampilkan semua data dari tabel mahasiswa berdasarkan nim secara descending
$siswa = query("SELECT * FROM siswa ORDER BY nis DESC");

//membuat nama file
$filename = "data_siswa_fti_" . date('Ymd') . ".xls";

//export ke excel
header("Content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=Data siswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>NAMA</th>
            <th>NIS</th>
            <th>KELAS</th> 
            <th>JURUSAN</th>
            <th>ALAMAT</th>
        <tr>
   </thead> 
   <tbody class="text-center">
       <?php $no = 1; ?>
       <?php foreach ($siswa as $row) : ?>
        <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_siswa']; ?></td>
        <td><?= $row['nis']; ?></td>
        <td><?= $row['kelas']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        <td><?= $row['alamat']; ?></td>
       </tr>
    <?php endforeach; ?>
       </tbodty>
    </table>             