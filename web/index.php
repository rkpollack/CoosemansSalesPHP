<?php
header('Content-Type: application/json');
$ort = $_GET['ort'];
echo $_POST;
$url = "http://1webblvd.com/shpsls.htm";
$offset = 3;
if (strpos($ort,"arket") >0) $url = "http://dvr.coosemansla.com:81/stats/mktsls.htm";
if (strpos($ort,"arket") >0) $offset = 0;
$string = file_get_contents($url);
$datestr = substr($string,121+$offset,2)."/".substr($string,124+$offset,2);
$timestr = substr($string,163+$offset,5);
$x3 = strpos($string,"Total All Items")+121;
$amt = substr($string,$x3,12);
$result = $ort." sales for ".$datestr." at ".$timestr." is $".$amt;
$myarr = array ("speech" => $result, 
                "displayText" => $result,
                "source" => "coosemans-sales");
echo json_encode($myarr);
?>