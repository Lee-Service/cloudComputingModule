<?php
//These credentials are taken from Lee Services' EEECS Hosting account and connects to a Student MySQL DB.
    $host = "lservice01.lampt.eeecs.qub.ac.uk";
    $user = 'lservice01';
    $pw = 'rDr3GP2KVbLxmVxy';
    $dbname = 'lservice01';

    $conn = new mysqli($host, $user, $pw, $dbname);
    if ($conn->connect_error){
        echo "ERROR CONNECTING TO DB. CHECK CONNECTION.".$conn->connect_error;
        die();
    } else{
    }

?>