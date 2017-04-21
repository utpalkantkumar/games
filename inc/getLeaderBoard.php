<?php
require_once("config.php");
require_once("functions.php");
?>
<script type="text/javascript">
$(document).ready(function() {
$("#hideleaderboard_btn12").click(function(){
	$("#hideAllOptionButton").html('');
	$("#showAllOptionButton").show();
});
	
});
</script>
<div>
     <table width="200" border="1">
      <tr style="color:#CF3">
      <td>&nbsp;</td>
        <td>Name</td>
        <td>Time Duration</td>
       
      </tr>
      <?php 
	  $allScore	=	getleaderboard();
	  $numberofrecords	=	count($allScore);
	  
	  for($i=0;$i<$numberofrecords;$i++)
	  	{ 
		$star	=	($i==0)?'*':'';
		?>
          <tr>
          <td style="color:#00F"><a title="<?php echo date("d-M-y h:i:s a",strtotime($allScore[$i]['inserted_date']))?>">
		  <?php echo $i+1?></a></td>
            <td style="color:#F00"><a title="<?php echo date("d-M-y h:i:s a",strtotime($allScore[$i]['inserted_date']))?>"><?php echo $allScore[$i]['name'].$star?></a></td>
            <td style="color:#0F0"><a title="<?php echo date("d-M-y h:i:s a",strtotime($allScore[$i]['inserted_date']))?>"><?php echo $allScore[$i]['played_time']?></a></td>
           
          </tr>
        <?php } ?>
    </table>

 <p><a href="javascript:void(0);" class="clear_user" id="hideleaderboard_btn12">Hide Leader Board</a></p>   
     </div>