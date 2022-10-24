<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Games" content="width=device-width, initial-scale=1" />
<title>Games</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/common.css" type="text/css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<script type="text/javascript" src="js/processingdemo.js"></script>
<script>
	$(document).ready(function(e) {
		
		$("#txtusername").keyup(function(){
			var username=$(this).val();
			console.log(username);
			$("#txtscreenname").val(username.substr(0, 6));
			
		});
		
		
       // $.fn.placeholder();
		<?php if(isset($_COOKIE["user_screen_name"]))
				{ ?>
					//alert("hi");
						
						var mainuserid_win	=	$("#currentuserid").val();
						var playedTime_win		=	$("#playedTime").val();
							$.post("inc/winningTime.php", {'mainuserid_win':mainuserid_win,'playedTime_win':playedTime_win}, function (data) 
							{
								//alert(data);
								$("#userWinStatus").html(data);
								});
		
						$(".playagain").show();
						$("#register_form").hide();
						$("#user_firsttime_name").hide();
						$("#hide_first_time").show();				
				<?php } 
				else { ?>
				//alert("hello");
				
				var chk_frst_playedTime = $("#playedTime").val();
				//alert(chk_frst_playedTime);
				if(chk_frst_playedTime <= 0)
					{
						window.location.href="index.html";
					}
				else
					{
						$(".playagain").hide();
						$("#register_form").show();
						$("#user_firsttime_name").show();
						$("#hide_first_time").hide();
					}
					<?php } ?>
		$("#submitform").click(function(){
			$(".error_class").html('');
			datavalidation_save();
		
		});
	$("#game_regis_form").on('keyup',function(e){	
	
		if(e.keyCode==13)
			{
				$(".error_class").html('');
				datavalidation_save();			
			}
	});
	
		
function datavalidation_save()
	{
		//alert('function call');
		var playedTime		=	$("#playedTime").val();
		var playedLevel		=	'';/*$("#playedLevel").val();*/
		var come_from		=	$("#come_from").val();
		var txtusername		=	$("#txtusername").val();	
		var txtemailaddress	=	$("#txtemailaddress").val();	
		var txtscreenname	=	$("#txtscreenname").val();
		//set user screen name first time
		$("#user_firsttime_name").html(txtscreenname);
		
		
		var txtscreenname_len	=	$("#txtscreenname").val().length;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
		if(txtusername=='')
			{
				$(".error_class").html('enter your name');
				return false;	
			}
		else if(txtemailaddress=='')
			{
				$(".error_class").html('enter your email id');
				return false;	
			}
		else if (!filter.test(txtemailaddress))
			{
				$(".error_class").html('enter your valid email id');
				return false;
			}
		else if(txtscreenname=='')
			{
				$(".error_class").html('enter your screen name');
				return false;	
			}
		else if(txtscreenname_len > 6)
			{
				$(".error_class").html('screen name only up to 6 characters');
				return false;
			}
		else
			{
								$.post("inc/saveLoginDate.php", {'txtusername':txtusername,'txtemailaddress':txtemailaddress,'txtscreenname':txtscreenname,'playedTime':playedTime,'playedLevel':playedLevel,'come_from':come_from}, function (data) 
				{
					//alert(data);
					var recivedData	=	data.split('|');
					var status	=	recivedData[0];
					var userId	=	recivedData[1];	
					//alert(userId);
					if(status==0)
						{
							$("#thankYouMsg").html('Thank You');
							$("#register_form").hide();
							$(".playagain").show();
							$("#currentuserid").val(userId);//first time set user id
							document.cookie="user_id="+userId;
							document.cookie="user_screen_name="+txtscreenname;
						}
					else
						{
							return false;	
						}
				});
			}			
		
		
		
	}
	$("#playagain_btn").click(function(){
		
		/*var mainuserid	=	$("#currentuserid").val();
		var again_playedTime		=	$("#playedTime").val();
		var again_playedLevel		=	$("#playedLevel").val();
		//alert(mainuserid);
		$.post("inc/palyAgainSaveData.php", {'mainuserid':mainuserid,'again_playedTime':again_playedTime,'again_playedLevel':again_playedLevel}, function (data) 
				{
					//alert(data);
				var bcakfilename	=	$("#bcakfilename").val();
				window.location.href = bcakfilename;	
		
		
				});*/
		
		var bcakfilename	=	$("#bcakfilename").val();
		window.location.href = bcakfilename;	
	});
	
	});
	
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#clearuser_btn12").click(function(){
		document.cookie = 'user_screen_name' + 
    '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
	
	//Session.abondon();
	document.cookie = 'user_id' + 
    '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
	
		var bcakfilename	=	$("#bcakfilename").val();
		window.location.href = bcakfilename;
		
	});
$("#leaderboard_btn12").click(function(){
	$.blockUI({ message: '<h5>Please Wait result in preparing ...</h5>' });
	$("#showAllOptionButton").hide();
	$.post("inc/getLeaderBoard.php", {'sendstatus':'0'}, function (data) 
				{
				   $.unblockUI();
				   $("#hideAllOptionButton").html(data);	
				});
	
});
$("#hideleaderboard_btn12").click(function(){
	//alert('fff');
	$("#hideAllOptionButton").html('');
	$("#showAllOptionButton").show();
});
	
});
</script>
<script type="text/javascript">
function countChar(val){
     var len = val.value.length;
	if (len >= 6) {
              val.value = val.value.substring(0, 6);
     } 
}
</script>
<style >
.error_class{ font-size:18px; color:#F00;}
#thankYouMsg{font-size:30px; color:#6F0;}

/* clear button*/
</style>
<style type="text/css">
.clear_user {
	-moz-box-shadow:inset 1px 0px 5px -1px #ffffff;
	-webkit-box-shadow:inset 1px 0px 5px -1px #ffffff;
	box-shadow:inset 1px 0px 5px -1px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #15eb0e), color-stop(1, #dedede) );
	background:-moz-linear-gradient( center top, #15eb0e 5%, #dedede 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#15eb0e', endColorstr='#dedede');
	background-color:#15eb0e;
	-webkit-border-top-left-radius:12px;
	-moz-border-radius-topleft:12px;
	border-top-left-radius:12px;
	-webkit-border-top-right-radius:12px;
	-moz-border-radius-topright:12px;
	border-top-right-radius:12px;
	-webkit-border-bottom-right-radius:12px;
	-moz-border-radius-bottomright:12px;
	border-bottom-right-radius:12px;
	-webkit-border-bottom-left-radius:12px;
	-moz-border-radius-bottomleft:12px;
	border-bottom-left-radius:12px;
	text-indent:-5.55px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:Trebuchet MS;
	font-size:21px;
	font-weight:bold;
	font-style:normal;
	height:45px;
	line-height:45px;
	width:174px;
	text-decoration:none;
	text-align:center;
	text-shadow:-4px 3px 35px #ffffff;
}
.clear_user:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dedede), color-stop(1, #15eb0e) );
	background:-moz-linear-gradient( center top, #dedede 5%, #15eb0e 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dedede', endColorstr='#15eb0e');
	background-color:#dedede;
}.clear_user:active {
	position:relative;
	top:1px;
}</style>
</head>
<?php
$pagename		=	$_POST['bcakfilename'];
$playedTime		=	$_POST['playedTime'];
/*if(isset($_SESSION["user_payed_time"]))
	{
		console.log($_SESSION["user_payed_time"]);
		if(	$playedTime < $_SESSION["user_payed_time"])
			{
				$_SESSION["user_payed_time"]=	$playedTime;
				$displayplayedtime	=	$_SESSION["user_payed_time"].'<span>Seconds</span>';
			}
		else
			{
				$displayplayedtime	=	'Time Not Consider';
			}
	}
else
	{
		session_start();
		$_SESSION['user_payed_time']	= $playedTime;	
		//setcookie("user_payed_time",$playedTime );
		//$displayplayedtime	=	$playedTime.'<span>Seconds</span>';
		//
		$displayplayedtime	=	$playedTime.'<span>Seconds</span>';			
	}
*/
$playedLevel	=	$_POST['playedLevel'];
$come_from		=	$_POST['come_from'];

?>
<body>

<form>
		<input type="hidden" name="bcakfilename" id="bcakfilename" value="<?php echo $pagename; ?>" />
    	 <input type="hidden" name="playedTime" id="playedTime" value="<?php echo $playedTime; ?>" />
        <input type="hidden" name="playedLevel" id="playedLevel" value="<?php echo $playedLevel; ?>" />
        <input type="hidden" name="come_from" id="come_from" value="<?php echo $come_from; ?>" />
        <?php 
			if(isset($_COOKIE["user_id"]))
				{ ?>
        		<input type="hidden" name="currentuserid" id="currentuserid" value="<?php echo $_COOKIE["user_id"]; ?>" />
				<?php } 
				else
					{?>
  				<input type="hidden" name="currentuserid" id="currentuserid"  />
                	<?php } ?>
     </form>
<?php //if(isset($_COOKIE["user_screen_name"]))
	//{ ?>
    
<div class="wrap_game" id="register_form" align="right">
  <div class="bgcolor register">
    <div> 
      <!--div class="small_logo"><img src="images/small_logo.png" /></div> -->
      <div class="text_center logo_div">
        
        <h1 class="white">REGISTER SCORE</h1>
        <div class="clear"></div>
      </div>
    </div>
    <div class="padd">
      <p class="white">To Start the game, you required to enter your name. </p>
         <span class="error_class"></span>
      <form name="game_regis_form" id="game_regis_form" method="post">
      	<br />
        <input class="marb10" type="text" placeholder="Name" name="txtusername" id="txtusername" />
        <br />
        <input class="marb10" type="text" value="test@gmail.com" placeholder="Email Address" name="txtemailaddress" id="txtemailaddress" />
        <br />
        <input class="marb10" type="text" placeholder="Screen Name (up to 6 characters)" name="txtscreenname" id="txtscreenname" onkeyup="return countChar(txtscreenname);" />
        <br />
        <a class="redbt mart18 f25 white w172 padtb5" 
		href="javascript:void(0);" id="submitform">Register</a>
      </form>
    </div>
  </div>
  
</div>
	<?php // } 
	//else{?>
<div class="wrap_game playagain">
	<div id="showAllOptionButton">
  		<div class="bgcolor register">
  <span id="thankYouMsg"></span>
  
    <div> 
      <!--div class="small_logo"><img src="images/small_logo.png" /></div> -->
      <div class="text_center logo_div">
       
        <h1 class="white">Well Done <span id="hide_first_time"><?php echo $_COOKIE["user_screen_name"] ;?></span><span id="user_firsttime_name"></span></h1>
        <div class="clear"></div>
      </div>
    </div>
    <div class="padd">
    	
    
    
      <p class="white white1">You beat your highest score with a time of<span id="userWinStatus"></span></p>
      <p class="seconds_final"><?php echo $playedTime; ?><span>Seconds</span><br />
</p>
      <p><a href="javascript:void(0);" id="playagain_btn"><img src="images/btn_palyagain.png" width="174" height="43" /></a></p>
      <p><a href="javascript:void(0);" class="clear_user" id="clearuser_btn12">Clear User</a></p>
      <p><a href="javascript:void(0);" class="clear_user" id="leaderboard_btn12">Leader Board</a></p>
	  

      </div>
     </div>
 	 </div> 
     <div id="hideAllOptionButton"></div>  
</div>

<?php //} ?>

<div class="footer">
  <ul>
    <li>Copyright</li>
    <li>|</li>
    <li><a href="javascript:void(0);">Terms &amp; Conditions</a></li>
  </ul>
</div>
</body>
</html>
