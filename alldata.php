<html>
<?php
	include_once("updatedse.php");
	generateJson();
	$jsonContent = file_get_contents('cache/dseData.json');
	$json_a=json_decode($jsonContent,true);
?>

<head>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<title>Company List | DSE Application</title>
</head>
<body>
      <div class="container">
        <!-- Page Content goes here -->
        <div id="content" align="center">
        	<table class="striped">
        	<thead>
	          <tr>
	          	  <th data-field="serial">#</th>
	              <th data-field="companyName">Company Name</th>
	              <th data-field="lastTrade">Last Trade</th>
	              <th data-field="changeAmount">Change Amount</th>
	              <th data-field="ChangePercent">Change Percent</th>
	          </tr>
	        </thead>
        	<?php

        		$n=1;
    			foreach($json_a as $company)
    			{
    				echo "<tr>";

    					echo "<td>";
    						echo $n;
    					echo "</td>";

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
    				$n++;
    			}									
        	?>
        	</table>
        </div>
       </div>
</body>
</html>