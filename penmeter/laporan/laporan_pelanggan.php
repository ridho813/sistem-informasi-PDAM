

	   <?php
//koneksi
$con = mysqli_connect('localhost','root','','isti');

//include 'export_laporan_anggota_excel.php';
   // include 'fanction.php';
 ?> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Transaksi Tagihan Bulan</title>
        
        <link href="../css/styles.css" rel="stylesheet" />
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
                                Transaksi Tagihan Belum Lunas Bulan
                            </a>
                            <a class="nav-link" href="trans_blnlunas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Transaksi Tagihan Lunas Bulan
                            </a>
                            <a class="nav-link" href="trans_tunggakan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Transaksi Tunggakan
                            </a>
                            <a class="nav-link" href="meteran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                                Pencatat Meteran
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Laporan
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="laporantransbln.php">Laporan Pencatat Meter</a>
                                            <a class="nav-link" href="laporan_pelanggan.php">Laporan Pelanggan</a>
                                            <a class="nav-link" href="laporan_trans_bulan.php">Laporan Transaksi Bulanan</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
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
                        <h1 class="mt-4">Laporan Data Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">

                                </div>
                            </div>
                        </div>
                     

	   
  
                        
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Laporan Data Pelanggan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Sambung</th>
                                            <th>Nama</th>
                                            <th>Desa</th>
											<th>Kecamatan</th>
                                            <th>Tlp</th>
											<th>Tgl Pasang</th>
                                            <th>Keterangan</th>
										
                                        </tr>
                                    </thead>
									
						<tbody>
							
						<?php 
									
									$no = 1;
									$sql = $con->query("select * from pelanggan");
									while ($data = $sql->fetch_assoc()) {
									
									
										
									?>
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['no_sambung']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['desa']; ?></td>
							<td><?php echo $data['kecamatan']; ?></td>
							<td><?php echo $data['telp']; ?></td>
							<td><?php echo $data['tgl_pasang']; ?></td>
                            <td><?php echo $data['ket']; ?></td>
					
							
						
							
						</td>
						</tr>
									<?php }?>

										   </tbody>
                                </table>
								
								<a href="laporan/export_laporan_anggota_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>Cetak</a>
							
								
								</div> 
								
								
								</section>
								</section>
								
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
                                        </body>


</html>
