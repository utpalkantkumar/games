<?php
$TEMPLATE["PAGES"]["USERHEADER"] = <<<EOF
<html>
<style type="text/css">
<!--
.style3 {
	color: #179431;
	font-weight: bold;
}
-->
</style>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" >
<STYLE>
 .headerTop { background-color:#FFCC66; border-top:0px solid #000000; border-bottom:1px solid #FFFFFF; text-align:center; }
 .adminText { font-size:10px; color:#996600; line-height:200%; font-family:verdana; text-decoration:none; }
 .headerBar { background-color:#FFFFFF; border-top:0px solid #333333; border-bottom:10px solid #FFFFFF; }
 .title { font-size:20px; font-weight:bold; color:#CC6600; font-family:arial; line-height:110%; }
 .subTitle { font-size:11px; font-weight:normal; color:#666666; font-style:italic; font-family:arial; }
 .defaultText { font-size:12px; color:#000000; line-height:150%; font-family:trebuchet ms; }
 .footerRow { background-color:#FFFFCC; border-top:10px solid #FFFFFF; }
 .footerText { font-size:10px; color:#996600; line-height:100%; font-family:verdana; }
 a { color:#0033CC; color:#0033CC; color:#0033CC; }
</STYLE>
<table width="100%" cellpadding="10" cellspacing="0" class="backgroundTable" bgcolor='#A7D2F3' >
  <tr>
    <td valign="top" align="center"><table width="600" cellpadding="0" cellspacing="0" style="border-bottom:#666666 1px solid;">
        <tr>
          <td style="background-color:#99116B;border-top:0px solid #000000;border-bottom:1px solid #FFFFFF;text-align:center;" align="center"><span style="font-size:10px;color:#FFFFFF;line-height:200%;font-family:verdana;text-decoration:none;"></span></td>
        </tr>
        <tr>
          <td style="background-color:#FFFFFF;border-top:0px solid #333333;border-bottom:10px solid #FFFFFF;">&nbsp;&nbsp;&nbsp; </td>
        </tr>
      </table>
      <table width="600" cellpadding="20" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td bgcolor="#FFFFFF" valign="top"><p style="font-size:14px;color:#000000;line-height:125%;font-family:arial;"> Dear [username],<br>
          
          
          
              Congratulations for Successfully Playing this Game on <strong><a href="http://192.168.1.135/demogames.com/" target="_blank">demogames.com</a></strong> -  
              Your Top 10 score given below and you win nothing Top Time is 59
              <br>
			  Your Total played times=>[TOTALPLAYEDTIME]
			  
			  </p>
  
           
            </td>
        </tr>
        </table>
		<table width="200" border="1">
                  <tr>
                    <td>&nbsp;</td>
                    <td>Played Time</td>
                  </tr>
EOF;
$TEMPLATE["PAGES"]["USERBODY"] = <<<EOF
 
                  <tr>
                    <td>[COUNTER]</td>
                    <td>[PLAYEDTIME]</td>
                  </tr>
            
EOF;
$TEMPLATE["PAGES"]["USERFOOTER"] = <<<EOF
    </table>
 <table width="600" cellpadding="20" cellspacing="0" bgcolor="#FFFFFF">  
        <tr>
          <td style="background-color:#F3F3F3;valign:top; border-bottom: 10px solid #ed1b27;" ><span style="font-size:10px;color:#996600;line-height:100%;font-family:verdana;">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td align="left" valign="top"><span class="style3"><font face="Arial" size="3">For Any Queries or Assistance Please Contact :</font> [1234567892] <br>
                    </span></td>
                </tr>
                <tr>
                  <td align="left" valign="top"></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><strong><font face="Arial" color="#000000" size="2" >Email</font></strong> -<a href="mailto:[CONTACTEMAIL]" target="_blank"><u><font face="Arial" size="2" > [utpalkantsingh2@gmail.com]</font></u></a> <br></td>
                </tr>
                <tr>
                  <td colspan="3" align="left" valign="top"></td>
                </tr>
                <tr>
                  <td colspan="3" align="left" valign="top"><strong><font face="Arial" color="#000000" size="2" >Live Help : [000000]<br>
                    </font></strong></td>
                </tr>
              </tbody>
            </table>
            </span><span style="line-height:100%;">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr> </tr>
              </tbody>
            </table>
            </span></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
EOF;
?>
