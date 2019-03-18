<?php
require('lib/fpdf181/fpdf.php');

class PDF extends FPDF
{
	public function __construct() {
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

	function Header($d) {
		$header = array();

		$header[] = '';
		foreach ($d['events'] as $item) { 
			$header[] = $item['targetDate'];
		}
		return $header;
	}

	function CreateFooter() {
		$this->SetY(-15); 
		$this->SetFont('Arial','I',7);
		$this->Cell(0,10,'Erstellt am '.date("j.n.Y"),0,0,'R');
		$this->Ln();
	}


	// Better table
	function CreateTable($header, $tabledata)
	{
		$this->SetFont('Arial','B',14);
		$this->Cell(100);
		$this->Cell(30,25,'Dienstplan',0,0,'C');
		$this->Ln(20);

		$row_height = 6;
		// Column widths
		$w = array(60, 50, 50, 50, 50);

		// Header
		$headerheight = 10;
		$this->SetFont('Arial','B',10);
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],$headerheight,$header[$i],0,0,'C');
		}
		$this->Ln();

		$this->SetFont('Arial','',10);

		// Data
		$rowidx = 1;
		$rowsperpage = 26;

		$pagecreated = false;
		foreach($tabledata as $row)
		{
			// New page
			$newpage = ($rowidx++ % $rowsperpage) == 0;
			if ($newpage) {
				$this->CreateFooter();
				$this->AddPage();
				$pagecreated = true;
			}

			$colidx=0;
			foreach ($row as $col) {
				$this->Cell($w[$colidx++],$row_height,$col,1,'L');
			}
			$this->Ln();
		}
		// Closing line
		// $countofcells= 4;
		// $this->Cell($countofcells,0,'','T');
		
		if (!$pagecreated) {
			$this->CreateFooter();
		}
	}
}


$pdf = new PDF();

// Column headings
$header = $pdf->Header($data);
// Data loading
$data = $pdf->LoadData($data);

$pdf->SetAutoPageBreak(false);
$pdf->SetFont('Arial','',10);
$pdf->SetTitle('Dienstplan');
$pdf->SetCreator('dienstplan-pdf-generator');
$pdf->AddPage();

//set header
#$pdf->Image('logo.png',170,8,33,0,'png');	
#$pdf->SetFont('Arial','B',12);
#$pdf->Cell(10);
#$pdf->Cell(30,25,'Freunde der Gemeinde',0,0,'C');
#$pdf->Ln(10);

# Generate table
$pdf->CreateTable($header,$data);
$pdf->Output('D','dienstplan.pdf');
?>