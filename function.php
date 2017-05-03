<?php

function checkUser($email)
{
	global $con;
	
	$query = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");

	if(mysqli_num_rows($query) > 0)
	{
		return 'true';
	}else
	{
		return 'false';
	}
}

function UserID($email)
{
	global $con;
	
	$query = mysqli_query($con, "SELECT id FROM users WHERE email = '$email'");
	$row = mysqli_fetch_assoc($query);
	
	return $row['id'];
}


function generateRandomString($length = 20) {
	// This function has taken from stackoverflow.com
    
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return md5($randomString);
}

function send_mail($to, $token)
{
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'rhytion.my@gmail.com';
	$mail->Password = 'outlook.com';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	$mail->From = 'rhytion.my@gmail.com';
	$mail->FromName = 'BanaSell';
	$mail->addAddress($to);
	$mail->addReplyTo('lokjianming@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'BanaSell: Password Recovery Instruction';
	$link = 'http://localhost/forget.php?email='.$to.'&token='.$token;
//Body of the mail
            $mail->Body = <<< EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    
  </head>
  <body>
<!-- / Full width container -->
		<table class="full-width-container" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#eeeeee" style="width: 100%; height: 100%; padding: 30px 0 30px 0;">
			<tr>
				<td align="center" valign="top">
					<!-- / 700px container -->
					<table class="container" border="0" cellpadding="0" cellspacing="0" width="700" bgcolor="#ffffff" style="width: 700px;">
						<tr>
							<td align="center" valign="top">
								<!-- / Header -->
								<table class="container header" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">
									<tr>
										<td style="padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">Banasell</a>
										</td>
									</tr>
								</table>
								<!-- /// Header -->

								<!-- / Hero subheader -->
								<table class="container hero-subheader" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">
									<tr>
										<td class="hero-subheader__title" style="font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;" align="left">Reset Password</td>
									</tr>

									<tr>
										<td class="hero-subheader__content" style="text-align: justify; font-size: 16px; line-height: 27px; color: #969696; padding: 0 0 25px 0;" align="left">We are deeply sorry you are having issues signing in to your account, therefore we would like to assist you to regain access access as soon as possible. Please kindly click the button below to reset your password. Please do not hesitate to contact us if you ran into issues and we would gladly assist you. Have a nice day ahead.</td>
									</tr>
								</table>
								<!-- /// Hero subheader -->




								<!-- / CTA Block -->
								<table class="container cta-block" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td align="center" valign="top">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">

												

												<tr>
													<td align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td class="cta-block__button" width="230" align="center" style="width: 200px;">
																	<a href="http://localhost/forget.php?email=$to&token=$token" style="border: 3px solid #eeeeee; color: #969696; text-decoration: none; padding: 15px 45px; text-transform: uppercase; display: block; text-align: center; font-size: 16px;">Reset Password</a>
																</td>
															</tr>
                              
                         <tr>
													<td class="cta-block__content" style="padding: 20px 0 27px 0; font-size: 16px; line-height: 27px; color: #969696; text-align: center;">Just in case it doesn't work, here's the same link so you could copy and paste it into your browser. <br /><br /><a href="http://localhost/forget.php?email=$to&token=$token">http://localhost/forget.php?email=$to&token=$token</a></td>
												</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// CTA Block -->

								<!-- / Divider -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 25px;" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-bottom: solid 1px #eeeeee; width: 620px;">
												<tr>
													<td align="center">&nbsp;</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Divider -->

								<!-- / Info Bullets -->
								<table class="container info-bullets" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="width: 620px;">
												<tr>
													<td class="info-bullets__block" style="padding: 30px 30px 15px 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img13.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">help@banasell.gq</td>
															</tr>
														</table>
													</td>

													<td class="info-bullets__block" style="padding: 30px 30px 15px 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img11.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">N.A.</td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td class="info-bullets__block" style="padding: 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img12.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">Kota Kinabalu, Sabah</td>
															</tr>
														</table>
													</td>

													<td class="info-bullets__block" style="padding: 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img12.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">Malaysia</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Info Bullets -->

								<!-- / Social nav -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img7.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img8.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img9.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img10.png" border="0">
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Social nav -->

								<!-- / Footer -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td style="text-align: center; padding: 50px 0 10px 0;">
														<a href="#" style="font-size: 28px; text-decoration: none; color: #d5d5d5;">Banasell</a>
													</td>
												</tr>

												<tr>
													<td align="middle">
														<table width="60" height="2" border="0" cellpadding="0" cellspacing="0" style="width: 60px; height: 2px;">
															<tr>
																<td align="middle" width="60" height="2" style="background-color: #eeeeee; width: 60px; height: 2px; font-size: 1px;"><img src="http://dev2.slicejack.com/portfolio-email/img/img16.jpg"></td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td style="color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;">Copyright &copy; 2017 <a href="http://slicejack.com/" target="_blank" style="text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;">Banasell</a>. <br />A 2nd hand book selling website made by STTSS students, for STTSS students <br />All rights reserved.</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Footer -->
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
  </body>
</html>


EOF;

            //Altbody is used to display plain text message for those email viewers which are not HTML compatible
            $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
		
	if(!$mail->send()) {
		return 'fail';
	} else {
		return 'success';
	}
}




function send_verification_mail($to, $key)
{



	require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'rhytion.my@gmail.com';
	$mail->Password = 'outlook.com';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	$mail->From = 'rhytion.my@gmail.com';
	$mail->FromName = 'BanaSell';
	$mail->addAddress($to);
	$mail->addReplyTo('lokjianming@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'BanaSell: Sign Up Verification Email';

	//Body of the mail
            $mail->Body = <<< EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    
  </head>
  <body>
<!-- / Full width container -->
		<table class="full-width-container" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" bgcolor="#eeeeee" style="width: 100%; height: 100%; padding: 30px 0 30px 0;">
			<tr>
				<td align="center" valign="top">
					<!-- / 700px container -->
					<table class="container" border="0" cellpadding="0" cellspacing="0" width="700" bgcolor="#ffffff" style="width: 700px;">
						<tr>
							<td align="center" valign="top">
								<!-- / Header -->
								<table class="container header" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">
									<tr>
										<td style="padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">Banasell</a>
										</td>
									</tr>
								</table>
								<!-- /// Header -->

								<!-- / Hero subheader -->
								<table class="container hero-subheader" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">
									<tr>
										<td class="hero-subheader__title" style="font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;" align="left">Verification Email</td>
									</tr>

									<tr>
										<td class="hero-subheader__content" style="text-align: justify; font-size: 16px; line-height: 27px; color: #969696; padding: 0 0 25px 0;" align="left">Before anything, we would like to thank you for showing your support by signing up. We hope you would have a pleasant experience when using our service and please do not hesitate to contact us if you have any enquiries or ran into any issues. Have a nice day ahead.</td>
									</tr>
								</table>
								<!-- /// Hero subheader -->




								<!-- / CTA Block -->
								<table class="container cta-block" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td align="center" valign="top">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" style="width: 620px;">

												

												<tr>
													<td align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td class="cta-block__button" width="230" align="center" style="width: 200px;">
																	<a href="http://localhost/confirm.php?key=$key" style="border: 3px solid #eeeeee; color: #969696; text-decoration: none; padding: 15px 45px; text-transform: uppercase; display: block; text-align: center; font-size: 16px;">Activate Account</a>
																</td>
															</tr>
                              
                         <tr>
													<td class="cta-block__content" style="padding: 20px 0 27px 0; font-size: 16px; line-height: 27px; color: #969696; text-align: center;">Just in case it doesn't work, here's the same link so you could copy and paste it into your browser. <br /><br /><a href="http://localhost/confirm.php?key=$key">http://localhost/confirm.php?key=$key</a></td>
												</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// CTA Block -->

								<!-- / Divider -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top: 25px;" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-bottom: solid 1px #eeeeee; width: 620px;">
												<tr>
													<td align="center">&nbsp;</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Divider -->

								<!-- / Info Bullets -->
								<table class="container info-bullets" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="width: 620px;">
												<tr>
													<td class="info-bullets__block" style="padding: 30px 30px 15px 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img13.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">help@banasell.gq</td>
															</tr>
														</table>
													</td>

													<td class="info-bullets__block" style="padding: 30px 30px 15px 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img11.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">N.A.</td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td class="info-bullets__block" style="padding: 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img12.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">Kota Kinabalu, Sabah</td>
															</tr>
														</table>
													</td>

													<td class="info-bullets__block" style="padding: 30px;" align="center">
														<table class="container" border="0" cellpadding="0" cellspacing="0" align="center">
															<tr>
																<td class="info-bullets__icon" style="padding: 0 15px 0 0;">
																	<img src="http://dev2.slicejack.com/portfolio-email/img/img12.png">
																</td>

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">Malaysia</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Info Bullets -->

								<!-- / Social nav -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img7.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img8.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img9.png" border="0">
														</a>
													</td>

													<td align="center" style="padding: 30px 0 30px 0;">
														<a href="#">
															<img src="http://dev2.slicejack.com/portfolio-email/img/img10.png" border="0">
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Social nav -->

								<!-- / Footer -->
								<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
									<tr>
										<td align="center">
											<table class="container" border="0" cellpadding="0" cellspacing="0" width="620" align="center" style="border-top: 1px solid #eeeeee; width: 620px;">
												<tr>
													<td style="text-align: center; padding: 50px 0 10px 0;">
														<a href="#" style="font-size: 28px; text-decoration: none; color: #d5d5d5;">Banasell</a>
													</td>
												</tr>

												<tr>
													<td align="middle">
														<table width="60" height="2" border="0" cellpadding="0" cellspacing="0" style="width: 60px; height: 2px;">
															<tr>
																<td align="middle" width="60" height="2" style="background-color: #eeeeee; width: 60px; height: 2px; font-size: 1px;"><img src="http://dev2.slicejack.com/portfolio-email/img/img16.jpg"></td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td style="color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;">Copyright &copy; 2017 <a href="http://slicejack.com/" target="_blank" style="text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;">Banasell</a>. <br />A 2nd hand book selling website made by STTSS students, for STTSS students <br />All rights reserved.</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- /// Footer -->
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
  </body>
</html>


EOF;

            //Altbody is used to display plain text message for those email viewers which are not HTML compatible
            $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	
	if(!$mail->send()) {
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit();
	} else {
		return 'success';
	}
}

function send_verification_change_mail($to, $key2, $id)
{
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'rhytion.my@gmail.com';
	$mail->Password = 'outlook.com';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	$mail->From = 'rhytion.my@gmail.com';
	$mail->FromName = 'BanaSell';
	$mail->addAddress($to);
	$mail->addReplyTo('lokjianming@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'BanaSell: Email Change Verification';
	$link = 'http://localhost/login/changeemail.php?email='.$to.'&key='.$key2.'&id='.$id;
	$mail->Body    = "Thank you for signing up.<br> Please verify your email by clicking the below link. <br><i>". $link."</i>";
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		return 'fail';
	} else {
		return 'success';
	}
}

function verifytoken($userID, $token)
{	
	global $con;
	
	$query = mysqli_query($con, "SELECT valid FROM recovery_keys WHERE userID = $userID AND token = '$token'");
	$row = mysqli_fetch_assoc($query);
	
	if(mysqli_num_rows($query) > 0)
	{
		if($row['valid'] == 1)
		{
			return 1;
		}else
		{
			return 0;
		}
	}else
	{
		return 0;
	}
	
}
?>