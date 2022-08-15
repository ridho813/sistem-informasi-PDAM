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
                <div class="data-tables datatable-dark">
                    
                    <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Sambung</th>
                                                <th>Nama</th>
                                                <th>Desa</th>
                                                <th>Kecamatan</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Pasang</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $get = mysqli_query($con, "select * from pelanggan");
                                            $i =1;

                                            while($p=mysqli_fetch_array($get)){
                                            $id_pelanggan = $p ['id_pelanggan'];
                                            $no_sambung = $p['no_sambung'];
                                            $nama = $p['nama'];
                                            $desa = $p['desa'];
                                            $kecamatan = $p['kecamatan'];
                                            $telp = $p['telp'];
                                            $tgl_pasang = $p['tgl_pasang'];
                                            $ket = $p['ket'];
                                            
                                            


                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?php echo $no_sambung;?></td>
                                                <td><?php echo $nama?></td>
                                                <td><?php echo $desa?></td>
                                                <td><?php echo $kecamatan?></td>
                                                <td><?php echo $telp?></td>
                                                <td><?php echo $tgl_pasang?></td>
                                                <td><?php echo $ket?></td>
                                            </tr>
                                    </div>

                                            <?php
                                            }; //end of while

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