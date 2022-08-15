<?php

session_start();

//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');

//login
if(isset($_POST['login'])){
	//inisial variabel
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	$cek = mysqli_query($con, "SELECT * FROM user WHERE username='$username' and password='$password' ");
	$hitung = mysqli_num_rows($cek);

	if($hitung>0){
		//jika data ditemukan
		//berhasil login

		$_SESSION['login'] = 'True';
		header('location:index.php');

	}else{
		//data ditemukan
		//gagal login
		echo '
		<script>alert("username atau password salah");
		window.location.href="login.php"

		</script>
		';
	}

}

//regis//
if(isset($_POST['register'])){
	//inisial variabel
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];

	$cek = mysqli_query($con,"INSERT into user (username,password,nama,jabatan) values ('$username','$password','$nama','$jabatan') ");
	$hitung = mysqli_num_rows($cek);

	if($hitung>0){
		//jika data ditemukan
		//berhasil register

		$_SESSION['register'] = 'True';
		header('location:register.php');

	}else{
		//data ditemukan
		//gagal register
		echo '
		<script>alert("Register Masuk!!");
		window.location.href="register.php"

		</script>
		';
	}

}

//tambah pelanggan//
if(isset($_POST['tambahpel'])){
	$no_sambung = $_POST['no_sambung'];
	$nama = $_POST['nama'];
	$desa = $_POST['desa'];
	$kecamatan = $_POST['kecamatan'];
	$telp = $_POST['telp'];
	$tgl_pasang = $_POST['tgl_pasang'];
	$ket = $_POST['ket'];

	$insert = mysqli_query($con,"INSERT into pelanggan (no_sambung,nama,desa,kecamatan,telp,tgl_pasang,ket) values ('$no_sambung','$nama','$desa','$kecamatan','$telp','$tgl_pasang','$ket') ");

	if($insert){
		header('location:pelanggan.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Pelanggan Baru");
		window.location.href="pelanggan.php"

		</script>
		';
	}
}

//Update Data Pelanggan//
if(isset($_POST['updatepelanggan'])){
	$id_pelanggan_ = $_POST['id_pelanggan'];
	$no_sambung = $_POST['no_sambung'];
	$nama = $_POST['nama'];
	$desa = $_POST['desa'];
	$kecamatan = $_POST['kecamatan'];
	$telp = $_POST['telp'];
	$tgl_pasang = $_POST['tgl_pasang'];
	$ket = $_POST['ket'];

	$update = mysqli_query($con,"update pelanggan set no_sambung='$no_sambung',nama='$nama', desa='$desa', kecamatan='$kecamatan', telp='$telp', tgl_pasang='$tgl_pasang', ket='$ket' where id_pelanggan='$id_pelanggand'");

	if($update){
		header('location:pelanggan.php');
	} else {
		echo '
		<script>alert("Gagal Edit Pelanggan ");
		window.location.href="pelanggan.php"

		</script>
		';
	} 
}

//hapus pelanggan
if(isset($_POST['hapuspelanggan'])){
	$id_pelanggan = $_POST['id_pelanggan'];

	$hapus =mysqli_query($con, "delete from pelanggan where id_pelanggan='$id_pelanggan'");

	if($hapus){
		header('location:pelanggan.php');
	} else {
		echo '
		<script>alert("Hapus Pelanggan Gagal ");
		window.location.href="pelanggan.php"

		</script>
		';
	}

}

//Denda//
if(isset($_POST['simpandata'])){
	$denda = $_POST['denda'];
	
	$insert = mysqli_query($con,"INSERT into denda (denda) values ('$denda') ");

	if($insert){
		header('location:denda.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Pelanggan Baru");
		window.location.href="denda.php"

		</script>
		';
	}
}

//masukin tarif
if(isset($_POST['tambahtar'])){
	$nama_gol = $_POST['nama_gol'];
	$tarif = $_POST['tarif'];
	
	$insert = mysqli_query($con,"insert into tarif (nama_gol,tarif) values ('$nama_gol','$tarif') ");

	if($insert){
		header('location:tarif.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Tarif Baru");
		window.location.href="tarif.php"

		</script>
		';
	}
}

//masukin denda
if(isset($_POST['tambahdenda'])){
	$tarif_denda = $_POST['tarif_denda'];
	
	
	$insert = mysqli_query($con,"insert into denda (tarif_denda) values ('$tarif_denda') ");

	if($insert){
		header('location:denda.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Denda Baru");
		window.location.href="denda.php"

		</script>
		';
	}
}

//masukin transaksi bulan
if(isset($_POST['trans_bulan'])){
	$no_sambung = $_POST['no_sambung'];
	$nama = $_POST['nama'];


	$insert =mysqli_query($con, "insert into trans_bulan(id_pelanggan, id_tarif, stand_awal, stand_akhir, pemakaian, hrg_air, biaya_adm, jum_tagihan, status) value ('$no_sambung','$nama')");


	if($insert){
		header('location:pasba.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Pasang Baru");
		window.location.href="trans_bulan.php"

		</script>
		';
	}
}

if(isset($_POST['tambahbulan'])){
	$stand_awal = $_POST['stand_awal'];
	$stand_akhir = $_POST['stand_akhir'];
	$pemakaian = $_POST['pemakaian'];
	$hrg_air = $_POST['hrg_air'];
	$biaya_adm = $_POST['biaya_adm'];
	$jum_tagihan = $_POST['jum_tagihan'];
	$tgl_bayar = $_POST['tgl_bayar'];
	$status = $_POST['status'];
	

	$insert = mysqli_query($con,"insert into trans_bulan (stand_awal,stand_akhir,pemakaian,hrg_air,biaya_adm,jum_tagihan,tgl_bayar,status) values ('$stand_awal','$stand_akhir','$pemakaian','$hrg_air','$biaya_adm','$jum_tagihan','$tgl_bayar','$status') ");

	if($insert){
		header('location:trans_bulan.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Transaksi Tagihan Bulan");
		window.location.href="trans_bulan.php"

		</script>
		';
	}
}

if(isset($_POST['tambahpasba'])){
	$idpel = $_POST['idpel'];
	

	$insert = mysqli_query($con,"insert into pelanggan (idpel) values ('$idpel') ");

	if($insert){
		header('location:pasba.php');
	} else {
		echo '
		<script>alert("Gagal Menambah Tarif Baru");
		window.location.href="pasba.php"

		</script>
		';
	}
}


?>