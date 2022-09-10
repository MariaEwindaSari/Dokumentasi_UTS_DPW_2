<h2>Daftar Artikel</h2>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>judul</th>
			<th>Kategori</th>
			<th>isi artikel</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM artikel LEFT JOIN kategori ON artikel.id_kategori=kategori.id_kategori"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['judul']?></td>
			<td><?php echo $pecah['kategorikategori']?></td>
			<td><?php echo $pecah['harga_produk']?></td>
			<td><?php echo $pecah['foto']?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="100px">
			</td>
			<td><?php echo $pecah['stok_produk']?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class= "btn btn-danger" onclick="return confirm('Yakin Mau di Hapus?')" ><i class="lyphicon glyphicon-trash"></i>Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class= "btn btn-warning"><i class="lyphicon glyphicon-edit"></i>Ubah</a>
				<a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk'];?>" class= "btn btn-info" ><i class="glyphicon glyphicon-eye">Detail</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }?>
	</tbody>
</table>
<a href="index.php?halaman=tambahartikel" class="btn btn-primary">Tambah artikel</a>