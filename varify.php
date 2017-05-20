<?php

$num = $_POST["val"];
if($num ==1){
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['username'] = 'picklu';
echo "session started";
}
?>
