<?php
// Your code here!

$txt = file_get_contents($argv[1]);


$matches = $matches1 =$matches2 = $matches3 = $output = array();
$output['Loopback0'] = preg_match('/interface Loopback(.*)\n ip.address.(.*)/', $txt, $matches);
$output['Loopback1'] = preg_match('/interface Loopback1\n ip.address.(.*)/', $txt, $matches1);
$output['GigabitEthernet1'] = preg_match('/interface GigabitEthernet1(.*)\n ip.address.(.*)/', $txt, $matches2);
$output['GigabitEthernet2'] = preg_match('/interface GigabitEthernet2(.*)\n ip.address.(.*)/', $txt, $matches3);

if($matches){
$output['Loopback0'] = $matches[2];
}
if($matches1){
$output['Loopback1'] = $matches1[2];
}
if($matches2){
$output['GigabitEthernet1'] = substr($matches2[2], 0, strrpos($matches2[2], ' '));
}
if($matches3){
$output['GigabitEthernet2'] = substr($matches3[2], 0, strrpos($matches3[2], ' '));
}

$myJSON = json_encode($output);
var_dump($myJSON);

?>
