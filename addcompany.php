<?php
session_start();
if(isset($_SESSION['email']))
{
	$userEmail=$_SESSION['email'];
	include"config.php";
	$msg="";
	$attempt=0;
	if(isset($_POST['submit'])) 
	{
		$attempt++;
		$tradingCode=strtoupper($_POST['tradingCode']);
		$tradingCodeCheck = mysqli_query($con,"SELECT TradingCode FROM dse_all_companies where TradingCode='$tradingCode'");
		$rowcount=mysqli_num_rows($tradingCodeCheck);
		if($rowcount>0 )
		{
			$res = mysqli_fetch_array($tradingCodeCheck);
			if($res['TradingCode']== $tradingCode)
			{
				$tradingCodeCheck = mysqli_query($con,"SELECT TradingCode FROM user_companies where TradingCode='$tradingCode' AND Email='$userEmail'");
				$rowcount=mysqli_num_rows($tradingCodeCheck);
				if($rowcount==0)
				{
					$unit=$_POST['unit'];
					$avgBuyingPrice=$_POST['avgBuyingPrice'];
					$result = mysqli_query($con,"INSERT INTO user_companies(Email,TradingCode,AvgBuyingPrice,Unit) VALUES ('$userEmail', '$tradingCode', $avgBuyingPrice, $unit)");
					header('location:dashboard.php');
				}
				else
				{
					$msg="Company Already Exist on Your List.";
				}
			}
			else
			{
				$msg="Invalid Trading Code: Trading Code Not Found in Database.";
			}
		}
		else
		{
			$msg="Invalid Trading Code: Trading Code Not Found in Database.";
		}

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
<style>
	input[type="number"]::-webkit-outer-spin-button,
	input[type="number"]::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}
	input[type="number"] {
	  -moz-appearance: textfield;
}
</style>
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
						<h5 style="text-align: center;">Add Company</h5>
						<br>
					</div>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="input-field row">	
      						<input id="tradingCode" type="text" name="tradingCode" class="validate" style="text-transform:uppercase;" required>
      						<label for="tradingCode">Trading Code</label>
						</div>	
						<div class="input-field row">	
      						<input id="unit" type="number" step="1" name="unit" class="validate" required>
      						<label for="unit">Unit</label>
						</div>	
						<div class="input-field row">	
      						<input id="avgBuyingPrice" type="number" step="0.01" name="avgBuyingPrice" class="validate" required>
      						<label for="avgBuyingPrice">Buying Price [Avg]</label>
						</div>					
						<div class="input-field row" align="right">					
							<button class="btn waves-effect waves-light" type="submit" name="submit">
								Submit
						  	</button>
					  	</div>	
				    </form>
				    <div class="row>">
				    	<?php 
						if($attempt>0)
						{
							echo "<div class='row' style='color:Red;'>".$msg."</div>";
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