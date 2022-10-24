<?php
require_once("config.php");
$testclass	=	new AllTables();
$mainuserid_win	=	$_REQUEST['mainuserid_win'];
$playedTime_win	=	$_REQUEST['playedTime_win'];
if($mainuserid_win > '')
	{
		 
		 $contactData['user_id']				=	$mainuserid_win;
		$contactData['played_time']		=	$playedTime_win;
		$contactData['played_level']		=	'';
		$tableName1								=	'playagain_rec';
		$addrecord_contact						=	$testclass->AddInfo($contactData,$tableName1);
		if($addrecord_contact)
			{
		 
		 
		 
				  $sqlQuery="Select max(played_time) as wintime from playagain_rec where user_id='$mainuserid_win'";
				 $getWinTimeDetails	=	$testclass->getInfo('',$sqlQuery);
						$userMaxTime	=	$getWinTimeDetails[1]['wintime'];	
						if($userMaxTime > $playedTime_win)
							{
								echo '&nbsp;&nbsp;&nbsp;('.$userMaxTime.'&nbsp;Seconds )';	
							}
						//echo $userMaxTime.'|'.$playedTime_win;
			}
	}
?>