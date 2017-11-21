<?php
session_start();
if(isset($_SESSION['email']))
{
	header('location:dashboard.php');
}
include_once("config.php");
$msg="";
$attempt=0;
$bool=0;
if(isset($_POST['submit'])) 
{
   $email=$_POST['email'];
   $emailCheck = mysqli_query($con,"SELECT Email FROM user where Email='$email'");
   $rowcount=mysqli_num_rows($emailCheck);
   if($rowcount==0)
   {
	  if($_POST['password']==$_POST['repassword'])
	   {
		   $password=$_POST['password'];
		   $fullname=$_POST['fullname'];	  
		   $result = mysqli_query($con,"INSERT INTO user(email,password,name) VALUES ('$email', '$password', '$fullname')");
		   $bool=1;
		   $attempt++;
	   }
	   else
	   {
		   $msg="Password does not match the confirm password";
		   $attempt++;
		   $bool=0;
	   } 
   }
   else
   {
	   $msg="The email address you have entered is already registered";
	   $bool=0;
	   $attempt++;
   }  
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Registration | DSE Application</title>
</head>
<body>
	<div class="container">
		<div id="content" align="center">
			<div class="row">
    			<div class="col s12 m3 l3">
    				&nbsp;
    			</div>
    			<div class="col s12 m6 l6">
					<br><br><br>
					<div class="row">
						<h3 style="text-align: center;">Get Registered</h3>
						<br>
					</div>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="input-field row">	
      						<input id="email" type="email" name="email" class="validate" required>
      						<label for="email">Email</label>
						</div>
						<div class="input-field row">
      						<input id="fullname" type="text" name="fullname" class="validate" required>
      						<label for="fullname">Full Name</label>
						</div>
						<div class="row">
							<div class="col s12 m6 l6 input-field ">	
	      						<input id="password" type="password" name="password" class="validate" required>
	      						<label for="password">Password</label>
      						</div>
      						<div class="col s12 m6 l6 input-field ">
	      						<input id="repassword" type="password" name="repassword" class="validate" required>
	      						<label for="repassword">Re-Password</label>
	      					</div>	
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
							echo "<div class='row' style='color:Green;'>Registration successful</div>";
							echo "<div class='row'><a href='login.php'>Click here</a> to log in</div>";
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