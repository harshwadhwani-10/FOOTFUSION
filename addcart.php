<?php
include_once 'connection.php';
$flag=false;
$prid="";
$size="";
$quantity="";
$color="";
if(isset($_COOKIE['userID'])){
    
    $userID=$_COOKIE['userID'];
    if(isset($_GET['id'])){
        $prid=$_GET['id'];
        $quantity=$_GET['quantity'];
        $size=$_GET['size'];
        $color=$_GET['color'];
        $sql="SELECT product_desc.quantity FROM product_desc INNER JOIN color ON product_desc.cid = color.cid INNER JOIN product ON color.product_id = product.product_id INNER JOIN category ON product.Category_ID = category.category_id WHERE product.product_id=5687 AND product_desc.size=6 AND color.color='brown'";
        $res=$conn->query($sql);
        $row=$res->fetch_assoc();
        $quant=$row['quantity'];
        if($quantity>$quant){
            header("Location:product.php?id=$prid&color=$color&upd=e&quant=$quant");
        }
        else{
        $csql="select * FROM `cart_tbl`";
            $res=$conn->query($csql);
            $cid='';
            $uid='';
            $pid='';
            $qty='';
            $col='';
            $siz='';
            while($row=$res->fetch_assoc()){
                $cid=$row['cartID'];
                $uid=$row['user_id'];
                $pid=$row['product_id'];
                $qty=$row['p_quantity'];
                $col=$row['p_color'];
                $siz=$row['p_size'];
                if($prid==$pid && $uid==$userID && $col==$color && $siz==$size){
                    $flag=true;
                    break;
                }
            }
            // echo $cid;
        if($flag==true){
            if($quantity!=$qty){
            $sql="UPDATE `cart_tbl` SET `p_quantity`='$quantity' WHERE `cartID`= '$cid'";
            $result=$conn->query($sql);
            $upd="u";
        }
            else{
                $upd="s";
            }
        }
       else{

           $sql="INSERT INTO `cart_tbl`(`user_id`, `product_id`, `p_quantity`, `p_color`, `p_size`, `p_discount`) VALUES ('$userID','$prid','$quantity','$color','$size',0)";
           $result=$conn->query($sql);
           $upd="i";
       }
        
     
     header("Location:product.php?id=$prid&color=$color&upd=$upd");
    }
}
}
else{
    header("Location:login.php");
}


 ?>

