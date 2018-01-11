<?php
$this->PhpExcel->setActiveSheetIndex(0);
$worksheet = $this->PhpExcel->getActiveSheet();

// Set Default Font
$worksheet->getDefaultStyle()->getFont()->setName('Arial');
$worksheet->getDefaultStyle()->getFont()->setSize(10);

// Set Worksheet Title
$title = 'Data dump of Table Work Packages';
$worksheet->setCellValue('A1', $title);
$worksheet->getStyle('A1')->getFont()->setSize(14);
$worksheet->getRowDimension('1')->setRowHeight(23);
$worksheet->setCellValue('A2','Generated on '.Date("d F, Y"));

// Set Headers
$worksheet->getStyle('A4')->getFont()->setBold(true);
$worksheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$worksheet->getStyle('A4')->getFill()->getStartColor()->setRGB('CCCCCC');
$worksheet->duplicateStyle($worksheet->getStyle('A4'), 'B4:D4');
$worksheet->setCellValue('A4', 'WP Number');
$worksheet->setCellValue('B4', 'WP Name');
$worksheet->setCellValue('C4', 'WP Coordinator');
$worksheet->setCellValue('D4', 'WP QS');

// Set Data
$i = 5;
foreach ($workPackages as $workPackage) {
  $worksheet->SetCellValueByColumnAndRow(0, $i, $workPackage->number);
  $worksheet->SetCellValueByColumnAndRow(1, $i, $workPackage->name);
  $worksheet->SetCellValueByColumnAndRow(2, $i, $workPackage->wp_coordinator);
  $worksheet->SetCellValueByColumnAndRow(3, $i, $workPackage->wp_qs);
  $i++;
}

// Auto-Resize Column Width
for ($i = 0; $i <= 3; $i++) {
$worksheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($i))->setAutoSize(true);
}

?>
