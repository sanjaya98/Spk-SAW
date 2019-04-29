<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}


require_once "koneksi.php";

$id = $_GET['id'];

$query = "SELECT * FROM bobot WHERE id = $id";

$result = mysqli_query($conn, $query);



if ( isset($_POST["submit"]) ) {
  $bc1 = htmlspecialchars($_POST['bc1']);
  $bc2 = htmlspecialchars($_POST['bc2']);
  $bc3 = htmlspecialchars($_POST['bc3']);
  $bc4 = htmlspecialchars($_POST['bc4']);
  $bc5 = htmlspecialchars($_POST['bc5']);
  $id = $_POST['id'];

    $query = "UPDATE bobot SET
                bc1 = '$bc1',
                bc2 = '$bc2',
                bc3 = '$bc3',
                bc4 = '$bc4',
                bc5 = '$bc5'
                WHERE id = $id
            ";

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0 ) {
    echo "
		<script>
            alert('data bobot berhasil disimpan!');
            document.location.href = 'bobot.php';
		</script>
		";
  } else {
    echo "
		<script>
			alert('data bobot gagal disimpan!');
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
        <h2>EDIT DATA BOBOT</h2>

        <form action="" method="post">
    <?php while ( $data = mysqli_fetch_assoc($result) ) : ?>
        <div class="form-group row">
            <label for="bc1" class="col-sm-2 col-form-label">BC1</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="bc1" id="bc1"required value="<?= $data["bc1"]; ?>">
            </div> 
        </div>
        <div class="form-group row">
            <label for="bc2" class="col-sm-2 col-form-label">BC2</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="bc2" id="bc2"required value="<?= $data["bc2"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="bc3" class="col-sm-2 col-form-label">BC3</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="bc3" id="bc3"required value="<?= $data["bc3"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="bc4" class="col-sm-2 col-form-label">BC4</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="bc4" id="bc4"required value="<?= $data["bc4"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="bc5" class="col-sm-2 col-form-label">BC5</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="bc5" id="bc5"required value="<?= $data["bc5"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-9">
            <input type="hidden" class="form-control" name="id" id="id"required value="<?= $data["id"] ?>">
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
