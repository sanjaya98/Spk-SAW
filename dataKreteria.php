<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php";

$result = mysqli_query($conn, 'SELECT kAlternatif FROM alternatif');


if ( isset($_POST["submit"]) ) {
  $kodeAlternatif = htmlspecialchars($_POST['kodeAlternatif']);
  $c1 = htmlspecialchars($_POST['c1']);
  $c2 = htmlspecialchars($_POST['c2']);
  $c3 = htmlspecialchars($_POST['c3']);
  $c4 = htmlspecialchars($_POST['c4']);
  $c5 = htmlspecialchars($_POST['c5']);


  $query = "INSERT INTO kreteria VALUES('$kodeAlternatif', '$c1', '$c2', '$c3', '$c4', '$c5')";

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0 ) {
    echo "
		<script>
			alert('data kreteria berhasil disimpan!');
		</script>
		";
  } else {
    echo "
		<script>
			alert('data kreteria gagal disimpan!');
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
        <h2>INPUT DATA KRETERIA</h2>

        <form action="" method="post">
        <div class="form-group row">
        <label for="kodeAlternatif" class="col-sm-2 col-form-label">Kode Alternatif</label>
          <div class="col-sm-9">
          <select class="custom-select" name="kodeAlternatif">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <option value="<?=$row["kAlternatif"]; ?>"><?=$row["kAlternatif"]; ?><option>
            <?php endwhile; ?>
          </select>
          </div>
        </div>
        <div class="form-group row">
            <label for="c1" class="col-sm-2 col-form-label">C1</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c1" id="c1"required>
            </div>
        </div>
        <div class="form-group row">
            <label for="c2" class="col-sm-2 col-form-label">C2</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c2" id="C2"required>
            </div>
        </div>
        <div class="form-group row">
            <label for="c3" class="col-sm-2 col-form-label">C3</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c3" id="c3"required>
            </div>
        </div>
        <div class="form-group row">
            <label for="c4" class="col-sm-2 col-form-label">C4</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c4" id="c4"required>
            </div>
        </div>
        <div class="form-group row">
            <label for="c5" class="col-sm-2 col-form-label">C5</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c5" id="c5"required>
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