
<?php
if (isset($_POST['submit']))
{?>

 <?php


	$koneksi = new mysqli("localhost","root","","isti");


	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=laporantransbln(".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Data Buku Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table border="1">
  <tr>
  <th>No</th>
                                                <th>Pelanggan</th>
                                                <th>Tarif</th>
                                                <th>stand Awal</th>
                                                <th>Stand Akhir</th>
                                           
                                                <th>Pemakai</th>
                                                <th>Harga</th>
                                                <th>Tgl Catat</th>
                                              
										
                                        </tr>
                               
	
	<?php
		$no = 1;
		$sql = $koneksi->query("SELECT 
        pencatat_meter.*, pelanggan.nama, tarif.tarif 
FROM pencatat_meter, pelanggan, tarif 
WHERE pencatat_meter.id_catat = pelanggan.id_pelanggan
AND pencatat_meter.id_pelanggan = tarif.id_tarif 
ORDER BY id_catat where MONTH(tgl_catat) = '$bln' and YEAR(tgl_catat) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									

	?>

						
						<tr>
                        <td><?=$i++?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$tarif;?></td>
                                                <td><?=$stan_awal;?></td>
                                                <td><?=$stan_akhir;?></td>
                                                <td><?= $pemakai?></td>
                                                <td>Rp<?=number_format($harga);?></td>
                                                <td><?=$tgl_catat;?></td>
							
						
							
						</tr>
					
	<?php
	
	}
	
	?>
	
	</table>
	</body>
	<?php 
	}
	?>
	
	<?php

		$koneksi = new mysqli("localhost","root","","isti");

	

	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;
	?>
	
	<?php
	if ($bln == 'all') {
		?>
	<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                       <tr>
                                       <th>No</th>
                                                <th>Pelanggan</th>
                                                <th>Tarif</th>
                                                <th>stand Awal</th>
                                                <th>Stand Akhir</th>
                                           
                                                <th>Pemakai</th>
                                                <th>Harga</th>
                                                <th>Tgl Catat</th>
                                              
										
                                        </tr>
                                    </thead>
		<tbody>
									
		<?php
        $no = 1;
		$sql = $koneksi->query("SELECT 
        pencatat_meter.*, pelanggan.nama, tarif.tarif 
FROM pencatat_meter, pelanggan, tarif 
WHERE pencatat_meter.id_catat = pelanggan.id_pelanggan
AND pencatat_meter.id_pelanggan = tarif.id_tarif 
ORDER BY id_catat  ");
		while ($data = $sql->fetch_assoc()) {
          
           
            ?>
	
						
				<tr>
                <td><?=$no++?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$tarif;?></td>
                                                <td><?=$stan_awal;?></td>
                                                <td><?=$stan_akhir;?></td>
                                                <td><?= $pemakai?></td>
                                                <td>Rp<?=number_format($harga);?></td>
                                                <td><?=$tgl_catat;?></td>
							
						
						
							
						</td>
						</tr>
						<?php 
            
						}
						?>

					</tbody>
                    </table>
					</div>
					
					
					<?php
					}
					else{ ?>
						<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                                <th>Pelanggan</th>
                                                <th>Tarif</th>
                                                <th>stand Awal</th>
                                                <th>Stand Akhir</th>
                                           
                                                <th>Pemakai</th>
                                                <th>Harga</th>
                                                <th>Tgl Catat</th>
                                              
                                        </tr>
                                    </thead>
		<tbody>
									
		
        <?php
        $no = 1;
		$sql = $koneksi->query("SELECT 
        pencatat_meter.*, pelanggan.nama, tarif.tarif 
FROM pencatat_meter, pelanggan, tarif 
WHERE pencatat_meter.id_tarif = pelanggan.id_pelanggan
AND pencatat_meter.id_pelanggan = tarif.id_tarif 
ORDER BY id_catat  ");
		while ($data = $sql->fetch_assoc()) {
            $id_catat = $data['id_catat'];
            $stan_awal = $data['stan_awal'];
            $stan_akhir = $data['stan_akhir'];
            $nama = $data['nama'];
            $tarif = $data['tarif'];
            $pemakai = $data['pemakai'];
         
            $tgl_catat = $data['tgl_catat'];

                $harga = $pemakai*$tarif;
            ?>
       
	
						
				<tr>
                <td><?=$no++?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$tarif;?></td>
                                                <td><?=$stan_awal;?></td>
                                                <td><?=$stan_akhir;?></td>
                                                <td><?= $pemakai?></td>
                                                <td>Rp<?=number_format($harga);?></td>
                                                <td><?=$tgl_catat;?></td>
							
						
						
						
				</td>
						</tr>
						<?php 
		}
		?>
    </tbody>
	</table>
</div>
	
	<?php

}

?>