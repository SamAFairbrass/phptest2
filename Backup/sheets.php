<?php

require __DIR__ . '/vendor/autoload.php';
//Reading data from spreadsheet.

$client = new \Google_Client();

$client->setApplicationName('Google Sheets and PHP');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$spreadsheetId = "1VoAbsghogFMtpl1ZO43M7Pe3UZxPTbzByNDk_h0FcV0"; //It is present in your URL

$get_range = "Sheet1!A2:A10";

//Request to get data from spreadsheet.

$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

$values = $response->getValues();

echo $values[0][0];

$value1 = "hello everyone";
$value2 = "Thank you for coming!";


$update_range = "Sheet1!F5"; 
$values = [[$value1],[$value2]];


// request

$body = new Google_Service_Sheets_ValueRange([

	'values' => $values

]);

$params = [

	'valueInputOption' => 'RAW'

];

$update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range, $body, $params);

?>