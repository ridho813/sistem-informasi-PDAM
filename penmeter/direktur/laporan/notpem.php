<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');

  include 'fpdf/fpdf.php';


// include '../trans_bulan.php';
   if(isset($_GET['id_pemasangan'])){
    $id_pemasangan    = $_GET['id_pemasangan'];
     $get = mysqli_query($con, "SELECT trans_pemasangan.*, pelanggan.nama, pelanggan.no_sambung, tarif.tarif FROM trans_pemasangan, pelanggan, tarif
 WHERE trans_pemasangan.id_pelanggan = pelanggan.id_pelanggan
  AND trans_pemasangan.id_tarif = tarif.id_tarif
  ORDER BY id_pemasangan=".$id_pemasangan);

         $no = 1;
        $result    =mysqli_fetch_array($query);
                                            $nama = $query['nama'];
                                            $no_sambung = $query['no_sambung'];
                                            $tarif = $query['tarif'];
                                            $tgl_pemasang = $query['tgl_pemasang'];
                                            $pipa_diameter = $query['pipa_diameter'];
                                            $biaya_daftar = $query['biaya_daftar'];
                                            $biaya_pemasang = $query['biaya_pemasang'];
                                            $biaya_instalasi = $query['biaya_instalasi'];
                                            $tgl_bayar = $query['tgl_bayar'];
                                            $status = $query['status'];
                                            // $aksi = $p['aksi'];
                                            $jum = $biaya_daftar + $biaya_pemasang + $biaya_instalasi+$tarif;

}



        
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
<span style='font-size:12pt'>
  <b>PERUSAHAAN DAERAH AIR MMINUM</b> <br>
  <b> TIRTA DARMA AYU INDRAMAYU</b>
  </span>
  <br>Jl. Letjen Suprapto No. 25/E Telp. (0234) 271311 <br>
    e-mail : pdamindramayu@yahoo.ac.id <hr>
</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
No Sambung. : <?php echo $result['no_sambung']?></br>
Tanggal :<?php echo $result['tgl_bayar']?></br>
Nama Pelanggan : <?php echo $result['nama']?>    </br>
Alamat : <?php echo $result['desa'] ?>, <?php echo $result['kecamatan']?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Telp : <?php echo $result['telp']?><br>
Status : <?php echo $result['status']?>
</td>

</table>
<br><br>
<table cellspacing='4' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 <?php 

     $query = mysqli_query($con,"SELECT trans_pemasangan.*, pelanggan.nama, pelanggan.no_sambung, tarif.tarif 
FROM trans_pemasangan, pelanggan, tarif
WHERE trans_pemasangan.id_pelanggan = pelanggan.id_pelanggan
 AND trans_pemasangan.id_tarif = tarif.id_tarif
 ORDER BY id_pemasangan");
         $no = 1;
        $result    =mysqli_fetch_array($query);
        $id_pemasangan = $result['id_pemasangan'];
                                            $nama = $result['nama'];
                                            $no_sambung = $result['no_sambung'];
                                            $tarif = $result['tarif'];
                                            $tgl_pemasang = $result['tgl_pemasang'];
                                            $pipa_diameter = $result['pipa_diameter'];
                                            $biaya_daftar = $result['biaya_daftar'];
                                            $biaya_pemasang = $result['biaya_pemasang'];
                                            $biaya_instalasi = $result['biaya_instalasi'];
                                            $tgl_bayar = $result['tgl_bayar'];
                                            $status = $result['status'];
                                            // $aksi = $p['aksi'];
                                            $jum = $biaya_daftar + $biaya_pemasang + $biaya_instalasi+$tarif;

  ?>

                                                
<td width='10%'>No</td>
<td width='20%'>TARIF</td>
<td width='20%'>PIPA DIAMETER</td>
<td width='20%'>BIAYA PENDAFTARAN</td>
<td width='4%'>BIAYA PEMASANGAN</td>
<td width='7%'>BIAYA INSTALASI</td>
<td width='13%'>Total TAGIHAN</td>
<tr>
    <td><?=$no++?></td>
                                               
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$pipa_diameter?></td>
                                                <td>Rp<?=number_format($biaya_daftar);?></td>
                                                <td>Rp<?=number_format($biaya_pemasang);?></td>
                                                <td>Rp<?=number_format($biaya_instalasi);?></td>
                                                <td>Rp<?=number_format($jum);?></td>
                                                
</tr>
<tr> 
</table>
                 
<table style='width:650; font-size:10pt;'  cellspacing='7' >
<tr>
<td align='center' >Diterima Oleh,</br></br><br><br><u>(PETUGAS PDAM)</u></td>
</tr>


</table>
</center>

</body>
</html>
<script>
    window.print();
  </script>