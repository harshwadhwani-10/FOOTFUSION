<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
if($user=="" || $user==1){
    header("location:login.php");
}
$userquery="SELECT * FROM `user` WHERE userID='$user'";
$res=$conn->query($userquery);
$userrow=$res->fetch_assoc();

$usercart="SELECT count(cartID) AS cartcount FROM `cart_tbl` WHERE user_id='$user' AND p_quantity!=0";
$res=$conn->query($usercart);
$usercart=$res->fetch_assoc();

$userorder="SELECT count(order_id) AS ordercount FROM `order_tbl` WHERE user_id='$user' ";
$res=$conn->query($userorder);
$userorder=$res->fetch_assoc();

$order="SELECT * FROM `order_tbl` WHERE user_id='$user' ORDER BY order_id desc";
$res=$conn->query($order);



?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <link rel="stylesheet" href="adminpanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-EXAMPLEHASH" crossorigin="anonymous" />
   
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" type="text/css" href="public\css\home.css"> -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    /* font-family: 'Poppins', sans-serif; */
}

.gold-star {
            color: gold;
        }

#sidebar {
    padding: 15px 0px 15px 0px;
    border-radius: 10px;
}

#sidebar .h4 {
    font-weight: 500;
    padding-left: 15px;
}

#sidebar ul {
    list-style: none;
    margin: 0;
    padding-left: 0rem;
}

#sidebar ul li {
    padding: 10px 0;
    display: block;
    padding-left: 1rem;
    padding-right: 1rem;
    border-left: 5px solid transparent;
}

#sidebar ul li.active {
    border-left: 5px solid #ff5252;
    background-color: #44007c;
}

#sidebar ul li a {
    display: block;
}

#sidebar ul li a .fas,
#sidebar ul li a .far {
    color: #ddd;
}

#sidebar ul li a .link {
    color: #fff;
    font-weight: 500;
}

#sidebar ul li a .link-desc {
    font-size: 0.8rem;
    color: #ddd;
}

#main-content {
    padding: 30px;
    border-radius: 15px;
}

#main-content .h5,
#main-content .text-uppercase {
    font-weight: 600;
    margin-bottom: 0;
}

#main-content .h5+div {
    font-size: 0.9rem;
}

#main-content .box {
    padding: 10px;
    border-radius: 6px;
    width: 170px;
    height: 90px;
}

#main-content .box img {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

#main-content .box .tag {
    font-size: 0.9rem;
    color: #000;
    font-weight: 500;
}

#main-content .box .number {
    font-size: 1.5rem;
    font-weight: 600;
}

.order {
    padding: 10px 30px;
    min-height: 150px;
}
.ordercard{
    height:auto;
     width:100%;
    border:2px solid black;
    margin:20px 0;
    
    background:white;
    border-radius:10px;
    display:flex;
    flex-direction:row;
    cursor:pointer
    /* justify-content:center; */

}
.ordercard .cardcontainer{
    width:40%;
    padding:20px;
}
.orderbox{
    width:10%;
    text-align:left;
    padding:30px 30px 30px 16px;
    font-size:38px;
    background:teal;
    color:white;
    border-radius:0 10px 10px 0;
}
.order .order-summary {
    height: 100%;
}

.order .blue-label {
    background-color: #aeaeeb;
    color: #0046dd;
    font-size: 0.9rem;
    padding: 0px 3px;
}

.order .green-label {
    background-color: #a8e9d0;
    color: #008357;
    font-size: 0.9rem;
    padding: 0px 3px;
}

.order .fs-8 {
    font-size: 0.85rem;
}

.order .rating img {
    width: 20px;
    height: 20px;
    object-fit: contain;
}

.order .rating .fas,
.order .rating .far {
    font-size: 0.9rem;
}

.order .rating .fas {
    color: #daa520;
}

.order .status {
    font-weight: 600;
}

.order .btn.btn-primary {
    background-color: #fff;
    color: #4e2296;
    border: 1px solid #4e2296;
}

.order .btn.btn-primary:hover {
    background-color: #4e2296;
    color: #fff;
}

.order .progressbar-track {
    margin-top: 20px;
    margin-bottom: 20px;
    position: relative;
    width:50%;
}

.order .progressbar-track .progressbar {
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 0rem;
}

.order .progressbar-track .progressbar li {
    font-size: 1.5rem;
    border: 1px solid #333;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: #dddddd;
    z-index: 100;
    position: relative;
}

.order .progressbar-track .progressbar li.green {
    border: 1px solid #007965;
    background-color: #d5e6e2;
}

.order .progressbar-track .progressbar li::after {
    position: absolute;
    font-size: 0.9rem;
    top: 20px;
    left: 0px;
}

#tracker {
    position: absolute;
    border-top: 1px solid #bbb;
    width: 100%;
    top: 6px;
}

#step-1::after {
    content: 'Placed';
}

#step-2::after {
    content: 'packed';
    left: -10px;
}

#step-3::after {
    content: 'complete';
}

#step-4::after {
    content: 'Shipped';
}

#step-5::after {
    content: 'Delivered';
    left: -10px;
}



/* Backgrounds */
.bg-purple {
    background-color: #55009b;
}

.bg-light {
    background-color: #f0ecec !important;
}

.green {
    color: #007965 !important;
}

/* Media Queries */
@media(max-width: 1199.5px) {
    nav ul li {
        padding: 0 10px;
    }
}

@media(max-width: 500px) {
    .progressbar{
        width:10px;
    }
    .order .progressbar-track .progressbar li {
        font-size: 1rem;
        margin:5px;
    }

    .order .progressbar-track .progressbar li::after {
        font-size: 0.8rem;
        top: -1px;
        left:30px;
    }
    #step-2::after,#step-5::after{
        left:30px;
    }

    #tracker {
        position:absolute;
        /* top: 20px; */
        transform:rotate(90deg);
        left:-30px;
        top:31px;
        width:40%;
    }
}

@media(max-width: 440px) {
    #main-content {
        padding: 20px;
    }

    .order {
        padding: 20px;
    }

    #step-4::after {
        /* left: -5px; */
    }
    #tracker {
        position:absolute;
        /* top: 20px; */
        transform:rotate(90deg);
        left:-26px;
        top:31px;
        width:40%;
    }
}

@media(max-width: 395px) {
    .order .progressbar-track .progressbar li {
        font-size: 0.8rem;
    }

    .order .progressbar-track .progressbar li::after {
        font-size: 0.7rem;
        top: -1px;
    }

    #tracker {
        top: 15px;
    }

    .order .btn.btn-primary {
        font-size: 0.85rem;
    }
    #tracker {
        position:absolute;
        /* top: 20px; */
        transform:rotate(90deg);
        left:-25px;
        top:31px;
        width:40%;
    }
}

@media(max-width: 355px) {
    #main-content {
        padding: 15px;
    }

    .order {
        padding: 10px;
    }
    #tracker {
        position:absolute;
        /* top: 20px; */
        transform:rotate(90deg);
        left:-25px;
        top:31px;
        width:40%;
    }
}
</style>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:Arial, Helvetica, sans-serif;
}
.adminnavbar{
    height:50px;
    width:80%;
    margin:auto;
    /* margin-bottom: 20px; */
}
.navcontainer{
    height:100%;
    width:100%;
    display:flex;
    flex-direction: row;
    background-color: white;
    color:teal;
    
}
.navitems{
    height:100%;
    padding: 5px;
}
.head{
    height:100%;
    width:auto;
    color:teal;
    text-align: center;
    /* margin:auto; */
    margin-left: 10px;
    padding-top: 10px;
    font-weight: 600;
    font-size: 25px;
}
.amenu{
    visibility: hidden;
    margin-left: 2%;
}
.menuimg{
    height:90%;
    padding-top: 2px;
    cursor: pointer;
}
.admin{
    display:flex;
    flex-direction: row;
    align-items:center ;
    width:auto;
    margin-right: 20px;
    margin-left: auto;
    /* justify-content: flex-end; */

}
.bodypage{
    height:100%;
    width:80%;
    margin:auto;
    display:flex;
    flex-direction: row;
}
 .sidebar{
    width:25%;
    height:70%;
    background-color: teal;
    margin-top:20px;
   border-radius:15px;

}
.bodypage .sidecontainer{
    height:100%;
    width:100%;
    background-color: teal;
    color:white;
    /* padding: 20px 10px 10px 0px; */
    /* padding-right: 10px; */
    padding-left: 0px;
    border-right: 2px solid black;
    border-radius:15px;
    padding:20px 0;
}

.bodypage .sideitem1{
    width:calc(100%-10px);
    height:45px;
    /* border:2px solid white; */
    /* text-align:center; */
    padding:10px 0px;
    padding-left: 10px;
    font-size: 14px;
    background-color: teal;
    display: flex;
    align-items: center;
    cursor: pointer;
    margin:0px 0px 5px 0px;
    /* overflow-x:hidden */
}

.bodypage .sideimg{
    height:65%;
    width:15px;
    margin: 10px 10px 10px 0px;
}
.bodypage .subprod{
    background-color:black;
    margin: 0;
    padding: 0;
    padding-left: 20px;
    font-size:13px;
    display:none;
}
.bodypage .main{
    width:75%;
    height:93vh;
    background-color:white;

}
.bodypage .mainpage{
    height:100%;
    width:100%;
    display:none;

    /* overflow-y: scroll;
    overflow-x:scroll; */
}
.bodypage .heading{
    height:55px;
    width:85%;
    font-size: 35px;
    padding:  10px 20px 20px 20px;
}
.bodypage .mainitemcont{
    /* height:100%; */
    padding-left: 10px;
    width:100%;
    display:grid;
    /* grid-template-columns:auto auto auto auto; */
}
.bodypage .maincontent{
    height:120px;
    /* width:290px; */
    /* background-color: bisque; */
    margin: 10px;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
}
.bodypage .subcontent{
    width:75%;
    height:100%;
    color:white;
}
.bodypage .count{
    width:100%;
    height:50%;
    padding:10px 10px 10px 20px;
    font-size:50px;
    font-weight: 500;
    /* text-align: center; */
}
.bodypage .counttitle{
    width:100%;
    height:50%;
    padding: 15px 10px 10px 20px;
    font-size:18px;
    font-weight: 500;
    /* text-align: center; */
}
.bodypage .contimg{
    width:25%;
    height:100%;
}
.bodypage .cmcontainer{
    padding: 0 20px 30px 20px;
    overflow-y:scroll;
    overflow-x:scroll;
    height:100%;
}
.bodypage .cmheader{
    height:55px;
    /* font-size: 35px; */
    padding:  20px 20px 60px 0px;
    /* margin-bottom: 20px; */
    display:flex;
    flex-direction: row;
    /* flex-wrap: wrap; */
    align-items: center;
    border-bottom: 2px solid black;
    
}
.bodypage .cmheader .heading{
    padding-left: 0;
}
.add1{
    color:white;
    background-color: rgb(29, 1, 1);
    height:auto;
    width:140px;
    /* text-align: center; */
    margin-top: 30px;
    margin-left: 10px;
    /* width:100px; */
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 15px;
    cursor: pointer;
}
.button{
    color:white;
    background-color: red;
    /* height:20px; */
    /* width:50px; */
    padding: 2px;
    margin: 5px;
    border:1px solid black;
    border-radius: 4px;
    cursor: pointer;
}
.editor{
    display:none;
    height:250px;
    width:250px;
    background-color: blue;
    position:absolute;
    top:0;
    left:auto;
    right:auto;
}
.formcontainer,.addcontainer,.custcontainer{
    display:none;
    position:absolute;
    /* top:0; */
    left:25%;
    background-color: white;
    /* height:500px;
    width:500px; */
    z-index: 10;
    border: 2px solid teal;

    /* box-shadow: 2px 2px 30px black; */
    display:flex;
    align-items: center;
    justify-content: center;
    /* padding: 20px; */
}
.formcontainer,.addcontainer,.custcontainer{
    display:none;
    position:absolute;
    top:50px;
    background-color: white;
    height:calc(100% - 150px);
    width:calc(65%);
    z-index: 10;
    overflow-y:scroll;
}
.custcontainer{
    display:block;
    /* overflow-y:scroll; */
    overflow-x:hidden;
}
.orderdetail{
    display:none;
}
.visible{
    display:block;
}

.addcat,.addcont{

    width:90%;
    height:95%;
    margin:2.5% 5%;
   }
   .label{
       display:block;
       margin: 5px 10px;
       padding: 5px;
   }
   .input{
       display:block;
       margin: 5px 10px;
       padding: 5px;
       width:90%;
   }
   .submit,.submita{
       display:inline-block;
       width:80px;
       height:40px;
       margin: 10px;
       color:white;
       background:blue;
   }

   .cancel,.cancela{
       display:inline-block;
       width:80px;
       height:40px;
       margin: 10px;
       margin-right: 10px;
       margin-left: auto;
       color:white;
       background:red;
   }
   .cancel:hover,.submit:hover,.cancela:hover,.submita:hover{
       background-color: teal;
   }
   .custdetails{
    display:flex;
    flex-direction:row;
    padding: 0px 30px 0px 50px;
   }
   .subcustdetails{
    width:50%;
   }
   .subdetail{
    margin: 50px;
   }
   .detailtable tr td{
    height:80px;
    max-height:80px;
    overflow:hidden;
   }
   .detailtable tr th{
    padding:10px;
   }
   .detailtable tr td{
    padding: 10px;
   }

@media only screen and (max-width:1347px){
    .amenu{
        visibility: visible;
    }
    .adminnavbar{
        width:100%;
    }
    .bodypage{
    height:100%;
    width:100%;
    margin:auto;
    /* display:flex; */
    /* flex-direction: row; */
}
    .sidebar{
        position:absolute;
        width:30%;
        display:none;
        margin: 0;
        z-index:1;
        height:93%;
        border-radius:0;
    }
    .sview{
        display:block;
    }
    .bodypage .main{
        width:80%;
        margin:auto;
    }
    .mainitemcont{
        display:block;
        /* grid-template-columns:auto auto auto; */
    }

}
@media only screen and (max-width:860px){
    .bodypage{
        width:100%;
    }
    .bodypage .main{
        width:100%;
    }
    .mainpage{
        width:100%;
    }
}
@media only screen and (max-width:800px){
    .mainitemcont{
        /* grid-template-columns:auto auto; */
    }
    .sidebar{
        position:absolute;
        width:200px;
        /* display:none; */
        z-index:1;
    }
    .wishcontainer{
        margin-left:0px;
    }
}
@media only screen and (max-width:500px){
    .bodypage .main{
        width:100%;
        margin:auto;
    }
    .mainitemcont{
        width:100%;
        /* margin-right: 5%; */
        /* margin-left: 5%; */
        /* grid-template-columns:auto; */
    }
    .head{
        height:100%;
        width:auto;
        /* color:white; */
        text-align: center;
        /* margin:auto; */
        margin-left: 10px;
        padding-top: 10px;
        font-weight: 600;
        /* font-size: 15px; */
    }
    .progressbar{
        display:flex;
        flex-direction:column;
    }
}
.addrcontainer{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;

}
.subaddress{
    height:auto;
    width:200px;
    margin:20px;
    padding:20px;
    border:2px solid black;
    background:whitesmoke;
    border-radius:10px;
}
.head{
    height:auto;
    /* width:50%; */
}


</style>
<style>
    .custdetails {
            display: flex;
            justify-content: space-around;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            margin: 20px;
            margin-left:50px;
            box-sizing: border-box;
            padding: 20px;
            animation: fadeIn 1s ease-out;
        }

        .subcustdetails {
            flex: 1;
            margin-right: 20px;
        }

        .subdetail {
            margin-bottom: 20px;
        }

        .detailheading {
            font-size: 18px;
            color: #3498db;
            margin-bottom: 5px;
        }

        .detailcontent {
            font-size: 16px;
            color: #333;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .cmheader {
            display: flex;
            justify-content: space-between;
            background-color: white;
            color: black;
            padding: 10px 20px;
            margin-left:50px;
            border-radius: 8px 8px 0 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            box-sizing: border-box;
            margin-bottom: 20px;
            
            text-transform: uppercase; /* Add margin to match your form */
        }

        .heading {
            font-size: 24px;
            margin-top:40px;
            font-weight: bold;
        }

        .add1 {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top:40px;
            transition: background-color 0.3s;
        }

        .add1:hover {
            background-color: #27ae60;
        }
        .addcontainer {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 750px;
            margin: 20px;
            box-sizing: border-box;
            padding: 20px;
            animation: fadeIn 1s ease-out;
            margin-left:150px;
            margin-top:90px;
        }

        .label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
        }

        .input,
        textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .input:focus,
        textarea:focus {
            border-color: #3498db;
        }

        .submit,
        .cancel {
            background-color: green;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit:hover,
        .cancel:hover {
            background-color: teal;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
.product-link {
    display:block;
    text-decoration: none;
    color: black;
    flex: 0 0 auto;
    /* width: 300px; */
    height: 150px;
    margin: 20px 20px;
}
.product-link:hover{
    text-decoration:none;
    color:black
}
.product-card{
    display:flex;
    flex-direction:row;
}
.product-image {
    position: relative;
    width: 20%;
    height: 150px;
    overflow: hidden;
    /* object-fit:; */
    /* border:1px solid grey; */
    
}
.product-image img{
    width:100%;
    height:100%;
    object-fit: fill;
    /* border:1px solid grey; */
}

.product-thumb {
    width: 100%;
    height: 350px;
    object-fit: cover;
}

.discount-tag {
    position: absolute;
    background: #fff;
    padding: 5px;
    border-radius: 5px;
    color: #ff7d7d;
    right: 10px;
    top: 10px;
    text-transform: capitalize;
}

.card-btn {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px;
    width: 90%;
    text-transform: capitalize;
    border: none;
    outline: none;
    background: #fff;
    border-radius: 5px;
    transition: 0.5s;
    cursor: pointer;
    opacity: 0;
}

.product-card:hover {
    box-shadow: 2px 2px 20px rgb(136, 135, 135);
}

.product-card:hover .card-btn {
    opacity: 1;
}

.card-btn:hover {
    background: #efefef;
}
.product-info {
    text-decoration:none;
    /* border:1px solid black; */
    width: 80%;
    height: 100px;
    padding: 10px;
}

.product-brand {
    text-decoration:none;
    text-transform: capitalize;
    font-size: 20px;
    font-weight: 600;
    /* margin: px; */
}

.product-short-des {
    text-decoration:none;
    width: 100%;
    height: 23px;
    line-height: 20px;
    overflow: hidden;
    opacity: 0.5;
    text-transform: capitalize;
    margin: 5px 0;
}

.price {
    text-decoration:none;
    font-weight: 900;
    font-size: 20px;
}

.actual-price {
    text-decoration:none;
    margin-left: 20px;
    opacity: 0.5;
    text-decoration: line-through;
}
@media only screen and (max-width:500px){
    .product-link{
        margin:20px 0;
    }
    .product-image{
        width:40%;
    }
    .product-info{
        width:60%;
    }
}
.wishcontainer{
    display:flex;
    flex-direction:column;
    width:80%;
    margin-left:50px;
}
.pancontainer{
    display:flex;
    flex-direction:column;
    width:80%;
    margin-left:50px;
}

.ordercontainer{
    display:flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    width:80%;
    margin-left:50px;
}
.offercontainer{
    display:flex;
    flex-direction:column;
    justify-content:center;
    width:80%;
    margin-left:50px;
}
@media only screen and (max-width:860px){
    .wishcontainer,.ordercontainer,.offercontainer,.cmheader,.custdetails,.pancontainer{
        width:100%;
        margin-left:0;
    }
}
.offer{
    display:flex;
    flex-direction:row;
    justify-content:space-between;
    height:130px;
    /* width:80%; */
    border:1px solid lightgrey;
    margin:20px 0;
}
.offerleft{
    display:flex;
    flex-direction:column;
    /* align-items:center; */
    justify-content:space-between;
    width:70%;
    padding: 5px 20px;
}
.offerright{
    width:30%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:space-between;
    /* width:180px; */
    padding: 5px 0px;
}
.offerhead{
    font-weight:600;
    color:teal;
    font-size:28px;
}
.offerdet{
    font-size:18px;
}
.validity{
    /* float:right; */
    width:auto;

    font-size:14px;
}
.condition{
    /* float:right; */
    font-size:18px;

}
.rate{
    width:100px;
    color:white;
    background:green;
    margin: 10px;
    border-radius:20px;
    cursor:pointer;

}
.rate:hover{
    background:black;
}
.subtitle{
    width:170%;
    height:auto;
    color:white;
    background:teal;
    border-radius:10px;
}
.pancontainer {
            max-width: 100%;
            /* margin: 0 auto; */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles for label */
        .label {
            text-align:left;
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Styles for note */
        .note {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .noteleft {
            font-weight: bold;
            margin-right: 5px;
        }

        /* Styles for textbox */
        .textbox input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 1em;
        }

        /* Styles for declare */
        .declare {
            margin-bottom: 15px;
        }

        .declare input[type="checkbox"] {
            margin-right: 10px;
        }

        .declare span {
            font-size: 0.9em;
        }

        /* Styles for confirm button */
        .confirm input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .confirm input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Styles for blue link */
        .blue {
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
        }
        /* Styles for declare */
.declare input[type="checkbox"] {
    margin-right: 30px;
    transform: scale(1.5); /* Adjust the scale factor as needed */
}

.declare span {
    font-size: 0.9em;
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
        .animated-button {
            display: inline-block;
            padding: 10px 20px;
            padding-bottom:30px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: teal;
            color: white;
            border: none;
            width:70px;
            height:20px;
            border-radius: 7px;
            cursor: pointer;
            transition: background-color 0.3s ease;
           margin-left:8px;
           margin-top:20px;
        }

        .animated-button:hover {
            background-color: green; /* Darker teal color on hover */
        }
        .subtitle {
            background-color: green; /* Button background color */
            color: #fff; /* Button text color */
            padding: 8px 16px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            height:70px;
            width:80px;
            text-transform:uppercase;
        }

        .subtitle:hover {
            background-color: #2980b9; /* Darker background color on hover */
        }
        
</style>
</head>

<body>

    <section class="adminnavbar">
        <div class="navcontainer">
            <div class="navitems head">CUSTOMER PAGE</div>
            <div class="navitems amenu" ><img src="public\img\menu.png" alt="" class="menuimg" style="background:teal"></div>
            <div class="navitems admin">
                <div class="login"><img src="" alt="" class="logimg"></div>&nbsp;
                <a href="index.php" style="text-decoration:none;color:blue"><button class="subtitle">home</button></a>
            </div>
        </div>
    </section>
    <section class="bodypage">
        <section class="sidebar">
            <ul class="sidecontainer">
                <li class="sideitem1 sideitem"><img src="public\img\layout-dashboard.png" alt="" class="sideimg"><span class="itemdesc">Dashboard</span></li>
                <li class="sideitem1 sideitem"><img src="public\img\layers-3.png" alt="" class="sideimg"><span class="itemdesc">Profile</span>
                </li>
                <!-- <li class="sideitem1" id="prod"><img src="shopping-bag.png" alt="" class="sideimg"><span class="itemdesc">Product Management</span>
                </li>
                <li class="sideitem1 sideitem subprod"><img src="" alt="" class="sideimg"><span class="itemdesc">Product</span></li>
                 <li class="sideitem1 sideitem subprod"><img src="" alt="" class="sideimg"><span class="itemdesc">Product description</span></li> 
                 <li class="sideitem1 sideitem subprod"><img src="" alt="" class="sideimg"><span class="itemdesc">Image</span></li>  -->

                <li class="sideitem1 sideitem"><img src="public\img\book-check.png" alt="" class="sideimg"><span class="itemdesc">Order</span>
                </li>
                <!-- <li class="sideitem1 sideitem"><img src="file-question.png" alt="" class="sideimg"><span class="itemdesc">manage Address</span></li> -->
                <!-- <li class="sideitem1 sideitem"><img src="public\img\list-ordered.png" alt="" class="sideimg"><span class="itemdesc">wishlist</span></li> -->
                <li class="sideitem1 sideitem"><img src="public\img\badge-percent.png" alt="" class="sideimg"><span class="itemdesc">Offer</span></li>
                <li class="sideitem1 sideitem"><img src="public\img\credit-card.png" alt="" class="sideimg"><span class="itemdesc">Pan Card</span></li>
                <!-- <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li>
            <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li>
            <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li> -->
            </ul>
        </section>
        <section class="main">
            <div class="mainpage" id="dbpage">
                
                <div class="mainitemcont">
                <div class="col-lg-20 my-lg-0 my-1">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h3" style="text-transform:capitalize;font-weight:500"><?php echo $userrow['fname'];?></div>
                        <div>Logged in as: <?php echo $userrow['email'];?></div>
                    </div>
                    <div class="d-flex my-4 flex-wrap">
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Orders placed</div>
                                <div class="ms-auto number"><?php echo $userorder['ordercount'];?></div>
                            </div>
                        </div>
                        <div class="box me-4 my-1 bg-light" style="cursor:pointer" onclick="redirect()">
                            <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Items in Cart</div>
                                <div class="ms-auto number"><?php echo $usercart['cartcount'];?></div>
                            </div>
                        </div>
                        <!-- <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Wishlist</div>
                                <div class="ms-auto number">10</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="text-uppercase">My recent orders</div>
                    <?php
                            while($orderrow=$res->fetch_assoc()){
                                    $oid=$orderrow['order_id'];
                                    
                                ?>
                    <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Order #<?php echo $orderrow['order_id'];?></div>
                                        <div class="blue-label ms-auto text-uppercase">paid</div>
                                    </div>
                                    <div class="fs-8">Products #03</div>
                                    <div class="fs-8"><?php 
                                     $currentDate = $orderrow['order_date'] ; 

                                     $timestamp2 = strtotime($currentDate); 
         
                                     $formattedDate2 = date("d F, Y", $timestamp2);
                                    echo $formattedDate2;
                                    
                                    ?></div>
                                    <div class="rating d-flex align-items-center pt-1">
                                        <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png"
                                            alt="" ><span class="px-2 pt-2 animated-button" style="color:white;font-weight:800;">Rate</span>
                                        <span class="fas fa-star gold-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <!--<button class="rate">Rate</button>-->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : <?php echo $orderrow['order_status'];?></div>
                                    <div class="btn btn-primary text-uppercase order-info">order info</div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                        <li id="step-1" class="text-muted green" <?php if($orderrow['order_status']=="placed" || $orderrow['order_status']=="packed" || $orderrow['order_status']=="complete"){echo 'style="background:#17ff00"';}?>>
                                            <span class="fas fa-gift"></span>
                                        </li>
                                        <li id="step-2" class="text-muted green" <?php if($orderrow['order_status']=="packed" || $orderrow['order_status']=="complete"){echo 'style="background:#17ff00"';}?>>
                                            <span class="fas fa-check"></span>
                                        </li>
                                        <li id="step-3" class="text-muted green" <?php if($orderrow['order_status']=="complete"){echo 'style="background:#17ff00"';}?>>
                                            <span class="fas fa-box" ></span>
                                        </li>
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="orderdetail">
                        <table class="detailtable">
                            <tr style="border-bottom:1px solid black">
                                <th>
                                    Image
                                </th>
                                <th>
                                    product detail
                                </th>
                                <th>
                                    product id
                                </th>
                                <th>
                                    size
                                </th>
                                <th>
                                    color
                                </th>
                                <th>
                                    product quantity
                                </th>
                                <th>
                                    product price
                                </th>
                                <th>
                                    discount
                                </th>
                                <th>
                                    amount
                                </th>
                            </tr>
                            <?php
                    $ordet="SELECT * FROM `order_detail` WHERE order_id='$oid'";
                    $detres=$conn->query($ordet);
                    
                    while($ordrow=$detres->fetch_assoc()){
                        $pid=$ordrow['product_id'];
                        $col=$ordrow['color'];
                        echo $col;
                        echo $pid;
                        $img="SELECT image.Image_path1,product.product_details FROM `image` JOIN color ON image.cid=color.cid JOIN product ON product.Product_id=color.product_id WHERE product.Product_id='$pid' AND color.color='$col'";
                        $resimg=$conn->query($img);
                        $imgrow=$resimg->fetch_assoc();
                        ?>
                        <tr style="border-bottom:1px solid black">
                            <td>
                                <img src="<?php echo $imgrow['Image_path1'];?>" alt="" style="width:60px;height:60px">
                            </td>
                            <td>
                                <div style="height:90px"><?php echo $imgrow['product_details'];?></div>
                            </td>
                            <td>
                                <?php echo $ordrow['product_id'];?>
                            </td>
                            <td>
                                <?php echo $ordrow['size'];?>
                            </td>
                            <td>
                                <?php echo $ordrow['color'];?>
                            </td>
                            <td>
                                <?php echo $ordrow['quantity'];?>
                            </td>
                            <td>
                                <?php echo $ordrow['rate'];?>
                            </td>
                            <td>
                                <?php echo $ordrow['discount'];?>
                            </td>
                            <td>
                                <?php echo $ordrow['amount'];?>
                            </td>
                        </tr>
                        
                        <?php
                    }
                    ?>
                            
                        </table>
                    </div>
                    <?php
                            }
                            ?>
                </div>
            </div>
                </div>
            </div>
            <div class="mainpage" id="profilepage">
                <div class="cmcontainer"> 
                <div class="cmheader">
                        <div class="heading">profile</div>
                        <a href="chanpass.php" style="text-decoration:none"><div class="add1" style="background-color:red;">Change Pasword</div></a>
                        <div class="add add1">Edit profile</div>
                    </div> 
                    
                    <?php
                    $n=3;
                    $sql = "SELECT * FROM `user` WHERE `userID`='$user'"; 
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    // console.log($row);
                    if ($result) {
                        echo <<< _END
                        <div class="custdetails">
                        <div class="subcustdetails">
                        <p class="subdetail">
                            <h5 class="detailheading">First Name</h5>
                            <h6 class="detailcontent">{$row['fname']}</h6>
                        </p>
                        <p class="subdetail">
                            <h5 class="detailheading">Last Name</h5>
                            <h6 class="detailcontent">{$row['lname']}</h6>
                        </p>
                        <p class="subdetail">
                            <h5 class="detailheading">Email</h5>
                            <h6 class="detailcontent">{$row['email']}</h6>
                        </p>
                        <p class="subdetail">
                            <h5 class="detailheading">Phone</h5>
                            <h6 class="detailcontent">{$row['phone']}</h6>
                        </p>
                        </div>
                        <div class="subcustdetails">
                        <p class="subdetail">
                            <h5 class="detailheading">Gender</h5>
                            <h6 class="detailcontent">{$row['gender']}</h6>
                        </p>
                        <p class="subdetail">
                            <h5 class="detailheading">Address</h5>
                            <h6 class="detailcontent">{$row['address']}</h6>
                        </p>
                        <p class="subdetail">
                            <h4 class="detailheading">Pin Code</h4>
                            <h6 class="detailcontent">{$row['pin']}</h6>
                        </p>
                        <p class="subdetail">
                            <h5 class="detailheading">City</h5>
                            <h6 class="detailcontent">{$row['city']}</h6>
                        </p>
                        </div>
                    </div>
                    <div class="addcontainer">
                    <form class="addcat" action="" method="get">
                        <label for="" style="font-size:30px;font-weight:600;color:green;">User Details</label>
                        <label for="fname" class="label">First name</label>
                        <input type="text" id="fname" class="input" name="fname" value="{$row['fname']}" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="lname" class="label">Last Name</label>
                        <input type="text" id="lname" class="input" name="lname" value="{$row['lname']}" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="email" class="label">Email</label>
                        <input type="email" id="email" class="input" name="email" value="{$row['email']}" required>
                        <label for="phone" class="label">Phone</label>
                        <input type="tel" id="phone" class="input" name="phone" value="{$row['phone']}" pattern="[0-9]{10}" title="(Please enter only numbers)" required>
                        <label for="gender" class="label">Gender</label>
                        <input type="text" id="gender" class="input" name="gender" value="{$row['gender']}" required>
                        <label for="address" class="label">Address</label>
                        <textarea type="text" rows="5" cols="30" id="address" class="input" name="address" required>{$row['address']}</textarea>
                        <label for="pin" class="label">Pin</label>
                        <input type="text" id="pin" class="input" name="pin" value="{$row['pin']}" pattern="[0-9]{6}" title="(Please enter only numbers)" required>
                        <label for="city" class="label">City</label>
                        <input type="text" id="gender" class="input" name="city" value="{$row['city']}" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div> 
                    _END;
                    }
                    ?>               
                </div>
            </div>
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer" >
            <div class="cmheader">
                        <div class="heading">orders</div>
                        <div class="add" style="visibility:hidden">Add payment</div>
                    </div>
                    <div class="ordercontainer" >
                    <?php
                    $res1=$conn->query($order);
                    while($orderrow=$res1->fetch_assoc()){
                        $oid=$orderrow['order_id'];
                        $ost=$orderrow['order_status'];
                        $imgqry="SELECT image FROM ( SELECT image.Image_path1 AS image, color.color AS color1, order_detail.color AS color2 FROM `product` INNER JOIN `color` ON color.product_id = product.Product_id INNER JOIN `product_desc` ON product_desc.cid = color.cid INNER JOIN `image` ON image.cid = color.cid INNER JOIN `order_detail` ON order_detail.product_id = product.Product_id INNER JOIN order_tbl ON order_tbl.order_id = order_detail.order_id WHERE order_tbl.order_id = $oid GROUP BY image.Image_path1 ) AS subquery_alias WHERE color1 = color2";
                        $iqres=$conn->query($imgqry);
                        ?> 
                    <a href="orderdetail.php?oid=<?php echo $oid;?>" style="color:black;text-decoration:none;width:100%"><div class="ordercard">
                    <div class="orderimg" style="max-height:120px;width:30%;box-sizing:content-box;overflow:hidden;display:flex;flex-direction:row;flex-wrap:wrap;align-item:center;overflow:hidden;border-right:2px solid black">
                            <?php
                            while($iqrow=$iqres->fetch_assoc()){
                            ?>
                            <img src="<?php echo $iqrow['image'];?>" alt="" class="img1" style="height:80px;width:80px;box-sizing:content-box;border-radius:15px;">
                            <?php
                            }
                            ?>
                    </div>
                        <div class="cardcontainer">
                            <div class="date">Order id: #<?php echo $orderrow['order_id'];?></div>
                            <div class="orderid">Order Date: <?php 
                            $currentDate = $orderrow['order_date']; 

                            $timestamp2 = strtotime($currentDate); 

                            $formattedDate2 = date("d F, Y", $timestamp2);
                           echo $formattedDate2;
                            ?></div>
                            <div class="orderamount">Order Amount: &#8377;<?php echo $orderrow['order_amount'];?></div>
                        </div>
                        <div class="orderdetailed" style="height:auto;width:20%;display:flex;align-items:center;justify-content:center">
                            <div ><h6>Order status<br><b><?php echo $orderrow['order_status'];?></b></h6></div>
                        </div>
                        <div class="orderbox" style="<?php if($ost=='cancelled') echo 'background:red'; else if($ost=='replace') echo 'background:blue';?>">
                            >
                        </div>

                       
                    </div>
                    
                    </a>
                    
                    <?php
                    
                    }
                    ?>
                    
                   </div> 
            </div>
            </div>
            
            <!-- <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Payment</div>
                        <div class="add">Add payment</div>
                    </div> 
                    
            </div>
            </div>
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Payment</div>
                        <div class="add">Add payment</div>
                    </div>  
                    
            </div>
            </div>
            <div class="mainpage" id="ompage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Payment</div>
                        <div class="add">Add payment</div>
                    </div>  
            </div>
            </div> -->
            
<!--             
            <div class="mainpage" id="subpage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Wishlist</div>
                        <div class="add"></div>
                    </div>
                    <div class="wishcontainer">
                    <a href="product.php?id=5002&color=blue" class="product-link">
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag">10% off</span>
                                <img src="public\img\5002-3-bl.jpeg" class="product-thumb" alt="">
                                <button class="card-btn">add to whislist</button>
                            </div>
                            <div class="product-info">
                                <h2 class="product-brand">Walkaroo</h2>
                                <p class="product-short-des">WALKAROO MEN SOLID THONG SANDALS ART WG5002</p>
                                <span class="price">₹ 299</span><span class="actual-price">₹ 329</span>
                            </div>
                        </div>
                    </a>
                    <a href="product.php?id=5002&color=blue" class="product-link">
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag">10% off</span>
                                <img src="public\img\5002-3-bl.jpeg" class="product-thumb" alt="">
                                <button class="card-btn">add to whislist</button>
                            </div>
                            <div class="product-info">
                                <h2 class="product-brand">Walkaroo</h2>
                                <p class="product-short-des">WALKAROO MEN SOLID THONG SANDALS ART WG5002</p>
                                <span class="price">₹ 299</span><span class="actual-price">₹ 329</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            </div> -->
            
               
            
            <div class="mainpage" id="ofpage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Offers</div>

                       

                    </div>
                    <div class="offercontainer">
                        <?php
                        $off="SELECT * FROM `offer`";
                        $ofres=$conn->query($off);
                        while($offrow=$ofres->fetch_assoc()){
                        ?>
                        <div class="offer">
                            <div class="offerleft">
                                <div class="offerhead" style="color:teal">Get <?php echo $offrow['offer_percent'] ?>% Off</div>
                                <div class="offerdet"><?php echo $offrow['offer_details'] ?></div>
                            </div>
                            <div class="offerright">
                                <div class="validity">Valid till <?php
                                $currentDate = $offrow['offer_end_date'] ; 

                                $timestamp2 = strtotime($currentDate); 
    
                                $formattedDate2 = date("d F, Y", $timestamp2);
                               echo $formattedDate2;
                                ?></div>
                                <div class="condition"><a href="term.php" style="text-decoration:none">View T&C</a></div>
                            </div>
                        </div>
                        <?php
                        }?>
                    </div>
                    
            </div>
            </div>
            <div class="mainpage" id="paypage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Pan card</div>
                        <!-- <div class="add">Add payment</div> -->
                    </div>
                    <div class="pancontainer">
                        <div class="label">PAN Card Information</div>
                        <div class="note">
                            <div class="noteleft">note:</div>
                            <div class="noteright">For orders exceeding the value of 2,00,000 , PAN Card Details is mandatory.</div>
                        </div>
                        <form action="customerpanel.php" method="post">
                        <div class="textbox">
                            <input type="text" placeholder="PAN Number" pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}" title="Please Enter correct PAN"  name="pan">
                        </div>
                        <div class="declare">
                            <input type="checkbox" name="declare" id="declare" required><span><label for="declare">I agree to the term mentioned in the declaration. <div class="blue">View Declaration</div></label></span>

                        </div>
                        <div class="confirm">
                            <input type="submit" value="Confirm">
                        </div>
                        </form>
                        
                    </div>
             </div>
            </div>
        </section>
    </section>
                        <?php
                           $pan = "";

                           if (isset($_POST['pan'])) {
                               $pan = $_POST['pan'];
                               $sql = "SELECT `PAN` FROM `user` WHERE `userID`='$user'";
                               $result = $conn->query($sql);
                               $row = $result->fetch_assoc();
                           
                               if ($row['PAN'] === NULL) { // Use strict equality check (===) for NULL
                                   $sql = "UPDATE `user` SET `PAN`='$pan' WHERE `userID`='$user'";
                                   $result = $conn->query($sql);
                                   if($result)
                                   {
                                        // echo<<<_END
                                        // <div class="alert" id="alerttime">
                                        //     <div class="alerttext">updated successfully!</div><span class="crossed" >✔</span>
                                        // </div>
                                        // <script>showAlert();</script>
                                        // _END;
                                        
                                   }
                               } else {
                                // echo<<<_END
                                // <div class="alert" id="alerttime">
                                //     <div class="alerttext">Already inserted!</div><span class="crossed" >✔</span>
                                // </div>
                                // <script>showAlert();</script>
                                // _END;
                               }
                           }

                            
                           
                            
                        ?>
    <script src="adminpanel.js" type="text/javascript"></script>
    <script>
        var title = document.querySelectorAll(".sideitem");
        var subtitle = document.querySelectorAll(".mainpage");
        var menu = document.querySelector(".amenu");
        var sidebar = document.querySelector(".sidebar");
        var prod=document.querySelector("#prod");
        menu.addEventListener("click", () => {
            sidebar.classList.toggle("sview");
        })

        subtitle[0].style.display = "block";
        title[0].style.background = "grey";
        for (let i = 0; i < title.length; i++) {
            // prod.addEventListener("click",()=>{
            //     prod.style.margin="0px";
            // title[2].style.display="block";
            // title[3].style.display="block";
            // title[2].style.background="seagreen";
            // title[4].style.display="block";
            // title[4].style.background="seagreen";
            // title[3].style.background="seagreen";
            // })
            title[i].addEventListener("click", () => {
                
                for (let j = 0; j < subtitle.length; j++) {
                    subtitle[j].style.display = "none";
                    title[j].style.background = "teal";
                }
            //     if(i==2 || i==3 || i==4){
            //         title[2].style.background="seagreen";
            // title[3].style.background="seagreen";
            // title[4].style.background="seagreen";
            //     }
                title[i].style.background = "grey";
                subtitle[i].style.display = "block";
                // if(i==2){
                //     title[2].style.margin="0px";
                //     title[3].style.display="block";
                //     title[3].style.background="grey";
                //     title[4].style.display="block";
                //     title[4].style.background="black";
                // }
                // if(i==3){
                //     title[3].style.display="block";
                //     title[3].style.background="grey";
                //     // title[4].style.display="block";
                //     title[4].style.background="black";
                // }
                // if(i==4){
                //     title[4].style.display="block";
                //     title[4].style.background="grey";
                //     title[3].style.background="black";
                // }
                // if(i!=2 && i!=3 && i!=4){
                //     prod.style.margin="0px 0px 5px 0px";
                //     title[2].style.display="none";
                //     title[3].style.display="none";
                //     title[4].style.display="none";
                // }
            });
        }
        // new DataTable('#example');
        // new DataTable('#product');
        // new DataTable('#order');
        new DataTable('.table');
        var formcontainer=document.querySelectorAll(".formcontainer");
        var addcontainer=document.querySelectorAll(".addcontainer");
        var edit=document.querySelectorAll(".edit");
        // var form=document.querySelector(".addcat");
        var cancel=document.querySelectorAll(".cancel");
        var submit=document.querySelectorAll(".submit");
        var cancela=document.querySelectorAll(".cancela");
        var submita=document.querySelectorAll(".submita")
        var add=document.querySelectorAll(".add");

        // console.log(addcontainer[0]);
        for(let k=0;k<addcontainer.length;k++){
            console.log(k);
            add[k].addEventListener("click",()=>{
            addcontainer[k].style.display="block";
             })
            submit[k].addEventListener("click",()=>{
            addcontainer[k].style.display = "none";
             })
            cancel[k].addEventListener("click", (event) => {
            event.preventDefault();
            // box.childNodes[6].reset();
            addcontainer[k].style.display="none";
            });
         }
        for(let i=0;i<edit.length;i++){
            edit[i].addEventListener("click",(e)=>{
                // e.preventDefault();
                
                var len=e.currentTarget.parentNode.parentNode.getElementsByTagName('td').length;
                console.log(len);
                var arr = new Array(len-1);
                for(var j=0;j<len-1;j++){
                
                
                
                var box=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                console.log(box);
                box.childNodes[5].style.display="block";
                for(var k=0;k<cancel.length;k++){
                    submit[k].addEventListener("click",()=>{
                        box.childNode[5].style.display = "none";
                     });
                    cancel[k].addEventListener("click", (event) => {
                        event.preventDefault();
                        // box.childNodes[6].reset();
                        box.childNodes[5].style.display="none";
                    });
                }
                // console.log(box.childNodes[5]);
                arr[j]=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].textContent;
                console.log(arr[j]);
                box.querySelectorAll(".input")[j].value=arr[j];
            }

           })
        }
       let k=0;
        var info=document.querySelectorAll(".order-info");
        var detail=document.querySelectorAll(".orderdetail");
        var len=info.length
        for (let k = 0; k < len; k++) {
    info[k].addEventListener("click", (function (index) {
        return function () {
            detail[index].classList.toggle("visible");
        };
    })(k));
}

        // form.addEventListener("submit", (event) => {
        // // event.preventDefault();
        
    // });
//     for(var i=0;i<cancel.length;i++){
//     cancel[i].addEventListener("click", (event) => {
//         event.preventDefault();
//         form.reset();
//         formcontainer[i].style.display = "none";
//     });
// }

function redirect(){
    window.location.href="cart.php";
}
var crossedClicked = false;

function showAlert() {
    var alertDiv = document.getElementById('alerttime');
    var crossedButton = document.querySelector('.crossed');

    alertDiv.style.display = 'block';

    if (!crossedClicked) {
        crossedButton.addEventListener('click', function() {
            // Hide the alert
            alertDiv.style.display = 'none';

            // Set the flag to true to indicate the button has been clicked
            crossedClicked = true;
        });
    }

    // Hide the alert after 10 seconds
    setTimeout(function() {
        alertDiv.style.display = 'none';
    }, 10000); // 10 seconds in milliseconds
}
    </script>
    
</body>

</html>