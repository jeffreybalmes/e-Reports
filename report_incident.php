 <?php  

require 'phpmailer/PHPMailerAutoload.php';

$to = $_POST['to'];  
$cc = $_POST['cc'];  
$subject = $_POST['subject'];  
$report_type = $_POST['report_type'];  
$attachment = $_POST['attachment'];  

$mail = new PHPMailer;

$conn=odbc_connect('php_access','','');
if (!$conn){
	exit("Connection Failed: " . $conn);
}

$mail->Body = '<table width="100%" border="0" cellspacing="0" cellpadding="0"> 
			 	 <tr>
					<td align="left" style="padding:5px 5px 35px 5px;">
						<span style="color: #1f497d; font-size:14px; padding: 5px 5px 10px 0px;">Good day Sir,</span> <br /><br />
						<span style="color: #1f497d; font-size:14px;">For your information and reference, please.</span>
					</td>
			 	 </tr>
				 <tr> 
					 <td> 
';

if (isset($_POST['id'])) {
	$idArr = $_POST['id'];
	foreach ($idArr as $id) {
		$sql="SELECT TOP 10 * FROM tblReport WHERE id LIKE '$id' ORDER BY id DESC";
		$rs=odbc_exec($conn,$sql);
		if (!$rs) {
			exit("Error in SQL");
		}

	 	while (odbc_fetch_row($rs)){

			$company=odbc_result($rs,"company");
			$dat=odbc_result($rs,"dat");
			$time=odbc_result($rs,"time");
			$facility=odbc_result($rs,"facility");
			$location=odbc_result($rs,"location");
			$regard=odbc_result($rs,"regard");
			$id=odbc_result($rs,"id");
			$sender=odbc_result($rs,"sender");
			$msgDat=odbc_result($rs,"msgDat");
			$msgTime=odbc_result($rs,"msgTime");
			$remarks=odbc_result($rs,"remarks");
			$action=odbc_result($rs,"action");

			$l = range('B','Y');

			for ($i=0; $i < $attachment; $i++) { 
			  ${'img'.$l[$i]} = ltrim(odbc_result($rs, 'img'.$l[$i]), 'C:\Journal\Pictures\\');
				  ${'cid'.$l[$i]} = rtrim(${'img'.$l[$i]}, '.jpg');
				  ${'path'.$l[$i]} = '..\Pictures\\'.${'img'.$l[$i]};

				  if (odbc_result($rs, 'img'.$l[$i]) !== '') {
				  	  $mail->addEmbeddedImage(${'path'.$l[$i]}, ${'cid'.$l[$i]}, ${'img'.$l[$i]});  
				  } 
			}


			$mail->Body .='
			<table align="center" width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse; border: 1px solid #cccccc;">
			        <tr>
			          <td bgcolor="#b3b5b5" style="padding: 15px 15px 15px 15px;">
			          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			              <tr>
			                <td align="left" width="70%" style="color:#ffffff; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
			                	<span style="font-size:18px">'.$facility.'</span><br />
			                	'.$location.'
			                </td>
			                <td align="right" width="30%" style="color:#ffffff; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
			                    '.$company.'<br />
			                     &nbsp;
			                </td>
			              </tr>
			            </table>
			          </td>
			        </tr>
			        <tr>
			          <td bgcolor="#ffffff" align="center">
			          <img src="cid:'.$cidB.'" width="637" height="360" alt="no_photo" />
			          </td>
			        </tr>
			        <tr>
			          <td align="left" bgcolor="#ffffff" style="padding:15px 15px 15px 15px; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
			          	<span style="font-size:22px;">'.$regard.'</span><br />
			           <span style="color: #929494;"> Reported by '.$sender.' | '.$msgDat.' '.$msgTime.'</span>
			           </td>
			        </tr>

			         <tr>
			          <td bgcolor="#ffffff" style="padding: 5px 15px 15px 15px;">
			          	<pre style="white-space: pre-wrap; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;">'.$remarks.'</pre>
			          </td>
			        </tr>
					
			         <tr>
			          <td bgcolor="#ffffff" style="padding: 15px 15px 15px 15px;">
			          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			              <tr>
			              	<td bgcolor="#929494" align="left" width="14%" style="padding:5px 5px 5px 5px; color:#ffffff; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
			                	Action Taken:
			                </td>
				           <td align="right" width="86%" style="padding:5px 5px 5px 5px; font-family: Arial, sans-serif; font-size: 11px; line-height: 20px; color:#333333">&nbsp;</td> 
			              </tr>
			            </table>
			          </td>
			        </tr>

			         <tr>
			           <td bgcolor="#ffffff" style="padding: 5px 15px 15px 15px;">
			          	 <pre style="white-space: pre-wrap; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;">'.$action.'</pre>
			           </td>
			         </tr>

			         <tr>
			          <td bgcolor="#ffffff" style="padding: 15px 15px 15px 15px;">
			          	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			              <tr>';

			              	if ($attachment == 1) {
			              		$mail->Body .= '<td align="left" width="14%" style="padding:5px 5px 5px 5px; color:#ffffff; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
			                </td>';
			              	} else {
			              		$mail->Body .= '<td bgcolor="#d2272a" align="left" width="14%" style="padding:5px 5px 5px 5px; color:#ffffff; font-family: Arial, sans-serif; font-size: 12px; line-height: 20px;">
			                	Pictures:
			                </td>';
			              	}

			$mail->Body .= '<td align="right" width="86%" style="padding:5px 5px 5px 5px; font-family: Arial, sans-serif; font-size: 11px; line-height: 20px; color:#929494">
			                	-Ref# '.$id.'
			                </td>
			              </tr>
			            </table>
			          </td>
			        </tr>
			        <tr>
			          <td bgcolor="#ffffff" style="padding: 0px 15px 15px 15px;">
			          	<table width="100%" border="0" cellspacing="0" cellpadding="0">

						  <tr>';
						  	$x = 0;
							for ($i=1; $i < $attachment; $i++) { 
								if ($x % 3 == 0) {
									if (${'cid'.$l[$i]} !== '') {
										$mail->Body .= '
							                <tr><td width="260" valign="top">
							                	<img src="cid:'.${'cid'.$l[$i]}.'" width="200" height="136" style="display: block;" alt="no_image" />
							                </td>
							                <td style="font-size: 0; line-height: 0;" width="20">&nbsp; </td>
						                ';
									} else {
										$mail->Body .= '<tr>';
									}
								} else {
									if (${'cid'.$l[$i]} !== '') {
										$mail->Body .= '
							                <td width="260" valign="top">
							                	<img src="cid:'.${'cid'.$l[$i]}.'" width="200" height="136" style="display: block;" alt="no_image" />
							                </td>
							                <td style="font-size: 0; line-height: 0;" width="20">&nbsp; </td>
						                ';
									} else {
										$mail->Body .= '';
									}
								}
								$x++;
							}

			$mail->Body .= '</tr>
			            </table>
			           </td>
			        </tr>
			        <tr>
			          <td bgcolor="#929494">&nbsp;</td>
			        </tr>
			</table>
			    
			';
	 	}
	}
}

$mail->Body .= '</td>
		 </tr> 
		 <tr>
			<td align="left" style="padding: 35px 5px 5px 5px; ">
				<span style="font-size:15px; color: #1f497d; padding: 5px 5px 10px 0px;">Thank you,</span> <br /><br /><br />
				<span style="font-size:12px; color: #1f497d;">BATANGAS SECURITY</span> <br />
				<span style="font-size:10px; color: #1f497d;">&#8962; PLDT Batangas Exchange, Noble St., Batangas City</span><br />
				<span style="font-size:10px; color: #1f497d;">&#9990; (043) 723-1600</span><br />
				<span style="font-size:10px; color: #1f497d;">&#9993; slapdsecurityadmin3@pldt.com.ph</span><br />
			</td>
	 	 </tr>
	 </table>
';


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = '';   // username
$mail->Password = '';  // password
$mail->SMTPSecure = 'tls';
$mail->CharSet = 'UTF-8';
$mail->Port = 587;
$mail->setFrom(''); //from
$mail->addAddress($to);
$mail->addCC($cc);
$mail->isHTML(true);
$mail->Subject = $subject;

if(!$mail->send()) {
 echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo 'Message has been sent';
}

?>
   
