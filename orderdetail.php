<html lang="en">
<?php  include 'connection.php';
if(!isset($_COOKIE['userID']))
{
    header("Location:login.php");
}
if(!isset($_GET['oid'])){
    header("location:index.php");
}
if(isset($_GET['crtquant'])){
    $quan=$_GET['crtquant'];
    $crtid=$_GET['crtid'];
    $sql="UPDATE cart_tbl SET p_quantity='$quan' WHERE cartID= '$crtid'";
    $res=$conn->query($sql);
}
$orid=0;
if(isset($_GET['oid'])){
    $orid=$_GET['oid'];
}
$check="SELECT  `order_id` FROM `order_tbl` WHERE `user_id`='$user'";
$chres=$conn->query($check);
$chflag=1;
while($chrow=$chres->fetch_assoc()){
    if($orid==$chrow['order_id']){
        $chflag=0;
        break;
    }
}

if($chflag==1){
    header("location:index.php");
}
$flag=0;
if(isset($_GET['flag'])){
    $flag=$_GET['flag'];   
}

$amt=0;
$status="";
$ship="";
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="public\css\nav.css">
    <link rel="stylesheet" href="public\css\home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Mulish', sans-serif;
        }

        :root {
            --text-clr: #4f4f4f;
        }

        p {
            color: #6c757d;
        }

        a {
            text-decoration: none;
            color: var(--text-clr);
        }

        a:hover {
            text-decoration: none;
            color: var(--text-clr);
        }

        h2 {
            color: var(--text-clr);
            font-size: 1.5rem;
        }

        .main_cart {
            background: #fff;
        }

        .card {
            border: none;
        }

        .product_img img {
            min-width: 200px;
            max-height: 200px;
        }

        .product_name {
            color: black;
            font-size: 1.4rem;
            text-transform: capitalize;
            font-weight: 500;
        }

        .card-title p {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .remove-and-wish p {
            font-size: 0.8rem;
            margin-bottom: 0;
        }

        .price-money h3 {
            font-size: 1rem;
            font-weight: 600;
        }

        .set_quantity {
            position: relative;
        }

        /* .set_quantity::after {
            content: "(Note, 1 piece)";
            width: auto;
            height: auto;
            text-align: center;
            position: absolute;
            bottom: -20px;
            right: 1.5rem;
            font-size: 0.8rem;
        } */

        .page-link {
            line-height: 16px;
            width: 45px;
            font-size: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #495057;
        }

        .submit {
            position: absolute;
            top: 40px;
            left: 80px;
            color: white;
            background-color: black;
            border: 2px solid black;
            border-radius: 5px;
            opacity: 0.5;
        }

        .submit:hover {
            opacity: 1;
        }

        .page-item input {
            line-height: 22px;
            padding: 3px;
            font-size: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .page-link:hover {
            text-decoration: none;
            color: #495057;
            outline: none !important;
        }

        .page-link:focus {
            box-shadow: none;
        }

        .price_indiv p {
            font-size: 1.1rem;
        }

        .fa-heart:hover {
            color: red;
        }

        .alttext {
            text-align: center;
            font-size: 5vw;
            color: teal;
            /* height:100%; */
            margin: 20%;
            font-weight: 800;
            line-height: 90px;
        }

        .additem {
            font-size: 1vw;
            line-height: 30px;
            background: teal;
            color: white;
            border: 2px solid teal;
            border-radius: 10px;
            padding: 10px;
            margin-top: 30px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .addbtn {
            background: teal;
            color: white;
            border: 2px solid teal;
        }

        .additem:hover,
        .addbtn:hover {
            background: black;
            border: 2px solid black;
            color: white;

        }
        @media only screen and (max-width:500px){
            .description{
                width:100%;
            }
        }
        .action{
            display:flex;
            justify-content:center;
            align-items:center;
            margin-top:60px;
        }
        .buttons{
            margin-right:30px;
            display:flex;
            justify-content:center;
            align-items:center;
            height:60px;
            width:140px;
            color:white;
            background:red;
            border-radius:10px;
            font-size:18px;
            font-weight:800;
            cursor:pointer;
        }
        .feedback{
            background:green;
        }
        .canceltext{
            
            display:flex;
            justify-content:center;
            align-items:center;
            display:none;
        }
        .details{
            border-top:1px solid black;
            display:flex;
            flex-direction:column;
            height:auto;
            width:100%;
            justify-content:center;
            align-items:center;
        }
        .details div{
            display:flex;
            flex-direction:row;
            width:60%;
        }
        .title{
            margin:10px 0;
            width:30%;
            color:teal;
            font-weight:bold;
        }
        .titledetail{
            margin:10px 0;
            width:70%;
        }
        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
        }
        .canceltext {
            text-align: center;
            padding: 20px;
        }

        .cancelcontainer {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 900px;
            margin: auto;
        }
        .sub{
            margin-left:200px;
        }
        .rej{
            margin-left:200px;
        }
        .boxradio{
        display: inline-block;
    min-width: 70px;
    height: 40px;
    text-align: center;
    font-size: 20px;
    border: 1px solid #383838;
    /* border-radius: 50%; */
    /* margin: 10px; */
    margin-left: 0;
    line-height: 40px;
    text-transform: uppercase;
    color: #383838;
    cursor: pointer;
    white-space: nowrap;
}

.boxradio.check {
    background: teal;
    color: #fff;
}
.hidden-radio {
    position: absolute;
    opacity: 0;
    width: 1px;
    height: 1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    margin: -1px;
    padding: 0;
    border: 0;
}

    </style>
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
    </style>
    <title>cart</title>
</head>
<?php
    if($flag=='1'){
        ?>
        <div class="alert">
        <div class="alerttext">Thank You for your feedback !!</div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
    if($flag=='2'){
        ?>
        <div class="alert">
        <div class="alerttext">Error occured while submitting. Try again !</div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
    
?>
<body>
    <div class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-11 mx-auto">
                    <div class="row mt-5 gx-3">
                        <!-- left side div -->
                        <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
                            <?php
                        $sql="SELECT * FROM order_detail WHERE order_id=$orid AND quantity!=0";
                        $result=$conn->query($sql);
                        $total=0.0;
                        if($result->num_rows !=0){
                        while($row=$result->fetch_assoc())
                        {
                            $crtid=$row['order_id'];
                            $crtsize=$row['size'];
                            $crtprid=$row['product_id'];
                            $crtquan=$row['quantity'];
                            $crtcol=$row['color'];
                            $crtsql="SELECT * FROM product_desc INNER JOIN color ON color.cid=product_desc.cid  INNER JOIN image ON image.cid=color.cid INNER JOIN product ON product.Product_id=color.product_id  WHERE product.Product_id='$crtprid' AND product_desc.size='$crtsize' AND color.color='$crtcol'";
                            $crtresult=$conn->query($crtsql);
                            $crtrow=$crtresult->fetch_assoc();
                            
                            ?>
                            <div class="card p-4">
                                <!-- <h2 class="py-4 font-weight-bold">Cart</h2> -->
                                <div class="row">
                                    <div
                                        class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                                        <img src="<?php echo $crtrow['Image_path1']; ?>" class="img-fluid"
                                            alt="cart img">
                                    </div>
                                    <!-- cart product details -->
                                    <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                                        <div class="row">
                                            <!-- product name  -->
                                            <span class=" description col-5 card-title">
                                                <h1 class="mb-4 product_name">
                                                    <?php echo $crtrow['product_name']; ?>
                                                </h1>
                                                <p class="mb-2">COLOR:
                                                    <?php echo $crtrow['color']; ?>
                                                </p>
                                                <p class="mb-3">SIZE:
                                                    <?php echo $crtrow['size']; ?>
                                                </p>
                                                <p class="mb-3">QUANTITY:
                                                    <?php echo $crtquan; ?>
                                                </p>
                                                </span>
                                            <span class="description col-7 card-title">
                                                <?php echo ($crtrow['product_details']); ?>
                                            </span>
                                            <!-- quantity inc dec -->
                                            <!--  -->
                                        <!-- //remover move and price -->
                                        <div class="description row">
                                            
                                            <div class="description col-4 d-flex justify-content-end price_money" style="justify-content:flex-start!important">
                                                <h3>&#8377;<span id="itemval<?php echo $crtsize.$crtcol;?>">
                                                        <?php echo ($crtrow['price']*$crtquan); ?>
                                                    </span></h3>
                                            </div>
                                            <div class="description col-8 d-flex justify-content-end price_money" style="justify-content:flex-end!important">
                                                <div class="buttons view" style="width:auto;height:40px;padding-right:20px;padding-left:20px;background:green"  >Give Feedback</div>
                                                <!-- <div class="buttons"></div> -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                               
                                <div class="container" style="flex-direction:column;display:none">
                                <hr>
                        <form action="feedback.php" class="feedbackform" method="post">
                            <input type="hidden" class="form-control" name="oid" id="exampleFormControlInput1<?php echo $crtprid;?>" value="<?php echo $orid; ?>">
                           
                            <div class="mb-3">
                            <input type="hidden" class="form-control" name="uid" id="exampleFormControlInput1<?php echo $crtprid;?>" value="<?php echo $user; ?>">
                            </div>
                            <div class="mb-3">
                            <input type="hidden" class="form-control" name="pid" id="exampleFormControlInput1<?php echo $crtprid;?>" value="<?php echo $crtprid; ?>">
                            </div>
                            <div class="mb-3">
                            <div class="rate-text">Rate the product from 1-5</div>
                            
                            <input type="radio"  name="rate" id="exampleFormControlInput2<?php echo $crtprid;?>" class="hidden-radio" value="1"  required>
                            <label for="exampleFormControlInput2<?php echo $crtprid;?>" class="boxradio">1</label>
                            <input type="radio"  name="rate" id="exampleFormControlInput3<?php echo $crtprid;?>" class="hidden-radio" value="2"  required>
                            <label for="exampleFormControlInput3<?php echo $crtprid;?>" class="boxradio">2</label>
                            <input type="radio"  name="rate" id="exampleFormControlInput4<?php echo $crtprid;?>"  class="hidden-radio" value="3"  required>
                            <label for="exampleFormControlInput4<?php echo $crtprid;?>" class="boxradio">3</label>
                            <input type="radio"  name="rate" id="exampleFormControlInput5<?php echo $crtprid;?>" class="hidden-radio" value="4"  required>
                            <label for="exampleFormControlInput5<?php echo $crtprid;?>" class="boxradio">4</label>
                            <input type="radio"  name="rate" id="exampleFormControlInput6<?php echo $crtprid;?>" class="hidden-radio" value="5"  required>
                            <label for="exampleFormControlInput6<?php echo $crtprid;?>" class="boxradio">5</label>
                            
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1<?php echo $crtprid;?>" class="form-label">Give your feedback for the product</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1<?php echo $crtprid;?>" name="feedtext" rows="3"></textarea>
                            </div>
                            <input type="submit" class="feedbacksubmit buttons" style="background:green;width:80px;height:50px;" value="Submit" ><br>
                            <button class="cancelform buttons" style="background:blue;width:80px;height:50px;" >Back</button>
                        </form>
                        <hr>
                        </div>
                       
                            </div>
                            <?php
                        $total=$total+($crtrow['price']*$crtquan);
                        }
                    }
                    else{
                        ?>
                            <div class="alttext">No items in cart<br><br><a href="select.php" class="additem">Add
                                    items</a></div>

                            <?php
                    }
                    
                        
                    ?>
                            <!-- 2nd cart product -->

                        </div>
                        <div class="details" >
                            <?php
                            $det="SELECT * FROM `order_tbl` WHERE order_id='$orid'";
                            $detres=$conn->query($det);
                            while($detrow=$detres->fetch_assoc()){?>
                            <div><div class="title">Order id</div><div class="titledetail"><?php echo $detrow['order_id'];?></div></div>
                            <div><div class="title">User id</div><div class="titledetail"><?php echo $detrow['user_id'];?></div></div>
                            <div><div class="title">Name</div><div class="titledetail"><?php echo $detrow['fname'].' '.$detrow['lname'];?></div></div>
                            <div><div class="title">Mobile no.</div><div class="titledetail"><?php echo $detrow['mobile'];?></div></div>
                            <div><div class="title">Email</div><div class="titledetail"><?php echo $detrow['email'];?></div></div>
                            <div><div class="title">Order date</div><div class="titledetail"><?php 
                             $currentDate = $detrow['order_date']; 

                             $timestamp2 = strtotime($currentDate); 

                             $formattedDate2 = date("d F, Y", $timestamp2);
                            echo $formattedDate2;?></div></div>
                            <div><div class="title">shipping address</div><div class="titledetail"><?php echo $detrow['shipping_address'];?></div></div>
                            <div><div class="title">order Status</div><div class="titledetail"><?php $status=$detrow['order_status']; echo $detrow['order_status'];?></div></div>
                            <div><div class="title">order Amount</div><div class="titledetail">&#8377; <?php $amt=$detrow['order_amount']; echo $detrow['order_amount'];?></div></div>
                            <div><div class="title">shipping status</div><div class="titledetail"><?php $ship=$detrow['shipping_status']; echo $detrow['shipping_status'];?></div></div>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <!-- right side div -->
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php
    if($status!="cancelled" && $status!="replace" && $status=="complete"){
        ?>
    <div class="action">
        <div class="buttons cancel" style="width:auto;padding-right:20px;padding-left:20px;margin-bottom:50px;" onclick=cancelorder()>Cancel / Replace Order</div>
        <!-- <div class="buttons"></div> -->
        
            <!-- <div class="buttons"></div> -->
            
        </div>
    </div>
    <?php
    }
   
    else{
        ?>
    <div class="action">
        <div class="buttons view" style="cursor:default;background:white;color:black;border:2px solid black;width:auto;padding-right:20px;padding-left:20px;margin-bottom:50px;" >Updates will be shared</div>
        <!-- <div class="buttons"></div> -->
        
    </div>
    <?php
    }
    ?>
    
    <div class="canceltext">
        <div class="cancelcontainer">

        <h5 style="color:red"><b>Note: Order cancelled cannot be reversed . You have to order again . <br>If you have more than one products , you have to order all items again.</b><br></h5><br>
            <form action="cancel.php" method="post">
                <label for=""><h5><b>Select reasons</b> </h5></label><br>
                <input type="hidden" class="hidden" name="oid" value="<?php echo $orid;?>" >
                <input type="hidden" class="hidden" name="amt" value="<?php echo $amt;?>" >
                <input type="radio" name="cancel" value="dont want product" id="r1" required>
                <label for="r1">Dont want product</label><br>
                <input type="radio" name="cancel" value="wrong product" id="r2" required>
                <label for="r2">Wrong product</label><br>
                <input type="radio" name="cancel" value="defective product" id="r3" required>
                <label for="r3">Defective product</label><br>
                <input type="radio" name="cancel" value="wrong Details provided" id="r4" required>
                <label for="r4">Wrong Details provided</label><br><hr>

                <input type="radio" name="type" value="cancelled" id="tp1" required>
                <label for="tp1">Return</label><br>
                <input type="radio" name="type" value="replace" id="tp2" required>
                <label for="tp2">Replace</label><br>  
                <!-- <input type="radio" name="cancel" value="">
                <label for=""></label><br>
                <input type="radio" name="cancel" value="">
                <label for=""></label><br> -->
                <br>
                <div class="all" style="display:flex;flex-direction:row;justify-content:center">
                <input type="submit" class="buttons " value="Initiate">
                
                <button class="buttons reject" style="background:blue" value="Reject cancellation">Reject cancellation</button>
            </div>
        </form>
        </div>
    </div>
    
    
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>

    <script type="text/javascript">

        var product_total_amt = document.getElementById('product_total_amt');
        var shipping_charge = document.getElementById('shipping_charge');
        var total_cart_amt = document.getElementById('total_cart_amt');
        var discountCode = document.getElementById('discount_code1');
        const decreaseNumber = (incdec, itemprice, pprice) => {
            var itemval = document.getElementById(incdec);
            var itemprice = document.getElementById(itemprice);
            console.log(itemprice.innerHTML);
            // console.log(itemval.value);
            if (itemval.value <= 0) {
                itemval.value = 0;
                alert('Negative quantity not allowed');
            } else {
                itemval.value = parseInt(itemval.value) - 1;
                itemval.style.background = '#fff';
                itemval.style.color = '#000';
                itemprice.innerHTML = parseInt(itemprice.innerHTML) - parseInt(pprice);
                product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) - parseInt(pprice);
                total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
            }
        }
        const increaseNumber = (incdec, itemprice, pprice) => {
            var itemval = document.getElementById(incdec);
            var itemprice = document.getElementById(itemprice);
            // console.log(itemval.value);
            // if (itemval.value >= 5) {
            //     itemval.value = 5;
            //     alert('max 5 allowed');
            //     itemval.style.background = 'red';
            //     itemval.style.color = '#fff';
            // } else {
            itemval.value = parseInt(itemval.value) + 1;
            itemprice.innerHTML = parseInt(itemprice.innerHTML) + parseInt(pprice);
            product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(pprice);
            total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
            // }
        }

        const discount_code = () => {
            let totalamtcurr = parseInt(total_cart_amt.innerHTML);
            let error_trw = document.getElementById('error_trw');
            if (discountCode.value === 'foot15') {
                let newtotalamt = totalamtcurr - 15;
                total_cart_amt.innerHTML = newtotalamt;
                error_trw.innerHTML = "Hurray! code is valid";
            } else {
                error_trw.innerHTML = "Try Again! Valid code is thapa";
            }
        }

        //     var crtfrm=document.querySelectorAll(".quanform");
        //     var inp=document.querySelectorAll(".quant");
        //     var submit=document.querySelectorAll(".submit");
        //     for (var i = 0; i < crtfrm.length; i++) {
        //         submit[i].addEventListener("click", function () {
        //             console.log("kak");
        //             crtfrm[i].submit();
        //         })
        // }
        var rejectButton = document.querySelector(".reject");

rejectButton.addEventListener("click", function(event) {
    document.querySelector(".canceltext").style.display="none";
    document.querySelector(".cancel").style.display="flex";
    event.preventDefault(); // This prevents the default form submission behavior
});


        function cancelorder(){
            
            if(confirm("are you sure you want to cancel or Replace order ?")){
                document.querySelector(".canceltext").style.display="flex";
                document.querySelector(".cancel").style.display="none";

            }
        }
        const cancelForm = document.getElementById('cancelForm');
        const rejectButtons = document.querySelector('.reject');

        
        rejectButtons.addEventListener('click', function (event) {
                // Temporarily disable required attribute before rejection action
                const radioButtons = cancelForm.querySelectorAll('input[type="radio"]');
                radioButtons.forEach(radio => {
                    radio.removeAttribute('required');
                });
                // Proceed with rejection action
                // You can add your code here to hide the radio buttons or perform any other action
            });
       
       
    </script>
<script>
    const sizeBtns = document.querySelectorAll('.boxradio'); // selecting size buttons
let checkedBtn = 0; // current selected button

sizeBtns.forEach((item, i) => { // looping through each button
    item.addEventListener('click', () => { // adding click event to each 
        sizeBtns[checkedBtn].classList.remove('check'); // removing check class from the current button
        item.classList.add('check'); // adding check class to clicked button
        checkedBtn = i; // upading the variable
    })
})
let container=document.querySelectorAll(".container");
let feedbtn=document.querySelectorAll(".view");
var form = document.querySelectorAll(".feedbackform");
var rejectButton = document.querySelectorAll(".cancelform");
for(let i=0;i<feedbtn.length;i++){
    feedbtn[i].addEventListener("click",()=>{

        container[i].style.display="flex";
    })

    rejectButton[i].addEventListener("click", function(event) {
    container[i].style.display = "none";
    event.preventDefault();
    }); 

    form[i].addEventListener("submit", function(event) {
    if (!validateForm(form[i])) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
    });

    function validateForm(form) {
        var radios = form.querySelectorAll('input[name="rate"]');
        var formValid = false;

        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                formValid = true;
                break;
            }
        }

        if (!formValid) {
            alert("Please select a rating.");
            return false; // Form validation failed
        }

        return true; // Form validation succeeded
    }
}










</script>
<script>
    function cross(){
        var alerttext=document.querySelector(".alerttext");
        var alert=document.querySelector(".alert");
        alerttext.textContent="";
        alert.style.display="none";
    }
    var alert=document.querySelector(".alert");
    setTimeout(function() {
        alert.style.display="none";
        }, 4000);
    
</script>
    

</body>

</html>