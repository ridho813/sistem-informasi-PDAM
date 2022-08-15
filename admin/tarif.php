<?php

    require 'ceklogin.php';
 ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Harga Per Tarif  </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Aplikasi PDAM</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
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
                        <h1 class="mt-4">Data Harga Per Tarif</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                        <?php
                            // mengambil data barang
                            $data_data = mysqli_query($con,"SELECT * FROM tarif");
                             
                            // menghitung data barang
                            $jumlah_barang = mysqli_num_rows($data_data);

                            ?>
       
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Harga Per Tarif :  <?php echo $jumlah_barang; ?></div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Button to Open the Modal -->
                         <!-- Button to Open the Modal -->
                          <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                            Tambah Harga Per Tarif
                          </button>

                        


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Harga Per Tarif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Golongan</th>
                                                <th>Harga Tarif</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $get = mysqli_query($con, "select * from tarif");
                                            $i =1;

                                            while($p=mysqli_fetch_array($get)){
                                            $id_tarif = $p ['id_tarif'];
                                            $nama_gol = $p['nama_gol'];
                                            $tarif = $p['tarif'];
                                            
                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$nama_gol;?></td>
                                                <td><?=$tarif?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#edit<?=$id_tarif;?>">
                                                    Edit
                                                  </button>
                                                    <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#hapus<?=$id_tarif;?>">
                                                        Delete
                                                    </button>


                                                </td>
                                            </tr>
                                        <!-- edit Modal -->
                                         <div class="modal fade" id="edit<?=$id_tarif;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Harga Per Tarif</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                            Nama Golongan : <br>
                                  <select name="nama_gol" class="form-control mt-2" value="<?=$nama_gol;?>">
                                    <option></option>
                                    <option value="Tempat_Ibadah">Tempat Ibadah</option>
                                    <option value="tempat_sosial">Tempat Sosial</option>
                                    <option value="rumah1">Rumah Type 1</option>
                                    <option value="rumah2">Rumah Type 2</option>
                                    <option value="dinas_instansi">Dinas/Instansi</option>
                                    <option value="niaga_kecil">Niaga Kecil</option>
                                    <option value="niaga_besar">Niaga Besar</option>
                                    <option value="industri_kecil">Industri Kecil</option>
                                    <option value="industri_besar">Industri Besar</option>
                                  </select>
                                  Harga Tarif : <br>
                                  <input type="text" name="tarif" class="form-control mt-2" placeholder="Harga Tarif" value="<?=$tarif?>">
                                  <br>
                                <input type='hidden' name='idt' value='<?=$id_tarif;?>'>
                                <button type="submit" class="btn btn-primary" name="edittarif">Update Harga Per Tarif</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Hapus Modal -->
                                         <div class="modal fade" id="hapus<?=$id_tarif;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Harga Per Tarif</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                            Apakah anda Yakin ingin menghapus data ini <?=$nama_gol;?> ??
                                            <br> <input type="hidden" name="idt"  value="<?=$id_tarif;?>">
                                            
                                            <br> <button type="submit" class="btn btn-danger" name="hapustarif">Delete</button>
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
    </body>

     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Harga Per Tarif</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form method="post">
            
        <!-- Modal body -->
          <div class="modal-body">
          Nama Golongan : <br>
          <select name="nama_gol" class="form-control mt-2" placeholder="Nama Golongan" required>
            <option></option>
            <option value="Tempat_Ibadah">Tempat Ibadah</option>
            <option value="tempat_sosial">Tempat Sosial</option>
            <option value="rumah1">Rumah Type 1</option>
            <option value="rumah2">Rumah Type 2</option>
            <option value="dinas_instansi">Dinas/Instansi</option>
            <option value="niaga_kecil">Niaga Kecil</option>
            <option value="niaga_besar">Niaga Besar</option>
            <option value="industri_kecil">Industri Kecil</option>
            <option value="industri_besar">Industri Besar</option>


          </select>
          Harga Tarif : <br>
          <input type="text" name="tarif" class="form-control mt-2" placeholder="Harga Tarif" required>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="tambahtar" >Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        
        </div>
        </form>
        
        
      </div>
    </div>
  </div>


</html>
