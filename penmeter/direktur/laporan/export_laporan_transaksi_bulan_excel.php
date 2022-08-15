
<?php
if (isset($_POST['submit']))
{?>

 <?php


	$koneksi = new mysqli("localhost","root","","isti");


	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_trans_bulan(".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Data Transaksi Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table border="1">
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
                               
	
	<?php
		$no = 1;
		$sql = $koneksi->query("SELECT * from bulan where MONTH(tgl_bayar) = '$bln' and YEAR(tgl_bayar) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									

	?>

						
						<tr>
							<td><?php echo $no++; ?></td>
                            <td><?php echo $data['id_pelanggan']; ?></td>
                                                <td><?php echo $data['id_tarif']; ?></td>
                                                <td><?php echo $data['stand_awal']; ?></td>
                                                <td><?php echo $data['stand_akhir']; ?></td>
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td><?php echo $data['tgl_bayar']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
						
							
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

		$koneksi = mysqli_connect("localhost","root","","isti");

	


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
		$sql = $koneksi->query("SELECT * from bulan where  YEAR(tgl_bayar) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
				<tr>
							<td><?php echo $no++; ?></td>
                            <td><?php echo $data['id_pelanggan']; ?></td>
                                                <td><?php echo $data['id_tarif']; ?></td>
                                                <td><?php echo $data['stand_awal']; ?></td>
                                                <td><?php echo $data['stand_akhir']; ?></td>
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td><?php echo $data['tgl_bayar']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
							
						
						
							
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
		$sql = $koneksi->query("select * from bulan where MONTH(tgl_bayar) = '$bln' and YEAR(tgl_bayar) = '$thn'");
			while ($data = $sql->fetch_assoc()) {
									
		?>
	
						<tr>
							<td><?php echo $no++; ?></td>
                            <td><?php echo $data['id_pelanggan']; ?></td>
                                                <td><?php echo $data['id_tarif']; ?></td>
                                                <td><?php echo $data['stand_awal']; ?></td>
                                                <td><?php echo $data['stand_akhir']; ?></td>
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td>Rp<?php echo $data['biaya_adm']; ?></td>
                                               
                                                <td><?php echo $data['tgl_bayar']; ?></td>
                                                <td><?php echo $data['status']; ?></td>
							
						
						
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