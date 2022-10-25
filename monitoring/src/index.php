<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application:json");
include("conn.php");

if ($conn) {

    //grab list of services
    $getservices = file_get_contents('services.json');
    $servicelist = json_decode($getservices, true);

    //For error handling / testing:
    //  if ($servicelist == false) {
    //    echo "Service list cannot be read in json file: " .var_dump($servicelist);

    //iterate through services checking response
    foreach ($servicelist as $service) {
        foreach ($service as $url) {

            //get headers of url for response code
            $header_check = get_headers($url);
            //set start timmestamp in seconds
            $starttime = microtime(true) * 1000;
            // //set stop timestmap in seconds
            $stoptime = microtime(true) * 1000;
            // //get total response time of how long process takes
            $serviceresponsetime = $stoptime - $starttime;
            $urlresult = $url;

            //time and date details
            date_default_timezone_set('Europe/London');
            $formattedstarttime =  date("D d/m/Y H:i:s");
            $formattedresponsetime = $serviceresponsetime;
            $formattedendtime =  date("D d/m/Y H:i:s");

            //get response code from header
            $response_code = $header_check[0];

            //create array of results for each service
            if ($response_code == 'HTTP/1.1 200 OK') {
                $message = "SUCCESS";
                $query = "INSERT INTO `webapp_monitoring_info` (`URL`, `ResponseCode`, `TimeStampStarting:`, `ResponseTime`, `TimeStampEnding`, `Message`) 
            VALUES ('$urlresult', '$response_code','$formattedstarttime','$formattedresponsetime','$formattedendtime','$message');";

                $result = $conn->query($query);

                if ($result) {
                    echo json_encode(array('message' => "DB INFO CREATED - Success status "));
                } else {
                    echo json_encode(array('message' => "DB INFO NOT CREATED - Success status "));
                }
            } else {
                //for finding errors in the service
                $message = "ERROR";
                //add error query to db
                $query = "INSERT INTO `webapp_monitoring_info` (`URL`, `ResponseCode`, `TimeStampStarting:`, `ResponseTime`, `TimeStampEnding`, `Message`) 
                VALUES ('$urlresult', '$response_code','$formattedstarttime','','','$message');";

                $result = $conn->query($query);
                if ($result) {
                    echo json_encode(array('message' => 'DB INFO CREATED - Error status'));
                } else {
                    echo json_encode(array('message' => 'DB INFO NOT CREATED - Error status'));
                }
                //If there is an error - then send an email using phpMailer
                include('emailnotification.php');
            }
        }
    }
} else {
    echo "Could not connect to DB";
}