<?php
	include('config/config.php');

	require 'sdk/facebook.php';

	$facebook = new Facebook(array(
	  'appId'  => '151039862155464',
	  'secret' => '209d2c488a98ad264d46c303a7af1587',
	));

	$user = $facebook->getUser();
	if ($user) {
		$test='test';
	  try {
	    $user_profile = $facebook->api('/me');
	  } catch (FacebookApiException $e) {
	    error_log($e);
	    $user = null;
	  }
	}

	$sql ="  INSERT INTO  tb_user (firstname,lastname,facebook,cf_userlevel,permit,update_time)
		VALUES
		('".$test."',
		'(FB)',
		'".trim($user_profile["id"])."',
		'1',
		'1',
		'".trim(date("Y-m-d H:i:s"))."')";
	$result=mysqli_query($connect,$sql);

// Get User ID


if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

if (0) {
	if(1)
	{
		$sql="select * from tb_user where `facebook` = ".$user_profile["id"];
		$result=mysqli_query($connect,$sql);
		$nRow=mysqli_num_rows($result);
		if(1){
				$sql ="  INSERT INTO  tb_user (firstname,lastname,facebook,cf_userlevel,permit,update_time)
					VALUES
					('".trim($user_profile["name"])."',
					'(FB)',
					'".trim($user_profile["id"])."',
					'1',
					'1',
					'".trim(date("Y-m-d H:i:s"))."')";
				$result=mysqli_query($connect,$sql);
		}
	}
		$sql="select * from tb_user where facebook = ".$user_profile["id"];
		$sql=$sql . " and permit ='1' ";
		$result=mysqli_query($connect,$sql);
		$nRow=mysqli_num_rows($result);
		if($nRow !=0){
				$row=mysqli_fetch_array($result);
				$_SESSION["DUR_USER_ID"]=$row["iduser"];
				$_SESSION["DUR_USER_NAME"]=$row["firstname"]." ".$row["lastname"];
				$_SESSION["DUR_USER_FACEBOOK"]=$row["facebook"];
				$_SESSION["DUR_USER_PICTURE"]=$row["picture"];
				$_SESSION["DUR_USER_STATE"]=$cf_userlevel[$row["cf_userlevel"]];
				$_SESSION["DUR_USER_TIME"]=$row["update_time"];
		}
		mysqli_close($connect);
  	header("location:index.php");
}

if($_GET["Action"] == "Logout")
{
	$facebook->destroySession();
	header("location:index.php");
	exit();
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="bg-black">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $PageTitle ?></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-black">
	<script>
	  function statusChangeCallback(response) {
	    if (response.status === 'connected') {
	      testAPI();
	    } else {
	      document.getElementById('status').innerHTML = 'Please log ' +'into this app.';
	    }
	  }

	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	  window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '1496188763803694',
		    cookie     : true,  // enable cookies to allow the server to access
		                        // the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.8' // use graph api version 2.8
		  });
		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });
	  };

	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));

	  function testAPI() {
	    console.log('Welcome!  Fetching your information.... ');
	    FB.api('/me', function(response) {
	      console.log('Successful login for: ' + response.name);
	      document.getElementById('status').innerHTML =
	        'Thanks for logging in, ' + response.name + '!'+response.id;
	    });
	  }
	</script>

	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>

	<div id="status">
	</div>

<?php 	if($_GET['action']=='ok'){
			echo "<br><br><br><h3 class='text-center'>ลงทะเบียนเสร็จสิ้น สามารถล็อกอินเข้าระบบได้ทันที</h3>";
		}
?>
		<div class="form-box" id="login-box">
            <div class="header" style="background-color:#CCCCCC"> <a href="http://nsp.uru.ac.th/" target="_blank"><img src='images/logo2.png' width="200" /></a> Sign In</div>
            <form action="./" method="post">
                <div class="body bg-gray">
                	<div  id="add_err"></div>
                    				<div class="form-group">
                        			<input type="text" id="userid" name="userid" class="form-control" placeholder="User ID"  value="demo"/>
                  				  </div>
                   			 		<div class="form-group">
                       				 <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="demo"/>
                    			</div>
                    		<div class="form-group">
                                <input name="remember_me" type="checkbox" id="remember_me" value="1"/>
                              	Remember me
                    		</div>
                </div>
                <div class="footer">
                      <div class="row">
                    		<div class="col-md-6">
                    <button type="submit" class="btn bg-olive btn-block" id="login">Sign me in</button>
                                                   </div>
                    		<div class="col-md-6">
  <button type="submit" class="btn bg-olive btn-block" id="cancle">Cancel</button>
      </div>
          </div><br />
                    <i class='glyphicon glyphicon-user'> </i><a href="register.php" class="text-center">Register a new membership</a>
                    <br />
        			<i class="fa fa-facebook"> </i><a href="<?php echo $loginUrl; ?>"> Login with <div class='label label-primary'>FACEBOOK</div></a>

                </div>
            </form>

        </div>

</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/login.js"></script>
