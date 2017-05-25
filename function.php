<?php
mysql_set_charset("utf8");
include_once 'tools/phpemailer/PHPMailerAutoload.php';

function cateParent($data,$parent=0,$str="--",$select=0)
{
	foreach ($data as $key => $value) {
		$id=$value[0];
		$name=$value[1];
		if($value[2]==$parent){
			if($select !=0 && $id==$select){
				echo "<option value='$id' selected='selected'>$str $name</option>";
			}else{
				echo "<option value='$id'>$str $name</option>";
			}
			cateParent($data,$id,$str."--");
		}
	}
}

function cateParentId($data,$parent=0,$str="--",$select=0)
{
	foreach ($data as $key => $value) {
		$id=$value[0];
		$name=$value[1];
		if($value[2]!=$parent){
			if($select !=0 && $id==$select){
				echo "<option value='$id' selected='selected'>$str $name</option>";
			}else{
				echo "<option value='$id'>$str $name</option>";
			}
			// cateParent($data,$id,$str."--");
		}
	}
}

function sendMailPass($email,$pass,$user)
{
	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'kechoplay@gmail.com';                 // SMTP username
	$mail->Password = 'sontunglkmtp';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('kechoplay@gmail.com', 'SonTung');
	$mail->addAddress($email, $user);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Reset mật khẩu';
	$mail->Body    = 'Mật khẩu của bạn là :'.$pass.'</b>';

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo "<script>alert ('Message has been sent');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0\">";
	}
}

function sendMail($email,$pass,$user)
{
	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'kechoplay@gmail.com';                 // SMTP username
	$mail->Password = 'sontunglkmtp';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('kechoplay@gmail.com', 'SonTung');
	$mail->addAddress($email, $user);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Reset mật khẩu';
	$mail->Body    = 'Mật khẩu của bạn là :'.$pass.'</b>';

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo "<script>alert ('Message has been sent');</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0\">";
	}
}
?>