<?php 
$Present_Value = 100000; 
$Int_Rate = 8; 
$Num_Periods = 6; 

$Future_Value = round($Present_Value * pow(1 + ($Int_Rate/100),$Num_Periods), 2); 
echo "$Present_Value @ $Int_Rate % over $Num_Periods periods becomes $Future_Value"; 
?>