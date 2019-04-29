<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}

require_once "koneksi.php";

$query = 'SELECT * FROM kreteria';

$result = mysqli_query($conn, $query);

// mencari nilai max dam min

$maxMin = "SELECT MIN(c1) as c1, MAX(c2) as c2, MAX(c3) as c3, MIN(c4) as c4, MAX(c5) as c5 FROM kreteria";

$nilai = mysqli_query($conn, $maxMin);

$data = mysqli_fetch_assoc($nilai);
// set milai min dan maxa ke variabel
$minC1 = $data['c1'];
$maxC2 = $data['c2'];
$maxC3 = $data['c3'];
$minC4 = $data['c4'];
$maxc5 = $data['c5'];

 
?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
  <div class="row justify-content-center">

    <div class="col-9 mt-3">
        <h2>Menghitung SAW</h2>
        <div class="tengah ">
            <a class="btn btn-outline-primary" href="matrikKeputusan.php">Matrik Keputusan</a>
            <a class="btn btn-outline-danger" href="nilaibobot.php">Nilai Bobot</a>
            <a class="btn btn-outline-warning" href="normalisasi.php">Normalisasi</a>
            <a class="btn btn-outline-success" href="perangkingan.php">Perangkingan</a>
        </div>
        
        <div class="col mt-3">
          <h5>MATRIK KEPUTUSAN</h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-warning">
            <tr>
            <th scope="col">KODE KRITERIAN</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">C5</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
            <td><?= $row["kAlternatif"];?></td>
            <td><?= $row["c1"];?></td>
            <td><?= $row["c2"];?></td>
            <td><?= $row["c3"];?></td>
            <td><?= $row["c4"];?></td>
            <td><?= $row["c5"];?></td>
            </tr>
        <?php $no++; ?>
        <?php endwhile; ?>
        </tbody>
        </table>

        <div class="col mt-5">
          <h5>NILAI MAX DAN MIN</h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-warning">
            <tr>
            <th scope="col">MIN C1</th>
            <th scope="col">MAX C2</th>
            <th scope="col">MAX C3</th>
            <th scope="col">MIN C4</th>
            <th scope="col">MAX C5</th>
            </tr>
        </thead>
        <tbody>
            <td><?= $minC1;?></td>
            <td><?= $maxC2;?></td>
            <td><?= $maxC3;?></td>
            <td><?= $minC4;?></td>
            <td><?= $maxc5;?></td>
            </tr>
        </tbody>
        </table>

        <div class="col mt-5">
          <h5>NILAI KRITERIA / NILAI MAX DAN MIN</h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-warning">
            <tr>
              <th scope="col">KODE KRITERIAN</th>
              <th scope="col">C1</th>
              <th scope="col">C2</th>
              <th scope="col">C3</th>
              <th scope="col">C4</th>
              <th scope="col">C5</th>
            </tr>
        </thead>
        <tbody>
        <?php 
          $query = 'SELECT * FROM kreteria';
          $data = mysqli_query($conn, $query);
        ?>
        <?php while ($rows = mysqli_fetch_assoc($data)) : ?>
            <tr>
                <td><?= $rows["kAlternatif"];?></td>
                <td><?= $rows["c1"] / $minC1 ;?></td>
                <td><?= $rows["c2"] / $maxC2;?></td>
                <td><?= $rows["c3"] / $maxC3;?></td>
                <td><?= $rows["c4"] / $minC4;?></td>
                <td><?= $rows['c5'] / $maxc5;?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php';
?>