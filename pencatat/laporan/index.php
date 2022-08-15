<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'PDAM KEC.....',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'NOTA  BULANAN',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,15,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NO',1,0);
$pdf->Cell(55,6,'NAMA PELANGGAN',1,0);
$pdf->Cell(27,6,'TARIF',1,0);
$pdf->Cell(40,6,'TANGGAL BAYAR',1,0);
$pdf->Cell(27,6,'STATUS',1,0);
$pdf->Cell(30,6,'JUMLAH BAYAR',1,1);

$pdf->SetFont('Arial','',10);
$con = mysqli_connect('localhost','root','','isti');

if(isset($_GET['id_bulan'])){
    $id_bulan    =$_GET['id_bulan'];
}

$no = 1;
$result = mysqli_query($con, "SELECT 
trans_bulan.*, pelanggan.nama, tarif.tarif 
FROM trans_bulan, pelanggan, tarif 
WHERE trans_bulan.id_bulan = pelanggan.id_pelanggan
AND trans_bulan.id_pelanggan = tarif.id_tarif 
ORDER BY id_bulan and id_bulan");
                         
while ($row = mysqli_fetch_array($result)){
    
    
                 
    $pdf->Cell(20,6,$no,1,0);
    $pdf->Cell(55,6,$row['nama'],1,0);
    $pdf->Cell(27,6,$row['tarif'],1,0);
    $pdf->Cell(40,6,$row['tgl_bayar'],1,0);
    $pdf->Cell(27,6,$row['status'],1,0);
    $pdf->Cell(30,6,$row['biaya_adm']+$row['hrg_air']+ $row['tarif'] ,1,1); 
}

$pdf->Output();

?>