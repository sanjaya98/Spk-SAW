<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}

require_once "koneksi.php";

// $query = 'SELECT * FROM kreteria';

// $result = mysqli_query($conn, $query);

// mencari nilai max dam min
$maxMin = "SELECT MIN(c1) as c1, MAX(c2) as c2, MAX(c3) as c3, MIN(c4) as c4, MAX(c5) as c5 FROM kreteria";

$nilai = mysqli_query($conn, $maxMin);

$data = mysqli_fetch_assoc($nilai);
// var_dump($data); die;
// set Nilai min dan max ke variabel
$minC1 = $data['c1'];
$maxC2 = $data['c2'];
$maxC3 = $data['c3'];
$minC4 = $data['c4'];
$maxc5 = $data['c5'];
 
 
?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
  <div class="row justify-content-center">

    <div class="col-12 mt-3">
        <h2>Menghitung SAW</h2>
        <div class="tengah ">
            <a class="btn btn-outline-primary" href="matrikKeputusan.php">Matrik Keputusan</a>
            <a class="btn btn-outline-danger" href="nilaibobot.php">Nilai Bobot</a>
            <a class="btn btn-outline-warning" href="normalisasi.php">Normalisasi</a>
            <a class="btn btn-outline-success" href="perangkingan.php">Perangkingan</a>
        </div>
        
        <div class="col mt-3">
          <h5>PERANGKINGAN</h5> 
          </div>

        <div class="col mt-4">
          <a href="cetak.php?p=1" class="btn btn-primary btn-sm" target="_blank">Cetak <i class="fas fa-print"></i></a>
        </div>

        <table class="table table-sm mt-2">
        <thead class="table-success">
            <tr>
            <th scope="col">KODE KRITERIAN</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">C5</th>
            <th scope="col">TOTAL NILAI</th>
            <th scope="col">RANGKING</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query ="SELECT kAlternatif, c1, c2, c3, c4, c5, 
            bc1, bc2, bc3, bc4, bc5 
            FROM kreteria, bobot ORDER BY c1 DESC, c2 DESC, c3 DESC, c4 DESC, c5 DESC";
            
            $result = mysqli_query($conn, $query);

        ?>
        
        <?php $rangking = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <?php 
        
        $KodaAlternatif = $row["kAlternatif"];
        $c1 = $row["bc1"] * ($row["c1"] / $minC1);
        $c2 = $row["bc2"] * ($row["c2"] / $maxC2);
        $c3 = $row["bc3"] * ($row["c3"] / $maxC3);
        $c4 = $row["bc4"] * ($row["c4"] / $minC4);
        $c5 = $row["bc5"] * ($row["c5"] / $maxc5);
        $total = $c1 + $c2 + $c3 + $c4 + $c5;
        
        ?>
            <tr>
            <td><?= $KodaAlternatif; ?></td>
            <td><?= $c1; ?></td>
            <td><?= $c2; ?></td>
            <td><?= $c3; ?></td>
            <td><?= $c4; ?></td>
            <td><?= $c5; ?></td>
            <td><?= $total; ?></td>
            <td><?= $rangking; ?></td>
            </tr>
        <?php $rangking++; ?>
        <?php endwhile; ?>
        </tbody>
        </table>

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php';
?>