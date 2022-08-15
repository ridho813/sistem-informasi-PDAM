<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');

  include 'fpdf/fpdf.php';


// include '../trans_bulan.php';
   if(isset($_GET['id_bulan'])){
    $id_bulan    = $_GET['id_bulan'];
     $query = mysqli_query($con,"SELECT * FROM bulan k, pelanggan s where s.id_pelanggan =k.id_pelanggan and id_bulan=".$id_bulan);
    // $query = mysqli_query($con,"SELECT * FROM bulan where id_bulan=".$id_bulan);
         $no = 1;
        $result    =mysqli_fetch_array($query);
      {
                                            $stand_awal = $result['stand_awal'];
                                            $stand_akhir = $result['stand_akhir'];
                                            $biaya_adm = $result['biaya_adm'];
                                            $tgl_bayar = $result['tgl_bayar'];
                                            $tgl_tempo = $result['tgl_tempo'];
                                            $status= $result['status']; 
                                            $nama = $result['nama'];
                                            $no_sambung = $result['no_sambung'];
                                            $tarif = $result['id_tarif'];
                                           
                                            $pamakaian = $stand_awal - $stand_akhir;
                                            $data= $tarif * $pamakaian;
                                            $jum = $biaya_adm + $data ;
                                           
;
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
No Telp : <?php echo $result['no_sambung']?><br>
Status : <?php echo $result['status']?>
</td>

</table>
<br><br>
<table cellspacing='4' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 <?php 

     $query = mysqli_query($con,"SELECT * FROM bulan k, pelanggan s where s.id_pelanggan =k.id_pelanggan AND status='Lunas'");
         $no = 1;
        $result    =mysqli_fetch_array($query);
        $id_bulan = $result['id_bulan'];
                                            $stand_awal = $result['stand_awal'];
                                            $stand_akhir = $result['stand_akhir'];
                                            $biaya_adm = $result['biaya_adm'];
                                            $tgl_bayar = $result['tgl_bayar'];
                                            $tgl_tempo = $result['tgl_tempo'];
                                            $status= $result['status']; 
                                            $nama = $result['nama'];
                                            $no_sambung = $result['no_sambung'];
                                            $tarif = $result['id_tarif'];
                                           
                                            $pamakaian = $stand_awal - $stand_akhir;
                                            $data= $tarif * $pamakaian;
                                            $jum = $biaya_adm + $data 
  ?>



<td width='10%'>No</td>
<td width='20%'>TARIF</td>
<td width='20%'>STAND AWAL</td>
<td width='20%'>STAND AKHIR</td>
<td width='4%'>PEMAKAIAN</td>
<td width='7%'>HARGA AIR</td>
<td width='7%'>BIAYA ADMIN</td>
<td width='13%'>Total TAGIHAN</td>
<tr>
    <td><?=$no++?></td>
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$stand_awal;?></td>
                                                <td><?=$stand_akhir;?></td>
                                                <td><?=$pamakaian;?></td>
                                                <td>Rp<?=number_format($data);?></td>
                                                <td>Rp<?=number_format($biaya_adm);?></td>
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
<?php } ?>
</body>
</html>
<script>
    window.print();
  </script>