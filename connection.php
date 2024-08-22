    
<?php
$servername="localhost";
$username="root";
$password="";
$database="ecomm";
$user="";
$name="";

$conn=new mysqli($servername,$username,$password,$database);
if(isset($_COOKIE['userID']))
{
    $user = $_COOKIE['userID'];
}
?>