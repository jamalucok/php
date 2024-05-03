<?php
//memanggil atau membutuhkan file function.php
require 'function.php';

//menampilkan semua data dari tabel mahasiswa berdasarkan nim secara descending
$guru = query("SELECT * FROM guru ORDER BY nip DESC");

//membuat nama file
$filename = "data_guru_fti_" . date('Ymd') . ".xls";

//export ke excel
header("Content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=Data guru.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>Nama Guru</th>
            <th>NIP</th> 
            <th>Jabatan</th>
            <th>Bidang Keahlian</th>
        <tr>
   </thead> 
   <tbody class="text-center">
       <?php $no = 1; ?>
       <?php foreach ($guru as $row) : ?>
        <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_guru']; ?></td>
        <td><?= $row['nip']; ?></td>
        <td><?= $row['jabatan']; ?></td>
        <td><?= $row['bidang_keahlian']; ?></td>
       </tr>
    <?php endforeach; ?>
       </tbodty>
    </table>             