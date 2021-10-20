<?php

session_start();
 if (!isset($_SESSION["login"])) {
     echo '<script>location="login-admin.php"</script>';
 }

include '../db.php';

	if(isset($_GET['ida'])) {
		$artikel = mysqli_query($conn, "SELECT gambar_artikel FROM tb_artikel WHERE artikel_id ='".$_GET['ida']."'  ");
		$a = mysqli_fetch_object($artikel);

		unlink( '../web/gambar/' .$a->gambar_artikel);

		$delete = mysqli_query($conn, "DELETE FROM tb_artikel WHERE artikel_id ='".$_GET['ida']."'  ");
		echo '<script>location="data-artikel.php"</script>';
	}

	if(isset($_GET['idg'])) {
		$gambar = mysqli_query($conn, "SELECT gambar FROM gallery WHERE id_gambar ='".$_GET['idg']."'  ");
		$g = mysqli_fetch_object($gambar);

		unlink( '../web/gambar/' .$g->gambar);

		$delete = mysqli_query($conn, "DELETE FROM gallery WHERE id_gambar ='".$_GET['idg']."'  ");
		echo '<script>location="data-gambar.php"</script>';
	}
	if(isset($_GET['idp'])) {
		$profile = mysqli_query($conn, "SELECT gambar_halaman FROM tb_profile WHERE id_profile ='".$_GET['idp']."'  ");
		$p = mysqli_fetch_object($profile);

		unlink( '../web/gambar/' .$p->gambar_halaman);

		$delete = mysqli_query($conn, "DELETE FROM tb_profile WHERE id_profile ='".$_GET['idp']."'  ");
		echo '<script>location="data-halaman.php"</script>';
	}
	if(isset($_GET['idk'])) {
		$profile = mysqli_query($conn, "SELECT gambar_halaman FROM tb_kelembagaan WHERE id_kelembagaan ='".$_GET['idk']."'  ");
		$p = mysqli_fetch_object($profile);

		unlink( '../web/gambar/' .$p->gambar_halaman);

		$delete = mysqli_query($conn, "DELETE FROM tb_kelembagaan WHERE id_kelembagaan ='".$_GET['idk']."'  ");
		echo '<script>location="data-kelembagaan.php"</script>';
	}
	if(isset($_GET['idd'])) {
		$data = mysqli_query($conn, "SELECT gambar_halaman FROM tb_datadesa WHERE id_data ='".$_GET['idd']."'  ");
		$d = mysqli_fetch_object($data);

		unlink( '../web/gambar/' .$d->gambar_halaman);

		$delete = mysqli_query($conn, "DELETE FROM tb_datadesa WHERE id_data ='".$_GET['idd']."'  ");
		echo '<script>location="data-desa.php"</script>';
	}
	if(isset($_GET['idh'])) {
		$data = mysqli_query($conn, "SELECT gambar FROM tb_perangkat WHERE id_perangkat ='".$_GET['idh']."'  ");
		$d = mysqli_fetch_object($data);

		unlink( '../web/gambar/' .$d->gambar);

		$delete = mysqli_query($conn, "DELETE FROM tb_perangkat WHERE id_perangkat ='".$_GET['idh']."'  ");
		echo '<script>location="data-perangkat-desa.php"</script>';
	}
	if(isset($_GET['ids'])) {
		$data = mysqli_query($conn, "SELECT gambar FROM tb_sosmed WHERE id ='".$_GET['ids']."'  ");
		$d = mysqli_fetch_object($data);

		unlink( '../web/gambar/' .$d->gambar);

		$delete = mysqli_query($conn, "DELETE FROM tb_sosmed WHERE id ='".$_GET['ids']."'  ");
		echo '<script>location="data-sosmed.php"</script>';
	}
		if(isset($_GET['idnp'])) {

		$delete = mysqli_query($conn, "DELETE FROM tb_pengumuman WHERE id ='".$_GET['idnp']."'  ");
		echo '<script>location="data-pengumuman.php"</script>';
	}
	if(isset($_GET['idpe'])) {

		$delete = mysqli_query($conn, "DELETE FROM tb_pekerjaan WHERE id ='".$_GET['idpe']."'  ");
		echo '<script>location="data-pekerjaan.php"</script>';
	}
	if(isset($_GET['idkl'])) {

		$delete = mysqli_query($conn, "DELETE FROM tb_jkelamin WHERE id ='".$_GET['idkl']."'  ");
		echo '<script>location="data-jeniskelamin.php"</script>';
	}
	if(isset($_GET['idag'])) {

		$delete = mysqli_query($conn, "DELETE FROM tb_agama WHERE id ='".$_GET['idag']."'  ");
		echo '<script>location="data-agama.php"</script>';
	}
	if(isset($_GET['idtm'])) {
		$artikel = mysqli_query($conn, "SELECT marker, gambar_tempat FROM map WHERE id ='".$_GET['idtm']."'  ");
		$a = mysqli_fetch_object($artikel);

		unlink( '../web/gambar/' .$a->marker);
		unlink( '../web/gambar/' .$a->gambar_tempat);

		$delete = mysqli_query($conn, "DELETE FROM map WHERE id ='".$_GET['idtm']."'  ");
		echo '<script>location="tempat.php"</script>';
	}
	if(isset($_GET['idkom'])) {
		$delete = mysqli_query($conn, "DELETE FROM komentar WHERE id ='".$_GET['idkom']."'  ");
		echo '<script>location="data-komentar"</script>';
	}

?>