<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');
    
 ?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Transaksi Tagihan Bulan</title>
        
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Aplikasi PDAM</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
       <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dasboar</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="tarif.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Harga Per Tarif
                            </a>
                            <a class="nav-link" href="denda.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Denda
                            </a>
                            <a class="nav-link" href="catat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Pencatat Meter
                            </a>
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="trans_pemasangan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Transaksi Pemasangan Belum Lunas
                            </a>
                            <a class="nav-link" href="trans_pmsnglunas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Transaksi Pemasangan Lunas
                            </a>
                            <a class="nav-link" href="trans_bulan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Transaksi Tagihan Bulan Belum Lunas
                            </a>
                            <a class="nav-link" href="trans_blnlunas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Transaksi Tagihan Bulan  Lunas
                            </a>
                            <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link" href="laporan_pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Pelanggan 
                            </a>
                            <a class="nav-link" href="lap_pencatat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Pencatat Meter
                            </a>
                            <a class="nav-link" href="lap_pemasangan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Transaksi Pemasangan
                            </a>
                            <a class="nav-link" href="lap_transbulan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan Tagihan Bulan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                                </nav>
                            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Transaksi Tagihan Bulan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                        <?php
// mengambil data barang
$data_barang = mysqli_query($con,"SELECT * FROM trans_pemasangan WHERE status='Belum Lunas'");
 
// menghitung data barang
$jumlah_barang = mysqli_num_rows($data_barang);

?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Transaksi Tagihan Bulan : <?php echo $jumlah_barang; ?></div>
                                    
                                </div>
                            </div>
                        </div>
                     
                        <!-- Button to Open the Modal -->
                          <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                            Tambah Transaksi Tagihan  Bulan
                          </button>

                        


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Transaksi Tagihan  Bulan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php



$get = mysqli_query($con, "SELECT * FROM trans_pemasangan k, pelanggan s where s.id_pelanggan =k.id_pelanggan AND status='Belum Lunas'");
        $i =1;
      //  SELECT bulan.* FROM bulan, pelanggan, tarif ,pencatat_meter WHERE bulan.id_pelanggan = pelanggan.id_pelanggan AND bulan.id_tarif = tarif.id_tarif AND bulan.stand_awal = pencatat_meter.stan_awal AND bulan.stand_akhir = pencatat_meter.stan_akhir ORDER BY id_bulan DESC
        while ($p=mysqli_fetch_array($get)){
           
                               
                                            while ($p=mysqli_fetch_array($get)){
                                            $id_pemasangan = $p['id_pemasangan'];
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
                                                <td>  
                                                    <!--<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id_bulan;?>">
                                                            Edit
                                                     </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$id_bulan;?>">
                                                            Delete
                                                        </button>-->
                                                         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pelunasan<?=$id_bulan;?>">
                                                            Pelunasan
                                                        </button>
                                                          
                                                </td>
                                               
                                            </tr>

      <!-- Pelunasan Modal -->
      <div class="modal fade" id="pelunasan<?=$id_pemasangan;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Pelunasan Transaksi Tagihan Bulanan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body"> 
                                                Apakah Anda Yakin Pelunasan <?=$nama;?>
                                                <input type='hidden' name='id_pemasangan' value='<?=$id_pemasangan;?>'>
                              
          <select name="status" class="form-control"> 
                 

                    <option value="Lunas">Lunas </option>
                
               </select>
                                                <br>
                                            <button type="submit" class="btn btn-info" name="lunas">Lunas</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                </div>


                           
                                            <?php
                                         
                                          }; //end of while

                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                 <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Informasi Pembayaran PDAM</span>
                    </div>
                </div>
            </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>


  

     <!-- The Modal -->
 <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                 <div class="modal-header">
                 <h4 class="modal-title">Tambah Transaksi Bulan</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <!-- Modal body -->
               <form method="post">
                <div class="modal-body">
                Pelanggan : <br>
              <select name="id_pelanggan" class="form-control"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($con,"select * from pelanggan");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                      $id_pelanggan = $fetcharray['id_pelanggan'];
                      $no_sambung = $fetcharray['no_sambung'];
                      $nama = $fetcharray['nama'];
                    ?>

                    <option value="<?=$id_pelanggan;?>"><?=$no_sambung;?> --<?=$nama;?></option>
                    <?php

                  }

                   ?>
               </select>
               Tarif : <br>

          <select name="id_tarif" class="form-control"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($con,"select * from tarif");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                      $nama_gol = $fetcharray['nama_gol'];
                      $tarif = $fetcharray['tarif'];
                      $id_tarif = $fetcharray['id_tarif'];
                    ?>

                    <option value="<?=$id_tarif;?>"><?=$tarif;?>--<?=$nama_gol;?> </option>
                    <?php

                  }

                   ?>
               </select>
 
Tanggal Pemasang : <br> <input type="date" name="tgl_pemasang" placeholder="Tanggal Pemasang" id="prd_name" class="form-control"/>

Pipa Diameter : <br> <input type="text" name="pipa_diameter" placeholder="Pipa Diamater" id="prd_name" class="form-control"/>

Biaya Pendaftaran : <br> <input type="number" name="biaya_daftar" placeholder="Biaya Pendaftaran" id="prd_desc" class="form-control"/>
Biaya Pemasangan : <br> <input type="number" name="biaya_pemasang" placeholder="Biaya Pendaftaran" id="prd_stan" class="form-control"/>
Biaya Instalasi : <br> <input type="number" name="biaya_instalasi" placeholder="Biaya Instalasi" id="prd_stan" class="form-control"/>
            
Tanggal Bayar :<br> <input  type="date" name="tgl_bayar" class="form-control" id="Tanggal Bayar" />
                                 
               <br>
        </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="simpandata" >Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
        </div>
        </form>

      
            
<?php
                            
                            if (isset($_POST['simpandata'])) {
                                $id_pelanggan       = $_POST['id_pelanggan'];
                                $id_tarif           = $_POST['id_tarif'];
                                $tgl_pemasang         = $_POST['tgl_pemasang'];
                                $pipa_diameter         = $_POST['pipa_diameter'];
                                $biaya_daftar         = $_POST['biaya_daftar'];
                                $biaya_pemasang         = $_POST['biaya_pemasang'];
                                $biaya_instalasi           = $_POST['biaya_instalasi'];
                                $tgl_bayar         = $_POST['tgl_bayar'];
                                $status         = $_POST['status'];
                                
                                
                              $sql = $con->query("INSERT INTO trans_pemasangan (id_pelanggan, id_tarif, tgl_pemasang, pipa_diameter, biaya_daftar, biaya_pemasang, biaya_instalasi ,tgl_bayar, status) values ('$id_pelanggan','$id_tarif','$tgl_pemasang','$pipa_diameter','$biaya_daftar','$biaya_pemasang','$biaya_instalasi','$tgl_bayar','$status')");
                                if ($sql) {
                                    ?>
                                    
                                        <script type="text/javascript">
                                        alert("Data Berhasil Disimpan");
                                        window.location.href="trans_pemasangan.php";
                                        </script>
                                        
                                        <?php
                                }else{
                                    echo"gagal nih boss!!";
                            }
                            }
//pelunasan

                            if (isset($_POST['lunas'])) {
                                $id_pemasangan = $_POST['id_pemasangan'];
                                $status = $_POST['status'];



                                $sql = $con->query("UPDATE trans_pemasangan SET  status='$status' where id_pemasangan ='$id_pemasangan' ");
                                

                                if ($sql) {
                                    ?>
                                    
                                        <script type="text/javascript">
                                        alert("Data Berhasil Disimpan");
                                        window.location.href="trans_pmsnglunas.php";
                                        </script>
                                        
                                        <?php
                                }else{
                                    echo"gagal nih boss!!";
                            }
                            }
                            ?>
</body>
</html>
