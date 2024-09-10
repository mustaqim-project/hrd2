<?php
$this->pdf->AddPage();

// Set font
$this->pdf->SetFont('Arial', 'B', 12);

// Title
$this->pdf->Cell(0, 10, 'Laporan Data Upah Karyawan', 0, 1, 'C');

// Add a line break
$this->pdf->Ln(10);

// Header
$this->pdf->Cell(10, 10, 'ID', 1);
$this->pdf->Cell(50, 10, 'Nama Karyawan', 1);
$this->pdf->Cell(30, 10, 'Uang Kehadiran', 1);
$this->pdf->Cell(40, 10, 'Tunjangan Jabatan', 1);
$this->pdf->Cell(40, 10, 'Tunjangan Transportasi', 1);
// Add more columns as needed...
$this->pdf->Ln();

// Data
foreach ($upah_karyawan as $upah) {
    $this->pdf->Cell(10, 10, $upah['id'], 1);
    $this->pdf->Cell(50, 10, $upah['nama_karyawan'], 1);
    $this->pdf->Cell(30, 10, $upah['uang_kehadiran'], 1);
    $this->pdf->Cell(40, 10, $upah['tunjangan_jabatan'], 1);
    $this->pdf->Cell(40, 10, $upah['tunjangan_transportasi'], 1);
    // Add more fields as needed...
    $this->pdf->Ln();
}

// Output PDF to browser
$this->pdf->Output('D', 'Upah_Karyawan_' . date('Ymd') . '.pdf');
?>
