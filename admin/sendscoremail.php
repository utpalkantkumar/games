<?php
require_once("../inc/config.php");
require_once('../inc/functions.php');
require_once("mail_temps/onresendingscore.php");
$userid=$_POST['userid'];
$userdetails	=	getuserDetail($userid);
$totalplayedTimes	=	counttotalnumberofplay($userid);

$scoredetails	=	getscoreDetail($userid);
$numbrsOfDetails	=	count($scoredetails);

						if($numbrsOfDetails>0)
		
								{
		
									//for email sending		
										$contactnumber	=	'1234567892';
										$contactmail	  =	'utpalkantsingh@gmail.com';
										 $to		       =    $userdetails[0]['email_id'];
										$usertempname	 =  $userdetails[0]['screen_name'];
										$subject = "Your score on demosgames.com";
										
										$replace = array("[CONTACTNUMBER]"=>$contactnumber,"[CONTACTEMAIL]"=>$contactmail,"[username]" => $usertempname,"[TOTALPLAYEDTIME]"=>$totalplayedTimes);
										$emailHeader =  strtr($TEMPLATE["PAGES"]["USERHEADER"],$replace);
										
										$emailBody='';
										for($i=0;$i<$numbrsOfDetails;$i++)
											{
												
												$contactnumber=$i+1;
												$contactmail	=$scoredetails[$i]['played_time'];	
												$replace1 = array("[COUNTER]"=>$contactnumber,"[PLAYEDTIME]"=>$contactmail);
												$emailBody  .=  strtr($TEMPLATE["PAGES"]["USERBODY"],$replace1);
											}
										
										$replace2 = array("[COUNTER]"=>$contactnumber,"[PLAYEDTIME]"=>$contactmail);
										$emailfooter =  strtr($TEMPLATE["PAGES"]["USERFOOTER"],$replace2);
										
										
										 $message = $emailHeader.$emailBody.$emailfooter;
										// echo '<br>'.$message = 'how are you</br>';
										$headers  = 'MIME-Version: 1.0' . "\n";
										 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
										if(mail($to, $subject, $message, $headers));
											{
												$success = "true";
												echo 0;
						
											}
											
										
										
							}
						
?>