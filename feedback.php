<?php include 'connection.php';

if(!isset($_COOKIE['userID'])){
    header("Location:login.php");
}
if(!isset($_POST['uid'])){
    header("location:index.php");
}
if($uid!=$user){
    header("location:index.php");
}
$uid=0;
$pid=0;
$rate=0;
$feedtext="";
$oid=0;
if(isset($_POST['uid'])&&isset($_POST['pid'])&&isset($_POST['rate'])){
    $uid=$_POST['uid'];
    $pid=$_POST['pid'];
    $rate=$_POST['rate'];
    $oid=$_POST['oid'];
}
if(isset($_POST['feedtext'])){
    $feedtext=$_POST['feedtext'];
}

$query="INSERT INTO `feedback`( `user_id`, `product_id`, `feedback_rating`, `feedback_desc`) VALUES ('$uid','$pid','$rate','$feedtext')";
$res=$conn->query($query);
if($res){
    header("location:orderdetail.php?oid=$oid&flag=1");
}
else{
    header("location:orderdetail.php?oid=$oid&flag=2");
}
?>
