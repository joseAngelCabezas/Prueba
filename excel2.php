<?php
		// Declaramos la librería
		require __DIR__ . "/vendor/autoload.php";
		use PhpOffice\PhpSpreadsheet\Spreadsheet;
		use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
		//Librerias Estilos
		use PhpOffice\PhpSpreadsheet\IOFactory;
		use PhpOffice\PhpSpreadsheet\Style\Border;
		use PhpOffice\PhpSpreadsheet\Style\Fill;
		use PhpOffice\PhpSpreadsheet\Style\Style;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=DatosUsu.xlsx');
		$spreadsheet = new Spreadsheet();
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1','service worksheet');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A2','texto 2');
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A3','texto 3');
		$spreadsheet->getActiveSheet()->setTitle('Service');
		//estilos
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);//sirve para que se dimensione la celda ocupando el contneido del texto que va en su interior
		$spreadsheet->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(true)->setSize(18);//sirve para que ponga desde la celda A1 hasta la A3, en tamaño 18 y en negrita


		$spreadsheet->createSheet();
		$spreadsheet->setActiveSheetIndex(1)->setCellValue('A1','2 Worksheet');
		$spreadsheet->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(true)->setSize(10);
		$spreadsheet->getActiveSheet()->setTitle('Product');

		$spreadsheet->setActiveSheetIndex(0);
		
		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

?>