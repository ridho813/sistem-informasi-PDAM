<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');



  // include 'ceklogin.php';
   // include 'fanction.php';
 ?> 
<html>
<head>
  <title>Laporan Transaksi Pemasangan</title>
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
            <h2>Laporan Transaksi Pemasangan</h2>
            <h4>Data Transaksi Pemasangan</h4>
                <div class="data-tables datatable-dark">
                    
                    <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    <table >
        <tr><td>
            LAPORAN PERBULAN DAN PERTAHUN
        </td></tr>
        <tr>
            <td width="50%">
<form action="exportmeter.php" method="post">
    <div class="row form-group">

        <div class="col-md-5">
        <select class="form-control " name="bln">
                            
                            
                            <option value="1" selected="">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-3">

                <?php
$now=date('Y');
echo "<select name='thn' class='form-control'>";
for ($a=2018;$a<=$now;$a++)
{
     echo "<option value='$a'>$a</option>";
}
echo "</select>";
?>
</div>
        
    <input type="submit" class="" name="submit" value="Export to Excel">
    </div>
    </form>
    
    
    <form action="exportmeter.php" method="post">
    <div class="row form-group">

        <div class="col-md-5">
        <select class="form-control " name="bln">
                            
                            <option value="all" selected="">ALL</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-3">
                <?php
$now=date('Y');
echo "<select name='thn' class='form-control'>";
for ($a=2018;$a<=$now;$a++)
{
     echo "<option value='$a'>$a</option>";
}
echo "</select>";
?>
</div>


    <input type="submit" class="" name="submit2"  value="Tampilkan">
    </div>
    </form>
    </td>
    
          
   </table>
     
     
<div class="tampung">
                            <div class="table-responsive">
                            
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Transaksi Pemasangan
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
                                                <th>Tanggal Pemasangan</th>
                                                <th>Pipa Diamter</th>
                                                <th>Biaya Pendaftaran</th>
                                                <th>Biaya Pemasangan</th>
                                                <th>Biaya Instalasi</th>
                                                <th>Jumlah Tagihan</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php


$get = mysqli_query($con, "SELECT trans_pemasangan.*, pelanggan.nama, pelanggan.no_sambung, tarif.tarif FROM trans_pemasangan, pelanggan, tarif
 WHERE trans_pemasangan.id_pelanggan = pelanggan.id_pelanggan
  AND trans_pemasangan.id_tarif = tarif.id_tarif
  ORDER BY id_pemasangan");
        $i =1;
                                            while ($p=mysqli_fetch_array($get)){
                                            $nama = $p['nama'];
                                            $no_sambung = $p['no_sambung'];
                                            $tarif = $p['tarif'];
                                            $tgl_pemasang = $p['tgl_pemasang'];
                                            $pipa_diameter = $p['pipa_diameter'];
                                            $biaya_daftar = $p['biaya_daftar'];
                                            $biaya_pemasang = $p['biaya_pemasang'];
                                            $biaya_instalasi = $p['biaya_instalasi'];
                                            $tgl_bayar = $p['tgl_bayar'];
                                            $status = $p['status'];
                                            // $aksi = $p['aksi'];
                                            $jum = $biaya_daftar + $biaya_pemasang + $biaya_instalasi+$tarif;




                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$nama?></td>
                                                <td><?=$no_sambung?></td>
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$tgl_pemasang?></td>
                                                <td><?=$pipa_diameter?></td>
                                                <td>Rp<?=number_format($biaya_daftar);?></td>
                                                <td>Rp<?=number_format($biaya_pemasang);?></td>
                                                <td>Rp<?=number_format($biaya_instalasi);?></td>
                                                <td>Rp<?=number_format($jum);?></td>
                                                <td><?=$tgl_bayar?></td>
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