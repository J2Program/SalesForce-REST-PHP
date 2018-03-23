<?php


//authorization: https://login.salesforce.com/services/oauth2/authorize
//token requests: https://login.salesforce.com/services/oauth2/token
//revoking OAuth tokens: https://login.salesforce.com/services/oauth2/revoke
//https://localhost/customer-portal/login.php

// https://workbench.developerforce.com //SOQL manipulations
// test.salesforce.com //sandbox

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //Login >========================================================================================
    define("CLIENT_ID", "ssssssssss");
    define("CLIENT_SECRET", "ssssssssss");
    define("SF_USERNAME", "mohamed.rimsan@sssss.com");
    define("SF_PASSWORD", 'ssss');
    define("SF_TOKEN", "sssssssssss");

    /*=============================*/
    define("USERNAME", "mohamed.rimsan@ssssssssssss.com");
    define("PASSWORD", 'ssssssssss');
    //Sandbox REST service	: https://apisandbox-api.zuora.com/rest/v1
    /*=============================*/


    $loginurl_t = "https://test.salesforce.com/services/oauth2/token";

    $params = "grant_type=password"
			. "&client_id=" . CLIENT_ID
			. "&client_secret=" . CLIENT_SECRET
			. "&username=" . SF_USERNAME
			. "&password=" . SF_PASSWORD . SF_TOKEN;
	$curl_t = curl_init($loginurl_t);
	curl_setopt($curl_t, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl_t, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_t, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($curl_t, CURLOPT_HEADER, false);
	curl_setopt($curl_t, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_t, CURLOPT_POST, true);
	curl_setopt($curl_t, CURLOPT_POSTFIELDS, $params);

	$json_response_t = curl_exec($curl_t);
    $response_t = json_decode($json_response_t, true);

    $instace_url = $response_t['instance_url'];
    $access_token = $response_t['access_token'];
    $id = $response_t['id'];
    $token_type =  $response_t['token_type'];
    $signature = $response_t['signature'];
   //SELECT END >=============================================================================================

    // Get The Accounts >========================================================================
    $query2_select = "SELECT a.Id,a.Phone,a.NRIC_Passport_FIN_No__pc, a.FullName__c, a.AccountNumber, a.Temp__c, a.Registered__c FROM Account a WHERE a.Id = '001p000000PmR64'";
    //$query2 = "select";
    $url_se = "$instace_url/services/data/v20.0/query?q=" . urlencode($query2_select);

    $curl_se = curl_init($url_se);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_se, CURLOPT_HEADER, false);
    curl_setopt($curl_se, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_se, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token"));

    $json_response_se = curl_exec($curl_se);
    curl_close($curl_se); 
    print_r($json_response_se); 
    // SELECT END >============================================================================================
        
    //Update Account fields ===========================================================================
    /**   $now = new DateTime();
        $timestamp = $now->format('Y-m-d H:i:s');
        $urlcheck = "$instace_url/services/data/v20.0/sobjects/Account/001p000000PmR64";
	    $scontent_in = json_encode(array( 
            "Phone"=>"123456789", 
            "FirstName"=>"mohamed-test",
            "Gender__c"=>"Male",
            "LastName"=>"rimsan-test",
            "NRIC_Passport_FIN_No__pc"=>"N123456",
            "Status__c"=>"Active",
            "RecordTypeId"=>"012900000003dcU",
            "PersonMailingCountry"=>"Singapore",
            "Nationality__c"=>"Singaporean",
            "PersonEmail"=>"rimsnet@gmail.com",
            "PersonMobilePhone"=>"06123456",
            "FullName__c"=>"mohamed-test rimsan-test",
            "Salutation"=>"Mr.",
            "PersonBirthdate"=>"1992-03-07",
            "Property_Type__c"=>"OTH",
            "PersonMailingStreet"=>"14 Hil ",
            "PersonOtherPostalCode"=>"408600",
            "Netflix_Acct__c"=>"USA",
            "Source_Type__c"=>"Non-Digital",
            "Source_of_Lead__c"=>"Word of Mouth",
            "AccountNumber"=>"A00002103",
            "Temp__c"=>"123456"
               
        ));
        $surl = curl_init($urlcheck);
        curl_setopt($surl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($surl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($surl, CURLOPT_HEADER, false);
        curl_setopt($surl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token", "Content-type: application/json"));
        curl_setopt($surl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($surl, CURLOPT_POSTFIELDS, $scontent_in);
        $insert_cre = curl_exec($surl); 

        print_r($insert_cre); **/
    
    //UPDATE END >=============================================================================================




    //INSERT an Account >==================================================================

    /**  $query2_select = "SELECT Id, Phone, FullName__c, AccountNumber FROM Account  LIMIT 10";

    $url_se = "$instace_url/services/data/v20.0/sobjects/Account";

    $scontent_in = json_encode(array( "Phone"=>"123456789", "FirstName"=>"mohamed-test","LastName"=>"rimsan-test"));

    $curl_se = curl_init($url_se);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_se, CURLOPT_HEADER, false);
    curl_setopt($curl_se, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_se, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token","Content-type: application/json"));
    curl_setopt($curl_se, CURLOPT_POST, true);
    //curl_setopt($curl_se, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl_se, CURLOPT_POSTFIELDS, $scontent_in);

    $json_response_se = curl_exec($curl_se);
    curl_close($curl_se); 
    print_r($json_response_se); */

    //INSERT END ===============================================================
    




    //DELECT an Account >=======================================================

    /** $url_se = "$instace_url/services/data/v20.0/sobjects/Account/001p000000PmQzgAAF";
    $curl_se = curl_init($url_se);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_se, CURLOPT_HEADER, false);
    curl_setopt($curl_se, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_se, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token"));
    curl_setopt($curl_se, CURLOPT_CUSTOMREQUEST, "DELETE");
    $json_response_se = curl_exec($curl_se);
    curl_close($curl_se); 
    print_r($json_response_se); */

    //DELETE END =================================================================

    


    //FILE ATTACHEMENT (PDF) =====================================================
    
   /** $url_file = "$instace_url/services/data/v20.0/sobjects/Attachment";
    $sf_Account_ID__c = "001p000000PmR64AAF";

    $path = 'http://www.pdf995.com/samples/pdf.pdf';
    $data =  base64_encode(file_get_contents($path));

    $content = json_encode(array(
        
                "Name" =>   'pdf.pdf',
                "Body"  => $data,
                "ParentId" => $sf_Account_ID__c,
                "ContentType" =>  "application/".pathinfo($path, PATHINFO_EXTENSION),                
    ));

       $curl_file = curl_init($url_file);
        curl_setopt($curl_file, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_file, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_file, CURLOPT_HEADER, false);
        curl_setopt($curl_file, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_file, CURLOPT_HTTPHEADER, array(
            "Authorization: OAuth $access_token",
            "Content-type: application/json",
            "Content-Length: " . strlen($content)
        ));
        curl_setopt($curl_file, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_file, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl_file, CURLOPT_POSTFIELDS, $content);
        $json_response_file = curl_exec($curl_file);
        curl_close($curl_file);

    print_r($json_response_file); */
    
    
    //FILE ATTACHEMENT END ==========================================================




    //IMAGE UPLOAD ==================================================================

   /** $url_img = "$instace_url/services/data/v20.0/sobjects/Attachment";
    $sf_Account_ID__c = "001p000000PmR64AAF";

    $path = 'http://imgsv.imaging.nikon.com/lineup/lens/zoom/normalzoom/af-s_dx_18-140mmf_35-56g_ed_vr/img/sample/sample1_l.jpg';
    $data =  base64_encode(file_get_contents($path));

    $content = json_encode(array(
        
                "Name" =>   'sample1_l.jpg',
                "Body"  => $data,
                "ParentId" => $sf_Account_ID__c,
                "ContentType" =>  "application/".pathinfo($path, PATHINFO_EXTENSION),                
    ));

       $curl_img = curl_init($url_img);
        curl_setopt($curl_img, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_img, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_img, CURLOPT_HEADER, false);
        curl_setopt($curl_img, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_img, CURLOPT_HTTPHEADER, array(
            "Authorization: OAuth $access_token",
            "Content-type: application/json",
            "Content-Length: " . strlen($content)
        ));
        curl_setopt($curl_img, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_img, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl_img, CURLOPT_POSTFIELDS, $content);
        $json_response_img = curl_exec($curl_img);
        curl_close($curl_img);

        print_r($json_response_img); */

    //IMAGE END =====================================================================

    //INSERT a CASE >==================================================================

    /**  $url_se = "$instace_url/services/data/v20.0/sobjects/Case";

    $scontent_in = json_encode(array( "AccountId"=>"001p000000PmR64","Type"=> "Hardware Purchase","Status"=>"New","Priority"=>"High","Description"=>"Test cases","Subject"=>"Crazzy customer"));

    $curl_se = curl_init($url_se);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_se, CURLOPT_HEADER, false);
    curl_setopt($curl_se, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_se, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token","Content-type: application/json"));
    curl_setopt($curl_se, CURLOPT_POST, true);
    //curl_setopt($curl_se, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl_se, CURLOPT_POSTFIELDS, $scontent_in);

    $json_response_se = curl_exec($curl_se);
    curl_close($curl_se); 
    print_r($json_response_se); */

    //INSERT a CASE  ===============================================================


   //SELECT cases >==================================================================

    /** $query2_select = "SELECT AccountId FROM Case WHERE AccountId = '001p000000PmR64'";

    $url_se = "$instace_url/services/data/v20.0/query?q=" . urlencode($query2_select);

    $curl_se = curl_init($url_se);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl_se, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_se, CURLOPT_HEADER, false);
    curl_setopt($curl_se, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_se, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token"));

    $json_response_se = curl_exec($curl_se);
    curl_close($curl_se); 
    print_r($json_response_se);  */

    //SELECT CASES END ===============================================================
?>

