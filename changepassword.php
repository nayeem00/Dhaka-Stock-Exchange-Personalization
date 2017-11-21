<?php
session_start();
if(isset($_SESSION['email']))
{
	$userEmail=$_SESSION['email'];
	include"config.php";
	$msg="";
	$attempt=0;
	$bool=0;
	$result = mysqli_query($con,"SELECT Password FROM user where Email='$userEmail'");
	if(isset($_POST['submit'])) 
	{
		$res = mysqli_fetch_array($result); 		
		if($res['Password']== $_POST['currentPassword'])	
		{
			if($_POST['newPassword']==$_POST['reNewPassword'])
			{
				$newPassword=$_POST['newPassword'];
				$result = mysqli_query($con,"UPDATE user SET Password='$newPassword' WHERE Email='$userEmail'");
				$msg="Password Changed Successfully";
				$bool=1;
			}
			else
			{
				$msg="Password does not match the confirm password";
				$bool=0;
			}
		}
		else
		{
			$msg="Wrong Current Password";
			$bool=0;
		}	
		
		$attempt++;
	}
}
else
{
	header('location:login.php');
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Dashboard | DSE Application</title>
</head>
<body>
<!-- Dropdown Structure -->
<!-- Dropdown Structure -->
<ul id="dropdownAccount" class="dropdown-content">
  <li><a href="changepassword.php">Change Password</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<ul id="dropdownAccountMobile" class="dropdown-content">
  <li><a href="changepassword.php">Change Password</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
	<nav>
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo">&nbsp;Dashboard</a>
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="dashboard.php">Portfolio</a></li>
	        <!-- Dropdown Trigger -->
	      	<li><a class="dropdown-button" href="#" data-activates=dropdownAccount>Account<i class="material-icons right">arrow_drop_down</i></a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
	        <li><a href="dashboard.php">Portfolio</a></li>
	        <!-- Dropdown Trigger -->
	      	<li><a class="dropdown-button" href="#" data-activates="dropdownAccountMobile">Account<i class="material-icons right">arrow_drop_down</i></a></li>
	      </ul>
	      <script>
	      	$( document ).ready(function(){})
	      	$(".button-collapse").sideNav();
	      </script>      
	    </div>
	</nav>
</div>
	<div class="container">
		<div id="content" align="center">
			<div class="row">
				<div class="col s12 m12 l12">
					<h2 style="text-align: center;">DSE Application</h2><br>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m3 l3">
					&nbsp;
				</div>
				<div class="col s12 m6 l6">
					<div class="row">
						<h5 style="text-align: center;">Change Password</h5>
						<br>
					</div>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="input-field row">	
      						<input id="currentPassword" type="password" name="currentPassword" class="validate" required>
      						<label for="currentPassword">Current Password</label>
						</div>
						<div class="input-field row">	
      						<input id="newPassword" type="password" name="newPassword" class="validate" required>
      						<label for="newPassword">New Password</label>
						</div>	
						<div class="input-field row">	
      						<input id="reNewPassword" type="password" name="reNewPassword" class="validate" required>
      						<label for="reNewPassword">Confirm New Password</label>
						</div>
						<div class="input-field row" align="right">					
							<button class="btn waves-effect waves-light" type="submit" name="submit">
								Submit
						  	</button>
					  	</div>			
				    </form>
				    <div class="row>">
				    	<?php 
						if($bool==0 && $attempt>0)
						{
							echo "<div class='row' style='color:Red;'>".$msg."</div>";
						}
						if($bool==1 && $attempt>0)
						{
							echo "<div class='row' style='color:Green;'>".$msg."</div>";
						}
						?>
				    </div>				
				</div>
				<div class="col s12 m3 l3">
					&nbsp;
				</div>
			</div>	
		</div>
	</div>	 
</body>
</html>