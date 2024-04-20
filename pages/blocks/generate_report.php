<?php
// Set headers to force download of the PDF file
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="sample.pdf"');

// Create a new PDF resource
$pdf = fopen('php://output', 'w');

// Write PDF content
fwrite($pdf, "%PDF-1.4\n");
fwrite($pdf, "1 0 obj\n");
fwrite($pdf, "<< /Title (Sample PDF) /Creator (PHP) >>\n");
fwrite($pdf, "endobj\n");
fwrite($pdf, "2 0 obj\n");
fwrite($pdf, "<< /Type /Catalog /Pages 3 0 R >>\n");
fwrite($pdf, "endobj\n");
fwrite($pdf, "3 0 obj\n");
fwrite($pdf, "<< /Type /Pages /Kids [4 0 R] /Count 1 >>\n");
fwrite($pdf, "endobj\n");
fwrite($pdf, "4 0 obj\n");
fwrite($pdf, "<< /Type /Page /Parent 3 0 R /Resources << /Font << /F1 5 0 R >> >> /MediaBox [0 0 612 792] /Contents 6 0 R >>\n");
fwrite($pdf, "endobj\n");
fwrite($pdf, "5 0 obj\n");
fwrite($pdf, "<< /Type /Font /Subtype /Type1 /Name /F1 /BaseFont /Helvetica >>\n");
fwrite($pdf, "endobj\n");
fwrite($pdf, "6 0 obj\n");
fwrite($pdf, "<< /Length 51 >>\n");
fwrite($pdf, "stream\n");
fwrite($pdf, "BT\n");
fwrite($pdf, "/F1 12 Tf\n");
fwrite($pdf, "72 720 Td\n");
fwrite($pdf, "(Title: Sample PDF) Tj\n");
fwrite($pdf, "ET\n");
fwrite($pdf, "endstream\n");
fwrite($pdf, "endobj\n");
fwrite($pdf, "xref\n");
fwrite($pdf, "0 7\n");
fwrite($pdf, "0000000000 65535 f \n");
fwrite($pdf, "0000000009 00000 n \n");
fwrite($pdf, "0000000054 00000 n \n");
fwrite($pdf, "0000000105 00000 n \n");
fwrite($pdf, "0000000234 00000 n \n");
fwrite($pdf, "0000000313 00000 n \n");
fwrite($pdf, "0000000382 00000 n \n");
fwrite($pdf, "trailer\n");
fwrite($pdf, "<< /Size 7 /Root 2 0 R >>\n");
fwrite($pdf, "startxref\n");
fwrite($pdf, "450\n");
fwrite($pdf, "%%EOF");

// Close the PDF resource
fclose($pdf);
?>
