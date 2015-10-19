<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Vii Framework
 *
 * @package			ViiFramework (libraries from CodeIgniter)
 * @author			ViiWorks Production Team
 * @copyright		Copyright (c) 2009 - 2011, ViiWorks Inc.
 * @website url 	http://www.viiworks.com/
 * @filesource
 *
 */
require_once 'Classes/PHPExcel.php';

require_once 'Classes/PHPExcel/IOFactory.php';

class Excel_model extends CI_Model

{
	function __construct()
	{
		parent::__construct();
	}
	function subscriber_lists_report($data)
	{
		// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Hello')->setCellValue('B2', 'world!')->setCellValue('C1', 'Hello')->setCellValue('D2', 'world!');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Subscribers"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'ACTIVE SUBSCRIBER LISTS';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', ' As of ' . date("M d, Y"))->getStyle('A1');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		$excel->setCellValue('A3', $data['site_name'] )->getStyle('A1');
		$excel->mergeCells('A3:' . $end_letter . '3');
		$excel->getStyle('A3')->getFont()->setBold(true);
		// row 5
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '5', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		// row 6
		$row = 6;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['email'])->getStyle('B' . $row);
			$row++;
		}
		/************************************************** END **************************************************/
		$objPHPExcel->createSheet();
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . ' [' . date("Y-m-d") . '].xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit(0);
	}
}
?>