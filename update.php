<?php
$servername = "localhost";
$user = "root";
$password = "";
$database = "ecomm";

$conn = new mysqli($servername, $user, $password, $database);
if(isset($_POST['category_id'])){
    if(isset($_POST['category_id']) && isset($_POST['Category_name']) && isset($_POST['Category_desc']))
    {
        $category_id=$_POST['category_id'];
        $Category_name=$_POST['Category_name'];
        $Category_desc=$_POST['Category_desc'];
    }
    
    $sql = "UPDATE `category` SET `Category_name`='$Category_name', `Category_desc`='$Category_desc' WHERE `category_id`='$category_id'";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }
}
else if(isset($_POST['product_id']))
{
    if(isset($_POST['product_id']) && isset($_POST['Category_id']) && isset($_POST['grp']) && isset($_POST['product_name']) && isset($_POST['product_details']) && isset($_POST['price']))
    {
        $product_id=$_POST['product_id'];
        $Category_id=$_POST['Category_id'];
        $grp=$_POST['grp'];
        $product_name=$_POST['product_name'];
        $product_details=$_POST['product_details'];
        $price=$_POST['price'];
        $actpri=$_POST['actprice'];
    }
    
    $sql = "UPDATE `product` SET `product_id`='$product_id', `Category_id`='$Category_id',`grp`='$grp', `product_name`='$product_name' ,`product_details`='$product_details', `price`='$price',`actual_price`='$actpri' WHERE `product_id`='$product_id'";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=2&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }
}

else if(isset($_POST['order_id'])){
    if(isset($_POST['order_status']) && isset($_POST['shipping_status']) )
    {
        $order_id=$_POST['order_id'];
        $order_status=$_POST['order_status'];
        $shipping_status=$_POST['shipping_status'];
        if(isset($_POST['order_status2']))
        $order_status=$_POST['order_status2'];
        if(isset($_POST['shipping_status2']))
        $shipping_status=$_POST['shipping_status2'];

        if($shipping_status=="shipped"){
            $order_status="complete";
        }
        if($order_status=="complete"){
            $shipping_status="shipped";
        }
        
    }
    $sql = "UPDATE `order_tbl` SET `order_status`='$order_status', `shipping_status`='$shipping_status' WHERE `order_id`=$order_id";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=3&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }


}

else if(isset($_POST['refund_id'])){
    if(isset($_POST['refund_status']) )
    {
        $refund_id=$_POST['refund_id'];
        $refund_status=$_POST['refund_status'];
        if(isset($_POST['refund_status2']))
        $refund_status=$_POST['refund_status2'];
        if($refund_status=="done")
        $refund_date=date("y-m-d");

    }
    $sql = "UPDATE `refund` SET `refund_date`='$refund_date', `refund_status`='$refund_status' WHERE `refund_id`=$refund_id";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=6&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }


}
else if(isset($_POST['offer_id'])){
    if(isset($_POST['offer_name']) && isset($_POST['offer_details']) && isset($_POST['offer_status'])&& isset($_POST['offer_percent']) && isset($_POST['offer_start_date']) && isset($_POST['offer_end_date']) )
    {
        $offer_id=$_POST['offer_id'];
        $offer_name=$_POST['offer_name'];
        $offer_details=$_POST['offer_details'];
        $offer_status=$_POST['offer_status'];
        $offer_percent=$_POST['offer_percent'];
        $offer_start_date=$_POST['offer_start_date'];
        $offer_end_date=$_POST['offer_end_date'];
    }
    
    $sql = "UPDATE `offer` SET `offer_name`='$offer_name', `offer_status`='$offer_status', `offer_percent`='$offer_percent' , `offer_start_date`='$offer_start_date' , `offer_end_date`='$offer_end_date'  WHERE `offer_id`='$offer_id'";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=7&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }
}

else if(isset($_POST['transaction_id'])){
    if(isset($_POST['payment_status']) )
    {
        $transaction_id=$_POST['transaction_id'];
        $payment_status=$_POST['payment_status'];
        if(isset($_POST['payment_status2']))
        $payment_status=$_POST['payment_status2'];
       
        
    }
    $sql = "UPDATE `payment` SET `payment_status`='$payment_status' WHERE `transaction_id`=$transaction_id";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=8&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }


}


// enable disable update
//-------------------------------------------------------------------------------------------------------------------------

if(isset($_GET['header'])=='Product_id' && isset($_GET['value1'])){
    if(isset($_GET['pid']) && isset($_GET['value1']))
    {
        $pid=$_GET['pid'];
        $value=$_GET['value1'];
        $sql="";
        if($value=='Enabled'){
            
            $sql = "UPDATE `product` SET `pro_status`='Disabled' WHERE `product_id`='$pid'";
        }
        else if($value=='Disabled'){
            $sql = "UPDATE `product` SET `pro_status`='Enabled' WHERE `product_id`='$pid'";
        }
        $result=$conn->query($sql);
        if($result)
        header("location:adminpanel.php?page=2&flag=1");
        else
        header("location:adminpanel.php?page=2&flag=2");
    }
}
if(isset($_GET['header'])=='Category ID' ){
    if(isset($_GET['pid']) && isset($_GET['value']))
    {
        $pid=$_GET['pid'];
        $value=$_GET['value'];
        $sql="";
        if($value=='Enabled'){
            $sql = "UPDATE `category` SET `cat_status`='Disabled' WHERE `category_id`='$pid'";
        }
        else if($value=='Disabled'){
            $sql = "UPDATE `category` SET `cat_status`='Enabled' WHERE `category_id`='$pid'";
        }
        $result=$conn->query($sql);
        if($result)
        header("location:adminpanel.php?page=1&flag=1");
        else
        header("location:adminpanel.php?page=1&flag=2");
    }
}
if(isset($_GET['header'])=='prodesc_ID'){
    if(isset($_GET['pid']) && isset($_GET['value2']))
    {
        $pid=$_GET['pid'];
        $value2=$_GET['value2'];
        $sql="";
        if($value2=='Enabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Disabled' WHERE `prodesc_ID`='$pid'";
        }
        else if($value2=='Disabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Enabled' WHERE `prodesc_ID`='$pid'";
        }
        $result=$conn->query($sql);
        if($result)
        header("location:adminpanel.php?page=3&flag=1");
        else
        header("location:adminpanel.php?page=3&flag=2");
    }
}
if(isset($_GET['header'])=='cid'){
    if(isset($_GET['pid']) && isset($_GET['value3']))
    {
        $pid=$_GET['pid'];
        $value3=$_GET['value3'];
        $sql="";
        if($value3=='Enabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Disabled' WHERE `prodesc_ID`='$pid'";
        }
        else if($value3=='Disabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Enabled' WHERE `prodesc_ID`='$pid'";
        }
        $result=$conn->query($sql);
        if($result)
        header("location:adminpanel.php?page=3&flag=1");
        else
        header("location:adminpanel.php?page=3&flag=2");
    }
}
if(isset($_GET['header'])=='offer_id'){
    if(isset($_GET['pid']) && isset($_GET['value4']))
    {
        $pid=$_GET['pid'];
        $value4=$_GET['value4'];
        $sql="";
        if($value4=='Enabled'){
            $sql = "UPDATE `offer` SET `offer_status`='Disabled' WHERE `offer_id`='$pid'";
        }
        else if($value4=='Disabled'){
            $sql = "UPDATE `offer` SET `offer_status`='Enabled' WHERE `offer_id`='$pid'";
        }
        $result=$conn->query($sql);
        if($result)
        header("location:adminpanel.php?page=7&flag=1");
        else
        header("location:adminpanel.php?page=7&flag=2");
    }
}
if(isset($_GET['header'])=='user ID'){
    if(isset($_GET['pid']) && isset($_GET['value5']))
    {
        $pid=$_GET['pid'];
        $value5=$_GET['value5'];
        $sql="";
        if($value5=='Active'){
            $sql = "UPDATE `user` SET `usr_status`='Inactive' WHERE `userID`='$pid'";
        }
        else if($value5=='Inactive'){
            $sql = "UPDATE `user` SET `usr_status`='Active' WHERE `userID`='$pid'";
        }
        $result=$conn->query($sql);
        if($result)
        header("location:adminpanel.php?page=5&flag=1");
        else
        header("location:adminpanel.php?page=5&flag=2");
    }
}
// elseif()
?>