<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//http://mpdf1.com/manual/index.php?tid=184&searchstring=margins

if (!function_exists('create_pdf')) {

    function print_pdf($html_data, $orientation, $footer, $margin_bottom, $filename, $download, $email, $message, $name) {
		$name_file = "- $name - ";
        $file_name = "$filename FORM $name_file" . date('d-m-Y');
		
        require 'mpdf/mpdf.php';		
		if($orientation == 'L'){			
			//$mpdf = new mPDF();			
			//$mpdf = new mPDF('utf-8', array(210,297));		
			//$mpdf = new mPDF('utf-8', array(210,297));		
			//$mpdf = new mPDF('L','Letter', 0, '', 15, 15, 16, 35, 9, 9);	
			$mpdf = new mPDF('utf-8','A4-L','','',15,15,5,5,9,9);
		}		
		else{			
			//$mpdf = new mPDF();	
			
			//$mpdf = new mPDF('utf-8', array(297,210));	
			//$mpdf = new mPDF('utf-8','A4');	
			if($margin_bottom){
				$mpdf = new mPDF('','Letter', 0, '', 15, 15, 16, 20, 9, 9);	
			}
			else{
				$mpdf = new mPDF('','Letter', 0, '', 15, 15, 16, 35, 9, 9);	
			}
			//'','', 0, '', 15, 15, 16, 16, 9, 9, 'L'			
		}
		$mpdf->list_indent_first_level = 0;
		$mpdf->SetHTMLFooter($footer);
		
        $mpdf->WriteHTML($html_data);	
		if($download == 'download'){
			$mpdf->Output($file_name . '.pdf', 'D');
		}
		else if($download == 'save'){
			$mpdf->Output('././upload/documents/applicantion_forms/'.$file_name . '.PDF', 'F');
		}
		else if($email != ''){

		$content = $mpdf->Output('', 'S');

		$content = chunk_split(base64_encode($content));
		$mailto = "$email";
		$from_name = 'Vestland Maritime Corporation';
		$from_mail = 'rick08@vestland.com';
		$replyto = 'rick08@vestland.com';
		$uid = md5(uniqid(time()));
		$subject = 'Application Form from Vestlandmaritime.ph';
		$message = $message;
		$filename = $file_name . '.pdf';

		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message."\r\n\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
		$header .= "Content-Transfer-Encoding: base64\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
		$header .= $content."\r\n\r\n";
		$header .= "--".$uid."--";
		$is_sent = @mail($mailto, $subject, "", $header);

		// You can now optionally also send it to the browser
		$mpdf->Output();
		exit;
		}
		
		else{
			$mpdf->Output($file_name . '.pdf', 'I');
		}
        
        
		//$mpdf->Output();


		// $mpdf = new mPDF();	// $mpdf = new mPDF('utf-8', array(215.9,279.4));	// $stylesheet = file_get_contents('stylesheet.css');	// $mpdf->WriteHTML($stylesheet,1);	// $mpdf->WriteHTML('<div id="mydiv"><p>HTML content goes here...</p></div>', 2);	// $mpdf->Output();	// exit;
    }

}?>