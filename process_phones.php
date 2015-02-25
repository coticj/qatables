<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$gw = $_POST["gateway"];

$phones = $_POST["phones"];

$iptables_file = fopen("./iptables/iptables_rules.txt", "w") or die("Unable to open file!");

foreach ($phones as $phone){
		fwrite($iptables_file, $phone."\n");
}

fclose($iptables_file);

/*
$output = shell_exec('sudo ./reload_iptables.sh');
*/

echo "Iptables reloaded";