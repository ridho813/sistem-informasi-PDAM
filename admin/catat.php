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
                        <h1 class="mt-4">Data  Pencatat Meteran</h1>
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
                                    <div class="card-body"> Pencatat Meteran :  <?php echo $jumlah_barang; ?> </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Button to Open the Modal -->
                          <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                            Tambah Pencatat Meters
                          </button>

                        


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Pencatat Meter
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
                                                
                                                <th>Aksi</th>
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
                                            
                                            $pemakaian = $stan_awal-$stan_akhir;
                                            $harga = $tarif* $pemakaian;
                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><img src="foto/<?php echo $p['foto'] ?>"width="50" height="50" alt=""></td>
                                                <td><?=$nama;?></td>
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$stan_awal;?></td>
                                                <td><?=$stan_akhir;?></td>
                                                <td><?= $pemakaian?></td>
                                                <td>Rp<?=number_format($harga);?></td>
                                                <td><?=$tgl_catat;?></td>
                                                
                                                <td>  
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id_catat;?>">
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
                                                <h4 class="modal-title">Edit Transaksi Pencatat</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
           Tarif :    <br>
          <select name="id_tarif" class="form-control" value="<?=$id_tarif?>"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($con,"select * from tarif");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                      $tarif = $fetcharray['tarif'];
                      $nama_gol = $fetcharray['nama_gol'];
                      $id_tarif = $fetcharray['id_tarif'];
                    ?>

                    <option value="<?=$id_tarif;?>"><?=$tarif;?>--<?=$nama_gol;?> </option>
                    <?php

                  }

                   ?>
               </select>
               Stand Awal :   <br>
               <input type="number" name="stan_awal" placeholder=" Stand Awal" class="form-control" value="<?=$stan_awal?>">
               Stand Akhir : <br>
               <input type="number" name="stan_akhir" placeholder=" Stand Awal" class="form-control" value="<?=$stan_akhir?>">
               Tanggal Catat :<br>
               <input type="date" name="tgl_catat"  class="form-control">
               Foto : <br>
               <input type="file"  name="foto" class="form-control" />
                                    
                                          <br>
                                               <input type='hidden' name='id_catat' value='<?=$id_catat;?>'>
                                           
                                      
                                            <button type="submit" class="btn btn-primary" name="editcatat">Update Pelanggan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </form>
                                        
                                            </div>                 
                                        </div>
                                    </div>
                                    </div>


                            <!-- Hapus Modal -->
                                         <div class="modal fade" id="delete<?=$id_catat;?>" >
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Pelanggan <?= $nama;?> </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                            Apakah anda Yakin ingin menghapus data ini <?=$nama;?> ??

                                            <input type='hidden' name='id_catat' value='<?=$id_catat;?>'>
                                            <br><br>
                                            <button type="submit" class="btn btn-danger" name="hapuscatat">Delete</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script type="text/javascript">
          function textonly(e){
          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var character = String.fromCharCode(code);
          //alert('Character was ' + character);
            //alert(code);
            //if (code == 8) return true;
            var AllowRegex  = /^[\ba-zA-Z\s-]$/;
            if (AllowRegex.test(character)) return true;
            return false;
          }
          </script>
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
               
           Tarif :    <br>
          <select name="id_tarif" class="form-control"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($con,"select * from tarif");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                      $tarif = $fetcharray['tarif'];
                      $nama_gol = $fetcharray['nama_gol'];
                      $id_tarif = $fetcharray['id_tarif'];
                    ?>

                    <option value="<?=$id_tarif;?>"><?=$tarif;?>--<?=$nama_gol;?> </option>
                    <?php

                  }

                   ?>
               </select>
               Stand Awal :   <br>
               <input type="number" name="stan_awal" placeholder=" Stand Awal" class="form-control" required>
               Stand Akhir : <br>
               <input type="number" name="stan_akhir" placeholder=" Stand Awal" class="form-control" required>
               Tanggal Catat :<br>
               <input type="date" name="tanggal"  class="form-control">
               Foto : <br>
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
    $foto= $_FILES['foto']['name'];
    $tgl_catat= $_POST['tgl_catat'];
    $lokasi= $_FILES['foto']['tmp_name'];
    $upload= move_uploaded_file($lokasi, "foto/".$foto);
    
    if ($upload) {
    $sql = $con->query("INSERT INTO pencatat_meter (id_pelanggan,id_tarif, stan_awal, stan_akhir,tgl_catat, foto) values('$id_pelanggan','$id_tarif','$stan_awal','$stan_akhir','$tgl_catat','$foto')");
    
    if ($sql) {
        ?>
        
            <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href="catat.php";
            </script>
            
            <?php
    }else{
        echo"gagal boss";
    }
}
}




//edit catat


//Update Data Catat//
if(isset($_POST['editcatat'])){
    $id_catat = $_POST['id_catat'];
   // $id_pelanggan= $_POST['id_pelanggan'];
    $id_tarif= $_POST['id_tarif'];
    $stan_awal= $_POST['stan_awal'];
    $stan_akhir= $_POST['stan_akhir'];
    $tgl_catat= $_POST['tgl_catat'];
    $foto= $_FILES['foto']['name'];
    $lokasi= $_FILES['foto']['tmp_name'];
    $upload= move_uploaded_file($lokasi, "foto/".$foto);


    $query = mysqli_query($con,"UPDATE pencatat_meter SET id_tarif= '$id_tarif', stan_awal ='$stan_awal', 
                            stan_akhir='$stan_akhir', tgl_catat='$tgl_catat', foto='$foto' WHERE id_catat='$id_catat'");

    if($query){
        ?>
        
        <script type="text/javascript">
        alert("Data Berhasil Disimpan");
        window.location.href="catat.php";
        </script>
        
        <?php
    } else {
        echo '
        <script>alert("Gagal Edit Pencatat Meter ");
        window.location.href="catat.php"

        </script>
        ';
    } 
}

//hapus Catat
if(isset($_POST['hapuscatat'])){
	$id_catat = $_POST['id_catat'];

	$hapus =mysqli_query($con, "DELETE FROM pencatat_meter WHERE id_catat='$id_catat'");

	if($hapus){
        ?>
        
        <script type="text/javascript">
        alert("Data Berhasil Disimpan");
        window.location.href="catat.php";
        </script>
        
        <?php
	} else {
		echo '
		<script>alert("Hapus Pencatat Meter Gagal ");
		window.location.href="catat.php"

		</script>
		';
	}

}

?>
                
            
            

  </div>
</html>
