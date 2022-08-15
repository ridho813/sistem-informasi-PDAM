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
        <title>Dasboard </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <!--<style type="text/css">
        body{
            background: url(img/21.jpg) no-repeat;
            width: 90%;
            height: 90%;
            background-size: cover;
        }

    </style>-->
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
                            <a class="nav-link" href="logout.php" data-toggle="logout" data-target="#logout">
                                Logout
                            </a>
                                </nav>
                            </div>
                        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!--<h1 align="center">SISTEM INFORMASI PEMBAYARAN REKENING AIR PDAM</h1>
                        <h1 align="center">PDAM INDRAMAYU</h1>
                        <h1 align="center">JL.LETJEN SUPRAPTO NO. 25/E INDRAMAYU</h1>-->
                        <br><br>    
                      <center><h1>SELAMAT DATANG DI SISTEM INFORMASI PEMBAYARAN REKENING AIR PDAM</h1><br></center>
                      <center><h1>PERUMDA TIRTA DARMA AYU INDRAMAYU</h1></center>
                      <center><img src="img/pdam.PNG" alt="logo" width="150" class="shadow-light rounded-circle mb-5 mt-2"></center>
                      <center><h1>JL.LETJEN SUPRAPTO NO. 25/E INDRAMAYU</h1></center>
                      <center><h1>http://www.pdamindramayu.co.id, Email : info@pdamindramayu.co.id</h1></center>
                        
                        <div class="row">
                            
                        

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
      
        <!-- logout Modal -->
                                         <div class="modal fade" id="logout">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Apakah Anda Yakin Mau Keluar? </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                                <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="logout.php">Logout</a>
                                            </div>
                                    </div>
                                    </div>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pelanggan Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form method="post">
        
        <!-- Modal body -->
        <div class="modal-body">
            Pilih Tagihan
            <select name="idbulan" class="form-control">

            <?php
            $getpel = mysqli_query($con, "select * from bulan");

            while($pl =mysqli_fetch_array($getpel)){
            $nosam = $pl['nosam'];
            
                            
            ?>

            <option value="<?=$idbulan;?>"><?=$nosam;?> - <?=$nama;?></option>    

            <?php
            }
            ?>


            </select>
        
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="tambahpasba" >Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
        </div>
        </form>
        
      </div>
    </div>
  </div>
</html>
