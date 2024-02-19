<?php 
    include_once("../../../config/koneksi.php");
    require("../../../library/fpdf.php");

    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(0, 15, '', 0, 1);
	$pdf->Cell(250, 10, 'Data Buku', 0, 0, 'R');

	$pdf->Cell(10, 17, '', 0, 1);	
	$pdf->SetFont('Times', 'B', 9);
	$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
	$pdf->Cell(20, 7, 'ID Buku', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Judul', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Penulis', 1, 0, 'C');
	$pdf->Cell(80, 7, 'Keterangan', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Stok', 1, 0, 'C');
    $pdf->Cell(40, 7, 'gambar', 1, 0, 'C');
    $pdf->Cell(40, 7, 'ID Pelajaran', 1, 0, 'C');

    $pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Times', '', 10);

	$no = 1;
	$data = mysqli_query($kon, "SELECT * FROM buku ORDER BY id ASC");

    while ($d = mysqli_fetch_array($data)) {
		$pdf->Cell(10, 6, $no++, 1, 0, 'C');
		$pdf->Cell(20, 6, $d['id'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['judul'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['penulis'], 1, 0, 'C');
		$pdf->Cell(80, 6, $d['keterangan'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['stok'], 1, 0, 'C');
        $pdf->Cell(40, 6, $d['gambar'], 1, 0, 'C');
        $pdf->Cell(40, 6, $d['matapelajaran_idpelajaran'], 1, 0, 'C');
		$pdf->Ln();
	}
	$pdf->Output();
?>