<?php
//koneksi
$con = mysqli_connect('localhost','root','','db_pdam');
$tgl_bayar = date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date(30), date("Y"));
$kembali = date("Y-m-d", $tujuh_hari);




    function terlambat ($tanggal_dateline, $tgl_tempo){
    
    $tanggal_dateline_pecah = explode("-", $tanggal_dateline);
    $tanggal_dateline_pecah = $tanggal_dateline_pecah[0]."-".$tanggal_dateline_pecah[1]."-".$tanggal_dateline_pecah[2];
    
    $tanggal_kembali_pecah = explode("-", $tgl_tempo);
    $tanggal_kembali_pecah = $tanggal_kembali_pecah[0]."-".$tanggal_kembali_pecah[1]."-".$tanggal_kembali_pecah[2];
    
    $selisih = strtotime($tanggal_kembali_pecah)- strtotime($tanggal_dateline_pecah);
    $selisih = $selisih/86400;
    
    if ($selisih>=1) {
        $hasil_tanggal = floor($selisih);
    }
    else{
        $hasil_tanggal = 0;
    }
    return  $hasil_tanggal;
    }
    
    
 ?>  

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Transaksi Tagihan Bulan Lunas</title>
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
                        <h1 class="mt-4">Data Transaksi Tagihan Bulan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                        <?php
// mengambil data barang
$data_barang = mysqli_query($con,"SELECT * FROM bulan WHERE status='Lunas'");
 
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
                     


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Transaksi Tagihan Lunas Bulan
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
                                                <th>Stand Awal</th>
                                                <th>Stand Akhir</th>
                                                <th>Pemakaian</th>
                                                <th>Harga Air</th>
                                                <th>Biaya Admin</th>
                                                <th>Jumlah Tagihan</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Tanggal Tempo</th>
                                                <th>Denda</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

$get = mysqli_query($con,"SELECT * FROM bulan k, pelanggan s where s.id_pelanggan =k.id_pelanggan AND status='Lunas'");
        $i =1;
       

  while ($p=mysqli_fetch_array($get)) {
                                    
                                            $id_bulan = $p['id_bulan'];
                                            $stand_awal = $p['stand_awal'];
                                            $stand_akhir = $p['stand_akhir'];
                                           // $pemakaian = $p['pemakaian'];
                                           // $hrg_air = $p['hrg_air'];
                                            $biaya_adm = $p['biaya_adm'];
                                            $tgl_bayar = $p['tgl_bayar'];
                                            $tgl_tempo = $p['tgl_tempo'];
                                            
                                            $stand_awal = $p['stand_awal'];
                                            $stand_akhir = $p['stand_akhir'];
                                            $status= $p['status']; 
                                            $nama = $p['nama'];
                                            $no_sambung = $p['no_sambung'];
                                            $tarif = $p['id_tarif'];
                                           
                                            $pamakaian = $stand_awal - $stand_akhir;
                                            $data= $tarif * $pamakaian;
                                            $jum = $biaya_adm + $data ;
                                                                            
                                $denda2 = $con -> query("select * from denda");
                                $denda3 = $denda2 -> fetch_assoc();
                                $denda4 = $denda3['denda'];
                            
                                
                                
                                
                                $tanggal_dateline2 = $p['tgl_tempo'];
                                //$tgl_bayar = date('Y-m-d');
                                
                                $lambat = terlambat($tanggal_dateline2, $tgl_bayar);
                                $denda1 = $lambat * $denda4;
                                           

                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$no_sambung;?></td>
                                                <td>Rp<?=number_format($tarif);?></td>
                                                <td><?=$stand_awal;?></td>
                                                <td><?=$stand_akhir;?></td>
                                                <td><?=$pamakaian;?></td>
                                                <td>Rp<?=number_format($data);?></td>
                                                <td>Rp<?=number_format($biaya_adm);?></td>
                                                <td>Rp<?=number_format($jum+ $denda1);?></td>
                                                <td><?=$tgl_bayar;?></td>
                                                <td><?=$tgl_tempo;?></td>
                                            <td>    <?php 
                                
                                $denda2 = $con -> query("select * from denda");
                                $denda3 = $denda2 -> fetch_assoc();
                                $denda4 = $denda3['denda'];
                            
                                
                                
                                
                                $tanggal_dateline2 = $p['tgl_tempo'];
                                //$tgl_bayar = date('Y-m-d');
                                
                                $lambat = terlambat($tanggal_dateline2, $tgl_bayar);
                                $denda1 = $lambat * $denda4;
                                
                                if ($lambat>0) {
                                    echo "
                                    
                                    <font color='red'>$lambat hari<br>(Rp $denda1)</font>
                                    ";
                                }else{
                                    echo $lambat." Hari";
                                }
                                
                                ?></td>
                                <td><?=$status;?></td>

                 <td>  <a href="laporan/notabulan.php?id_bulan=<?=$id_bulan?>" class="btn btn-success" >Cetak Nota</a>
                                               </td>
                                            
                                            </tr>



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
                                        </body>


</html>