<?php
// Turn off all error reporting
error_reporting(0);
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
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/fb.js"></script>
</head>

<body class="bg-black">

<?php 	if($_GET['action']=='ok'){
			echo "<br><br><br><h3 class='text-center'>ลงทะเบียนเสร็จสิ้น สามารถล็อกอินเข้าระบบได้ทันที</h3>";
		}
?>
		<div class="form-box" id="login-box">
            <div class="header" style="background-color:#CCCCCC"> <a href="index.php" target="_blank"><img src='img/logo.png' width="200" /></a> Sign In</div>
            <form action="./" method="post">
                <div class="body bg-gray">
                	<div  id="add_err"></div>
                    				<div class="form-group">
                        			<input type="text" id="userid" name="userid" class="form-control" placeholder="E-mail" />
                  				  </div>
                   			 		<div class="form-group">
                       				 <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                    			</div>
                    		<div class="form-group">
                                <input name="remember_me" type="checkbox" id="remember_me" value="1"/>
                              	Remember me
                    		</div>
                </div>
                <div class="footer">
                      <div class="row">
                    		<div class="col-md-6">
                    <button type="submit" class="btn bg-olive btn-block" id="login">Login</button>
                                                   </div>
                    		<div class="col-md-6">
  <button type="submit" class="btn bg-olive btn-block" id="cancle">Cancel</button>
      </div>
          </div><br />
                    <i class='glyphicon glyphicon-user'> </i><a href="register.php" class="text-center">Register a new membership</a>

        			or <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
							</fb:login-button>

                </div>
            </form>

        </div>

</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/login.js"></script>
