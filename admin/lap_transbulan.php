<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');
$tgl_bayar = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date(30), date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);




    function terlambat ($tanggal_dateline, $tgl_tempo){
    
    $tanggal_dateline_pecah = explode("-", $tanggal_dateline);
    $tanggal_dateline_pecah = $tanggal_dateline_pecah[0]."-".$tanggal_dateline_pecah[1]."-".$tanggal_dateline_pecah[2];
    
    $tanggal_kembali_pecah = explode("-", $tgl_tempo);
    $tanggal_kembali_pecah = $tanggal_kembali_pecah[0]."-".$tanggal_kembali_pecah[1]."-".$tanggal_kembali_pecah[2];
    
    $selisih = strtotime($tanggal_kembali_pecah)- strtotime($tanggal_dateline_pecah);
    $selisih = $selisih/86400;
    
    if ($selisih>=1) {
        $hasil_tanggal = floor($selisih);
    }
    else{
        $hasil_tanggal = 0;
    }
    return  $hasil_tanggal;
    }
    
    
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
			<h2>Laporan Transaksi Tagihan Bulan</h2>
			<h4>Data Transaksi Tagihan Bulan</h4>
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    <div class="tampung">
                            <div class="table-responsive">
                            
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Transaksi Tagihan Bulan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display table table-bordered" id="transaksi">
                                
                                    <thead>
                                        <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No Sambung</th>
                                                <th>Tarif</th>
                                                <th>Stand Awal</th>
                                                <th>Stand Akhir</th>
                                                <th>Pemakaian</th>
                                                <th>Harga Air</th>
                                                <th>Biaya Admin</th>
                                                <th>Jumlah Tagihan</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Tanggal Tempo</th>
                                                <th>Denda</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php



$get = mysqli_query($con, "SELECT * FROM bulan k, pelanggan s where s.id_pelanggan =k.id_pelanggan ");
        $i =1;
      //  SELECT bulan.* FROM bulan, pelanggan, tarif ,pencatat_meter WHERE bulan.id_pelanggan = pelanggan.id_pelanggan AND bulan.id_tarif = tarif.id_tarif AND bulan.stand_awal = pencatat_meter.stan_awal AND bulan.stand_akhir = pencatat_meter.stan_akhir ORDER BY id_bulan DESC
        while ($p=mysqli_fetch_array($get)){
           
                               
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
                                            $nama = $p['nama'];
                                            $no_sambung = $p['no_sambung'];
                                            $tarif = $p['id_tarif'];
                                           
                                            $pamakaian = $stand_awal - $stand_akhir;
                                            $data= $tarif * $pamakaian;
                                            $jum = $biaya_adm + $data + $data;
                                            
                                     

                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$no_sambung;?></td>
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
                                <td><?=$status;?></td>
                        
                        </tr>
                                    <?php }
                                    
                                    ?>

                                           </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#transaksi').DataTable( {
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