<?php
$servername = "localhost";
$username = "unn_w16037204";//
$password = "Milad";//
$dbname = "unn_w16037204"; //


$conn = new mysqli($servername, $username, $password, $dbname); /* Create connection */
if ($conn->connect_error) {   /* Check connection */
    die("Connection failed: " . $conn->connect_error);
} 
