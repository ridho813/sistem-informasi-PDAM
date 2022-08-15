

	   <?php
//koneksi
$con = mysqli_connect('localhost','root','','isti');

 // include 'export_laporan_transaksi_bulan_excel.php';
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
        <title>Data Pencatat transaksi Bulanan</title>
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
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Laporan
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="laporan/laporantransbln.php">Laporan Pencatat Meter</a>
                                            <a class="nav-link" href="laporan/laporan_pelanggan.php">Laporan Pelanggan</a>
                                            <a class="nav-link" href="laporan/laporan_trans_bulan.php">Laporan Transaksi Bulanan</a>
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
                        <h1 class="mt-4">Laporan Data Transaksi Bulanan</h1>
                        <ol class="breadcrumb mb-4">
 				
								
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4>Laporan Transaksi Bulan</h4>
                        </div>
                        <div class="panel-body">
						<div class="row">
	<div class="col-md-12">
	 <div class="content-panel">
	 
	 	 	<table >
        <tr><td>
            LAPORAN PERBULAN DAN PERTAHUN
        </td></tr>
        <tr>
            <td width="50%">
<form action="export_laporan_transaksi_bulan_excel.php" method="post">
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
	
	
	<form id="Myform4" >
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
   
    
   <div class="tampung4">
	 
       <div class="table-responsive">
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                                <th>Nama</th>
                                                <th>Tarif</th>
                                                <th>Stand Awal</th>
                                                <th>Stand Akhir</th>
                                                <th>Pemakaian</th>
                                                <th>Harga Air</th>
                                                <th>Biaya Admin</th>
                                                <th>Jumlah Tagihan</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Status</th>
                                           
                                        </tr>
                                    </thead>
									
						<tbody>
							
						<?php 
									
									$no = 1;
									$sql = $con->query("select * from bulan where status='Lunas'");
									while ($data = $sql->fetch_assoc()) {
									
                                 
						?>
						
						<tr>
						<td><?=$no++?></td>
                                                <td><?php echo $data['id_pelanggan']; ?></td>
                                                <td><?php echo $data['id_tarif']; ?></td>
                                                <td><?php echo $data['stand_awal']; ?></td>
                                                <td><?php echo $data['stand_akhir']; ?></td>
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td><?php echo $data['tgl_bayar']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
						
						</tr>
									<?php }
									
									?>

										   </tbody>
                                </table>
								<a href="export_laporan_transaksi_bulan_excel.php"  class="btn btn-primary" style="margin-top:8 px"><i class="fa fa-print"></i>Cetak</a>
								
								</div> 
								
								
								</section>
								</section>
								
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
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
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