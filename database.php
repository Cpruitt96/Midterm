<?php
    $dbhost = 'localhost';
    $dbuser = 'ts_user';
    $dbpass = 'pa55word';
    $dbname = 'tech_support';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }
         //echo 'Connected successfully';
         
         
?>