<?php
//koneksi
$con = mysqli_connect('localhost','root','','isti');

  include 'fpdf/fpdf.php';


// include '../trans_bulan.php';
   if(isset($_GET['id_pemasangan'])){
    $id_pemasangan    =$_GET['id_pemasangan'];
}
$no = 1;
         $mhs = mysqli_query($con, "SELECT * FROM trans_pemasangan k, pelanggan s where s.id_pelanggan =k.id_pelanggan and id_pemasangan");

     $result    =mysqli_fetch_array($mhs);
    

                                    
                                          $tgl_pemasang = $result['tgl_pemasang'];
                                            $pipa_diameter = $result['pipa_diameter'];
                                            $biaya_daftar = $result['biaya_daftar'];
                                            $biaya_pemasang = $result['biaya_pemasang'];
                                            $biaya_ins = $result['biaya_ins'];
                                            $jum_tagihan = $biaya_daftar + $biaya_daftar + $biaya_pemasang;
                                            $id_pemasangan = $result['id_pemasangan'];
                                            $status = $result['status'];
                                            $nama = $result['nama'];
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
Tanggal :<?php echo $result['tgl_pasang']?></br>
Nama Pelanggan : <?php echo $result['nama']?></br>
Alamat : <?php echo $result['desa'] ?>, <?php echo $result['kecamatan']?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Telp : <?php echo $result['no_sambung']?><br>
<?php
$id_pemasangan =$_GET['id_pemasangan'];
  									$sql = $con->query("SELECT * FROM trans_pemasangan k, pelanggan s where s.id_pelanggan =k.id_pelanggan ");
                                      $a    =mysqli_fetch_array($sql);
									
?>
Status : <?php echo $a['status']?>
</td>

</table>
<br><br>
<table cellspacing='4' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 



<td width='10%'>No</td>
<td width='20%'>PIPA DIAMETER</td>
<td width='4%'>BIAYA DAFTAR</td>
<td width='7%'>BIAYA INS</td>
<td width='7%'>BIAYA PEMASANGAN</td>
<td width='13%'>TOTAL TAGIHAN </td>
<tr>
    <TD> <?=$no++;?></TD>
<td> <?php echo $result['pipa_diameter']?></td>
<td>Rp<?php echo $result['biaya_daftar']?> </td>
<td> <?php echo $result['biaya_ins']?></td>
<td><?php echo $result['biaya_pemasang']?> </td>
<td colspan ='5'  style='text-align:right'> <?php echo $jum_tagihan?></td>


<tr>
<td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah  </div> </td>

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