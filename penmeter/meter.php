<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');

  // include 'ceklogin.php';
   // include 'fanction.php';
 ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Pencatat Meteran</title>
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
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dasboard
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="tarif.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Harga Per Tarif
                            </a>
                            <a class="nav-link" href="trans_pemasangan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Transaksi Pemasangan Baru
                            </a>
                            <a class="nav-link" href="trans_bulan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Transaksi Tagihan Bulan
                            </a>
                            <a class="nav-link" href="trans_tunggakan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Transaksi Tunggakan
                            </a>
                            <a class="nav-link" href="meteran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Pencatat Meteran
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Meteran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                        <?php
// mengambil data barang
$data_barang = mysqli_query($con,"SELECT * FROM pencatat_meter");
 
// menghitung data barang
$jumlah_barang = mysqli_num_rows($data_barang);

?>
  
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Meteran :  <?php echo $jumlah_barang; ?> </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Button to Open the Modal -->
                          <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                            Tambah Meteran
                          </button>

                        


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
                                                <th>Foto Meteran</th>
                                                <th>Pelanggan</th>
                                                <th>Tarif</th>
                                                <th>stand Awal</th>
                                                <th>Stand Akhir</th>
                                           
                                                <th>Pemakai</th>
                                                <th>Harga</th>
                                                <th>Tgl Catat</th>
                                                <th>Tgl Catat</th>

                                                <th>Tanggal Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $get = mysqli_query($con, "SELECT 
                                    pencatat_meter.*, pelanggan.nama, tarif.tarif 
                            FROM pencatat_meter, pelanggan, tarif 
                            WHERE pencatat_meter.id_tarif = pelanggan.id_pelanggan
                            AND pencatat_meter.id_pelanggan = tarif.id_tarif 
                            ORDER BY id_catat DESC");
                                            $i =1;

                                            while ($p=mysqli_fetch_array($get)){
                                                $id_catat = $p['id_catat'];
                                            $stan_awal = $p['stan_awal'];
                                            $stan_akhir = $p['stan_akhir'];
                                            $nama = $p['nama'];
                                            $tarif = $p['tarif'];
                                            $pemakai = $p['pemakai'];
                                            $tgl_catat = $p['tgl_catat'];
                                            $tgl_bayar = $p['tgl_bayar'];

                                                $harga = $tarif+$stan_awal+$stan_akhir;
                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><img src="foto/<?php echo $p['foto'] ?>"width="50" height="50" alt=""></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$tarif;?></td>
                                                <td><?=$stan_awal;?></td>
                                                <td><?=$stan_akhir;?></td>
                                                <td><?= $pemakai?></td>
                                                <td>Rp<?=number_format($harga);?></td>
                                                <td><?=$tgl_catat;?></td>
                                                <td><?=$tgl_bayar;?></td>
                                         
                                                <td>  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id_catat;?>">
                                                            Edit
                                                     </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$id_catat;?>">
                                                            Delete
                                                        </button>
                                                    </td>
                                            </tr>
                                            
  <!-- edit Modal -->
  <div class="modal fade" id="edit<?=$id_catat;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Transaksi</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                            <input type="text " name="pembayaran" value='<?=$nama;?>' class="form-control" required>
                                            <br>
                                            <input type='hidden' name='status' value='<?=$status;?>'>
                                            <input type='hidden' name='idk' value='<?=$idk;?>'>
                                            <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Update Transaksi Bulan</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                    </div>


                                                 <!-- Delete Modal -->
                                                 <div class="modal fade" id="delete<?=$id_catat;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Transaksi Tagihan Bulanan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body"> 
                                                Apakah Anda Yakin ingin menghapus <?=$nama;?>
                                                <input type='hidden' name='id_bulan' value='<?=$id_bulan;?>'>
  
                                                <br>
                                            <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
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
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

 <!-- The Modal -->
 <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                 <div class="modal-header">
                 <h4 class="modal-title">Tambah Meteran</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <!-- Modal body -->
               <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
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
               <br>

          <select name="id_tarif" class="form-control"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($con,"select * from tarif");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                      $tarif = $fetcharray['tarif'];
                      $id_tarif = $fetcharray['id_tarif'];
                    ?>

                    <option value="<?=$id_tarif;?>"><?=$tarif;?> </option>
                    <?php

                  }

                   ?>
               </select>
          <br>
     
               <input type="number" name="stan_awal" placeholder=" Stand Awal" class="form-control" required>
               <br>
               <input type="number" name="stan_akhir" placeholder=" Stand Awal" class="form-control" required>
               <br>
               <input type="text" name="pemakai" placeholder=" Pemakai" class="form-control" required>
               <br>
               <input type="date" name="tanggal"  class="form-control">
               <br>
               <input required="" type="file" name="foto" class="form-control" />
                                    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="simpan" >Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
        </div>
        </form>

            
<?php
                            
if (isset($_POST['simpan'])) {
    $id_pelanggan= $_POST['id_pelanggan'];
    $id_tarif= $_POST['id_tarif'];
    $stan_awal= $_POST['stan_awal'];
    $stan_akhir= $_POST['stan_akhir'];
    $pemakai= $_POST['pemakai'];
    $tanggal= $_POST['tanggal'];
    $foto= $_FILES['foto']['name'];
    $lokasi= $_FILES['foto']['tmp_name'];
    $upload= move_uploaded_file($lokasi, "foto/".$foto);
    
    if ($upload) {
    $sql = $con->query("insert into pencatat_meter (id_pelanggan,id_tarif, stan_awal, stan_akhir, pemakai,tgl_catat, foto) values('$id_pelanggan','$id_tarif','$stan_awal','$stan_akhir','$pemakai','$tanggal','$foto')");
    
    if ($sql) {
        ?>
        
            <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href="meteran.php";
            </script>
            
            <?php
    }else{
        echo"gagal boss";
    }
}
}
?>
                
            
            

  </div>
</html>
