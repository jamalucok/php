<?php
//memanggil atau membutuhkan file function.php
require 'function2.php';

//jika data mahasiswa di klik maka
if (isset($_POST['dataSiswa'])){
    $output = '';

//memanggil data mahasiswa dari nim
$sql = "SELECT * FROM siswa WHERE nis = '" . $_POST['dataSiswa'] . "'";
$result = mysqli_query($koneksi, $sql);

$output .= '<div class="table-responsive">
                    <table class="table table-bordered">';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
                    <tr>
                    <th width="40%">nama_siswa</th>
                    <td width="60%">' .$row['nama_siswa'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">nis</th>
                    <td width="60%">' . $row['nis'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">Kelas</th>
                    <td width="60%">' . $row['kelas'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">Jurusan</th>
                    <td width="60%">' . $row['jurusan'] . '</td>
                    </tr>
                    <tr>
                    <th width="40%">Alamat</th>
                    <td width="60%">' . $row['alamat'] . '</td>
                    </tr>
                    ';
} 
$output .= '</table></div>';
//tampilakn $output
echo $output;

} 
?>
    
