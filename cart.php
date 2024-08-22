<html lang="en">
<?php  include 'connection.php';
if(!isset($_COOKIE['userID']))
{
    header("Location:login.php");
}

if(isset($_GET['crtquant'])){
    $quan=$_GET['crtquant'];
    $crtid=$_GET['crtid'];
    $sql="UPDATE cart_tbl SET p_quantity='$quan' WHERE cartID= '$crtid'";
    $res=$conn->query($sql);
}
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
        crossorigin="anonymous" />
        <link rel="stylesheet" href="public\css\nav.css">
        <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="public\css\home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
        .submit{
            position:absolute;
            top:40px;
            left:80px;
            color:white;
            background-color:teal;
            border:2px solid black;
            border-radius:5px;
            opacity:1;
        }
        .submit:hover{
            opacity:1;
            background:green;
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
        .alttext{
            text-align:center;
            font-size:5vw;
            color:teal;
            /* height:100%; */
            margin:20%;
            font-weight:800;
            line-height:90px;
        }
        .additem{
            font-size:1vw;
            line-height:30px;
            background:teal;
            color:white;
            border:2px solid teal;
            border-radius:10px;
            padding:10px;
            margin-top: 30px;
            cursor:pointer;
            text-decoration:none;
            color:white;
        }
        .addbtn{
            background:teal;
            color:white;
            border:2px solid teal;
        }
        .additem:hover,.addbtn:hover{
            background:black;
            border:2px solid black;
            color:white;

        }
    </style>
    <title>cart</title>
</head>
<body>
<div class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
                <div class="row mt-5 gx-3">
                    <!-- left side div -->
                    <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
                    <?php
                        $sql="SELECT * FROM cart_tbl WHERE user_id='$user' AND p_quantity!=0";
                        $result=$conn->query($sql);
                        $total=0.0;
                        $applied=0.0;
                        if($result->num_rows !=0){
                        while($row=$result->fetch_assoc())
                        {
                            $crtid=$row['cartID'];
                            $crtsize=$row['p_size'];
                            $crtprid=$row['product_id'];
                            $crtquan=$row['p_quantity'];
                            $crtcol=$row['p_color'];
                            $crtsql="SELECT * FROM product_desc INNER JOIN color ON color.cid=product_desc.cid  INNER JOIN image ON image.cid=color.cid INNER JOIN product ON product.Product_id=color.product_id  WHERE product.Product_id='$crtprid' AND product_desc.size='$crtsize' AND color.color='$crtcol'";
                            $crtresult=$conn->query($crtsql);
                            $crtrow=$crtresult->fetch_assoc();
                            $disquan=0;
                            ?>
                            <div class="card p-4">
                            <h2 class="py-4 font-weight-bold">Cart</h2>
                            <div class="row">
                                <div
                                    class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
                                    <img src="<?php echo $crtrow['Image_path1']; ?>" class="img-fluid" alt="cart img">
                                </div>
                                <!-- cart product details -->
                                <div class="col-md-7 col-11 mx-auto px-4 mt-2">
                                    <div class="row">
                                        <!-- product name  -->
                                        <div class="col-6 card-title">
                                            <h1 class="mb-4 product_name"><?php echo $crtrow['product_name']; ?></h1>
                                            <p class="mb-2">COLOR: <?php echo $crtrow['color']; ?></p>
                                            <p class="mb-3">SIZE: <?php echo $crtrow['size']; ?></p>
                                        </div>
                                        <!-- quantity inc dec -->
                                        <div class="col-6">
                                            <ul class="pagination justify-content-end set_quantity">
                                                <li class="page-item">
                                                    <button class="page-link "
                                                        onclick="decreaseNumber('textbox<?php echo $crtprid.$crtsize.$crtcol;?>','itemval<?php echo $crtprid.$crtsize.$crtcol;?>','<?php echo $crtrow['price'];?>')">
                                                        <i class="fas fa-minus"></i> </button>
                                                </li>
                                                <li class="page-item">
                                                <form action="cart.php" class="quanform" method="get">    
                                                    <input type="text" name="crtquant" class="page-link quant"
                                                    value="<?php echo $crtquan; if($crtquan>=20){$disquan=true;}?>" id="textbox<?php echo $crtprid.$crtsize.$crtcol;?>">
                                                    <input type="hidden" name="crtid" value="<?php echo $crtid;?>">
                                                    <input type="submit" value="click to update" class="submit">
                                                </form>
                                                </li>
                                                <li class="page-item">
                                                    <button class="page-link"
                                                        onclick="increaseNumber('textbox<?php echo $crtprid.$crtsize.$crtcol;?>','itemval<?php echo $crtprid.$crtsize.$crtcol;?>','<?php echo $crtrow['price'];?>')"> <i
                                                            class="fas fa-plus"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- //remover move and price -->
                                    <div class="row">
                                        <div class="col-8 d-flex justify-content-between remove_wish">
                                            <p><i class="fas fa-trash-alt"></i> REMOVE ITEM</p>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end price_money">
                                            <h3>&#8377;<span id="itemval<?php echo $crtprid.$crtsize.$crtcol;?>"><?php echo ($crtrow['price']*$crtquan); ?></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($disquan==1){
                                $total=$total+($crtrow['price']*$crtquan);
                                $applied=$applied+(0.20*($crtrow['price']*$crtquan));
                            }
                            else{
                        $total=$total+($crtrow['price']*$crtquan);
                            }
                        }
                    }
                    else{
                        ?>
                        <div class="alttext">No items in cart<br><br><a href="select.php" class="additem">Add items</a></div>
                        
                        <?php
                    }
                    
                        
                    ?>
                   <!-- 2nd cart product -->
                        
                    </div>
                    <!-- right side div -->
                    <div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">
                        <div class="right_side p-3 shadow bg-white">
                            <h2 class="product_name mb-5">The Total Amount Of</h2>
                            <div class="price_indiv d-flex justify-content-between">
                                <p>Product amount</p>
                                <p>&#8377;<span id="product_total_amt"><?php echo $total;?> </span></p>
                            </div>
                            <div class="price_indiv d-flex justify-content-between">
                                <p>discount</p>
                                <p>&#8377;<span id="discount">0</span></p>
                            </div>
                             <div class="price_indiv d-flex justify-content-between">
                                <p>whole sale discount</p>
                                <p>&#8377;<span id="wsdiscount"><?php echo $applied;?></span></p>
                            </div>
                            <div class="price_indiv d-flex justify-content-between">
                                <p>Shipping Charge</p>
                                <p>&#8377;<span id="shipping_charge">50.0</span></p>
                            </div>
                            <hr />
                            <div class="total-amt d-flex justify-content-between font-weight-bold">
                                <p>The total amount of (including VAT)</p>
                                <p>&#8377;<span id="total_cart_amt"><?php echo ($total+50.0)-$applied;?></span></p>
                            </div>
                            <form class="checkform" action="order.php" method="post">
                                <input type="hidden" name="ui" id="ui" value="1">
                                <input type="hidden" name="overdiscount" id="pdiscval" value="">
                                <input type="hidden" name="discount" id="discval" value="<?php echo $applied?>">
                                <input type="submit" class="btn btn-primary text-uppercase" style="background:teal" onclick="check(event)" value="Checkout"></form>
                        </div>
                        <!-- discount code part -->
                        <div class="discount_code mt-3 shadow">
                            <div class="card">
                                <div class="card-body">
                                    <a class="d-flex justify-content-between" data-toggle="collapse"
                                        href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Add a discount code (optional)
                                        <span><i class="fas fa-chevron-down pt-1"></i></span>
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <div class="mt-3">
                                            <!-- <input type="text" name="" id="discount_code1"
                                                class="form-control font-weight-bold"
                                                placeholder="Enter the discount code"> -->
                                            <small id="error_trw" class="text-dark mt-3">Available offers</small>
                                        </div>
                                        <select id="offer" style="min-width:100px;height:30px">
                                            <option style="height:60px;" value="0">Select</option>
                                    <?php
                                        $coupon="SELECT `offer_id`, `offer_name`, `offer_percent` FROM `offer` WHERE `offer_start_date`<`offer_end_date` AND `offer_end_date`>=CURRENT_DATE AND `offer_status`='Enabled'";
                                        $coupres=$conn->query($coupon);
                                        while($courow=$coupres->fetch_assoc()){
                                           ?>
                                                <option style="height:60px;text-wrap:wrap;" value="<?php echo $courow['offer_percent'];?>"><h2><?php echo $courow['offer_name'];?>
                                            </h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4>Get <?php echo $courow['offer_percent'];?> off on your order </h4></option>
                                           <?php
                                        }
                                    ?>
                                     </select><br>
                                        
                                        <button class="btn btn-primary btn-sm mt-3 " style="background:teal"
                                            onclick="discount_code(<?php echo ($total+50.0);?>)">Apply</button>
                                            
                                    </div>
                                   
                                </div>
                            </div>
                        </div>



                        <!-- discount code ends -->
                        <div class="mt-3 shadow p-3 bg-white">
                            <div class="pt-4">
                                <h5 class="mb-4">Expected delivery date</h5>
                                <p><?php
                                $currentDate = date("Y-m-d"); 

                                $futureDate = date("Y-m-d", strtotime($currentDate . " +4 days")); 
                                
                                $timestamp = strtotime($futureDate); 

                                $formattedDate = date("d F, Y", $timestamp);

                                $currentDate = date("Y-m-d"); 

                                $futureDate = date("Y-m-d", strtotime($currentDate . " +5 days")); 

                                $timestamp2 = strtotime($futureDate); 

                                $formattedDate2 = date("d F, Y", $timestamp2);
                                echo $formattedDate ."-". $formattedDate2;
                                ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        var discount=document.querySelector("#discount");
        var pdiscval=document.querySelector("#pdiscval");
        const decreaseNumber = (incdec, itemprice,pprice) => {
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
        const increaseNumber = (incdec, itemprice,pprice) => {
            console.log(incdec);
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
       
        const discount_code = (price) => {
            let offer=document.querySelector("#offer");
            var selectedOption = offer.options[offer.selectedIndex];

            // Get the value and text of the selected option
            var selectedValue = selectedOption.value;
            var selectedText = selectedOption.text;

            // Display the selected value and text
            // alert("Selected value: " + selectedValue + "\nSelected text: " + selectedText);
            // let select_offer = offer.textContent.trim(); // Trim whitespace
            // console.log("Selected offer:", select_offer); // Log selected offer for debugging
            let totalamtcurr = parseInt(price);
            let error_trw = document.getElementById('error_trw');

            if (selectedText) {
                let disc=parseInt((totalamtcurr*selectedValue)/100);
                let newtotalamt = (totalamtcurr - parseInt(disc)-parseInt(discval.value));
                discount.innerHTML=disc;
                
                pdiscval.value=parseInt(disc);
                console.log(pdiscval.value);
                total_cart_amt.innerHTML = parseInt(newtotalamt);
                if(selectedText!=="Select")
                error_trw.innerHTML = "Discount applied";
            } else {
                error_trw.innerHTML = "Try Again! Valid code is thapa";
            }
        }

        function discount(){
            var wsdis= document.querySelector("#wsdiscount");
            wsdis.innerHTML="applied";
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

    function check(event){
        event.preventDefault();
        if(confirm('Once Order is placed, it cannot be cancelled (You can initiate cancellation or returned only after it is delivered)!!')){
            document.querySelector(".checkform").submit();
        }
        else{

        }
    }
    </script>
    
</body>

</html>