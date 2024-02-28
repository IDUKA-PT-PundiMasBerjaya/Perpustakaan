<?php 
    include_once("../../../config/koneksi.php");
    require("../../../library/fpdf.php");

    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(0, 15, '', 0, 1);
	$pdf->Cell(250, 10, 'Data Peminjaman', 0, 0, 'C');

	$pdf->Cell(10, 17, '', 0, 1);	
	$pdf->SetFont('Times', 'B', 9);
	$pdf->Cell(30, 7, 'ID Peminjaman', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Tanggal Pinjam', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Tanggal Kembali', 1, 0, 'C');
	$pdf->Cell(40, 7, 'ID Yang Dipilih', 1, 0, 'C');

    $pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Times', '', 10);

	$no = 1;
	$data = mysqli_query($kon, "SELECT * FROM peminjaman_buku ORDER BY id_peminjaman ASC");

    while ($d = mysqli_fetch_array($data)) {
		$pdf->Cell(30, 6, $d['id_peminjaman'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['tanggal_pinjam'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['tanggal_kembali'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['email'], 1, 0, 'C');
		$pdf->Ln();
	}
	$pdf->Output();
?>