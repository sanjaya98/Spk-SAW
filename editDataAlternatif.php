<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php"; 
 
$id = $_GET["id"];

$query = "SELECT * FROM alternatif WHERE kAlternatif='".$id."'";

$result = mysqli_query($conn, $query);

 
if ( isset($_POST["submit"]) ) {

  $nmAlteratif = htmlspecialchars($_POST["nmAlternatif"]);

    $query = "UPDATE alternatif SET nmAlternatif = '$nmAlteratif' WHERE kAlternatif='".$id."'";

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0 ) {
    echo "
		<script>
            alert('data alternatif berhasil diedit!');
            document.location.href = 'view.php';
		</script>
		";
  } else {
    echo "
		<script>
		    	alert('data alternatif gagal diedit!');
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
      <a class="d-block btn btn-primary" href="view.php">Data Alternatif</a>
      <a class="d-block btn btn-primary mt-1" href="vkreteria.php">Data Kriteria</a>
      <a class="d-block btn btn-primary mt-1" href="bobot.php">Bobot</a>
    </div>
    <div class="col-9 mt-3">
        <h2>EDIT DATA ALTERNATIF</h2>

        <form action="" method="post">
    <?php while ( $data = mysqli_fetch_assoc($result) ) : ?>
        <div class="form-group row">
            <label for="bc1" class="col-sm-2 col-form-label">Kode Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="kalternatif" id="kalternatif" required  disabled value="<?= $data["kAlternatif"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="bc2" class="col-sm-2 col-form-label">Nama Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="nmAlternatif" id="nmAlternatif" required value="<?= $data["nmAlternatif"]; ?>">
            </div>
        </div>

        <?php endwhile; ?>

        <div class="form-group row justify-content-end">
            <button type="submit" name="submit" class="btn btn-success btn-lg">Edit!</button>
        </div>

        </form>

    </div>
  </div>
</div>

<?php require_once 'tampletes/footer.php'; ?>
