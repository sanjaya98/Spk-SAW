<?php
require_once "koneksi.php";
$query = 'SELECT * FROM kreteria';

if ( isset($_POST["search"]) ) {
    $cari = $_POST["cari"];

    $query = "SELECT * FROM kreteria
                WHERE
                kAlternatif LIKE '%$cari%' OR 
                c1 LIKE '%$cari%' OR
                c2 LIKE '%$cari%' OR
                c3 LIKE '%$cari%' OR
                c4 LIKE '%$cari%' OR
                c5 LIKE '%$cari%'
                ";
} else {
    $query = 'SELECT * FROM kreteria';
}

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
        <h2>DAFTAR DATA KRETERIA</h2>
        <hr>
        
        <form action="" method="post">
              <input type="text" for="cari" name="cari" class="col-sm-6" autofocus autocomplete="off">
              <button type="submit" name="search" id="cari" class="btn btn-primary">Search</button>
        </form>

        <table class="table table-hover mt-2">
        <thead class="table-dark">
            <tr>
            <th scope="col">NO</th>
            <th scope="col">Kode Alternatif</th>
            <th scope="col">C1</th>
            <th scope="col">C2</th>
            <th scope="col">C3</th>
            <th scope="col">C4</th>
            <th scope="col">C5</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
            <th scope="row"><?= $no;?></th>
            <td><?= $row["kAlternatif"];?></td>
            <td><?= $row["c1"];?></td>
            <td><?= $row["c2"];?></td>
            <td><?= $row["c3"];?></td>
            <td><?= $row["c4"];?></td>
            <td><?= $row["c5"];?></td>
            <td>
                <a href="editDataKriteria.php?id=<?= $row["kAlternatif"];?>"><i class="fas fa-edit"></i></a>
            </td>
            </tr>
        <?php $no++; ?>
        <?php endwhile; ?>
        </tbody>
        </table>
        
    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php'; ?>