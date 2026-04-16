<?php

$conn = new mysqli("localhost","root","","railway");

if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

?>