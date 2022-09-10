<form method="post">
	<textarea class="form-control" name="komentar" placeholder="Isi Komentar"></textarea> <br> 
	<button class=" btn btn-primary" name="kirim"><i class="fa fa-paper-plane"></i> Kirim</button>
</form>
<?php if (isset($_POST["kirim"])) 
{
	
	if (!isset($_SESSION["pengguna"])) 
	$id_pengguna=$_SESSION["pengguna"]["id_pengguna"];
	$isikomentar=$_POST["komentar"];
	date_default_timezone_set("Asia/Jakarta");
	$tanggal=date("Y-m-d H:i:s");

	$koneksi->query("INSERT INTO komentar(id_pengguna, id_artikel, komentar, tanggal)
	VALUES( '$id_pengguna' , '$id_artikel', '$komentar', '$tanggal')");						
}
?>