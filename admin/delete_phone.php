<?php
require_once '../rb.php';
    R::setup('sqlite:../db/qat.db');

	$phone = R::load( 'phone', $_GET["id"] );
		
	R::trash( $phone );
	
	header('Location: index.php');
	
	exit();
	
	