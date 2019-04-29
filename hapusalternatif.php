<?php
session_start();

if( !isset($_SESSION['login']) ) {
    header("location: login.php");
    exit;
}

require_once 'koneksi.php';
$id = $_GET["id"];

echo "
		<script>
        confirm('Hapus Data?!');
		</script>
    "; 

$hapus = mysqli_query($conn, "DELETE FROM alternatif WHERE kAlternatif= '$id'");

if ( mysqli_affected_rows($conn) > 0 ) {
    echo "
		<script>
			alert('data berhasil alternatif dihapus!');
			document.location.href = 'view.php';
		</script>
    "; 
} else {
    echo "
		<script>
			alert('data gagal alternatif dihapus!');
			document.location.href = 'view.php';
		</script>
    "; 
}





?>