<?php
// prepare for updating excel sheet



?>

<html>

<link
  rel="stylesheet"
  href="https://unpkg.com/@shopify/polaris@5.2.1/dist/styles.css"
/>


<div style="text-align: center; margin: auto; ">

        <div class="Polaris-Page-Header">
            <div class="Polaris-Page-Header__MainContent">
                <div class="Polaris-Page-Header__TitleActionMenuWrapper">
                <div>
                    <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
                    <div class="Polaris-Header-Title">
                        <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Callcord Retrieval Test</h1>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>

<div style="text-align: center; margin: auto; margin-top: 25px">

<div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb; --p-frame-offset:0px;">
  <div class="Polaris-Page" style="margin-right: 26%">
    
    <div class="Polaris-Page__Content">
      <div style="width: 120%; margin-right: 10%" class="Polaris-Card">
        <div class="">
          <div class="Polaris-DataTable__Navigation"><button type="button" class="Polaris-Button Polaris-Button--disabled Polaris-Button--plain Polaris-Button--iconOnly" disabled="" aria-label="Scroll table left one column"><span class="Polaris-Button__Content"><span class="Polaris-Button__Icon"><span class="Polaris-Icon"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                      <path d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16" fill-rule="evenodd"></path>
                    </svg></span></span></span></button><button type="button" class="Polaris-Button Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table right one column"><span class="Polaris-Button__Content"><span class="Polaris-Button__Icon"><span class="Polaris-Icon"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                      <path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16" fill-rule="evenodd"></path>
                    </svg></span></span></span></button></div>
          <div class="Polaris-DataTable">
            <div class="Polaris-DataTable__ScrollContainer">
              <table class="Polaris-DataTable__Table">
                <thead>




                <tr>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col">Forename</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Surname</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Phone Number</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Cart Total</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Currency</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Cart First Abandoned Time</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Cart Updated Time</th>

                  </tr>
                </thead>
                <tbody>
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


    echo '<tr class="Polaris-DataTable__TableRow">';
   // echo 'Checkout ' . $c . ' of ' 
  //  . $json_data['checkouts'][$c]['customer']['first_name'] 
   // .' ' . $json_data['checkouts'][$c]['customer']['last_name']
   // . ', contact at <b>';

    echo '<th class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn" scope="row">'. $json_data['checkouts'][$c]['customer']['first_name'] . '</th>';
    echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'.     $abandonedCartCustomers[$c][1] = $json_data['checkouts'][$c]['customer']['last_name'] .'</td>';
    
    $abandonedCartCustomers[$c][0] = $json_data['checkouts'][$c]['customer']['first_name'];
    $abandonedCartCustomers[$c][1] = $json_data['checkouts'][$c]['customer']['last_name'];

    if ($json_data['checkouts'][$c]['customer']['phone'] == ""){
       // echo $json_data['checkouts'][$c]['customer']['default_address']['phone'] . '</b> (address). ';
        $abandonedCartCustomers[$c][2] = $json_data['checkouts'][$c]['customer']['default_address']['phone'];
        $abandonedCartCustomers[$c][2] = false;
        echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'. $json_data['checkouts'][$c]['customer']['default_address']['phone'] .'</td>';


    }
    else{
       // echo $json_data['checkouts'][$c]['customer']['phone'] . '</b> (customer). ';
        $abandonedCartCustomers[$c][2] = $json_data['checkouts'][$c]['customer']['phone'];
        $abandonedCartCustomers[$c][3] = true;
        $abandonedCartCustomers[$c][4] = $_GET['shop'];
        echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'. $json_data['checkouts'][$c]['customer']['phone'] .'</td>';


    }

    //echo 'Order Price: ' . $json_data['checkouts'][$c]['total_price'] 
    //.' ' . $json_data['checkouts'][$c]['presentment_currency'] ;
   // echo '</tr>';
    echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'. $json_data['checkouts'][$c]['total_price']  .'</td>';
    $abandonedCartCustomers[$c][5] = $json_data['checkouts'][$c]['total_price'];

    echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'. $json_data['checkouts'][$c]['presentment_currency']  .'</td>';
    $abandonedCartCustomers[$c][6] = $json_data['checkouts'][$c]['presentment_currency'];

    echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'. $json_data['checkouts'][$c]['created_at']  .'</td>';
    $abandonedCartCustomers[$c][7] = $json_data['checkouts'][$c]['created_at'];

    echo '<td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">'. $json_data['checkouts'][$c]['updated_at']  .'</td>';
    $abandonedCartCustomers[$c][8] = $json_data['checkouts'][$c]['updated_at'];



}



//echo $abandonedCartCustomers[0][0] . ', ' . $abandonedCartCustomers[0][1] . ', ' . $abandonedCartCustomers[0][2] . ', ' . $abandonedCartCustomers[0][3] . ', ' . $abandonedCartCustomers[0][4] . ', ';

?>

                </tbody>
              </table>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>

    <form method="post">

        <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb; --p-frame-offset:0px;">
            <button name="button1" type="submit" class="Polaris-Button">
                <span value="Button1" class="Polaris-Button__Content">
                    <span class="Polaris-Button__Text">Update Table</span>
                </span>
            </button>
        </div>
    </form> 

</html>


<?php

//echo $abandonedCartCustomers[0].count();
//echo $abandonedCartCustomers[0][0].count();



if(isset($_POST['button1'])) { 
    
    require __DIR__ . '/vendor/autoload.php';
    //function writeToSheet(){

    // establish sheet connection
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets and PHP');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType('offline');
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = "1VoAbsghogFMtpl1ZO43M7Pe3UZxPTbzByNDk_h0FcV0"; //It is present in your URL

    // === READING ===
    // set range for read
    $get_range = "Sheet1!A2:A10";

    //Request to get data from spreadsheet.
    $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);
    $values = $response->getValues();

    //echo $values[0][0]; // print val


    // === INSERTING ===

    // values to input
    
    $values = [];

    for ($i = 0; $i < count( $abandonedCartCustomers) ; $i++){
      $value1 = $abandonedCartCustomers[$i][0]; // fname
      $value2 = $abandonedCartCustomers[$i][1]; // lname
      $value3 = $abandonedCartCustomers[$i][2]; // number
      $value4 = $abandonedCartCustomers[$i][3]; // isCustomerNum (NOT the address phone)
      $value5 = $abandonedCartCustomers[$i][4]; // Store address
      $value6 = $abandonedCartCustomers[$i][5]; // Cart total
      $value7 = $abandonedCartCustomers[$i][6]; // Cart currency
      $value8 = $abandonedCartCustomers[$i][7]; // first cart created at
      $value9 = $abandonedCartCustomers[$i][8]; // cart updated at

      $customerValues = [$value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9];


      $values= [$values, $customerValues];
      //$values = $values+ [$value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9];
    }
    
    

    $update_range = "Sheet1!A2"; 
    //$values = [[$value1],[$value2]]; // col | col ......... [col] , [row, row,]
    //$values = [[$value1, $value2]]; // Rows, underneath, 
    
    //$values = [[$value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9]];

    // request to write
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];
    $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range, $body, $params);
    
    echo "Table Updated!";

}



?>
