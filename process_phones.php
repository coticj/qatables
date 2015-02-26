<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './rb.php';
    R::setup('sqlite:./db/qat.db');

//get gateway
$gateway = R::load( 'gateway', $_POST["gateway"] );

$phone_ids = $_POST["phones"];

$iptables_file = fopen("./iptables/iptables_rules.txt", "w") or die("Unable to open file!");

// common iptables commands - start nat
fwrite($iptables_file, "*nat\n");

foreach ($phone_ids as $phone_id){
		//get phone
		$phone = R::load( 'phone', $phone_id );
		fwrite($iptables_file, "-A PREROUTING -s ".$phone->ip."/32 -p tcp -m tcp --dport ".$gateway->port." -j DNAT --to-destination ".$gateway->ip.":".$gateway->port."\n");
}

// common iptables - set masquerading
fwrite($iptables_file, "-A POSTROUTING -j MASQUERADE\n");

// common iptables - commit rule
fwrite($iptables_file, "COMMIT\n");


fclose($iptables_file);

/*
$output = shell_exec('sudo ./reload_iptables.sh');
*/

echo "Iptables reloaded";
