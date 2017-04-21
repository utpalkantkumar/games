<?php
require_once('../inc/config.php'); 
require_once('../inc/functions.php');
$userid	=	$_GET['scoreId'];
$userdetails	=	getuserDetail($userid);
$totalplayedTimes	=	counttotalnumberofplay($userid);
$scoredetails	=	getscoreDetail($userid);
 $numbrsOfDetails	=	count($scoredetails);	
?>
<style>
table,td,th
{
border:1px solid black;
text-align: center;
vertical-align: middle;
}
table
{
width:100%;
}
th
{
height:50px;
text-align: center;
vertical-align: middle;
}
.maincontent{ margin:20px;}
.come_from{text-align:center; font-size:30px; color:#FCC;}
</style>

<script src="http://localhost/demogames.com/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://localhost/demogames.com/js/processingdemo.js"></script>
<script type="text/javascript">
$(document).ready(function() {


	
});
function sendmail()
	{
		$.blockUI({ message: '<h1>Please Wait Mail in sending ...</h1>' });
		var userid=$("#scoreid").val();
					//alert(for_got_emailid);
					$.post("sendscoremail.php", {'userid':userid}, function (data) 
						{
							//alert(data);
							if(data==0)
								{
									alert('Mail send sucess fully');
									$.unblockUI();
									window.close();
								}
							else
								{
									alert('Mail sending in error');	
								}
						});
	}
</script>

<div class="come_from"><?php echo $userdetails[0]['screen_name']?>,
&nbsp;Total Played Time <?php echo $totalplayedTimes?>
<form>
<input type="hidden" id="scoreid" name="scoreid" value="<?php echo $userid?>" />

</form>

</div>
<div class="maincontent">
<table width="100%" cellspacing="0" cellpadding="0" border="0" id="dyntable" border="2">
		<colgroup>
			<col class="con0">
			<col class="con1">
			<col class="con0">
			<col class="con1">
			<col class="con0">
		</colgroup>
		<thead>
			<tr border="2">
				<th class="head0" rowspan="1" colspan="1" style="width: 5px;">&nbsp;</th>
                <th class="head0" rowspan="1" colspan="1" style="width: 200px;">Played Time</th>
				
				
			</tr>
		</thead>
        
        
         
		<tfoot>
			<tr border="2">
				
                <th colspan="2"><a href="javascript:void(0);" onclick="sendmail()">Send mail</a></th>
				
			</tr>

		</tfoot>
		
		<tbody id="loaddata" border="2">
			<?php
			if($scoredetails)
				{
					for($i=0;$i<$numbrsOfDetails;$i++)
						{ ?>
						<tr>
						<td><?php echo $i+1?></td>
						<td><?php echo $scoredetails[$i]['played_time']?></td>
						</tr>
				
						<?php } 
						}
				?>
		</tbody>
	</table>
    </div>