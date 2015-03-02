<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './rb.php';
    R::setup('sqlite:./db/qat.db');

//get gateway
$gateway = R::load( 'gateway', $_POST["gateway"] );

$phone_ids = $_POST["phones"];


foreach ($phone_ids as $phone_id){
		//get phone
		$phone = R::load( 'phone', $phone_id );
		$phone->usedgw = $_POST["gateway"];
		$id = R::store( $phone );
		R::close();
}

$iptables_file = fopen("./iptables/iptables_rules.txt", "w") or die("Unable to open file!");

// common iptables commands - start nat
fwrite($iptables_file, "*nat\n");

//get all phones

$phones = R::findAll( 'phone' , ' WHERE usedgw IS NOT NULL ' );

foreach ($phones as $phonegw){
		fwrite($iptables_file, "-A PREROUTING -s ".$phonegw->ip."/32 -p tcp -m tcp --dport ".getGWport($phonegw->usedgw)." -j DNAT --to-destination ".getGWip($phonegw->usedgw).":".getGWport($phonegw->usedgw)."\n");
}

// common iptables - set masquerading
fwrite($iptables_file, "-A POSTROUTING -j MASQUERADE\n");

// common iptables - commit rule
fwrite($iptables_file, "COMMIT\n");


fclose($iptables_file);


$output = shell_exec('./reload_iptables.sh');


function getGWip($gwid) {
    $gwip = R::load( 'gateway', $gwid);
    return $gwip->ip;
}

function getGWport($gwid) {
    $gwip = R::load( 'gateway', $gwid);
    return $gwip->port;
}


echo "Iptables reloaded";
