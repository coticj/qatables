<?php
require_once '../rb.php';
    R::setup('sqlite:../db/directory.db');

	$phone = R::load( 'phone', $_GET["id"] );
		
	R::trash( $phone );
	
	header('Location: index.php');
	
	exit();
	
	