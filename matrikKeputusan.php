<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}

require_once "koneksi.php";
$query = 'SELECT * FROM kreteria';

$result = mysqli_query($conn, $query);

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
        <thead class="table-primary">
            <tr>
            <th scope="col">Kode Alternatif</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">C5</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
            <td><?= $row["kAlternatif"];?></td>
            <td><?= $row["c1"];?></td>
            <td><?= $row["c2"];?></td>
            <td><?= $row["c3"];?></td>
            <td><?= $row["c4"];?></td>
            <td><?= $row["c5"];?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php'; ?>