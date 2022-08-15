<?php
//koneksi
$con = mysqli_connect('localhost','root','','isti');

  include 'fpdf/fpdf.php';


// include '../trans_bulan.php';
   if(isset($_GET['id_bulan'])){
    $id_bulan    =$_GET['id_bulan'];
}
$no = 1;
         $mhs = mysqli_query($con, "SELECT 
         bulan.*, pelanggan.nama,pelanggan.desa,pelanggan.kecamatan,pelanggan.no_sambung, tarif.tarif 
 FROM bulan, pelanggan, tarif 
 WHERE bulan.id_tarif = pelanggan.id_pelanggan
 AND bulan.id_pelanggan = tarif.id_tarif 
 ORDER BY id_bulan and id_bulan");

     $result    =mysqli_fetch_array($mhs);
     $stand_awal = $result['stand_awal'];
     $stand_akhir = $result['stand_akhir'];
     $pamakaian = $stand_awal - $stand_akhir;

                                    
     $id_bulan = $result['id_bulan'];

    // $pemakaian = $p['pemakaian'];
     $biaya_adm = $result['biaya_adm'];
     $tgl_bayar = $result['tgl_bayar'];
     $status= $result['status'];
     $nama = $result['nama'];
     $tarif = $result['tarif'];
 
    $data= $tarif * $pamakaian;
    $jum = $biaya_adm  + $tarif;
    ?>


<html>
<head>
<title>Faktur Pembayaran Bulanan</title>
<style>
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center>
                       
                                          

<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>Perusahaan Daerah Air Minum</b></span></br><br>
Jl. Mahakam No. 55 Kuala Kapuas, Kab. Kapuas, Kalimantan Tengah. </br><br>
Telp : 0513-21388 <hr>
</td>
<td style='vertical-align:top' width='30%' align='left'>
<br><br>

</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
No Sambung. : <?php echo $result['no_sambung']?></br>
Tanggal :<?php echo $result['tgl_bayar']?></br>
Nama Pelanggan : <?php echo $result['nama']?></br>
Alamat : <?php echo $result['desa'] ?>, <?php echo $result['kecamatan']?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Telp : <?php echo $result['no_sambung']?><br>
<?php
$id_bulan =$_GET['id_bulan'];
  									$sql = $con->query("select * from bulan where id_bulan=$id_bulan ");
                                      $a    =mysqli_fetch_array($sql);
									
?>
Status : <?php echo $a['status']?>
</td>

</table>
<br><br>
<table cellspacing='4' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 



<td width='10%'>No</td>
<td width='20%'>TARIF</td>
<td width='20%'>STAND AWAL</td>
<td width='20%'>STAND AKHIR</td>
<td width='4%'>PEMAKAIAN</td>
<td width='7%'>HARGA AIR</td>
<td width='7%'>BIAYA ADMIN</td>
<td width='13%'>Total TAGIHAN</td>
<tr>
    <TD> <?=$no++;?></TD>
<td>Rp <?php echo $result['tarif']?></td>
<td> <?php echo $result['stand_awal']?></td>
<td> <?php echo $result['stand_akhir']?></td>
<td> <?php echo $result['stand_awal']-$result['stand_akhir']?></td>
<td> <?php echo $result['biaya_adm']?></td>
<td><?php echo $result['data']?> </td>
<td colspan ='5'  style='text-align:right'> <?php echo $result['biaya_adm'] + $result['data']+$result['tarif']+$result['stand_awal']+$result['stand_akhir']?></td>

<tr>
<td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah  </div></td>
<td style='text-align:right'><?php echo $result['biaya_adm'] + $result['data']+$result['tarif']?></td>
</tr>
<tr> 
</table>
                 
<table style='width:650; font-size:10pt;' cellspacing='7' >
<tr>
<td align='center'>Diterima Oleh,</br></br><br><br><u>(PETUGAS PDAM)</u></td>
<td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
<td align='center'>TTD,</br><br><br></br><u>(...........)</u></td>
</tr>


</table>
</center>

</body>
</html>
<script>
		window.print();
	</script>