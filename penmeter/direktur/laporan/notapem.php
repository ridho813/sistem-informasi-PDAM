<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');

  include 'fpdf/fpdf.php';


// include '../trans_bulan.php';
   if(isset($_GET['id_pemasangan'])){
    $id_pemasangan    =$_GET['id_pemasangan'];
}

         $mhs = mysqli_query($con, "SELECT trans_pemasangan.*, pelanggan.nama, pelanggan.no_sambung, pelanggan.desa, pelanggan.kecamatan, tarif.tarif 
FROM trans_pemasangan, pelanggan, tarif
WHERE trans_pemasangan.id_pelanggan = pelanggan.id_pelanggan
 AND trans_pemasangan.id_tarif = tarif.id_tarif
 And id_pemasangan=".$id_pemasangan);
         $no =1;

     $result    =mysqli_fetch_array($mhs);
    

                                    
                                          $tgl_pemasang = $result['tgl_pemasang'];
                                            $pipa_diameter = $result['pipa_diameter'];
                                            $biaya_daftar = $result['biaya_daftar'];
                                            $biaya_pemasang = $result['biaya_pemasang'];
                                            $biaya_instalasi = $result['biaya_instalasi'];
                                            $jum_tagihan = $biaya_daftar + $biaya_daftar + $biaya_pemasang;
                                            $id_pemasangan = $result['id_pemasangan'];
                                            $status = $result['status'];
                                            $nama = $result['nama'];
                                            $tgl_bayar = $result['tgl_bayar'];
                                            $desa = $result['desa'];
                                            $kecamatan = $result['kecamatan'];
                                            
    ?>


<html>
<head>
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
<span style='font-size:12pt'>
  <b>PERUSAHAAN DAERAH AIR MMINUM</b> <br>
  <b> TIRTA DARMA AYU INDRAMAYU</b>
  </span>
  <br>Jl. Letjen Suprapto No. 25/E Telp. (0234) 271311 <br>
    e-mail : pdamindramayu@yahoo.ac.id <hr>
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
Status : <?php echo $result['status']?>
<!--<?php
$id_pemasangan =$_GET['id_pemasangan'];
                    $sql = $con->query("SELECT * FROM trans_pemasangan k, pelanggan s where s.id_pelanggan =k.id_pelanggan ");
                                      $a    =mysqli_fetch_array($sql);
                  
?>-->
</td>

</table>
<br><br>
<table cellspacing='4' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 



<td width='10%'>No</td>
<td width='20%'>PIPA DIAMETER</td>
<td width='4%'>BIAYA DAFTAR</td>
<td width='7%'>BIAYA INSTALASI</td>
<td width='7%'>BIAYA PEMASANGAN</td>
<td width='13%'>TOTAL TAGIHAN </td>
<tr>
    <TD> <?=$no++;?></TD>
<td> <?php echo $result['pipa_diameter']?></td>
<td>Rp<?php echo $result['biaya_daftar']?> </td>
<td>Rp<?php echo $result['biaya_instalasi']?></td>
<td>Rp<?php echo $result['biaya_pemasang']?> </td>
<td colspan ='5'  style='text-align:right'> Rp <?php echo $jum_tagihan?></td>


<tr>
<td colspan = '5'><div style='text-align:right' >Total Yang Harus Di Bayar Adalah  </div> </td>
<td colspan ='5'  style='text-align:right'> Rp <?php echo $jum_tagihan?>  </td>

</tr>
<tr> 
</table>
                 
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<tr>
<td align='left'>Diterima Oleh,</br></br><br><br><u>(PETUGAS PDAM)</u></td>
</tr>


</table>
</center>

</body>
</html>
<script>
		window.print();
	</script>