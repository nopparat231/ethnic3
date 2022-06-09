<?php
		$mailto = "23noop02@gmail.com";
		$mailSub = "EthnicTH Activate Email";
		$mailMsg = "
			Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่
		";
	 require 'PHPMailer/PHPMailerAutoload.php';
	 $mail = new PHPMailer();
	 $mail ->IsSmtp();
		
	 $mail ->SMTPAuth = true;
	 $mail ->SMTPSecure = 'tls';
	 $mail ->Host = "smtp.gmail.com";
	 $mail ->Port = 587; // or 587
	 //$mail ->IsHTML(true);
	 $mail ->Username = "EthnicTH66@gmail.com";
	 $mail ->Password = "uzjcpragmjzofsrg";
	 $mail ->SetFrom("EthnicTH66@gmail.com", "Test MAil");
	 $mail ->Subject = $mailSub;
	 $mail ->Body = $mailMsg;
	 $mail ->AddAddress($mailto);

	 if(!$mail->Send()){
			 echo "Mail Not Sent";
	 }
	 else{
			 echo "Mail Sent";
	 }
