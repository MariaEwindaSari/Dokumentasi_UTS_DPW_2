<h2>Tambah artikel</h2>
<?php
$datakategori=array();
$ambil= $koneksi->query("SELECT * FROM kategori");
while($tiap=$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>judul</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
 		<label>Kategori</label>
 		<select class="form-control" name="id_kategori">
 			<option value="">Pilih Kategori</option>
 			<?php foreach ($datakategori as $key => $value): ?>

 			<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
 				
 			<?php endforeach ?>
 		</select>
 	</div>
	<div class="form-group">
		<label>Foto</label>
		<div class="letak-input" style="margin-bottom: 10px;">
			<input type="file" class="form-control" name="foto[]">
		</div>
		<span class="btn btn-primary btn-tambah">
			<i class="fa fa-plus"></i>
		</span>
	</div>
	<button class ="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
		
</form>
<?php
if (isset ($_POST['save']))
{
	$namanamafoto = $_FILES['foto']['name'];
	$lokasilokasifoto =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasilokasifoto[0], "../foto/".$namanamafoto[0]);
	$koneksi->query("INSERT INTO artikel
		(id_artikel,id_kategori,judul,kategori,foto)
		VALUES('$_POST[judul]','$_POST[id_kategori]','$_POST[kategori]','$namanamafoto[0]')");
	$id_produk_barusan=$koneksi->insert_id;
	foreach ($namanamafoto as $key => $tiap_nama) 
	{
		$tiap_lokasi =$lokasilokasifoto[$key];

		move_uploaded_file($tiap_lokasi, "../foto/".$tiap_nama);

		$koneksi->query("INSERT INTO foto(id_artikel, nama_artikel_foto)
			VALUES('$id_produk_barusan','$tiap_nama')");
	}

	// echo "<div class='alert alert-info'>Data Tersimpan</div>";
	// echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=produk'>";
	echo "<pre>";
	print_r($_FILES["foto"]);
	echo "</pre>";
}
?>

<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click",function(){
			$(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
		})
	})
</script>