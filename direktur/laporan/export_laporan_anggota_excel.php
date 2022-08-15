
<?php
if (isset($_POST['submit']))
{?>

 <?php


	$con = new mysqli("localhost","root","","isti");


	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_pelanggan(".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Data Pelanggan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table border="1">
  <tr>
  <th>No</th>
                                                <th>No Sambung</th>
                                                <th>Nama</th>
                                                <th>Desa</th>
                                                <th>Kecamatan</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Pasang</th>
                                                <th>Keterangan</th>
										
                                        </tr>
                               
	
	<?php
		$no = 1;
		$sql = $con->query("SELECT * from pelanggan where MONTH(tgl_pasang) = '$bln' and YEAR(tgl_pasang) = '$thn'");
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

		$con = new mysqli("localhost","root","","isti");

	

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
                                       <th>No Sambung</th>
                                                <th>Nama</th>
                                                <th>Desa</th>
                                                <th>Kecamatan</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Pasang</th>
                                                <th>Keterangan</th>
										
										
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $con->query("SELECT * from pelanggan where YEAR(tgl_pasang) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
				<tr>
							< <td><?php echo $no++; ?></td>
                            <td><?php echo $data['no_sambung']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['desa']; ?></td>
                            <td><?php echo $data['kecamatan']; ?></td>
                            <td><?php echo $data['telp']; ?></td>
                            <td><?php echo $data['tgl_pasang']; ?></td>
                            <td><?php echo $data['ket']; ?></td>
							
						
						
							
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
                                                <th>No Sambung</th>
                                                <th>Nama</th>
                                                <th>Desa</th>
                                                <th>Kecamatan</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Pasang</th>
                                                <th>Keterangan</th>
										
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $con->query("SELECT * from pelanggan where MONTH(tgl_pasang) = '$bln' and YEAR(tgl_pasang) = '$thn'");
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
						<?php 
		}
		?>
    </tbody>
	</table>
</div>
	
	<?php

}

?>