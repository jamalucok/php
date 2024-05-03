<?php
//memanggil atau membutuhkan file function.php
require 'function.php';

//jika data mahasiswa di klik maka
if (isset($_POST['dataGuru'])){
    $output = '';

//memanggil data mahasiswa dari nim
$sql = "SELECT * FROM guru WHERE nip = '" . $_POST['dataGuru'] . "'";
$result = mysqli_query($koneksi, $sql);

$output .= '<div class="table-responsive">
                    <table class="table table-bordered">';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
                    <tr>
                    <th width="40%">nama_guru</th>
                    <td width="60%">' .$row['nama_guru'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">nip</th>
                    <td width="60%">' . $row['nip'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">Jabatan</th>
                    <td width="60%">' . $row['jabatan'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">bidang keahlian</th>
                    <td width="60%">' . $row['bidang_keahlian'] . '</td>
                    </tr>
                    ';
} 
$output .= '</table></div>';
//tampilakn $output
echo $output;

} 
?>
    
