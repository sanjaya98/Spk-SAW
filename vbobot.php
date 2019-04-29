<?php
require_once "koneksi.php";
$query = 'SELECT * FROM bobot';

$result = mysqli_query($conn, $query);

?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-3 mt-3">
      <a class="d-block btn btn-primary" href="view.php">Data Alternatif</a>
      <a class="d-block btn btn-primary mt-1" href="vkreteria.php">Data Kriteria</a>
      <a class="d-block btn btn-primary mt-1" href="vbobot.php">Bobot</a>
    </div>
    <div class="col-9 mt-3">
        <h2>DATA BOBOT</h2>
        <hr>
        <table class="table table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="col">BC1</th>
            <th scope="col">BC2</th>
            <th scope="col">BC3</th>
            <th scope="col">BC4</th>
            <th scope="col">BC5</th>
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
        <?php endwhile; ?>
        </tbody>
        </table>
        

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php'; ?>