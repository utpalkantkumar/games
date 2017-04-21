<?php
//require_once('config.php');
//image defined for admin
if(isset($_SERVER['HTTPS'])){
	$httpsvar = 'https';
} else {
	$httpsvar = 'http'; 
}
define('ADMIN_PATH',	$httpsvar.'://'.$_SERVER['HTTP_HOST'].'/bassbuds/admin/');//games/version2/bassbuds/admin
//define('ADMIN_PATH',	$httpsvar.'://'.$_SERVER['HTTP_HOST'].'/games/version2/bassbuds/admin/');
define('ADMIN_PATH_IMAGES',		ADMIN_PATH.'images/');
define('ACTIVE_PNG',		'<img src="'.ADMIN_PATH_IMAGES.'active.png" width="16" title="Active" alt="Active">');
define('DEACTIVE_PNG',		'<img src="'.ADMIN_PATH_IMAGES.'deactive.png" width="16" title="Deactive" alt="Deactive">');
define('EDIT_PNG',		'<img src="'.ADMIN_PATH_IMAGES.'edit.png" width="16" title="Edit" alt="Edit">');
define('DELETE_PNG',		'<img src="'.ADMIN_PATH_IMAGES.'delete.png" width="16" title="Delete" alt="Delete">');




function getRecordgames($condition)
	{
		$testclass	=	new AllTables();
		 // $sqlQuery	=	"select id,name,email_id,screen_name,usr_playedTime,usr_playedLevel,status,ip,inserted_date from users where come_from='$condition' order by inserted_date desc";
		 $sqlQuery	=	"select id,name,email_id,screen_name,usr_playedTime,usr_playedLevel,status,ip,inserted_date from users order by id desc";
		$allmobileRecords	=	$testclass->getInfo('',$sqlQuery);
		$rowcount	=	count($allmobileRecords);
		$HTML	=	'';
		//
		if($rowcount > 0)
			{
				for($i=0;$i<$rowcount;$i++)
					{	
						$counter	=	$i+1;
						$inseteddate	=	date('d - M - Y H :i :s a',strtotime($allmobileRecords[$i]['inserted_date']));				
						$HTML.='<tr>';
						/*$HTML.='<td>'.$allmobileRecords[$i]['id'].'</td>';*/
						$HTML.='<td>'.$counter.'</td>';
						$HTML.='<td>'.$allmobileRecords[$i]['name'].'</td>';
						$HTML.='<td>'.$allmobileRecords[$i]['email_id'].'</td>';
			$HTML.='<td><a href="javascript:void(0);" onclick="javascript:window.open(\'viewAllScore.php?scoreId='.$allmobileRecords[$i]['id'].'\',\'_blank\',\'width=500, height=500\')" title="See Score Details">'.$allmobileRecords[$i]['screen_name'].'</a></td>';
						
						$HTML.='<td>'.$allmobileRecords[$i]['ip'].'</td>';
						$HTML.='<td>'.$inseteddate.'</td>';
					}
			}
		else
			{
					$HTML='<tr class="gradeA even"><td colspan="7">Data Not Found</td></tr>';
			}
		return  $HTML;
	}
function getuserDetail($id)
	{
		$testclass	=	new AllTables();	
		 $sqlQuery	=	"select id,name,email_id,screen_name from users where id='$id'";
		return	$testclass->getInfo('',$sqlQuery);
		
	}
function getuserName($id)
	{
		$testclass	=	new AllTables();	
		 $sqlQuery	=	"select name, screen_name from users where id='$id'";
		$data=	$testclass->getInfo('',$sqlQuery);
		return $data[0]['name'];
		
	}
function getscoreDetail($id)
	{
		$testclass	=	new AllTables();	
		 $sqlQuery	=	"select played_time from playagain_rec where user_id='$id' order by played_time desc limit 0,10";
		return	$testclass->getInfo('',$sqlQuery);
		
	}
function getleaderboard()
	{
		$testclass	=	new AllTables();	
		   //$sqlQuery	=	"select a.name,a.inserted_date,b.user_id,b.played_time from users a inner join playagain_rec b on a.id=b.user_id group by(b.user_id)order by played_time desc limit 0,10";
		   
		  $sqlQuery	=	" SELECT user_id,played_time,name,inserted_date FROM playagain_rec a inner join users b on a.user_id=b.id order by played_time desc limit 0,10";
		return	$testclass->getInfo('',$sqlQuery);
		
	}
function counttotalnumberofplay($id)
	{
		$testclass	=	new AllTables();	
		 $sqlQuery	=	"select played_time from playagain_rec where user_id='$id'";
		return	count($testclass->getInfo('',$sqlQuery));
		
	}
	
	
?>