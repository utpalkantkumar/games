<?php
require_once("config.php");
$testclass	=	new AllTables();
$mainuserid			=	$_REQUEST['mainuserid'];	
$again_playedTime	=	$_REQUEST['again_playedTime'];
$again_playedLevel	=	$_REQUEST['again_playedLevel'];	
if($mainuserid > '')
	{
		$contactData['user_id']				=	$mainuserid;
		$contactData['played_time']		=	$again_playedTime;
		$contactData['played_level']		=	$again_playedLevel;
		$tableName1								=	'playagain_rec';
		$addrecord_contact						=	$testclass->AddInfo($contactData,$tableName1);
		if($addrecord_contact)
			{
				echo 0;	
			}
	}	
	?>