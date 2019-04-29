<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php"; 
 
$id = $_GET["id"];

$query = "SELECT * FROM kreteria WHERE kAlternatif='".$id."'";

$result = mysqli_query($conn, $query);

 
if ( isset($_POST["submit"]) ) {

//   $nmAlteratif = htmlspecialchars($_POST["kalternatif"]);
// untuk kode alternatif abil di url melalui id
  $c1 = htmlspecialchars($_POST["c1"]);
  $c2 = htmlspecialchars($_POST["c2"]);
  $c3 = htmlspecialchars($_POST["c3"]);
  $c4 = htmlspecialchars($_POST["c4"]);
  $c5 = htmlspecialchars($_POST["c5"]);

    $query = "UPDATE kreteria SET 
                c1 = '$c1',
                c2 = '$c2',
                c3 = '$c3',
                c4 = '$c4',
                c5 = '$c5'
                 WHERE kAlternatif='".$id."'";

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0 ) {
    echo "
		<script>
            alert('data kriterian berhasil diedit!');
            document.location.href = 'vkreteria.php';
		</script>
		";
  } else {
    echo "
		<script>
		    	alert('data kriterian gagal diedit!');
        </script>
    ";
    echo mysqli_error($conn);
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
        <h2>EDIT DATA KRITERIA</h2>

        <form action="" method="post">
    <?php while ( $data = mysqli_fetch_assoc($result) ) : ?>
        <div class="form-group row">
            <label for="kalternatif" class="col-sm-2 col-form-label">Kode Alternatif</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="kalternatif" id="kalternatif" required  disabled value="<?= $data["kAlternatif"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="c1" class="col-sm-2 col-form-label">C1</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c1" id="c1" required value="<?= $data["c1"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="c2" class="col-sm-2 col-form-label">C2</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c2" id="c2" required value="<?= $data["c2"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="c3" class="col-sm-2 col-form-label">C3</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c3" id="c3" required value="<?= $data["c3"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="c4" class="col-sm-2 col-form-label">C4</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c4" id="c4" required value="<?= $data["c4"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="c5" class="col-sm-2 col-form-label">C5</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="c5" id="c5" required value="<?= $data["c5"]; ?>">
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
