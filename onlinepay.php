<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
	</script>
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
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif
        }

        body {
            /* background-color: teal; */
        }

        .container {
            margin: 20px auto;
            width: 800px;
            padding: 30px
        }

        .card.box1 {
            width: 350px;
            height: 500px;
            background-color: teal;
            color: white;
            border-radius: 0
        }

        .card.box2 {
            width: 450px;
            height: 580px;
            background-color: #ffffff;
            border-radius: 0
        }

        .text {
            font-size: 13px
        }

        .box2 .btn.btn-primary.bar {
            width: 20px;
            background-color: transparent;
            border: none;
            color: teal
        }

        .box2 .btn.btn-primary.bar:hover {
            color: white
        }

        .box1 .btn.btn-primary {
            background-color: #57c97d;
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ddd
        }

        .box1 .btn.btn-primary:hover {
            background-color: #f6f8f7;
            color: #57c97d
        }

        .btn.btn-success {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none
        }

        .nav.nav-tabs {
            border: none;
            border-bottom: 2px solid #ddd
        }

        .nav.nav-tabs .nav-item .nav-link {
            border: none;
            color: black;
            border-bottom: 2px solid transparent;
            font-size: 14px
        }

        .nav.nav-tabs .nav-item .nav-link:hover {
            border-bottom: 2px solid teal;
            color: #05cf48
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            border-bottom: 2px solid teal
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
            height: 20px;
            font-weight: 600;
            font-size: 14px;
            padding: 15px 0px;
            letter-spacing: 1.5px;
            border-radius: 0
        }

        .inputWithIcon {
            position: relative
        }

        img {
            width: 50px;
            height: 20px;
            object-fit: cover
        }

        .inputWithIcon span {
            position: absolute;
            right: 0px;
            bottom: 9px;
            color: #57c97d;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 1px solid #ddd
        }

        .btn-outline-primary {
            color: black;
            background-color: #ddd;
            border: 1px solid #ddd
        }

        .btn-outline-primary:hover {
            background-color: #05cf48;
            border: 1px solid #ddd
        }

        .btn-check:active+.btn-outline-primary,
        .btn-check:checked+.btn-outline-primary,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show,
        .btn-outline-primary:active {
            color: white;
            background-color: teal;
            box-shadow: none;
            border: 1px solid #ddd
        }

        .btn-group>.btn-group:not(:last-child)>.btn,
        .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
        .btn-group>.btn-group:not(:first-child)>.btn,
        .btn-group>.btn:nth-child(n+3),
        .btn-group>:not(.btn-check)+.btn {
            border-radius: 50px;
            margin-right: 20px
        }

        form {
            font-size: 14px
        }

        form .btn.btn-primary {
            width: 100%;
            height: 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: teal;
            border: 1px solid #ddd
        }

        form .btn.btn-primary:hover {
            background-color: #05cf48
        }

        .filterdiv{
            display:none;
        }
        @media (max-width:750px) {
            .container {
                padding: 10px;
                width: 100%
            }

            .text-green {
                font-size: 14px
            }

            .card.box1,
            .card.box2 {
                width: 100%
            }

            .nav.nav-tabs .nav-item .nav-link {
                font-size: 12px
            }
        }
        .show{
            display:block;
        }
        
        .upidiv,.qrcontainer,#qrcode{
            height:100%;
            width:100%;
            /* display:flex;
            justify-content:center; */
            
        }
        #qrcode{
            display:flex;
            justify-content:center;
            flex-direction:column-reverse;
            align-items:center;
        }
        #qrcode img{
            height:60%;
            width:60%;
        }
        .table-container{
            display:flex;
            width:100%;
            height:100vh;
            justify-content:center;
        }

    </style>
</head>

<?php
include 'connection.php';
if(isset($_GET['oid'])){
    $oid=$_GET['oid'];

}
if(isset($_GET['orderid'])){
    $order = $_GET['orderid'];
    $timestamp = time() % 10000000000; // Current Unix timestamp

            // Generate a random component
    $randomComponent = mt_rand(100000000, 999999999); // Generate a random 9-digit number

            // Combine components to form the number
    $number = $timestamp . $randomComponent;

            // Now $number contains a unique 12-digit number          
    $paystatus="paid";
    

    // Start the transaction
    $conn->begin_transaction();

    // Attempt to update order status
    $orderSql = "UPDATE order_tbl SET order_status = 'placed' WHERE order_id = '$order'";
    $orderResult = $conn->query($orderSql);

    // Attempt to update payment status
    $paymentSql="INSERT INTO `payment`(`transaction_id`, `order_id`, `payment_mode`, `payment_status`) VALUES ('$number','$order','online','$paystatus')";
    $paymentResult=$conn->query($paymentSql);
    

    // Commit or rollback the transaction based on the query results
    if($orderResult && $paymentResult) {
        $conn->commit();
        $date=date('y-m-d');

        echo<<<_END
        

        <div class="table-container">
        <table style="height: 200px; border-collapse: collapse;">
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
            <td style="border: 1px solid black;padding:4px;">
        _END;
            $currentDate = $date ; 

            $timestamp2 = strtotime($currentDate); 

            $formattedDate2 = date("d F, Y", $timestamp2);
           echo $formattedDate2;
        echo<<<_END
            </td>
        </tr>
        <tr>
            <th style="border: 1px solid black;padding:4px;">Payment Mode</th>
            <td style="border: 1px solid black;padding:4px;">Online</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; border: 1px solid black;padding:4px;"><a href="index.php">Go to Index</a></td>
        </tr>
        </table>

        </div>
    _END;
        // header("Refresh:2;url=index.php");
    } 
    else {
        $conn->rollback();
        echo<<<_END
        <div class="alert">
            <div class="alerttext">Unknown Error occurred!!</div><span class="crossed" >✔</span>
        </div>
        _END;
        header("Refresh:2;url=index.php");
    }
}
?>




<body>
    <?php
    if(isset($_GET['oid'])){
    $sql="SELECT * FROM `order_tbl` WHERE order_id='$oid'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    ?>

    <div class="container bg-light d-md-flex align-items-center">
        <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
            <div class="fw-bolder mb-4"><span >&#8377;</span><span class="ps-1"><?php echo $row['order_amount']; ?></span></div>
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between text"> <span class="">service charge</span>
                    <span >&#8377;<span class="ps-1">1.99</span></span>
                </div>
                <div class="d-flex align-items-center justify-content-between text mb-4"> <span>Total</span> <span
                        >&#8377;<span class="ps-1"><?php echo ($row['order_amount']+1.99); ?></span></span> </div>
                <div class="border-bottom mb-4"></div>
                <div class="d-flex flex-column mb-4"> <span class="far fa-file-alt text"><span class="ps-2">Invoice
                            ID:</span></span> <span class="ps-3">SN8478042099</span> </div>
                <div class="d-flex flex-column mb-5"> <span class="far fa-calendar-alt text"><span class="ps-2">Date of 
                            payment:</span></span> <span class="ps-3"><?php echo $row['order_date']; ?></span> </div>
                <div class="d-flex align-items-center justify-content-between text mt-5">
                    <div class="d-flex flex-column text"> <span>Customer Support:</span> <span>online chat 24/7</span>
                    </div>
                    <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
                </div>
            </div>
        </div>
        <div class="card box2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span
                    class="h5 fw-bold m-0">Payment methods</span>
                <div class="btn btn-primary bar">
                    <!-- <span class="fas fa-bars"></span> -->
                </div>
            </div>
            <ul class="nav nav-tabs mb-3 px-md-4 px-2">
                <li class="nav-item"> <a class="nav-link px-2 active credit" aria-current="page" href="#" id="credit" onclick="filterSelection('credit')">Credit Card</a> </li>
                <li class="nav-item"> <a class="nav-link px-2 debit" href="#" id="Debit" onclick="filterSelection('debit')">Debit Card</a> </li>
                <li class="nav-item"> <a class="nav-link px-2 upi" href="#" id="upi" onclick="filterSelection('upi')">UPI</a> </li>
            </ul>
            <!-- <div class="px-md-5 px-4 mb-4 d-flex align-items-center">
                <div class="btn btn-success me-4"><span class="fas fa-plus"></span></div>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> <input type="radio"
                        class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked> <label
                        class="btn btn-outline-primary" for="btnradio1"><span class="pe-1">+</span>5949</label> <input
                        type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"> <label
                        class="btn btn-outline-primary" for="btnradio2"><span class="lpe-1">+</span>3894</label> </div>
            </div> -->
            <div class="creditcrd filterdiv credit show">
            <form id="paymentFormCredit" action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Credit Card</span>
                            <div class="inputWithIcon"> <input class="form-control" type="text"
                                    placeholder="Enter Card number" maxlength="16" minlength="16" required> <span class=""> <img
                                        src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png"
                                        alt=""></span> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span>Expiration<span
                                    class="ps-1">Date</span></span>
                            <div class="inputWithIcon"> <input type="text" class="form-control" placeholder="mm/yy" required>
                             <!-- <span class="fas fa-calendar-alt"></span> -->
                             </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Code CVV</span>
                            <div class="inputWithIcon"> <input type="password" class="form-control" maxlength="3" minlength="3" required> <span
                                    class="fas fa-lock"></span> </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Name</span>
                            <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                    placeholder="Your name " required> <span class="far fa-user"></span> </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $oid;?>" class="hidden" name="orderid">
                    <div class="col-12 px-md-5 px-4 mt-3">
                        <div class="btn submit btn-primary w-100" onclick="myFunction('paymentFormCredit')">Pay &#8377;<?php echo ($row['order_amount']+1.99); ?> </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="debitcrd filterdiv debit show">
            <form id="paymentForm" action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Debit Card</span>
                            <div class="inputWithIcon"> <input class="form-control" type="text"
                                    placeholder="Enter card number" maxlength="16" minlength="16" required> <span class=""> <img
                                        src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png"
                                        alt=""></span> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> <span>Expiration<span
                                    class="ps-1">Date</span></span>
                            <div class="inputWithIcon"> <input type="text" class="form-control" placeholder="mm/yy" required>
                             <!-- <span class="fas fa-calendar-alt"></span> -->
                             </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Code CVV</span>
                            <div class="inputWithIcon"> <input type="password" class="form-control" maxlength="3" minlength="3" required> <span
                                    class="fas fa-lock"></span> </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Name</span>
                            <div class="inputWithIcon"> <input class="form-control text-uppercase" type="text"
                                    placeholder="Your name " required> <span class="far fa-user"></span> </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $oid;?>" class="hidden" name="orderid">
                    <div class="col-12 px-md-5 px-4 mt-3">
                        <div class="btn submit btn-primary w-100" onclick="myFunction('paymentForm')" >Pay &#8377;<?php echo ($row['order_amount']+1.99); ?></div>
                    </div>
                </div>
            </form>
            </div>
            <div class="upidiv upi filterdiv show">
                <div class="qrcontainer">
                <div id="qrcode">
                <div class="upiimages" style="margin-top:30px;"><img src="public\img\upiimages.jpg" alt="" class="image" style="width:100%"></div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
    <!-- <script>
    // let debit=document.querySelector("#debit");
    // let credit=document.querySelector("#credit");
    // let upi=document.querySelector("#upi");

    var option=document.querySelectorAll(".option");
    
    let creditdiv=document.querySelector(".creditcrd");
    let debitdiv=document.querySelector(".debitcrd");
    let upidiv=document.querySelector(".upidiv");
    for(var i=0;i<option.length;i++){
        option[i].classList.split(" ");
        option[i].addEventListener("click",()=>{
            
        })
        
    }
    </script> -->


<script>
    filterSelection("credit")
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterdiv");
    if (c == "all") c = "";
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

// Show filtered elements
function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    console.log(arr1);
    arr2 = name.split(" ");
    console.log(arr2);
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    console.log(arr1);
    arr2 = name.split(" ");
    console.log(arr2);
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
// var btnContainer = document.getElementById("myBtnContainer");
var btns = document.getElementsByClassName("nav-link");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}
</script>

<script>
		var qrcode = new QRCode("qrcode",
		"https://www.geeksforgeeks.org");

        var qrimage=document.querySelector("#qrcode[img]");
        console.log(qrimage);
	</script>

<script>
    function myFunction(formId) {
    // Get the form element by its ID
    var formElement = document.getElementById(formId);

    console.log("Form element:", formElement); // Debugging statement

    // Check if the form element exists
    if (formElement) {
        // Set the action attribute of the form to the current page URL
        formElement.action = window.location.href;

        // Submit the form
        formElement.submit();
    } else {
        console.error("Form element not found."); // Debugging statement
    }
}

</script>
</body>

</html>