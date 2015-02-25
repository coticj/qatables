<?php
require_once '../rb.php';
    R::setup('sqlite:../db/directory.db');

	$gateway = R::load( 'gateway', $_GET["id"] );
		
	R::trash( $gateway );
	
	header('Location: gateways.php');
	
	exit();
	
	