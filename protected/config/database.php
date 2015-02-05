<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=dating.itatests.com;dbname=dating',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '1234567',
	'charset' => 'utf8',
	
);