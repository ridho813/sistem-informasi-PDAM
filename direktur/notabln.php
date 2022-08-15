<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');



  // include 'ceklogin.php';
   // include 'fanction.php';
 ?>
<html>
<head>
  <title>
    SISTEM INFORMASI PEMBAYARAN REKENING AIR PDAM 
    TIRTA DARMA AYU INDRAMAYU
    JL.LETJEN SUPRAPTO NO. 25/E INDRAMAYU

    LAPORAN DATA PELANGGAN

    </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
            <h2>Laporan Data Pelanggan</h2>
            <h4>Data Pelanggan</h4>
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
Tanggal :<?php echo $result['tgl_bayar']?></br>
Nama Pelanggan : <?php echo $result['nama']?></br>
Alamat : <?php echo $result['desa'] ?>, <?php echo $result['kecamatan']?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
No Sambung : <?php echo $result['no_sambung']?><br>
<?php
$id_bulan =$_GET['id_bulan'];
                                    $sql = $con->query("select * from bulan where id_bulan=$id_bulan ");
                                      $a    =mysqli_fetch_array($sql);
                                    
?>
Status : <?php echo $a['status']?>
</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
Tarif :<?php echo $result['tgl_bayar']?></br>
Stand Awal : <?php echo $result['stand_awal']?></br>
Stand Akhir : <?php echo $result['stand_akhir']?></br>
Pemakaian : <?php echo $result['pemakaian'] ?><br>
Harga Air :<?php echo $result['data']?></br>
Biaya Admin : <?php echo $result['biaya_adm']?></br>
Jumlah Tagihan :<?php echo $result['jum']?></br>

</td>

</table>

                <div class="data-tables datatable-dark">
                    
                    <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    
                                        
                                        <tbody>

                                            <?php

$get = mysqli_query($con,"SELECT * FROM bulan k, pelanggan s where s.id_pelanggan =k.id_pelanggan AND status='Lunas'");
        $i =1;
       

  while ($p=mysqli_fetch_array($get)) {
                                    
                                            $id_bulan = $p['id_bulan'];
                                            $stand_awal = $p['stand_awal'];
                                            $stand_akhir = $p['stand_akhir'];
                                           // $pemakaian = $p['pemakaian'];
                                           // $hrg_air = $p['hrg_air'];
                                            $biaya_adm = $p['biaya_adm'];
                                            $tgl_bayar = $p['tgl_bayar'];
                                            $tgl_tempo = $p['tgl_tempo'];
                                            
                                            $stand_awal = $p['stand_awal'];
                                            $stand_akhir = $p['stand_akhir'];
                                            $status= $p['status']; 
                                            $tarif = $p['id_tarif'];
                                           
                                            $pamakaian = $stand_awal - $stand_akhir;
                                            $data= $tarif * $pamakaian;
                                            $jum = $biaya_adm + $data ;
                                           

                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$stand_awal;?></td>
                                                <td><?=$stand_akhir;?></td>
                                                <td><?=$pamakaian;?></td>
                                                <td>Rp<?=number_format($data);?></td>
                                                <td>Rp<?=number_format($biaya_adm);?></td>
                                                <td>Rp<?=number_format($jum);?></td>
                                                <td><?=$tgl_bayar;?></td>
                                                <td><?=$tgl_tempo;?></td>
                                            <td>    <?php 
                                
                                $denda2 = $con -> query("select * from denda");
                                $denda3 = $denda2 -> fetch_assoc();
                                $denda4 = $denda3['denda'];
                            
                                
                                
                                
                                $tanggal_dateline2 = $p['tgl_tempo'];
                                //$tgl_bayar = date('Y-m-d');
                                
                                $lambat = terlambat($tanggal_dateline2, $tgl_bayar);
                                $denda1 = $lambat * $denda4;
                                
                                if ($lambat>0) {
                                    echo "
                                    
                                    <font color='red'>$lambat hari<br>(Rp $denda1)</font>
                                    ";
                                }else{
                                    echo $lambat." Hari";
                                }
                                
                                ?></td>
                                            </tr>
                                    </div>

                                            <?php
                                            }; //end of while

                                            ?>


                                       </tbody>
                             
                    
                </div>
</div>
    
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    

</body>

</html>