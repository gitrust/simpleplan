<?php
#define('FPDF_FONTPATH',dirname(__FILE__) . "/../../lib/tfpdf/font/");
require('lib/tfpdf/tfpdf.php');

class PDF extends tFPDF
{
	const MAX_COLS = 12;
	const ROWS_PER_PAGE = 26;
	const ROW_HEIGHT = 6;
	const COL_WIDTH = 20;
	const LEFT_OFFSET = 15;
	const MAX_CELL_TEXT = 12;
	const WITH_BORDER = 1;
	const NO_BORDER = 0;
	

	public function __construct() {
        # L = Landscape, P = Portrait
		parent::__construct('L', 'mm', 'A4');
	}

	// Load data
	function LoadData($d)
	{
		//FIXME do we still need this method?

		// Read file lines
		$trows = array();

		$table = $d['tabledata'];
		for ($i = 0; $i < count($table); $i++) {
			$row = $table[$i];
			$tcolumns = array();

			// first header column = date
			$tcolumns[] = $row[0]["targetDate"];
			
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
		foreach ($d['activities'] as $item) { 
			$header[] = $item['name'];
		}
		return $header;
	}

	function CreateFooter() {
		$currenty = $this->GetY();

		$this->SetFont('DejaVu','I',7);
		$this->SetY(-15);
		$this->Cell(0, 10, $this->page, 0, 0, 'C');		
		$this->Cell(0, 20, I18n::tr("label.createdat") . date("j.n.Y"), self::NO_BORDER,0,'R');
		$this->Ln();

		$this->SetY($currenty);
	}

	function TrimValue($v, $maxlen){
		if (is_null($v)) {
			return '';
		}
		return substr(trim($v), 0, $maxlen);
	}

	function CreateTableHeader($header) {
		$currentx = $this->GetX();

		$col_widths = array_fill(0, self::MAX_COLS, self::COL_WIDTH);

		// Header
		$headerheight = 10;
		$this->SetFont('DejaVu','',8);
		// offset left border
		
		$this->SetX(self::LEFT_OFFSET);
		
		// first corner cell
		//$this->Cell(self::COL_WIDTH,$headerheight,'', self::NO_BORDER,0,'C');
		
		for($i=0; $i<=count($header); $i++){
			// guard: max column count
			if ($i > self::MAX_COLS) {
				break;
			}
			$this->Cell($col_widths[$i], $headerheight, $header[$i], self::NO_BORDER, 0,'C');
		}
		$this->Ln();

		$this->SetX($currentx);
	}

	function CreatePageTitle() {
		$cy = $this->GetY();
		$this->SetY(5);
		$this->SetFont('DejaVu','B',10);
		$this->Cell(120);
		$this->Cell(40,10,I18n::tr("title.reportschedulestitle"), self::NO_BORDER,0,'C');
		$this->Ln(20);
		$this->SetY($cy);
	}

	// Better table
	function CreateTable($header, $rows)
	{

		$this->CreateFooter();

		// y offset for the table
		$this->SetY(20);

		// header and footer
		$this->CreateTableHeader($header);
		
		
		$this->SetFont('DejaVu','',10);
		// Table Data
		$col_widths = array_fill(0, self::MAX_COLS, self::COL_WIDTH);
		$rowidx = 1;
		$pagecreated = false;
		foreach($rows as $row)
		{
			// Create new page
			$newpage = ($rowidx++ % self::ROWS_PER_PAGE) == 0;
			if ($newpage) {				
				$this->AddPage();
				$this->CreateFooter();

				// repeat header for new page
				$this->CreateTableHeader($header);
				$pagecreated = true;
			}

			// offset left border
			$this->SetX(self::LEFT_OFFSET);

			// Data Columns
			$colidx = 0;
			foreach ($row as $col) {
				$value = $col;

				// first column 
				if ($colidx == 0){
					$this->SetFont('DejaVu','',8);
					// max 30 characters
					$value = $this->TrimValue($value,30);
					$this->Cell($col_widths[$colidx++],self::ROW_HEIGHT,$value, self::WITH_BORDER,0,'L');
				} else {
					$this->SetFont('DejaVu','',7);
					$value = $this->TrimValue($value,self::MAX_CELL_TEXT);
					$this->Cell($col_widths[$colidx++],self::ROW_HEIGHT,$value, self::WITH_BORDER,0,'C');
				}

				// guard: max column count
				if ($colidx >= self::MAX_COLS) {
					continue;
				}
				
			}
			$this->Ln();
		}
	}
}


$pdf = new PDF();

// Column headings
$header = $pdf->TableHeader($data);
// Data loading
$rows = $pdf->LoadData($data);

// Define Fonts that will be used in PDF
// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true);
$pdf->AddFont('DejaVu','I','DejaVuSans-Oblique.ttf',true);

$pdf->SetAutoPageBreak(false);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTitle(I18n::tr("pdfreport.schedules.filetitle"));
$pdf->SetCreator('simpleplan ' . APPVERSION);
$pdf->AddPage();


# Generate table
$pdf->CreatePageTitle();
$pdf->CreateTable($header,$rows);
$pdf->Output('simpleplan.pdf','D');
?>