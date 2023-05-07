<?php

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "Thompson16";
    $db = "swe2";

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
    }
 
function CloseCon($conn)
{
    $conn -> close();
}
   
?>
