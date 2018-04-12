<?php
	session_start();

	require("conection/connect.php");

	$msg="Welcome to CMS!";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];

		$sql=mysql_query("SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd'

							");

		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
					if($row['type']=='creator')
						header("location: everyone.php");
					//	$msg="Welcome,Admin";
					else if($row['type']=='visitor')
						header("location: everyone1.php");

			}

			else
					$msg="Invalid login authentication, try again!";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>RCOE | CMS</title>
</head>

<body>
	<div class="container">
		<div>
	<a href="rcoe.php"	><img src="images\img212.png" alt="RCOE" align="center"></a>
	</div>
    	<div class="container2">
    		<div class="h1_pos">
    			<h3 id="hello"><b>Hello,User!</b></h3>
					<h1><b>Login</b></h1>
    		</div><br><br><br>
    		<form method="post">
                    <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here" /><br>
                    <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter username here" /><br>
    								<input type="submit" href="#" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
    		<div class="about_pos">
                    <a href="AboutManagement.php" style="text-decoration:none; color: silver">About management</a>
    		</div>
    		</form>
    	</div>
    </div>
		<br><br><br><br><br><br><br><br><br><br><br>&nbsp;
        <h2 style="color: #3a28a5; text-align: center;">
            <?php echo $msg; ?>
        </h2>
</body>
</html>
