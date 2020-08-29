<?php

// Set variables for our request
$shop = $_GET['shop'];

$api_key = "b67464a9dcc896d20da4cc50a72f238d";
$scopes = "read_orders,write_products";
$redirect_uri = "https://757624b44e02.ngrok.io/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();

//https://757624b44e02.ngrok.io/install.php?shop=test-store-ccapp.myshopify.com