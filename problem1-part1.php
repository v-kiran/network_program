<?php
// Your code here!
//print_r($argv[1]);
$txt = file_get_contents($argv[1]);


$matches = $matches1 =$matches2 = $matches3 = array();
$output = array();
$output['Loopback0'] = preg_match('/interface Loopback(.*)\n ip.address.(.*)/', $txt, $matches);
$output['Loopback1'] = preg_match('/interface Loopback(.*)\n ip.address.(.*)/', $txt, $matches1);
$output['GigabitEthernet1'] = preg_match('/interface GigabitEthernet1(.*)\n ip.address.(.*)/', $txt, $matches2);
$output['GigabitEthernet2'] = preg_match('/interface GigabitEthernet2(.*)\n ip.address.(.*)/', $txt, $matches3);

$output['Loopback0'] = $matches[2];
$output['Loopback1'] = $matches1[2];
$output['GigabitEthernet1'] = substr($matches2[2], 0, strrpos($matches2[2], ' '));
$output['GigabitEthernet2'] = substr($matches3[2], 0, strrpos($matches3[2], ' '));

var_dump($output);

?>
