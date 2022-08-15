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

	if($hitung==true){
		//jika data ditemukan
		//berhasil login
		$data = mysql_fetch_array($query);

  $_SESSION['id_user']=$data['id_user'];
		$_SESSION['username']    = $data['username'];
		$_SESSION['password']=$password;
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



//Update Data Bulan//
if(isset($_POST['editbulan'])){
    $idb= $_POST['idb'];
    $id_catat= $_POST['id_catat'];
    $id_pelanggan= $_POST['id_pelanggan'];
    $id_tarif= $_POST['id_tarif'];
    $stan_awal= $_POST['stan_awal'];
    $stan_akhir= $_POST['stan_akhir'];
    $tgl_catat= $_POST['tgl_catat'];
    $foto= $_FILES['foto']['name'];
    $lokasi= $_FILES['foto']['tmp_name'];
    $upload= move_uploaded_file($lokasi, "foto/".$foto);


    $query = mysqli_query($con,"UPDATE pencatat set id_pelanggan='$id_pelanggan', id_tarif='$id_tarif', stan_awal='$stan_awal', stan_akhir='$stan_akhir', tgl_catat='$tgl_catat', foto='$foto' where id_catat='$idc'");
    if($query){
        header('location:catat.php');
    } else {
        echo '
        <script>alert("Gagal Edit Pencatat Meter ");
        window.location.href="catat.php"

        </script>
        ';
    } 
}

//Update Data pemasang//
if(isset($_POST['editpemasangan'])){
    $idtp= $_POST['idtp'];
    $biaya_daftar= $_POST['biaya_daftar'];
    $biaya_pemasang= $_POST['biaya_pemasang'];
    $biaya_instalasi= $_POST['biaya_instalasi'];
    

    $query = mysqli_query($con,"UPDATE trans_pemasangan set biaya_daftar='$biaya_daftar', biaya_pemasang='$biaya_pemasang', biaya_instalasi='$biaya_instalasi' where id_pemasangan='$idtp'");
    if($query){
        header('location:trans_pemasangan.php');
    } else {
        echo '
        <script>alert("Gagal Edit Pemasangan ");
        window.location.href="trans_pemasangan.php"

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
		echo '
		<script>alert("Data Pelanggan Berhasil Disimpan");
		window.location.href="pelanggan.php"

		</script>
		';
	} else {
		echo '
		<script>alert("Gagal Menambah Pelanggan Baru");
		window.location.href="pelanggan.php"

		</script>
		';
	}
}

//Update Data Pelanggan//

if(isset($_POST['editpelanggan'])){
	$idp = $_POST['idp'];
	$no_sambung = $_POST['no_sambung'];
	$nama = $_POST['nama'];
	$desa = $_POST['desa'];
	$kecamatan = $_POST['kecamatan'];
	$telp = $_POST['telp'];
	$tgl_pasang = $_POST['tgl_pasang'];
	$ket = $_POST['ket'];

	$update = mysqli_query($con,"UPDATE pelanggan set no_sambung='$no_sambung', nama='$nama', desa='$desa', kecamatan='$kecamatan', telp='$telp', tgl_pasang='$tgl_pasang', ket='$ket' where id_pelanggan='$idp'");

	if($update){
		echo '
		<script>alert("Data Pelanggan Berhasil Di Update");
		window.location.href="pelanggan.php"

		</script>
		';
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
	$idp = $_POST['idp'];

	$hapus =mysqli_query($con, "DELETE from pelanggan where id_pelanggan='$idp'");

	if($hapus){
		echo '
		<script>alert("Data Pelanggan Berhasil Di Hapus");
		window.location.href="pelanggan.php"

		</script>
		';
	} else {
		echo '
		<script>alert("Hapus Pelanggan Gagal ");
		window.location.href="pelanggan.php"

		</script>
		';
	}

}
//hapus denda
if(isset($_POST['hapusdenda'])){
	$idd = $_POST['idd'];

	$hapus =mysqli_query($con, "DELETE from denda where id_denda='$idd'");

	if($hapus){
		echo '
		<script>alert("Data Denda Berhasil Di Hapus");
		window.location.href="denda.php"

		</script>
		';
	} else {
		echo '
		<script>alert("Hapus Denda Gagal ");
		window.location.href="denda.php"

		</script>
		';
	}

}


//tambah Denda//
if(isset($_POST['tambahdenda'])){
	$denda = $_POST['denda'];
	
	$insert = mysqli_query($con,"INSERT into denda (denda) values ('$denda') ");

	if($insert){
		echo '
		<script>alert("Data Berhasil Ditambahkan");
		window.location.href="denda.php"

		</script>
		';
	} else {
		echo '
		<script>alert("Gagal Menambah Pelanggan Baru");
		window.location.href="denda.php"

		</script>
		';
	}
}
//Update Data Denda//

if(isset($_POST['editdenda'])){
	$idd = $_POST['idd']; //id denda
	$denda = $_POST['denda'];
	

	$update = mysqli_query($con,"UPDATE denda set denda='$denda' where id_denda='$idd'");

	if($update){
		echo '
		<script>alert("Data Denda Berhasil Di Update");
		window.location.href="denda.php"

		</script>
		';
	} else {
		echo '
		<script>alert("Gagal Edit Denda ");
		window.location.href="denda.php"

		</script>
		';
	} 
}
//Update Data Catat//

if(isset($_POST['editcatat'])){
	$idc = $_POST['idc'];
	$stan_awal = $_POST['stan_awal'];
	$stan_akhir = $_POST['stan_akhir'];
	$tgl_catat = $_POST['tgl_catat'];
	$foto = $_POST['foto'];
	
	$update = mysqli_query($con,"UPDATE pencatat set stan_awal='$stan_awal', stan_akhir='$stan_akhir', tgl_catat='$tgl_catat', foto='$foto' where id_catat='$idc'");

	if($update){
		header('location:catat.php');
	} else {
		echo '
		<script>alert("Gagal Edit Pencatat Meter ");
		window.location.href="catat.php"

		</script>
		';
	} 
}
//hapus catat
if(isset($_POST['delete'])){
	$idc = $_POST['idc'];
	
	$hapus =mysqli_query($con, "DELETE from pencatat where  id_catat='$idc'");

	if($hapus){
		header('location:catat.php');
	} else {
		echo '
		<script>alert("Hapus Pencatat Meter Gagal ");
		window.location.href="catat.php"

		</script>
		';
	}

}
//Update Data Catat//

if(isset($_POST['editpemasangan'])){
	$idtp = $_POST['idtp'];
	$tgl_pemasang = $_POST['tgl_pemasang'];
	$biaya_daftar = $_POST['biaya_daftar'];
	$biaya_pemasang = $_POST['biaya_pemasang'];
	$biaya_instalasi = $_POST['biaya_instalasi'];
	
	$update = mysqli_query($con,"UPDATE trans_pemasangan set tgl_pemasang='$tgl_pemasang', biaya_daftar='$biaya_daftar', biaya_pemasang='$biaya_pemasang', biaya_instalasi='$biaya_instalasi' where tgl_pemasang='$idtp'");

	if($update){
		header('location:trans_pemasangan.php');
	} else {
		echo '
		<script>alert("Gagal Edit Pencatat Meter ");
		window.location.href="trans_pemasangan.php"

		</script>
		';
	} 
}
//hapus tarif
if(isset($_POST['hapustarif'])){
	$idt = $_POST['idt'];

	$hapus =mysqli_query($con, "DELETE from tarif where id_tarif='$idt'");

	if($hapus){
		header('location:tarif.php');
	} else {
		echo '
		<script>alert("Hapus Harga Per Tarif Gagal ");
		window.location.href="tarif.php"

		</script>
		';
	}

}



//Tambah tarif
if(isset($_POST['tambahtar'])){
	$nama_gol = $_POST['nama_gol'];
	$tarif = $_POST['tarif'];
	
	$insert = mysqli_query($con,"INSERT into tarif (nama_gol,tarif) values ('$nama_gol','$tarif') ");

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
//Update Data Tarif//

if(isset($_POST['edittarif'])){
	$idt = $_POST['idt']; //id tarif
	$nama_gol = $_POST['nama_gol'];
	$tarif = $_POST['tarif'];
	

	$update = mysqli_query($con,"UPDATE tarif set nama_gol='$nama_gol', tarif='$tarif' where id_tarif='$idt'");

	if($update){
		header('location:tarif.php');
	} else {
		echo '
		<script>alert("Gagal Edit Pelanggan ");
		window.location.href="tarif.php"

		</script>
		';
	} 
}


//tambah denda
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
//tambah bulan
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