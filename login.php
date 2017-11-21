<?php
session_start();
if(isset($_SESSION['email']))
{
	header('location:dashboard.php');
}
include_once("config.php");
$found_flag=0;
$attempt=0;
$result = mysqli_query($con,"SELECT * FROM user");
if(isset($_POST['login']))
{
	while($res = mysqli_fetch_array($result)) { 		
		if($res['Email']== $_POST['email'] && $res['Password']== $_POST['password'])	
		{
			$_SESSION['email'] = $_POST['email'];	
			$found_flag=1;
			header('location:dashboard.php');
		}	
	}
	$attempt++;
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Log In | DSE Application</title>
</head>
<body>
	<div class="container">
		<div id="content" align="center">
			<div class="row">
    			<div class="col s12 m3 l3">
    				&nbsp;
    			</div>
    			<div class="col s12 m6 l6">
					<br><br><br><br><br>
					<div class="row">
						<h5 style="text-align: center;">Log in to DSE Application </h5>
						<br>
					</div>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="input-field row">
							<i class="material-icons prefix">email</i>
      						<input id="email" type="email" name="email" class="validate" required>
      						<label for="email">Email</label>
						</div>
						<div class="input-field row">
							<i class="material-icons prefix">vpn_key</i>
      						<input id="password" type="password" name="password" class="validate" required>
      						<label for="password">Password</label>
						</div>														
						<?php 
						if($found_flag==0 && $attempt>0)
						{
							echo "<div class='row' style='color:Red;'>Wrong Username or Password</div>";
						}
						?>
						<div class="input-field row" align="right">					
							<button class="btn waves-effect waves-light" type="submit" name="login">
								Log In
						    	<i class="material-icons right">input</i>
						  	</button>
					  	</div>	
				    </form>			
					<div class="row" style="text-align: center;">
						Not A Member?</span><br><br>
						<a href="registration.php">Click Here</a> For Registration
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