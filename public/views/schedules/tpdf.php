<?php
define('FPDF_FONTPATH',dirname(__FILE__) . "/../../lib/tfpdf/font/");
require('lib/tfpdf/tfpdf.php');

class PDF extends tFPDF
{
	public function __construct() {
        # L = Landscape, P = Portrait
		parent::__construct('L', 'mm', 'A4');
	}

	// Load data
	function LoadData($d)
	{
		
		// Read file lines
		$trows = array();

		$table = $d['tabledata'];
		for ($i = 0; $i < count($table); $i++) {
			$row = $table[$i];
			$tcolumns = array();
			$tcolumns[] = $row[0]["categoryname"] . ' / ' . $row[0]["activityname"];
			

			for ($j = 0; $j < count($row); $j++) {
				$col = $row[$j];
				
				if ($col["resourceexists"]) {
					$tcolumns[] = $col["resourcename"];
				} else {
					$tcolumns[] = '';
				}
			}
			$trows[] = $tcolumns;
		}
		
		return $trows;
	}

	function TableHeader($d) {
		$header = array();
		
		$header[] = '';
		foreach ($d['events'] as $item) { 
			$header[] = $item['targetDate'];
		}
		return $header;
	}

	function CreateFooter() {
		$this->SetY(-15); 
		$this->SetFont('DejaVu','I',7);
		$this->Cell(0,10,I18n::tr("label.createdat") .date("j.n.Y"),0,0,'R');
		$this->Ln();
	}

	function TrimValue($v,$maxlen){
		if (is_null($v)) {
			return '';
		}
		return substr(trim($v),0,$maxlen);
	}


	// Better table
	function CreateTable($header, $tabledata)
	{
		$this->SetFont('DejaVu','B',16);
		$this->Cell(100);
		$this->Cell(30,25,I18n::tr("title.reportschedulestitle"),0,0,'C');
		$this->Ln(20);

		$row_height = 6;
		// Column widths
		$w = array(60, 50, 50, 50, 50);

		// Header
		$headerheight = 10;
		$this->SetFont('DejaVu','',13);
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],$headerheight,$header[$i],0,0,'C');
		}
		$this->Ln();

		$this->SetFont('DejaVu','',10);

		// Table Data
		$rowidx = 1;
		$rowsperpage = 26;
		
		$pagecreated = false;
		foreach($tabledata as $row)
		{
			// Create new page
			$newpage = ($rowidx++ % $rowsperpage) == 0;
			if ($newpage) {
				$this->CreateFooter();
				$this->AddPage();
				$pagecreated = true;
			}


			// Data Columns
			$colidx=0;
			foreach ($row as $col) {
				$value = $col;

				// first column 
				if ($colidx == 0){
					$this->SetFont('DejaVu','',10);
					// max 30 characters
					$value = $this->TrimValue($value,30);
					$this->Cell($w[$colidx++],$row_height,$value,1,0,'L');
				} else {
					// max 20 charachters
					$this->SetFont('DejaVu','B',10);
					$value = $this->TrimValue($value,20);
					$this->Cell($w[$colidx++],$row_height,$value,1,0,'C');
				}
				
			}
			$this->Ln();
		}
		
		// Page Footer (if only one page)
		if (!$pagecreated) {
			$this->CreateFooter();
		}
	}
}


$pdf = new PDF();

// Column headings
$header = $pdf->TableHeader($data);
// Data loading
$data = $pdf->LoadData($data);

// Define Fonts that will be used in PDF
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true);
$pdf->AddFont('DejaVu','I','DejaVuSans-Oblique.ttf',true);

$pdf->SetAutoPageBreak(false);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTitle(I18n::tr("pdfreport.schedules.filetitle"));
$pdf->SetCreator('resourceplanner');
$pdf->AddPage();


# Generate table
$pdf->CreateTable($header,$data);
$pdf->Output('resourceplan.pdf','D');
?>