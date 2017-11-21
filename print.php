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
    $netGainLoss=0;
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
                    $tradeBool=1;
                }                                           
            }
            if($tradeBool==1)
            {
                $netGainLoss+=$gainLoss;
                $tableRowString[]="<tr><td width='150' height='60'>".$row['TradingCode']."</td><td width='150' height='60'>".$row['Unit']."</td><td width='150' height='60'>".$row['AvgBuyingPrice']."</td><td width='150' height='60'>".$marketPrice."</td><td width='150' height='60'>".$gainLoss."</td></tr>";
            }
            else
            {
                $tableRowString[]="<tr><td width='150' height='60'>".$row['TradingCode']."</td><td width='150' height='60'>".$row['Unit']."</td><td width='150' height='60'>".$row['AvgBuyingPrice']."</td><td width='150' height='60'>Not Traded Today</td><td width='150' height='60'></td></tr>";
            }
            
        }
    }
    $tableRow="<tr><td width='150' height='60'>Trading Code</td><td width='150' height='60'>Unit</td><td width='150' height='60'>Avg Buying Price</td><td width='150' height='60'>Market Price</td><td width='150' height='60'>Gain/Loss</td></tr>";
    if ($result->num_rows > 0)
    {
        foreach($tableRowString as $rowString)
            {
                $tableRow.=$rowString;                                
            }
        $tableRow.= "<tr><td width='150' height='60'>&nbsp;</td><td width='150' height='60'>&nbsp;</td><td width='150' height='60'>&nbsp;</td><td width='150' height='60'>Net Gain\Loss </td><td width='150' height='60'>".$netGainLoss."</td></tr>";
    }
}
else
{
    header('location:login.php');
}
require('html_table.php');
$pdf=new PDF();
$pdf->SetAuthor('DSE Application');
$pdf->SetTitle('Portfolio Report');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,date("l, jS F, Y | h:i:s A")." | Printed By: ".$userEmail,0,1,"");
$pdf->Cell(0,10,"",0,1,"C");
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,"PORTFOLIO REPORT",0,1,"C");
$pdf->Cell(0,10,"",0,1,"C");
$pdf->SetFont('Arial','',11);
$html='<table border="1px">'.$tableRow.'
        </table>';
$pdf->WriteHTML($html);
$pdf->Output($userEmail.'_portfolio.pdf','D');

?>


                    