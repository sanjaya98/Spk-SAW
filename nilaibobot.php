<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php";
$query = 'SELECT * FROM bobot';

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
          <h5>NILAI BOBOT</h5>
          </div>

        <table class="table table-sm mt-2">
        <thead class="table-danger">
            <tr>
            <th scope="col">Bobor C1</th>
            <th scope="col">Bobor C2</th>
            <th scope="col">Bobor C3</th>
            <th scope="col">Bobor C4</th>
            <th scope="col">Bobor C5</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
            <td><?= $row["bc1"];?></td>
            <td><?= $row["bc2"];?></td>
            <td><?= $row["bc3"];?></td>
            <td><?= $row["bc4"];?></td>
            <td><?= $row["bc5"];?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php'; ?>