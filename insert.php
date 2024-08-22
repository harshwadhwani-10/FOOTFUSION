<?php
if(!isset($_COOKIE['userID'])){
    header("location:login.php");
}
else{
$servername = "localhost";
$user = "root";
$password = "";
$database = "ecomm";

$conn = new mysqli($servername, $user, $password, $database);
if(isset($_POST['Category_name'])){
    if( isset($_POST['Category_desc'])){
        
        $Category_name=$_POST['Category_name'];
        $Category_desc=$_POST['Category_desc'];
    }
    
        $sql1="INSERT INTO `category`(`Category_name`, `Category_desc`) VALUES ('$Category_name','$Category_desc')";
        $result1=$conn->query($sql1);
        if($result1)
        {
            echo "ADDED";
            header("location:adminpanel.php?page=1");
        }
        else
        {
            echo "NOT ADDED";
        }
    }

else if(isset($_POST['offer_name']))
{
    if( isset($_POST['offer_details']) && isset($_POST['offer_percent']) && isset($_POST['offer_status']) && isset($_POST['offer_start_date']) && isset($_POST['offer_end_date'])){
        
        $offer_name=$_POST['offer_name'];
        $offer_details=$_POST['offer_details'];
        $offer_status=$_POST['offer_status'];
        $offer_percent=$_POST['offer_percent'];
        $offer_start_date=$_POST['offer_start_date'];
        $offer_end_date=$_POST['offer_end_date'];   
    }
    
        $sql1="INSERT INTO `offer`(`offer_name`, `offer_details`, `offer_status`,`offer_percent`,`offer_start_date`, `offer_end_date`) VALUES ('$offer_name','$offer_details','$offer_status','$offer_percent','$offer_start_date','$offer_end_date')";
        $result1=$conn->query($sql1);
        if($result1)
        {
            echo "ADDED";
            header("location:adminpanel.php?page=7");
        }
        else
        {
            echo "NOT ADDED";
        }
    }

}


?> 