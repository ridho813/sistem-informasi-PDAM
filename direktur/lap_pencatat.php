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

    LAPORAN DATA PENCATAT METER
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
			<h2>Laporan Pencatat Meter</h2>
			<h4>Data Pencatat Meter</h4>
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->     
     
                            <div class="tampung">
                            <div class="table-responsive">
                            
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Pencatatan Meteran
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>No Sambung</th>
                                                <th>Tarif</th>
                                                <th>stand Awal</th>
                                                <th>Stand Akhir</th>
                                           
                                                <th>Pemakai</th>
                                                <th>Harga</th>
                                                <th>Tgl Catat</th>
                                                

                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $get = mysqli_query($con, "SELECT pencatat_meter.*, pelanggan.nama, pelanggan.no_sambung, tarif.tarif FROM pencatat_meter, pelanggan, tarif
 WHERE pencatat_meter.id_pelanggan = pelanggan.id_pelanggan
  AND pencatat_meter.id_tarif = tarif.id_tarif
  ORDER BY id_catat");
                                            $i =1;

                                            while ($p=mysqli_fetch_array($get)){
                                            $id_catat = $p['id_catat'];
                                            $stan_awal = $p['stan_awal'];
                                            $stan_akhir = $p['stan_akhir'];
                                            $nama = $p['nama'];
                                            $no_sambung = $p['no_sambung'];
                                            $tarif = $p['tarif'];
                                            
                                            $tgl_catat = $p['tgl_catat'];
                                            
                                            $pemakai = $stan_awal - $stan_akhir;
                                            $harga = $tarif * $pemakai;
                                            
                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$no_sambung;?></td>
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$stan_awal;?></td>
                                                <td><?=$stan_akhir;?></td>
                                                <td><?= $pemakai?></td>
                                                <td>Rp<?=number_format($harga);?></td>
                                                <td><?=$tgl_catat;?></td>
                                         
                                             
                                            </tr>
                                            
                                    <?php }
                                    
                                    ?>

                        </tbody>
                        </table>
					
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