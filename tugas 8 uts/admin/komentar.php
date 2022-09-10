<h3>Komentar</h3>	
<hr>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Komentar</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>

		<?php $ambil= $koneksi->query("SELECT * FROM komentar JOIN pengguna ON komentar.id_pengguna=pengguna.id_pengguna ORDER BY tanggal DESC");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah["nama_pengguna"] ?></td>
			<td><?php echo $pecah["komentar"] ?></td>
			<td><?php echo $pecah["tanggal"] ?></td>
			<td>
				<a href="index.php?halaman=hapuskomentar&id=<?php echo $pecah['id_komentar'];?>" class="btn btn-warning btn-sm">Hapus</a>
				<a href="index.php?halaman=jawabkomentar&id=<?php echo $pecah['id_komentar'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-envelope"></span> Balas</a>
			</td>

		</tr>
		<?php $nomor++;?>
		<?php }?>

	</tbody>

</table>