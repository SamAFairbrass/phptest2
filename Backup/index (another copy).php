<?php
// Set variables for our request


?>

<html>

<link
  rel="stylesheet"
  href="https://unpkg.com/@shopify/polaris@5.2.1/dist/styles.css"
/>



<h1 style="text-align: center; margin: auto;"> Callcord Retrieval Test </h1>
<div style="text-align: center; margin: auto; margin-top: 25px">
<?php

$url = "https://d0589d1231ea8dc9d09f83e2d4e8b0a2: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@test-store-ccapp.myshopify.com/admin/api/2020-07/checkouts.json";
$json = file_get_contents($url);
$json_data = json_decode($json, true);
//echo "My token: ". $json_data["checkouts"];
//echo $json_data['checkouts'][0]['phone']; cant get this one working for some reason... maybe store set up

$abandonedCartCustomers = array();
// forename, lastname, number, customer phone boolean (false = address)

foreach ( $json_data['checkouts'] as $c => $checkout)
{
    echo 'Checkout ' . $c . ' of ' 
    . $json_data['checkouts'][$c]['customer']['first_name'] 
    .' ' . $json_data['checkouts'][$c]['customer']['last_name']
    . ', contact at <b>';
    $abandonedCartCustomers[$c][0] = $json_data['checkouts'][$c]['customer']['first_name'];
    $abandonedCartCustomers[$c][1] = $json_data['checkouts'][$c]['customer']['last_name'];

    if ($json_data['checkouts'][$c]['customer']['phone'] == ""){
        echo $json_data['checkouts'][$c]['customer']['default_address']['phone'] . '</b> (address). ';
        $abandonedCartCustomers[$c][2] = $json_data['checkouts'][$c]['customer']['default_address']['phone'];
        $abandonedCartCustomers[$c][2] = false;


    }
    else{
        echo $json_data['checkouts'][$c]['customer']['phone'] . '</b> (customer). ';
        $abandonedCartCustomers[$c][2] = $json_data['checkouts'][$c]['customer']['phone'];
        $abandonedCartCustomers[$c][3] = true;
        $abandonedCartCustomers[$c][4] = $_GET['shop'];


    }

    echo 'Order Price: ' . $json_data['checkouts'][$c]['total_price'] 
    .' ' . $json_data['checkouts'][$c]['presentment_currency'] ;
    echo '<br><br>';


}


echo $abandonedCartCustomers[0][0] . ', ' . $abandonedCartCustomers[0][1] . ', ' . $abandonedCartCustomers[0][2] . ', ' . $abandonedCartCustomers[0][3] . ', ' . $abandonedCartCustomers[0][4] . ', ';

?>

<a href="/formatting/index.php"> click to test formatting </a>

</html>


