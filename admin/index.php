<?php
require_once('../inc/config.php'); 
require_once('../inc/functions.php');

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
<title>Games Admin</title>
<div class="come_from">Games Admin</div>
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
                <th class="head0" rowspan="1" colspan="1" style="width: 200px;">Name</th>
				<th class="head0" rowspan="1" colspan="1" style="width: 200px;">Email Id</th>
                 <th class="head0" rowspan="1" colspan="1" style="width: 150px;">Screen Name</th>
                <th class="head0" rowspan="1" colspan="1" style="width: 100px;">IP</th>
                <th class="head0" rowspan="1" colspan="1" style="width: 100px;">Insert Date</th>
				<th class="head0" rowspan="1" colspan="1" style="width: 100px;">&nbsp </th>
			</tr>
		</thead>
        
        
         
		<tfoot>
			<tr border="2">
				<th class="head0" rowspan="1" colspan="1" style="width: 5px;">&nbsp;</th>
                <th class="head0" rowspan="1" colspan="1" style="width: 200px;">Name</th>
				<th class="head0" rowspan="1" colspan="1" style="width: 200px;">Email id</th>
                 <th class="head0" rowspan="1" colspan="1" style="width: 150px;">Screen Name</th>
                 <th class="head0" rowspan="1" colspan="1" style="width: 100px;">IP</th>
                <th class="head0" rowspan="1" colspan="1" style="width: 100px;">Insert Date</th>
                <th class="head0" rowspan="1" colspan="1" style="width: 100px;">&nbsp </th>
			</tr>

		</tfoot>
		
		<tbody id="loaddata" border="2">
			<?php echo getRecordgames('web');?>
		</tbody>
	</table>
    </div>