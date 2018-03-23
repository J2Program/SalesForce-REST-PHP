<?php
header('Content-Type: application/json');
    /*=============================*/
    define("USERNAME", "mohamed.rimsan@ssssssssss.com");
    define("PASSWORD", 'sssssssssssssssssssssss');
    //Sandbox REST service	: https://apisandbox-api.zuora.com/rest/v1
    //https://apisandbox.zuora.com
    /*=============================*/


    $url = "https://apisandbox-api.zuora.com/rest/v1/accounts";
    $curl = curl_init($url);

    $username = USERNAME;
    $password = PASSWORD;

    //$zr_content = '{ "crmId": "001p000000PmR6ss4" }';

    //create zora account ==================================================================
     /* $zr_content = json_encode(array(
          "crmId"=>"001p000000PmssR64",
          "Entity__c"=>"VQPL",
          "name"=>"rims-test",
          "currency"=>"MYR",
          "autoPay" => false,
          "BillingPlatformUsername__c"=>null,
          "billCycleDay"=>1,
          "batch"=>"Batch4",
          "paymentTerm"=>"Due Upon Receipt", 
          "invoiceTemplateId"=>"2c92c0f849369b8s801493b7aadea22f2",
          "hpmCreditCardPaymentMethodId"=>"2c92c0f93sc1deb6e013c47cefff26fde",
          "invoiceCollect"=>false,          
          "billToContact"=>array(
            "firstName"=>"mohamed-test",
            "lastName"=>"rimsan-test",
            "country"=>"Singapore",
            "workEmail"=>"ssss@gmail.com",
            "workPhone"=>"0789663",
            "address1"=>"15 Malysia",
            "zipCode"=>"59600"              
          ),          
          "soldToContact"=>array(
            "firstName"=>"mohd-test",
            "lastName"=>"rims-test",
            "country"=>"Singapore",
            "workEmail"=>"rimsnet@gmail.com",
            "workPhone"=>"0778966",
            "address1"=>"1-4 hill park",
            "zipCode"=>"59600" 
          )
          
      )); 

    //echo strlen($zr_content); exit;

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Content-Length: ".strlen($zr_content)));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $zr_content);

    $json_response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($json_response);

    print_r($json_response); */

//cereate zore end =========================================================================



    //subscription ========================================================================
     $zr_payment_token = "https://apisandbox-api.zuora.com/rest/v1/subscriptions";

       /* $zr_content = json_encode(array(
            "accountKey"=>"A0000s2103",
            "termType" => "EVERGREEN",
            "Status"=>"Draft",
            "contractEffectiveDate"=>"2018-10-10",
            "subscribeToRatePlans"=>"2c92a0ff54cd4ae20154e5e734ca05ef"            
                
        )); */

        $zr_content = '{
    "accountKey": "A00002103", 
    "autoRenew": true, 
     "invoiceCollect":"true",
     "runBilling":"true",
    "contractEffectiveDate": "2018-02-28", 
    "initialTerm": "12", 
    "initialTermPeriodType": "Week", 
    "notes": "Test Account create", 
    "renewalTerm": "3", 
    "renewalTermPeriodType": "Week", 
    "subscribeToRatePlans": [
            {
                "productRatePlanId": "2c92c0f85f6bc0b6015f757cf35054c4"
            },
            {
                "productRatePlanId": "2c92c0f85f6bc0b6015f759ae899059d"
            },
            {
                "productRatePlanId": "2c92c0f85f6bc17a015f757a177e07e5"
            },
            {
                "productRatePlanId": "2c92c0f85f6bc17a015f757a177e07e5"
            }
        ],   
            "termType": "TERMED"
        }';

        

    
        $curl = curl_init($zr_payment_token);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept:application/json', 'Content-Length: ' . strlen($zr_content)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $zr_content);
        curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");

    $json_response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($json_response);

    print_r($json_response); 
    //subscription end ======================================================================



?>