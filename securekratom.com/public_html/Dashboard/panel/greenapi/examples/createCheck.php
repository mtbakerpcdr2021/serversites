<?php
require_once '../Green.php';

use Green\CheckGateway as Gateway;

$ClientID = "115387"; //Your numeric Client_ID
$ApiPassword = "bv8ir5hv6ar"; //Your system generated ApiPassword

// $ClientID = "3614"; //Your numeric Client_ID
// $ApiPassword = "cw4ks5kt1f"; //Your system generated ApiPassword

if(isset($_POST['echeckpayment']) && $_POST['check']=="1"){

    $gateway = new Gateway($ClientID, $ApiPassword); //Create the gatway using the Client_ID and Password combination
    // $gateway->testMode(); //Put the Gateway into testing mode so calls go to the Sandbox and you won't get charged!

    //Create a single check and get results back after verification in array format
    // $name = 'Testing Smith';
    // $email = 'test@test.test';
    // $phone = '323-232-3232';
    // $phone_ext = '';
    // $address1 = '123 Testing Lane';
    // $address2 = '';
    // $city = 'Testville';
    // $state = 'GA';
    // $zip = '12345';
    // $country = 'US';
    // $routing = '000000000';
    // $account = '10000001';
    // $bank_name = 'Test Bank';
    // $memo = 'Testing!';
    // $amount = '20.00';
    // $date = date("m/d/Y");

    $name = $_POST['sessionname'];
    $email = $_POST['semail'];
    $phone = $_POST['sphone'];
    $phone_ext = '';
    $address1 = $_POST['saddress'];
    $address2 = '';
    $city = $_POST['echeckcity'];
    $state = $_POST['echeckstate'];
    $zip = $_POST['szip'];
    $country = 'US';
    $routing = $_POST['echeckroutingnumber'];
    $account = $_POST['echeckaccountnumber'];
    $bank_name = '';
    $memo = $_POST['codetail'];
    $amount = $_POST['totalcheckout'];
    $date = date("m/d/Y");

    $result = $gateway->singleCheck($name, $email, $phone, $phone_ext, $address1, $address2, $city, $state, $zip, $country, $routing, $account, $bank_name, $memo, $amount, $date);

    if($result) {
      //The call succeeded, let's parse it out
      if($result['Result'] == '0'){
        //A "Result" of 0 typically means success
        // echo "Check created with ID: " . $result['Check_ID'] . "<br/>";
        echo "done";
      } else {
        //Anything other than 0 specifies some kind of error.
        // echo "Check not created.<br/>Error Code: {$result['Result']}<br/>Error: {$result['ResultDescription']}<br/>";
        echo "Error: {$result['ResultDescription']}<br/>";

      }

      // echo "Full Return Details<br/><pre>".print_r($result, TRUE)."</pre>";
    } else {
      //The call failed!
      echo "GATEWAY ERROR: " . $gateway->getLastError();
    }
}//if isset echeckpayment
?>
