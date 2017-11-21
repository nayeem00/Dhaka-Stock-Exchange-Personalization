<?php
session_start();
if(isset($_SESSION['email']))
{
	$userEmail=$_SESSION['email'];
	include"config.php";
	include"updatedse.php";
	generateJson();
	$jsonContent = file_get_contents('cache/dseData.json');
	$json_a=json_decode($jsonContent,true);
	$result = mysqli_query($con,"SELECT TradingCode,AvgBuyingPrice,Unit FROM user_companies WHERE Email='$userEmail'");
}
else
{
	header('location:login.php');
}
$netGainLoss=0;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
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
	    </div>
	</nav>
</div>
<br>
 <div class="owl-carousel hide-on-med-and-down">
 	<?php
		foreach($json_a as $company)
		{
			$changePercentCheck=str_replace('%','',$company['changePercent']);
			if($changePercentCheck<0)
			{
				$slideDivColor="red";
			}
			else
			{
				$slideDivColor="green";
			}
			echo "<div class='item' style='color:$slideDivColor;'>";
				echo $company['company']."<br>";
				echo $company['lastTrade']."<br>";
				echo $company['changeAmount']."<br>";
				echo $company['changePercent']."<br>";
			echo "</div>";
		}									
	?>
</div>
	<div class="container">
		<div id="content" align="center">
			<div class="row">
				<div class="col s12 m12 l12">
					<h2 style="text-align: center;">DSE Application</h2><br>
					<h3 style="text-align: center; color: #e57373;">Portfolio</h3>
					<div align="right">
						<a class="waves-effect waves-light btn" href="addcompany.php"><i class="material-icons right">add</i>Add</a>&nbsp;&nbsp;
						<a class="waves-effect waves-light btn" href="print.php"><i class="material-icons right">print</i>Print</a>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col s12 m12 l12">
					<table class="responsive-table">
				        <thead>
				          <tr>
				              <th data-field="tradingCode">Trading Code</th>
				              <th data-field="unit">Unit</th>
				              <th data-field="avgBuyingPrice">Avg Buying Price</th>
				              <th data-field="marketPrice">Market Price</th>
				              <th data-field="gain_loss">Gain/Loss</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
								if ($result->num_rows > 0)
								{
									while($row = mysqli_fetch_array($result)) 
									{
										$tradeBool=0;
										foreach($json_a as $company)
						    			{
						    				if($company['company']==$row['TradingCode'])
						    				{
						    					$marketPrice=$company['lastTrade'];
						    					$avgBuyingPrice=$row['AvgBuyingPrice'];
						    					$unit=$row['Unit'];
						    					$gainLoss=($unit*$marketPrice)-($unit*$avgBuyingPrice);
						    					if($gainLoss<0)
						    					{
						    						$rowColor="#ffcdd2";
						    					}
						    					else
						    					{
						    						$rowColor="";
						    					}
						    					$tradeBool=1;
						    				}						    				
						    			}
						    			$removeURL="<a href='removecompany.php?tradingCode=$row[TradingCode]'><i class='material-icons' style='color: red;'>clear</i></a>";
						    			if($tradeBool==1)
						    			{
						    				$netGainLoss+=$gainLoss;
						    				if($netGainLoss<0)
						    				{
						    					$cellColor="Red";
						    				}
						    				else
						    				{
						    					$cellColor="Green";
						    				}
						    				echo "<tr style='background-color: $rowColor;'><td>".$row['TradingCode']."</td><td>".$row['Unit']."</td><td>".$row['AvgBuyingPrice']."</td><td>".$marketPrice."</td><td>".$gainLoss."</td><td>".$removeURL."</td></tr>";
						    			}
						    			else
						    			{
						    				echo "<tr><td>".$row['TradingCode']."</td><td>".$row['Unit']."</td><td>".$row['AvgBuyingPrice']."</td><td>Not Traded Today</td><td></td><td>".$removeURL."</td></tr>";
						    			}
										
									}
								}
								else
								{
									echo "<tr><td colspan='6' style='text-align:center;'><br><br><a style='color: #bdbdbd;' href='addcompany.php'><i class='large material-icons'>add</i><br>ADD COMPANY</a></td></tr>";
								}

							?>
				        </tbody>
				      </table>
				      <br>
				      	<?php
				      		if ($result->num_rows > 0)
								{
									echo "<span style='text-align:center; font-size:18px;'><span style='color:#0277bd;'>Net Gain/Loss:</span><span style='color:$cellColor;'>&nbsp;&nbsp;&nbsp;".$netGainLoss."</span></span>";
								}
						?>
						<br><br><br>
						<hr>					
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l12">
					<br><h3 style="text-align: center; color: #e57373;">Market Updates</h3>
				</div>
				<div class="col s12 m6 l6">
					<br><h5 style="text-align: center; color: green;">Top Gainers</h5>
					<table class="responsive-table">
			        	<thead>
				          <tr>
				              <th data-field="companyName">Trading Code</th>
				              <th data-field="lastTrade">Last Trade</th>
				              <th data-field="changeAmount">Change Amount</th>
				              <th data-field="ChangePercent">Change Percent</th>
				          </tr>
				        </thead>
			        	<?php
			        		$count=0;
			    			foreach($json_a as $company)
			    			{
			    				$changePercent[]=str_replace('%','',$company['changePercent']);
			    				$count++;
			    			}
			    			for($i=0;$i<$count-1;$i++)	
			    			{
			    				for($j=$i+1;$j<$count;$j++)
			    				{
			    					if($changePercent[$i]<$changePercent[$j])
			    					{
			    						$temp=$changePercent[$i];
			    						$changePercent[$i]=$changePercent[$j];
			    						$changePercent[$j]=$temp;
			    					}
			    				}
			    			}
			    			$n=1;
			    			$finishBool=0;
			    			while($finishBool!=1)
			    			{
			    				foreach($json_a as $company)
				    			{
				    				$changePercentCheck=str_replace('%','',$company['changePercent']);
				    				if($changePercentCheck==$changePercent[$n-1])
				    				{
				    					echo "<tr>";

				    					echo "<td>";
				    						echo $company['company'];
				    					echo "</td>";

				    					echo "<td>";
				    						echo $company['lastTrade'];
				    					echo "</td>";

				    					echo "<td>";
				    						echo $company['changeAmount'];
				    					echo "</td>";

				    					echo "<td>";
				    						echo $company['changePercent'];
				    					echo "</td>";

					    				echo "</tr>";
					    				if($n==5)
					    				{
					    					$finishBool=1;
					    					break;
					    				}
					    				$n++;	
				    				}
			    				}			
			    			}								
			        	?>
			        	</table>
				</div>
				<div class="col s12 m6 l6">
					<br><h5 style="text-align: center; color: red;">Top Losers</h5>
					<table class="responsive-table">
			        	<thead>
				          <tr>
				              <th data-field="companyName">Trading Code</th>
				              <th data-field="lastTrade">Last Trade</th>
				              <th data-field="changeAmount">Change Amount</th>
				              <th data-field="ChangePercent">Change Percent</th>
				          </tr>
				        </thead>
			        	<?php
			        		$count=0;
			    			foreach($json_a as $company)
			    			{
			    				$changePercent[]=str_replace('%','',$company['changePercent']);
			    				$count++;
			    			}
			    			for($i=0;$i<$count-1;$i++)	
			    			{
			    				for($j=$i+1;$j<$count;$j++)
			    				{
			    					if($changePercent[$i]>$changePercent[$j])
			    					{
			    						$temp=$changePercent[$i];
			    						$changePercent[$i]=$changePercent[$j];
			    						$changePercent[$j]=$temp;
			    					}
			    				}
			    			}
			    			$n=1;
			    			$finishBool=0;
			    			while($finishBool!=1)
			    			{
			    				foreach($json_a as $company)
				    			{
				    				$changePercentCheck=str_replace('%','',$company['changePercent']);
				    				if($changePercentCheck==$changePercent[$n-1])
				    				{
				    					echo "<tr>";

				    					echo "<td>";
				    						echo $company['company'];
				    					echo "</td>";

				    					echo "<td>";
				    						echo $company['lastTrade'];
				    					echo "</td>";

				    					echo "<td>";
				    						echo $company['changeAmount'];
				    					echo "</td>";

				    					echo "<td>";
				    						echo $company['changePercent'];
				    					echo "</td>";

					    				echo "</tr>";
					    				if($n==5)
					    				{
					    					$finishBool=1;
					    					break;
					    				}
					    				$n++;	
				    				}
			    				}			
			    			}								
			        	?>
			        	</table>
				</div>
			</div>
			<br><br><br>
		</div>
	</div>	        
</body> 
<script>
		$('.owl-carousel').owlCarousel({
		    items:10,
		    loop:true,
		    margin:20,
		    autoplay:true,
		    autoplayTimeout:300,
		    autoplayHoverPause:true
		})
</script>
<script>
	$( document ).ready(function(){})
	$(".button-collapse").sideNav();
	$(".owl-carousel").owlCarousel();
</script> 
</html>