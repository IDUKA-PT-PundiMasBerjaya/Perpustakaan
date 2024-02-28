<?php 
    include_once("../../../config/koneksi.php");
    require("../../../library/fpdf.php");

    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

	$pdf->SetFont('Times', 'B', 13);
	$pdf->Cell(0, 15, '', 0, 1);
	$pdf->Cell(250, 10, 'Data Kelas', 0, 0, 'C');

	$pdf->Cell(10, 17, '', 0, 1);	
	$pdf->SetFont('Times', 'B', 9);
	$pdf->Cell(20, 7, 'ID Kelas', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Nama Kelas', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Ketua Kelas', 1, 0, 'C');
	$pdf->Cell(20, 7, 'Kursi', 1, 0, 'C');
	$pdf->Cell(20, 7, 'Meja', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Gambar Kelas', 1, 0, 'C');
    $pdf->Cell(20, 7, 'ID Guru', 1, 0, 'C');
    $pdf->Cell(20, 7, 'ID Siswa', 1, 0, 'C');

    $pdf->Cell(10, 7, '', 0, 1);
	$pdf->SetFont('Times', '', 10);

	$no = 1;
	$data = mysqli_query($kon, "SELECT * FROM kelas ORDER BY id_kelas ASC");

    while ($d = mysqli_fetch_array($data)) {
		$pdf->Cell(20, 6, $d['id_kelas'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['namakelas'], 1, 0, 'C');
		$pdf->Cell(40, 6, $d['ketuakelas'], 1, 0, 'C');
		$pdf->Cell(20, 6, $d['kursi'], 1, 0, 'C');
		$pdf->Cell(20, 6, $d['meja'], 1, 0, 'C');
        $pdf->Cell(40, 6, $d['gambar_kelas'], 1, 0, 'C');
        $pdf->Cell(20, 6, $d['guru_idguru'], 1, 0, 'C');
		$pdf->Cell(20, 6, $d['siswa_idsiswa'], 1, 0, 'C');
		$pdf->Ln();
	}
	$pdf->Output();
?>