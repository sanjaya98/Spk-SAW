<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php";

if ( isset($_POST["submit"]) ) {
  $kodeAlternatif = htmlspecialchars($_POST['kodeAlternatif']);
  $alternatif = htmlspecialchars($_POST['alternatif']);;

    $query = "INSERT INTO alternatif 
                VALUES ('$kodeAlternatif', '$alternatif')
                ";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0 ) {
      echo "
      <script>
        alert('data Alternatif berhasil disimpan!');
      </script>
      ";
    } else {
      echo "
      <script>
        alert('data Alternatif gagal disimpan!');
      </script>
      ";
      mysqli_error($conn);
    }
   

}


?>

<?php require_once 'tampletes/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-3 mt-3">
      <a class="d-block btn btn-primary" href="dataAlternatif.php">Data Alternatif</a>
      <a class="d-block btn btn-primary mt-1" href="dataKreteria.php">Data Kriteria</a>
      <a class="d-block btn btn-primary mt-1" href="bobot.php">Bobot</a>
    </div>
    <div class="col-9 mt-3">
        <?php if ( mysqli_affected_rows($conn) > 0 ) : ?>
            <?php echo '
            <div class="alert alert-success" role="alert">
            Data Berhasil ditambahkan!</div>'; 
            ?>
        <?php endif; ?>
        <h2>INPUT DATA ALTERNATIF</h2>

        <form action="" method="post">
        <div class="form-group row">
            <label for="kodeAlternatif" class="col-sm-2 col-form-label">Kode Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="kodeAlternatif" id="kodeAlternatif" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Nama Alternatif" class="col-sm-2 col-form-label">Nama Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="alternatif" id="alternatif"required>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <button type="submit" name="submit" class="btn btn-success btn-lg">Simpan</button>
        </div>

        </form>

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php'; ?>