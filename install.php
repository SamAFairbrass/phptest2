<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "e0374317c84cbb59600fe535a58000f7";
$scopes = "read_orders,write_products";
$redirect_uri = "https://samafairbrass.github.io/phptest2/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();