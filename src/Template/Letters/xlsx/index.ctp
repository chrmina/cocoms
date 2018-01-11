<?php
$this->PhpExcel->setActiveSheetIndex(0);
$worksheet = $this->PhpExcel->getActiveSheet();

// Set Default Font
$worksheet->getDefaultStyle()->getFont()->setName('Arial');
$worksheet->getDefaultStyle()->getFont()->setSize(10);

// Set Worksheet Title
$title = 'Data dump of Table Letters';
$worksheet->setCellValue('A1', $title);
$worksheet->getStyle('A1')->getFont()->setSize(14);
$worksheet->getRowDimension('1')->setRowHeight(23);
$worksheet->setCellValue('A2','Generated on '.Date("d F, Y"));

// Set Headers
$worksheet->getStyle('A4')->getFont()->setBold(true);
$worksheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$worksheet->getStyle('A4')->getFill()->getStartColor()->setRGB('CCCCCC');
$worksheet->duplicateStyle($worksheet->getStyle('A4'), 'B4:H4');
$worksheet->setCellValue('A4', 'DocRef');
$worksheet->setCellValue('B4', 'DocDate');
$worksheet->setCellValue('C4', 'Filelink');
$worksheet->setCellValue('D4', 'Sender');
$worksheet->setCellValue('E4', 'Recipient');
$worksheet->setCellValue('F4', 'Work Package');
$worksheet->setCellValue('G4', 'Subject');
$worksheet->setCellValue('H4', 'Contents');

// Set Data
$i = 5;
foreach ($letters as $letter) {
  $worksheet->SetCellValueByColumnAndRow(0, $i, $letter->docref);
  $worksheet->SetCellValueByColumnAndRow(1, $i, $letter->docdate);
  $worksheet->SetCellValueByColumnAndRow(2, $i, DS . $letter->file_dir . $letter->filelink);
  $worksheet->SetCellValueByColumnAndRow(3, $i, $letter->sender->name);
  $worksheet->SetCellValueByColumnAndRow(4, $i, $letter->recipient->name);
  $worksheet->SetCellValueByColumnAndRow(5, $i, $letter->work_package->name);
  $worksheet->SetCellValueByColumnAndRow(6, $i, $letter->subject);
  $worksheet->SetCellValueByColumnAndRow(7, $i, $this->Text->truncate($letter->contents, 100, ['ellipsis' => '...', 'exact' => false]));
  $i++;
}

// Auto-Resize Column Width
for ($i = 0; $i <= 7; $i++) {
$worksheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($i))->setAutoSize(true);
}

?>
