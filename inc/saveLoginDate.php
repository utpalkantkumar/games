<?php
//session_start();
require_once("config.php");
$testclass	=	new AllTables();
$txtusername		=	$_REQUEST['txtusername'];
$txtemailaddress	=	$_REQUEST['txtemailaddress'];
$txtscreenname		=	$_REQUEST['txtscreenname'];
//$bcakfilename		=	$_REQUEST['bcakfilename'];
$playedTime			=	$_REQUEST['playedTime'];
$playedLevel		=	$_REQUEST['playedLevel'];
$come_from			=	$_REQUEST['come_from'];
if($txtemailaddress >'')
	{		
		$contactData['name']			=	$txtusername;
		$contactData['email_id']		=	$txtemailaddress;
		$contactData['screen_name']		=	$txtscreenname;
		$contactData['usr_playedTime']	=	$playedTime;
		$contactData['usr_playedLevel']	=	$playedLevel;
		$contactData['come_from']		=	$come_from;
		$contactData['ip']				=	$_SERVER["REMOTE_ADDR"];
		$contactData['inserted_date']	=	date("Y-m-d h:i:s");
		$contactData['status']			=	1;
		$tableName						=	'users';
		$addrecord_contact				=	$testclass->AddInfo($contactData,$tableName);
		
		
		if($addrecord_contact)
			{
				
				 $sqlQuery="Select id from users where email_id='$txtemailaddress' order by id desc limit 0,1";
				$getuserDetails	=	$testclass->getInfo('',$sqlQuery);
				//print_r($getuserDetails);
				$userId	=	$getuserDetails[1]['id'];
				
				
				//add record in playng rec
				$playedData['user_id']				  =	$userId;
				$playedData['played_time']			  =	$playedTime;
				//$contactData['played_level']			=	$playedLevel;
				$tableName1							 =	'playagain_rec';
				$addrecord_contact					  =	$testclass->AddInfo($playedData,$tableName1);
				
				echo '0'.'|'.$userId;			
			}
		else 
			{
				echo 1;	
			}
	}

	

?>