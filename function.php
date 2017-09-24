<?php

function hate_bad($str)
{

	$bad = array("4r5e",
	"50 yard cunt punt",
	"5h1t",
	"5hit",
	"a_s_s",
	"a2m",
	"a55",
	"adult",
	"amateur",
	"anal",
	"anal impaler",
	"anal leakage",
	"anilingus",
	"anus",
	"ar5e",
	"arrse",
	"arse",
	"arsehole",
	"ass",
	"ass fuck",
	"asses",
	"assfucker",
	"ass-fucker",
	"assfukka",
	"asshole",
	"ass-hole",
	"assholes",
	"assmucus",
	"assmunch",
	"asswhole",
	"autoerotic",
	"b!tch",
	"b00bs",
	"b17ch",
	"b1tch",
	"ballbag",
	"ballsack",
	"bang (one's) box",
	"bangbros",
	"bareback",
	"bastard",
	"beastial",
	"beastiality",
	"beef curtain",
	"bellend",
	"bestial",
	"bestiality",
	"bi+ch",
	"biatch",
	"bimbos",
	"birdlock",
	"bitch",
	"bitch tit",
	"bitcher",
	"bitchers",
	"bitches",
	"bitchin",
	"bitching",
	"bloody",
	"blow job",
	"blow me",
	"blow mud",
	"blowjob",
	"blowjobs",
	"blue waffle",
	"blumpkin",
	"boiolas",
	"bollock",
	"bollok",
	"boner",
	"boob",
	"boobs",
	"booobs",
	"boooobs",
	"booooobs",
	"booooooobs",
	"breasts",
	"buceta",
	"bugger",
	"bum",
	"bunny fucker",
	"bust a load",
	"busty",
	"butt",
	"butt fuck",
	"butthole",
	"buttmuch",
	"buttplug",
	"c0ck",
	"c0cksucker",
	"carpet muncher",
	"carpetmuncher",
	"cawk",
	"chink",
	"choade",
	"chota bags",
	"cipa",
	"cl1t",
	"clit",
	"clit licker",
	"clitoris",
	"clits",
	"clitty litter",
	"clusterfuck",
	"cnut",
	"cock",
	"cock pocket",
	"cock snot",
	"cockface",
	"cockhead",
	"cockmunch",
	"cockmuncher",
	"cocks",
	"cocksuck",
	"cocksucked",
	"cocksucker",
	"cock-sucker",
	"cocksucking",
	"cocksucks ",
	"cocksuka",
	"cocksukka",
	"cok",
	"cokmuncher",
	"coksucka",
	"coon",
	"cop some wood",
	"cornhole",
	"corp whore",
	"cox",
	"cum",
	"cum chugger",
	"cum dumpster",
	"cum freak",
	"cum guzzler",
	"cumdump",
	"cummer",
	"cumming",
	"cums",
	"cumshot",
	"cunilingus",
	"cunillingus",
	"cunnilingus",
	"cunt",
	"cunt hair",
	"cuntbag",
	"cuntlick",
	"cuntlicker",
	"cuntlicking",
	"cunts",
	"cuntsicle",
	"cunt-struck",
	"cut rope",
	"cyalis",
	"cyberfuc",
	"cyberfuck",
	"cyberfucked",
	"cyberfucker",
	"cyberfuckers",
	"cyberfucking",
	"d1ck",
	"damn",
	"dick",
	"dick hole",
	"dick shy",
	"dickhead",
	"dildo",
	"dildos",
	"dink",
	"dinks",
	"dirsa",
	"dirty Sanchez",
	"dlck",
	"dog-fucker",
	"doggie style",
	"doggiestyle",
	"doggin",
	"dogging",
	"donkeyribber",
	"doosh",
	"duche",
	"dyke",
	"eat a dick",
	"eat hair pie",
	"ejaculate",
	"ejaculated",
	"ejaculates",
	"ejaculating",
	"ejaculatings",
	"ejaculation",
	"ejakulate",
	"erotic",
	"f u c k",
	"f u c k e r",
	"f_u_c_k",
	"f4nny",
	"facial",
	"fag",
	"fagging",
	"faggitt",
	"faggot",
	"faggs",
	"fagot",
	"fagots",
	"fags",
	"fanny",
	"fannyflaps",
	"fannyfucker",
	"fanyy",
	"fatass",
	"fcuk",
	"fcuker",
	"fcuking",
	"feck",
	"fecker",
	"felching",
	"fellate",
	"fellatio",
	"fingerfuck",
	"fingerfucked",
	"fingerfucker",
	"fingerfuckers",
	"fingerfucking",
	"fingerfucks",
	"fist fuck",
	"fistfuck",
	"fistfucked",
	"fistfucker",
	"fistfuckers",
	"fistfucking",
	"fistfuckings",
	"fistfucks",
	"flange",
	"flog the log",
	"fook",
	"fooker",
	"fuck hole",
	"fuck puppet",
	"fuck trophy",
	"fuck yo mama",
	"fuck",
	"fucka",
	"fuck-ass",
	"fuck-bitch",
	"fucked",
	"fucker",
	"fuckers",
	"fuckhead",
	"fuckheads",
	"fuckin",
	"fucking",
	"fuckings",
	"fuckingshitmotherfucker",
	"fuckme",
	"fuckmeat",
	"fucks",
	"fucktoy",
	"fuckwhit",
	"fuckwit",
	"fudge packer",
	"fudgepacker",
	"fuk",
	"fuker",
	"fukker",
	"fukkin",
	"fuks",
	"fukwhit",
	"fukwit",
	"fux",
	"fux0r",
	"gangbang",
	"gangbang",
	"gang-bang",
	"gangbanged",
	"gangbangs",
	"gassy ass",
	"gaylord",
	"gaysex",
	"goatse",
	"god",
	"god damn",
	"god-dam",
	"goddamn",
	"goddamned",
	"god-damned",
	"ham flap",
	"hardcoresex",
	"hell",
	"heshe",
	"hoar",
	"hoare",
	"hoer",
	"homo",
	"homoerotic",
	"hore",
	"horniest",
	"horny",
	"hotsex",
	"how to kill",
	"how to murdep",
	"jackoff",
	"jack-off",
	"jap",
	"jerk",
	"jerk-off",
	"jism",
	"jiz",
	"jizm",
	"jizz",
	"kawk",
	"kinky Jesus",
	"knob",
	"knob end",
	"knobead",
	"knobed",
	"knobend",
	"knobend",
	"knobhead",
	"knobjocky",
	"knobjokey",
	"kock",
	"kondum",
	"kondums",
	"kum",
	"kummer",
	"kumming",
	"kums",
	"kunilingus",
	"kwif",
	"l3i+ch",
	"l3itch",
	"labia",
	"LEN",
	"lmao",
	"lmfao",
	"lmfao",
	"lust",
	"lusting",
	"m0f0",
	"m0fo",
	"m45terbate",
	"ma5terb8",
	"ma5terbate",
	"mafugly",
	"masochist",
	"masterb8",
	"masterbat*",
	"masterbat3",
	"masterbate",
	"master-bate",
	"masterbation",
	"masterbations",
	"masturbate",
	"mof0",
	"mofo",
	"mo-fo",
	"mothafuck",
	"mothafucka",
	"mothafuckas",
	"mothafuckaz",
	"mothafucked ",
	"mothafucker",
	"mothafuckers",
	"mothafuckin",
	"mothafucking ",
	"mothafuckings",
	"mothafucks",
	"mother fucker",
	"mother fucker",
	"motherfuck",
	"motherfucked",
	"motherfucker",
	"motherfuckers",
	"motherfuckin",
	"motherfucking",
	"motherfuckings",
	"motherfuckka",
	"motherfucks",
	"muff",
	"muff puff",
	"mutha",
	"muthafecker",
	"muthafuckker",
	"muther",
	"mutherfucker",
	"n1gga",
	"n1gger",
	"nazi",
	"need the dick",
	"nigg3r",
	"nigg4h",
	"nigga",
	"niggah",
	"niggas",
	"niggaz",
	"nigger",
	"niggers",
	"nob",
	"nob jokey",
	"nobhead",
	"nobjocky",
	"nobjokey",
	"numbnuts",
	"nut butter",
	"nutsack",
	"omg",
	"orgasim",
	"orgasims",
	"orgasm",
	"orgasms",
	"p0rn",
	"pawn",
	"pecker",
	"penis",
	"penisfucker",
	"phonesex",
	"phuck",
	"phuk",
	"phuked",
	"phuking",
	"phukked",
	"phukking",
	"phuks",
	"phuq",
	"pigfucker",
	"pimpis",
	"piss",
	"pissed",
	"pisser",
	"pissers",
	"pisses",
	"pissflaps",
	"pissin",
	"pissing",
	"pissoff",
	"poop",
	"porn",
	"porno",
	"pornography",
	"pornos",
	"prick",
	"pricks",
	"pron",
	"pube",
	"pusse",
	"pussi",
	"pussies",
	"pussy",
	"pussy fart",
	"pussy palace",
	"pussys",
	"queaf",
	"queer",
	"rectum",
	"retard",
	"rimjaw",
	"rimming",
	"s hit",
	"s.o.b.",
	"s_h_i_t",
	"sadism",
	"sadist",
	"sandbar",
	"sausage queen",
	"schlong",
	"screwing",
	"scroat",
	"scrote",
	"scrotum",
	"semen",
	"sex",
	"sh!+",
	"sh!t",
	"sh1t",
	"shag",
	"shagger",
	"shaggin",
	"shagging",
	"shemale",
	"shi+",
	"shit",
	"shit fucker",
	"shitdick",
	"shite",
	"shited",
	"shitey",
	"shitfuck",
	"shitfull",
	"shithead",
	"shiting",
	"shitings",
	"shits",
	"shitted",
	"shitter",
	"shitters",
	"shitting",
	"shittings",
	"shitty ",
	"skank",
	"slope",
	"slut",
	"slut bucket",
	"sluts",
	"smegma",
	"smut",
	"snatch",
	"son-of-a-bitch",
	"spac",
	"spunk",
	"t1tt1e5",
	"t1tties",
	"teets",
	"teez",
	"testical",
	"testicle",
	"tit",
	"tit wank",
	"titfuck",
	"tits",
	"titt",
	"tittie5",
	"tittiefucker",
	"titties",
	"tittyfuck",
	"tittywank",
	"titwank",
	"tosser",
	"turd",
	"tw4t",
	"twat",
	"twathead",
	"twatty",
	"twunt",
	"twunter",
	"v14gra",
	"v1gra",
	"vagina",
	"viagra",
	"vulva",
	"w00se",
	"wang",
	"wank",
	"wanker",
	"wanky",
	"whoar",
	"whore",
	"willies",
	"willy",
	"wtf",
	"xrated",
	"xxx");
    $piece = explode(" ",$str);
    for($i=0; $i < sizeof($bad); $i++)
    {
        for($j=0; $j < sizeof($piece); $j++)
        {
            if($bad[$i] == $piece[$j])
            {
                $piece[$j] = " **** ";
            }
        }
    }

    return $piece;
}
  
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
	$mail->FromName = 'Ogiebooks';
	$mail->addAddress($to);
	$mail->addReplyTo('lokjianming@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'Ogiebooks: Password Recovery Instruction';
	$link = 'http://ogiebooks.gq/forget.php?email='.$to.'&token='.$token;
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
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">Ogiebooks</a>
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
																	<a href="http://ogiebooks.gq/forget.php?email=$to&token=$token" style="border: 3px solid #eeeeee; color: #969696; text-decoration: none; padding: 15px 45px; text-transform: uppercase; display: block; text-align: center; font-size: 16px;">Reset Password</a>
																</td>
															</tr>
                              
                         <tr>
													<td class="cta-block__content" style="padding: 20px 0 27px 0; font-size: 16px; line-height: 27px; color: #969696; text-align: center;">Just in case it doesn't work, here's the same link so you could copy and paste it into your browser. <br /><br /><a href="http://ogiebooks.gq/forget.php?email=$to&token=$token">http://ogiebooks.gq/forget.php?email=$to&token=$token</a></td>
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

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">help@ogiebooks.gq</td>
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
														<a href="#" style="font-size: 28px; text-decoration: none; color: #d5d5d5;">Ogiebooks</a>
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
													<td style="color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;">Copyright &copy; 2017 <a href="http://slicejack.com/" target="_blank" style="text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;">Ogiebooks</a>. <br />A 2nd hand book selling website made by STTSS students, for STTSS students <br />All rights reserved.</td>
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
	$mail->Host = 'smtp.yandex.ru';
	$mail->SMTPAuth = true;
	$mail->Username = 'admin@ogiebooks.gq';
	$mail->Password = 'outlook.com';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	
	$mail->From = 'admin@ogiebooks.gq';
	$mail->FromName = 'Ogiebooks';
	$mail->addAddress($to);
	$mail->addReplyTo('admin@ogiebooks.gq', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'Ogiebooks: Sign Up Verification Email';

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
											<a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">Ogiebooks</a>
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
																	<a href="http://ogiebooks.gq/confirm.php?key=$key" style="border: 3px solid #eeeeee; color: #969696; text-decoration: none; padding: 15px 45px; text-transform: uppercase; display: block; text-align: center; font-size: 16px;">Activate Account</a>
																</td>
															</tr>
                              
                         <tr>
													<td class="cta-block__content" style="padding: 20px 0 27px 0; font-size: 16px; line-height: 27px; color: #969696; text-align: center;">Just in case it doesn't work, here's the same link so you could copy and paste it into your browser. <br /><br /><a href="http://ogiebooks.gq/confirm.php?key=$key">http://ogiebooks.gq/confirm.php?key=$key</a></td>
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

																<td class="info-bullets__content" style="color: #969696; font-size: 16px;">help@ogiebooks.gq</td>
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
														<a href="#" style="font-size: 28px; text-decoration: none; color: #d5d5d5;">Ogiebooks</a>
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
													<td style="color: #d5d5d5; text-align: center; font-size: 15px; padding: 10px 0 60px 0; line-height: 22px;">Copyright &copy; 2017 <a href="http://slicejack.com/" target="_blank" style="text-decoration: none; border-bottom: 1px solid #d5d5d5; color: #d5d5d5;">Ogiebooks</a>. <br />A 2nd hand book selling website made by STTSS students, for STTSS students <br />All rights reserved.</td>
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
	$mail->Password = 'Cisco.live_com!12';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	$mail->From = 'rhytion.my@gmail.com';
	$mail->FromName = 'Ogiebooks';
	$mail->addAddress($to);
	$mail->addReplyTo('lokjianming@gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = 'Ogiebooks: Email Change Verification';
	$link = 'http://ogiebooks.gq/login/changeemail.php?email='.$to.'&key='.$key2.'&id='.$id;
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