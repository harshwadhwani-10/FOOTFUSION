<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .alert{
            position:absolute;
            top:35px;
            left:30vw;
            line-height:30px;
            height:auto;
            border:1px solid teal;
            border-radius:15px;
            width:40vw;
            background-color:rgba(0,0,0,0.8);
            color:white;
            display:flex;
            flex-direction:row;
            /* justify-content:center; */
            align-items:center;
            padding:10px 10px;
            z-index:100;
            /* opacity:0.5; */

        }
        /* .alert::before{
            content:'';
            position:relative;
            top:0;
            left:0;
            width:100%;
            height:100%;
            opacity:0.5;
            background:black;
        } */
        .alerttext{
            display:flex;
            align-items:center;
            height:100%;
            width:100%;
            padding:5px;
            font-size:20px;
            font-weight:600;
        }
        .crossed{
            float:right;
            font-size:20px;
            font-weight:600;
            cursor:pointer;
        }
        .loading-container{
            height:100vh;
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .loading-circle {
            width: 60px;
            height: 60px;
            border: 4px solid #f3f3f3; /* Light grey */
            border-top: 4px solid #3498db; /* Blue */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        .table-container{
            display:flex;
            width:100%;
            height:100vh;
            justify-content:center;
        }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

    </style>
    
</head>
<body>

</body>

</html>
<?php
include 'connection.php';
if(!isset($_COOKIE['userID'])){
    header("Location:login.php");
}
if(isset($_COOKIE['userID']) && $user!=""){
if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['phone']) && isset($_GET['email'])){
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $city=$_GET['city'];
    $state=$_GET['state'];
    $zip=$_GET['zip'];
    $paymet=$_GET['paymentmet'];
    $term=$_GET['term'];
    $addr=$_GET['addr'];
    $total=$_GET['total'];
    $disc=$_GET['discount'];
    $pdisc=$_GET['pdisc'];
} 
$pid="";
$size="";
$col="";
$quan="";  
$sql="SELECT * FROM cart_tbl WHERE user_id='$user' AND p_quantity!=0";
$result=$conn->query($sql);
if(isset($_GET['paymentmet'])){
    $paymet=$_GET['paymentmet'];
    $orderstatus="pending";
    if($paymet=='online'){
       echo<<<_END
        <div class="loading-container">

            <div class="loading-circle"></div>
        </div>
    _END;
    }
    if($paymet=='COD'){
        $orderstatus="placed";
    }
    $totdis=$disc+$pdisc;
        $ordins="INSERT INTO order_tbl(user_id, order_status, order_amount,discount,fname,lname,mobile,email, shipping_address, shipping_status) VALUES ('$user','$orderstatus','$total','$totdis','$fname','$lname','$phone','$email','$addr','processing')";
        $orderres=$conn->query($ordins);
        $ordsel="SELECT order_id FROM order_tbl WHERE user_id='$user' ORDER BY order_id DESC LIMIT 1";
        $selres=$conn->query($ordsel);
        $row=$selres->fetch_assoc();
        $order_id=$row['order_id'];
        $ordsel="SELECT * FROM cart_tbl WHERE user_id='$user' ORDER BY cartID DESC LIMIT 1";
        $selres=$conn->query($ordsel);
        $row=$selres->fetch_assoc();
        while($row=$result->fetch_assoc()){
            $pid=$row['product_id'];
            $quan=$row['p_quantity'];
            $col=$row['p_color'];
            $size=$row['p_size'];
            
            $sqljoi="SELECT price FROM product WHERE product_id='$pid'";
            $resjoi=$conn->query($sqljoi);
            $row1=$resjoi->fetch_assoc();
            $price=$row1['price'];
            $dis=0;
            if($quan>=5){
                $dis=(0.20*($quan*$price));  
            }
            // $dis=$row['p_discount'];
            $tot=($quan*$price)-$dis;
            $ins="INSERT INTO order_detail(order_id, product_id, size, color ,quantity, rate, discount, amount) VALUES ('$order_id','$pid','$size','$col','$quan','$price','$dis','$tot')";
            $rein=$conn->query($ins);
            $sql="SELECT * FROM product_desc JOIN color ON color.cid=product_desc.cid JOIN product ON product.Product_id=color.product_id WHERE product.Product_id='$pid' AND product_desc.size='$size' AND color.color='$col' ";
            $res=$conn->query($sql);
            $row=$res->fetch_assoc();
            $quanty=$row['quantity'];
            $prodescid=$row['prodesc_ID'];
            $orquant=$quanty-$quan;
            $sql="UPDATE product_desc SET quantity='$orquant' WHERE prodesc_ID='$prodescid'";
            $res=$conn->query($sql);
        }
            if($paymet=='COD'){        
            // Generate a timestamp component (or use a database timestamp if available)
            $timestamp = time() % 10000000000; // Current Unix timestamp

            // Generate a random component
            $randomComponent = mt_rand(100000000, 999999999); // Generate a random 9-digit number

            // Combine components to form the number
            $number = $timestamp . $randomComponent;

            // Now $number contains a unique 12-digit number          
            $paystatus="paid";
            
                $paystatus="pending";
                $sql="INSERT INTO `payment`(`transaction_id`, `order_id`, `payment_mode`, `payment_status`) VALUES ('$number','$order_id','$paymet','$paystatus')";
                $res=$conn->query($sql);
            }
    
    $sql="DELETE FROM cart_tbl WHERE user_id='$user'";
    $result=$conn->query($sql);
    if($paymet=='COD'){
        $date=date('y-m-d');
    echo<<<_END
    <div class="alert">
        <div class="alerttext">Order Placed successfully!</div><span class="crossed" >✔</span>
    </div>
    <div class="table-container">
        <table style="height: 200px;margin-top:50px; border-collapse: collapse;">
        <tr>
            <th style="border: 1px solid black;padding:4px;">Attribute</th>
            <td style="border: 1px solid black;padding:4px;">Value</td>
        </tr>
        <tr>
            <th style="border: 1px solid black;padding:4px;">Transaction ID</th>
            <td style="border: 1px solid black;padding:4px;"> $number</td>
        </tr>
        <tr>
            <th style="border: 1px solid black;padding:4px;">Date of Payment</th>
            <td style="border: 1px solid black;padding:4px;">$date</td>
        </tr>
        <tr>
            <th style="border: 1px solid black;padding:4px;">Payment Mode</th>
            <td style="border: 1px solid black;padding:4px;">COD</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; border: 1px solid black;padding:4px;"><a href="index.php">Go to Index</a></td>
        </tr>
        </table>

        </div>
    _END;
    
    // header("Refresh:2;url=index.php");
    }
    else{
        header("Refresh:2;url=onlinepay.php?oid=$order_id");
    }

}
else
{
    echo<<<_END
    <div class="alert">
        <div class="alerttext">error occured</div><span class="crossed" >✔</span>
    </div>
    _END;
    header("Refresh:2;url=index.php");
}
}
else{
    header("Location:select.php");
}


?>