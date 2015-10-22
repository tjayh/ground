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
	function reports_customers($data)
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
			"Name",
			"Email",
			"Contact No.",
			"No. of Visits",
			"No. of Orders",
			"Total Amount"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'CUSTOMER REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A1');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			if ($value['member_cellphone_no'] != '' && $value['member_tel_no'] != '') {
				$contactno = $value['member_cellphone_no'] . ', ' . $value['member_tel_no'];
			}
			else {
				if ($value['member_cellphone_no']) $contactno = $value['member_cellphone_no'];
				if ($value['member_tel_no']) $contactno = $value['member_tel_no'];
			}
			$excel->setCellValue('B' . $row, $value['member_lastname'] . ', ' . $value['member_firstname'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['member_email'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $contactno)->getStyle('D' . $row);
			$excel->setCellValue('E' . $row, $value['total_visits'])->getStyle('E' . $row);
			$excel->setCellValue('F' . $row, $value['total_orders'])->getStyle('F' . $row);
			$excel->setCellValue('G' . $row, round($value['total_amount'], 2))->getStyle('G' . $row);
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
	function reports_inventory($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Name",
			"Code",
			"Stock Level",
			"Total Quantity",
			"Average Price",
			"Total Value",
			"Classes (Name, Stocks, Price)"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'INVENTORY REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A1');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			if ($value['product_stock_low'] > $value['total_stocks']) {
				$stock_level = 'LOW';
			}
			else {
				$stock_level = 'GOOD';
			}
			$excel->setCellValue('B' . $row, $value['product_name'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['product_code'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $stock_level)->getStyle('D' . $row);
			$excel->setCellValue('E' . $row, $value['total_stocks'])->getStyle('E' . $row);
			$excel->setCellValue('F' . $row, $value['average_price'])->getStyle('F' . $row);
			$excel->setCellValue('G' . $row, $value['subtotal_price'])->getStyle('G' . $row);
			$letter = 72; // start in column H
			foreach($value['class'] as $key2 => $value2) {
				$excel->setCellValue(chr($letter) . $row, $value2['option_name'])->getStyle(chr($letter++) . $row);
				$excel->setCellValue(chr($letter) . $row, $value2['product_stocks'])->getStyle(chr($letter++) . $row);
				$excel->setCellValue(chr($letter) . $row, $value2['product_new_price'])->getStyle(chr($letter++) . $row);
			}
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
	function reports_sales_product($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Name",
			"Code",
			"No. of Orders",
			"No. of Unit Sold",
			"Revenue",
			"Profit"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY PRODUCT REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['product_name'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['product_code'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_orders'])->getStyle('D' . $row);
			$excel->setCellValue('E' . $row, $value['total_qty'])->getStyle('E' . $row);
			$excel->setCellValue('F' . $row, $value['total_sales'])->getStyle('F' . $row);
			$excel->setCellValue('G' . $row, $value['total_profit'])->getStyle('G' . $row);
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
	function reports_product_views($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Product Name",
			"Price",
			"Views",
			"Status"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'PRODUCT BY VIEWS REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['product_name'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['product_code'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_views'])->getStyle('D' . $row);
			$status = '0';
			if ($value['status']) {
				$status = '1';
			}
			$excel->setCellValue('E' . $row, $status)->getStyle('E' . $row);
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
	function reports_sales_hour($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Hour",
			"No. of Orders",
			"Revenue"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY HOUR REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['hourly'] . ':00')->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['total_order'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_sales'])->getStyle('D' . $row);
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
	function reports_sales_weekdays($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Weekdays",
			"No. of Orders",
			"Revenue"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY WEEKDAYS REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['weekday'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['total_order'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_sales'])->getStyle('D' . $row);
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
	function reports_sales_days($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Day",
			"No. of Orders",
			"Revenue"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY DAYS REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['day'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['total_order'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_sales'])->getStyle('D' . $row);
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
	function reports_sales_months($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Month",
			"No. of Orders",
			"Revenue"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY MONTH REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['month'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['total_order'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_sales'])->getStyle('D' . $row);
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
	function reports_sales_payment($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Name",
			"No. of Orders",
			"Revenue"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY PAYMENT METHOD REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['payment_name'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['total_order'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_sales'])->getStyle('D' . $row);
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
	function reports_sales_coupon($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Name",
			"Code",
			"No. of Orders",
			"Revenue"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'SALES BY COUPON REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['coupon_name'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['coupon_code'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_order'])->getStyle('D' . $row);
			$excel->setCellValue('E' . $row, $value['total_sales'])->getStyle('E' . $row);
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
	function reports_order_status($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Status",
			"No. of Orders",
			"Amount"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'ORDER BY STATUS REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['status_name'])->getStyle('B' . $row);
			$excel->setCellValue('C' . $row, $value['total_order'])->getStyle('C' . $row);
			$excel->setCellValue('D' . $row, $value['total_sales'])->getStyle('D' . $row);
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
	function reports_order_product($data)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("")->setLastModifiedBy("")->setTitle("")->setSubject("")->setDescription("")->setKeywords("report")->setCategory("");
		$excel = $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/************************************************** START CONTENT HERE **************************************************/
		// set width of the whole file based on table header
		$letter = 65;
		$header = array(
			"",
			"Name",
			"New",
			"Pending",
			"Processing",
			"Payment Declined",
			"Awaiting Payment",
			"Ready to Ship",
			"Pending Shipment",
			"Shipped",
			"Returned",
			"Cancelled",
			"Completed",
			"Total Orders",
			"Total Amount"
		);
		$end_letter = chr($letter + count($header));
		// Define
		$filename = 'ORDER BY PRODUCT REPORT';
		// row 1
		$excel->setTitle($filename);
		$excel->setCellValue('A1', $filename)->getStyle('A1');
		$excel->mergeCells('A1:' . $end_letter . '1');
		$excel->getStyle('A1')->getFont()->setBold(true);
		// row 2
		$excel->setCellValue('A2', $data['shop_name'] . ' ' . date("M d, Y"))->getStyle('A2');
		$excel->mergeCells('A2:' . $end_letter . '2');
		$excel->getStyle('A2')->getFont()->setBold(true);
		// row 3
		if ($data['date_range']) {
			$excel->setCellValue('A3', 'From: ' . date("M d, Y", strtotime($data['date_range'][0])) . ' To: ' . date("M d, Y", strtotime($data['date_range'][1])))->getStyle('A3');
			$excel->mergeCells('A3:' . $end_letter . '3');
		}
		// row 4
		$letter = 65;
		foreach($header as $key => $value) {
			$excel->setCellValue(chr($letter) . '4', $value)->getStyle(chr($letter) . '4');
			$letter++;
		}
		$excel->getStyle('A4:' . chr($letter) . '4')->getFont()->setBold(true);
		// row 5
		$row = 5;
		foreach($data['list'] as $key => $value) {
			$excel->setCellValue('B' . $row, $value['product_name'])->getStyle('B' . $row);
			foreach($value['orders'] as $key => $value1) {
				if ($value1['order_status'] == 1) {
					$excel->setCellValue('C' . $row, $value1['numoford'])->getStyle('C' . $row);
				}
				if ($value1['order_status'] == 2) {
					$excel->setCellValue('D' . $row, $value1['numoford'])->getStyle('D' . $row);
				}
				if ($value1['order_status'] == 3) {
					$excel->setCellValue('E' . $row, $value1['numoford'])->getStyle('E' . $row);
				}
				if ($value1['order_status'] == 4) {
					$excel->setCellValue('F' . $row, $value1['numoford'])->getStyle('F' . $row);
				}
				if ($value1['order_status'] == 5) {
					$excel->setCellValue('G' . $row, $value1['numoford'])->getStyle('G' . $row);
				}
				if ($value1['order_status'] == 6) {
					$excel->setCellValue('H' . $row, $value1['numoford'])->getStyle('H' . $row);
				}
				if ($value1['order_status'] == 7) {
					$excel->setCellValue('I' . $row, $value1['numoford'])->getStyle('I' . $row);
				}
				if ($value1['order_status'] == 8) {
					$excel->setCellValue('J' . $row, $value1['numoford'])->getStyle('J' . $row);
				}
				if ($value1['order_status'] == 9) {
					$excel->setCellValue('K' . $row, $value1['numoford'])->getStyle('K' . $row);
				}
				if ($value1['order_status'] == 19) {
					$excel->setCellValue('L' . $row, $value1['numoford'])->getStyle('L' . $row);
				}
				if ($value1['order_status'] == 20) {
					$excel->setCellValue('M' . $row, $value1['numoford'])->getStyle('M' . $row);
				}
			}
			$excel->setCellValue('N' . $row, $value['numoford'])->getStyle('N' . $row);
			$excel->setCellValue('O' . $row, $value['amtoford'])->getStyle('O' . $row);
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
	function read_excel($data)
	{
		$inputFileName = 'upload/files/excel/abc.xls';
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		for ($row = 1; $row <= $highestRow; $row++) {
			//  Read a row of data into an array
			$rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			// print_r($sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE));
		}
		// echo $highestColumn;
		print_r($rowData);
		/* try {
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		}
		catch(Exception $e) {
		die('Error loading file :' . $e->getMessage());
		}
		$highestColumn = $sheet->getHighestColumn();
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		for($x=1; $x <= 10; $x++)
		{
		// $rowData[] = trim($sheetData[$x]['A'])
		echo $Name =$sheetData[$x]['A'];
		// echo $email= trim($sheetData[$x]['B']);
		// echo $email= trim($sheetData[$x]['C']).'_';
		} */
		exit(0);
	}
}
?>