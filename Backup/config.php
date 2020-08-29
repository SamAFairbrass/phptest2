<?php 
	#Database configuration
	$sn = '';
	$un = '';
	$pw = '';
	$dn = '';

	#Shopify configuration
	$k = 'b67464a9dcc896d20da4cc50a72f238d';		#App Key
	$s = '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';		#App Secret
	$redirect_url = 'https://samafairbrass.github.io/phptest/index.php';	#Redirect URL for after handshake
	$permissions = array(
		'read_orders',										#List what ever permissions your app will need here
		'read_script_tags',
		'write_script_tags'
	);
?>