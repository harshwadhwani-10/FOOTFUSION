<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
if($user!=1){
    header("location:login.php");
}
// echo $user;
$page = 0;
$flag = 0;
$proquery="SELECT COUNT(Product_id) FROM `product`";
$prores=$conn->query($proquery);
$prodrow=$prores->fetch_assoc();

$comordquery="SELECT COUNT(order_id) FROM `order_tbl` WHERE order_status='complete'";
$comordres=$conn->query($comordquery);
$comordrow=$comordres->fetch_assoc();

$catquery="SELECT COUNT(category_id) FROM `category`";
$catres=$conn->query($catquery);
$catrow=$catres->fetch_assoc();

$penordquery="SELECT COUNT(order_id) FROM `order_tbl` WHERE order_status!='complete'";
$penordres=$conn->query($penordquery);
$penordrow=$penordres->fetch_assoc();

$shipquery="SELECT COUNT(order_id) FROM `order_tbl` WHERE shipping_status='shipped'";
$shipres=$conn->query($shipquery);
$shiprow=$shipres->fetch_assoc();

$penshipquery="SELECT COUNT(order_id) FROM `order_tbl` WHERE shipping_status!='shipped'";
$penshipres=$conn->query($penshipquery);
$penshiprow=$penshipres->fetch_assoc();

$custquery="SELECT COUNT(userID) FROM `user` WHERE usr_status='Active'";
$custres=$conn->query($custquery);
$custrow=$custres->fetch_assoc();

$penrefquery="SELECT COUNT(refund_id) FROM `refund` WHERE refund_status!='approved'";
$penrefres=$conn->query($penrefquery);
$penrefrow=$penrefres->fetch_assoc();

if(isset($_GET['page'])){
    $page=$_GET['page'];    
}
if(isset($_GET['flag'])){
    $flag=$_GET['flag'];   
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminpanel.css">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:Arial, Helvetica, sans-serif;
}
.label, th{
    text-transform:capitalize;
}
.adminnavbar{
    height:50px;
    width:100%;
    /* margin-bottom: 20px; */
}
.navcontainer{
    height:100%;
    width:100%;
    display:flex;
    flex-direction: row;
    background-color: teal;
    color:white;
    
}
.navitems{
    height:100%;
    padding: 5px;
}
.head{
    height:100%;
    width:auto;
    color:white;
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
.login{
    margin-right:20px;
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
    width:100%;
    display:flex;
    flex-direction: row;
}
.sidebar{
    width:15%;
    height:93vh;
    background-color: teal;
}
.sidecontainer{
    height:100%;
    width:100%;
    background-color: teal;
    color:white;
    /* padding: 20px 10px 10px 0px; */
    /* padding-right: 10px; */
    padding-left: 0px;
    border-right: 2px solid black;
}

.sideitem1{
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

.sideimg{
    height:65%;
    width:15px;
    margin: 10px 10px 10px 0px;
}
.subprod{
    background-color:#0B5345;
    margin: 0;
    padding: 0;
    padding-left: 20px;
    font-size:14px;
    display:none;
}
.main{
    width:85%;
    height:93vh;
    background-color:white;

}
.mainpage{
    height:100%;
    width:100%;
    display:none;

    /* overflow-y: scroll;
    overflow-x:scroll; */
}
.heading{
    height:55px;
    width:85%;
    font-size: 35px;
    padding:  10px 20px 20px 20px;
}
.mainitemcont{
    /* height:100%; */
    padding-left: 10px;
    width:100%;
    display:grid;
    grid-template-columns:auto auto auto auto;
}
.maincontent{
    height:120px;
    /* width:290px; */
    /* background-color: bisque; */
    margin: 10px;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
}
.subcontent{
    width:75%;
    height:100%;
    color:white;
}
.count{
    width:100%;
    height:50%;
    padding:10px 10px 10px 20px;
    font-size:50px;
    font-weight: 500;
    /* text-align: center; */
}
.counttitle{
    width:100%;
    height:50%;
    padding: 15px 10px 10px 20px;
    font-size:18px;
    font-weight: 500;
    /* text-align: center; */
}
.contimg{
    width:25%;
    height:100%;
}
.cmcontainer{
    padding: 0 20px 30px 20px;
    overflow-y:scroll;
    overflow-x:scroll;
    height:100%;
}
.cmheader{
    height:55px;
    /* font-size: 35px; */
    padding:  20px 20px 60px 0px;
    margin-bottom: 20px;
    display:flex;
    flex-direction: row;
    /* flex-wrap: wrap; */
    align-items: center;
    border-bottom: 2px solid black;
    
}
.cmheader .heading{
    padding-left: 0;
}
.add{
    color:white;
    background-color: rgb(29, 1, 1);
    height:40px;
    width:140px;
    /* text-align: center; */
    margin-top: 30px;
    /* width:100px; */
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 15px;
    cursor: pointer;
}
.button{
    color:red;
    background-color: white;
    /* height:20px; */
    /* width:50px; */
    padding: 5px;
    margin: 5px;
    border:2px solid red;
    border-radius: 4px;
    cursor: pointer;
    text-transform:uppercase;
}
.buttedit{
    color:green;
    background-color: white;
    /* height:20px; */
    /* width:50px; */
    padding: 5px;
    margin: 5px;
    border:2px solid green;
    border-radius: 4px;
    cursor: pointer;
    text-transform:uppercase;
}
.button:hover{
    /* background-color:red; */
    /* color:white; */
}
.buttedit:hover{
    background-color:green;
    color:white;
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
.formcontainer,.addcontainer,.sub-prod{
    display:none;
    position:absolute;
    /* top:0; */
    left:15%;
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
.formcontainer,.addcontainer,.sub-prod{
    display:none;
    position:absolute;
    top:50px;
    background-color: white;
    height:calc(100% - 50px);
    width:calc(85%);
    z-index: 10;
    overflow-y:scroll;
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
   .input2{
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
   .tblimg{
    height:80px;
    width:100px;
   }
@media only screen and (max-width:1347px){
    .amenu{
        visibility: visible;
    }
    .sidebar{
        position:absolute;
        width:200px;
        display:none;
        z-index:1;
    }
    .sview{
        display:block;
    }
    .main{
        width:100%;
    }
    .mainitemcont{
        
        grid-template-columns:auto auto auto;
    }

}
@media only screen and (max-width:800px){
    .mainitemcont{
        grid-template-columns:auto auto;
    }
}
@media only screen and (max-width:500px){
    .mainitemcont{
        width:90vw;
        margin-right: 5%;
        margin-left: 5%;
        grid-template-columns:auto;
    }
    .head{
        height:100%;
        width:auto;
        color:white;
        text-align: center;
        /* margin:auto; */
        margin-left: 10px;
        padding-top: 10px;
        font-weight: 600;
        font-size: 15px;
    }
}
.logindrop{
    display:none;
    position:absolute;
    top:50px;
    /* height:100px; */
    width:100px;
    background-color:white;
    border:1px solid teal;
    /* display:block; */
    z-index:10;

}
.logindrop a{
    list-style:none;
    text-decoration:none;
    color:teal;
    /* margin: 2px; */
    text-align:left;
    /* background-color:red; */
    border:1px solid teal;
    /* width:100px; */
    display:block;
    /* padding: 1px; */
}
.logindrop a li{
    padding:5px;
}
.visible{
       display:block;
        visibility:visible;    
        opacity: 1;
    }
    @media only screen and (max-width:1068px){
        .logindrop{
            top:110px;
            
        } 
        .shopping-cart {
            display:none;
        }
    }
    @media only screen and (max-width:600px){
        .logindrop{
            top:70px;
        } 
    }

.hide{
    margin: 50px;
    padding:10px;
    color:white;
    background:red;
    float:right;
    border-radius:15%;
}

.sub-prod{
    padding: 20px;
}

</style>
<style>
    thead{
        text-transform:capitalize;
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
</head>

<body>
    <?php
    if($flag=='1'){
        ?>
        <div class="alert">
        <div class="alerttext">Updates successfully made !!</div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
    if($flag=='2'){
        ?>
        <div class="alert">
        <div class="alerttext">Error occured while updating. Try again !</div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
    
?>
    <section class="adminnavbar">
        <div class="navcontainer">
            <div class="navitems head">Admin Panel</div>
            <div class="navitems amenu"><img src="public/img/menu.png" alt="" class="menuimg"></div>
            <div class="navitems admin">
                <div class="login" onclick="logfunction()"><img src="public/img/log-out.png" alt="" class="logimg"></div>
                <div class="subtitle" style="cursor:pointer">Administrator</div>
                <div class="logindrop" style="right:10px;width:180px">
                            <?php
                            if(isset($_COOKIE['userID'])){
                                ?>
                                <a href="chanpass.php"><li><img src="public\img\circle-user-round.png" alt="">&nbsp;&nbsp;Change Password</li></a>
                                <a href="logout.php"><li><img src="public\img\log-out-profile.png" alt="">&nbsp;&nbsp; Logout</li></a>
                                <a href="sdp_report_final"><li><img src="public\img\notebook-text.png" alt="">&nbsp;&nbsp; View Report</li></a>
                                <?php
                            }
                            ?>
                            
                        </div>
            </div>
        </div>
    </section>
    <section class="bodypage">
        <section class="sidebar">
            <ul class="sidecontainer">
                <li class="sideitem1 sideitem"><img src="public\img\layout-dashboard.png" alt="" class="sideimg"><span class="itemdesc">Dashboard</span></li>
                <li class="sideitem1 sideitem"><img src="public\img\layers-3.png" alt="" class="sideimg"><span class="itemdesc">Category
                        Management</span>
                </li>
                <li class="sideitem1 sideitem" id="prod"><img src="public\img\shopping-bag.png" alt="" class="sideimg"><span class="itemdesc">Product Management</span>
                </li>
                <!-- <li class="sideitem1 sideitem subprod"><img src="public\img\shopping-cart.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Product</span></li>
                 <li class="sideitem1 sideitem subprod"><img src="public\img\book-text.png" alt="" class="sideimg" style="height:50%; width:20px;"><span class="itemdesc">Product description</span></li> 
                 <li class="sideitem1 sideitem subprod"><img src="public\img\crop.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Image</span></li> 
                 <li class="sideitem1 sideitem subprod"><img src="public\img\palette.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Color</span></li> -->

                <li class="sideitem1 sideitem" id="prod1"><img src="public\img\book-check.png" alt="" class="sideimg"><span class="itemdesc">Order Management</span></li>
                
                <li class="sideitem1 sideitem"><img src="public\img\file-question.png" alt="" class="sideimg"><span class="itemdesc">Feedback</span></li>
                <li class="sideitem1 sideitem"><img src="public\img\user-round-plus.png" alt="" class="sideimg"><span class="itemdesc">Customer
                        Management</span>
                </li>
                <li class="sideitem1 sideitem"><img src="public\img\badge-indian-rupee.png" alt="" class="sideimg"><span class="itemdesc">Refund</span></li>
                <li class="sideitem1 sideitem"><img src="public\img\badge-percent.png" alt="" class="sideimg"><span class="itemdesc">Offer</span></li>
                <li class="sideitem1 sideitem"><img src="public\img\credit-card.png" alt="" class="sideimg"><span class="itemdesc">Payment</span></li>
                <!-- <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li>
            <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li>
            <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li> -->
            </ul>
        </section>
        <section class="main">
            <div class="mainpage" id="dbpage">
                <div class="heading">Dashboard</div>
                <div class="mainitemcont">
                    <div class="maincontent" style="background:rgb(88, 88, 255)">
                        <div class="subcontent">
                            <div class="count"><?php echo $prodrow['COUNT(Product_id)']; ?></div>
                            <div class="counttitle">Products</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(115, 198, 182 )">
                        <div class="subcontent">
                            <div class="count"><?php echo $penordrow['COUNT(order_id)']; ?></div>
                            <div class="counttitle">Pending Orders</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(245, 203, 167)">
                        <div class="subcontent">
                            <div class="count"><?php echo $comordrow['COUNT(order_id)']; ?></div>
                            <div class="counttitle">Completed Orders</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(174, 214, 241 )">
                        <div class="subcontent">
                            <div class="count"><?php echo $penshiprow['COUNT(order_id)']; ?></div>
                            <div class="counttitle">Pending Shipping</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(128, 139, 150 )">
                        <div class="subcontent">
                            <div class="count"><?php echo $shiprow['COUNT(order_id)']; ?></div>
                            <div class="counttitle">Completed Shipping</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(93, 173, 226)">
                        <div class="subcontent">
                            <div class="count"><?php echo $penrefrow['COUNT(refund_id)']; ?></div>
                            <div class="counttitle">Pending Refund</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(215, 189, 226)">
                        <div class="subcontent">
                            <div class="count"><?php echo $custrow['COUNT(userID)']; ?></div>
                            <div class="counttitle">Active Customers</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(243, 156, 18 )">
                        <div class="subcontent">
                            <div class="count"><?php echo $catrow['COUNT(category_id)']; ?></div>
                            <div class="counttitle">Categories</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                </div>
            </div>
            <div class="mainpage" id="cmpage">
                <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Categories</div>
                        <div class="add">Add Category</div>
                    </div>
                    <?php
                    // $servername = "localhost";
                    // $user = "root";
                    // $password = "";
                    // $database = "ecomm";

                    // $conn = new mysqli($servername, $user, $password, $database);
                    $sql = "SELECT * FROM `category`"; 
                    $result = $conn->query($sql);
                    $row="";
                   
                    if ($result) {
                        echo <<< _END
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Category Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                    _END;
                 
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['category_id'];?></td>
                                <td><?php echo $row['Category_name'];?></td>
                                <td><?php echo $row['Category_desc'];?></td>
                                <td><?php echo $row['cat_status'];?></td>
                        <?php
                        if($row['cat_status']=='Enabled'){
                        ?>
                                <td><span class="buttedit edit"><img src="public\img\pencil.png" alt="edit" ></span><span class="button disable"><img src="public\img\trash.png" alt="disable" ></span></td>
                        <?php
                        }
                        else{
                            ?>
                            
                                <td><span class="buttedit edit"><img src="public\img\pencil.png" alt="edit" ></span><span class="button disable" style="border:2px solid teal"><img src="public\img\plus.png" alt="disable" ></span></td>
                            <?php
                        }
                         ?>
                            </tr>
                    <?php
                    }                

                    echo <<< _END
                        </tbody>
                    </table>
                _END;
                }
                    // $result2=$conn->query("SELECT * FROM category WHERE category_id='"cat_id");
                    // $row2=$result2->fetch_assoc();
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="POST">
                        <label for="" style="font-size:20px;font-weight:600">Category Details</label>
                        <label for="cat-id" class="label">Category Id</label>
                        <input type="text" id="cat-id" class="input" name="category_id" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="cat-name" class="label">Category Name</label>
                        <input type="text" id="cat-name" class="input" name="Category_name" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="cat-desc" class="label">Category desc</label>
                        <input type="text" id="cat-desc" class="input" name="Category_desc" required>
                        <input type="hidden" id="cat-desc" class="input" name="hidden" required>
                        <input type="submit" class="submit" value="submit">
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="POST">
                        <label for="" style="font-size:20px;font-weight:600">Add Category Details</label>
                        <!-- <label for="cat-id" class="label">Category Id</label>
                        <input type="text" id="cat-id" class="input" name="category_id" pattern="[0-9]" title="(Please enter only numbers)" required> -->
                        <label for="cat-name" class="label">Category Name</label>
                        <input type="text" id="cat-name" class="input" name="Category_name" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="cat-desc" class="label">Category desc</label>
                        <input type="text" id="cat-desc" class="input" name="Category_desc" required>
                        <input type="hidden" id="cat-desc" class="input" name="hidden" required>
                        <input type="submit" class="submita" value="submit">
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                    </div>
                   
                </div>
            </div>
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Product</div>
                        <div class="add">Add product</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `product` JOIN category ON product.Category_id=category.category_id"; 
                    // $sql="SELECT * FROM `product` JOIN category ON product.category_id=category.category_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid";
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="product" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product id</th>
                                    <th style="display:none">Category ID</th>
                                    <th>Category Name</th>
                                    <th>Offer Id</th>
                                    <th>group</th>
                                    <th>product Name</th>
                                    <th>product Details</th>
                                    <th>price ( &#8377;)</th>
                                    <th>actual Price ( &#8377;)</th>
                                    <th>product Status</th>
                                    <th>Type</th>
                                    <th>Colors</th>
                                    <th style="display:none">quantity</th>
                                    <th style="display:none">Image 1</th>
                                    <th style="display:none">Image 2</th>
                                    <th style="display:none">Image 3</th>
                                    <th style="display:none">Image 4</th>
                                    <th>size</th>
                                    <th style="display:none"></th>
                                    <th style="min-width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                <td>{$row['Product_id']}</td>
                                <td style="display:none">{$row['Category_ID']}</td>
                                <td>{$row['Category_name']}</td>
                                <td>
                             _END;
                                $offer= $row['offer_id'];
                                if($offer=-1)
                                echo "(not set currently)";
                                else
                                echo $offer;
                            echo<<<_END
                                
                                
                                </td>
                                <td>{$row['grp']}</td>
                                <td>{$row['product_name']}</td>
                                <td>{$row['product_details']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['actual_price']}</td>
                                <td>{$row['pro_status']}</td>
                                <td>
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT product_desc.product_type FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY product_desc.product_type;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['product_type']." ";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td>
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT color.color FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['color']."\n";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="display:none">
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT product_desc.quantity FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['quantity']." ";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="display:none">
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT image.Image_path1 AS image1 FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['image1']."\n";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="display:none">
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT image.Image_path2 AS image2 FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['image2']."\n";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="display:none">
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT image.Image_path3 AS image3 FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['image3']."\n";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="display:none">
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT image.Image_path4 AS image4 FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['image4']."\n";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td>
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT product_desc.size FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY product_desc.size;";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['size']." | ";                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="display:none">
                                _END;
                                    $spid=$row['Product_id'];
                                    $sql1="SELECT product.product_name AS product_name,product.product_details AS product_detail,color.color AS color,product_desc.quantity AS quantity,image.Image_path1 AS image1,image.Image_path2 AS image2,image.Image_path3 AS image3,image.Image_path4 AS image4 FROM `product` JOIN color ON color.product_id=product.Product_id JOIN product_desc ON product_desc.cid=color.cid JOIN image ON image.cid=color.cid WHERE product.Product_id='$spid' GROUP BY color.color";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['product_name']."_".$row1['product_detail']."_". $row1['color']."_".$row1['quantity']."_".$row1['image1']."_". $row1['image2']."_".$row1['image3']."_".$row1['image4']."@" ;                                     
                                    }
                                    echo<<<_END
                                </td>
                                <td style="min-width:150px">
                                <span class="buttedit edit"><img src="public\img\pencil.png"></span>
                                <span class="buttedit other"><img src="public\img\chevron-right-circle.png"></span>
                                _END;
                                if($row['pro_status']=='Enabled'){
                                    ?>
                                     <span class="button disable"><img src="public\img\trash.png"></span>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <span class="button disable" style="border:2px solid teal"><img src="public\img\plus.png"></span>
                                    <?php
                                }
                                
                                ?>
                                </td>
                                
                                </tr>
                             

                           <?php 
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                                        
                    ?>
                    

                    <div class="formcontainer" id="productformupdate">
                    <form class="addcat" action="update.php" method="POST">
                       <label for="" style="font-size:20px;font-weight:600">Product Details</label>
                        <!-- <label for="prod-id" class="label" >Product Id</label> -->
                        <input type="hidden" id="prod-id" class="input" name="product_id" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <!-- <label for="catg_id" class="label" >Category Id</label> -->
                        <input type="hidden" id="catg_id" class="input" name="Category" pattern="[0-9]" title="(Please enter only numbers)" required disabled>
                        <label for="catg_id" class="label">Category</label>
                        <input type="hidden" id="catg_id" class="input" name="Category_id" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <?php
                        $query="SELECT * FROM `category`";
                        $restemp=$conn->query($query);
                        ?>
                        <select class="input2" id="catg_id2" name="Category_id2">
                            <option value="" selected disabled>SELECT</option>
                            <?php
                            while($temprow=$restemp->fetch_assoc()){
                            ?>
                            <option value="<?php echo $temprow['category_id'];?>"><?php echo $temprow['Category_name'];?></option>
                            <?php
                            }
                        ?>
                        </select>
                        <label for="off_id" class="label">Offer Id</label>
                        <?php
                        $query="SELECT * FROM `offer`";
                        $restemp=$conn->query($query);
                        ?>
                        <select class="input2" id="off_id2" name="off_id2">
                            <option value="" selected disabled>SELECT</option>
                            <?php
                            while($temprow=$restemp->fetch_assoc()){
                            ?>
                            <option value="<?php echo $temprow['offer_id'];?>"><?php echo $temprow['offer_name'];?></option>
                            <?php
                            }
                        ?>
                        </select>
                        <input type="hidden" id="off_id" class="input" name="off_id"  required>
                       
                        <label for="grp" class="label" >Group</label>
                        <select id="grp2" class="input2" name="grp2">
                            <option value="" selected disabled>SELECT</option>
                            <option value="mens">Mens</option>
                            <option value="women">Women</option>
                            <option value="kids">Kids</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <input type="hidden" id="grp" class="input" name="grp" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="prod_name" class="label" >Product name</label>
                        <input type="text" id="prod_name" class="input" name="product_name" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="prod_det" class="label" >Product Detail</label>
                        <input type="text" id="prod_det" class="input" name="product_details" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="pprice" class="label">Price</label>
                        <input type="text" id="pprice" class="input" name="price" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="pactpri" class="label">Actual Price</label>
                        <input type="text" id="pactpri" class="input" name="actprice" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <!-- <label for="pprostat" class="label">Product Status</label> -->
                        <input type="hidden" id="pprostat" class="input" name="pprostat" required>
                        <label for="protype" class="label">Product type</label>
                        <input type="text" id="protype" class="input" name="protype" required>
                        
                        <input type="text" id="procolor" class="input" name="procolor" hidden required >
                        
                        <input type="text" id="proquan" class="input" name="proquan" hidden required>
                        <input type="text" id="proimage2" class="input" name="proimage2" hidden required>
                        <input type="text" id="proimage3" class="input" name="proimage3" hidden required>
                        <input type="text" id="proimage4" class="input" name="proimage4" hidden required>
                        <input type="text" id="proimage1" class="input" name="proimage1" hidden required>

                        
                        <input type="text" id="prosize" class="input" name="prosize" hidden required >
                        <div class="colopt"></div>
                        <label for="prosize" class="label">select size</label>
                        <div class="sizeopt"></div>
                        <script>
                        // Select the element you want to observe
                        var targetElement = document.getElementById('productformupdate');

                        // Create a new instance of MutationObserver
                        var observer = new MutationObserver(function(mutationsList, observer) {
                            for(var mutation of mutationsList) {
                                if (mutation.attributeName === 'style') {
                                    var displayStyle = targetElement.style.display;
                                    if (displayStyle === 'block') {
                                        console.log('Display is now set to block.');
                                        // Call your function here
                                        var procolor=document.querySelector("#procolor");
                                        var colopt=document.querySelector(".colopt");
                                        var proquan=document.querySelector("#proquan");
                                        var proimage1=document.querySelector("#proimage1");
                                        var proimage2=document.querySelector("#proimage2");
                                        var proimage3=document.querySelector("#proimage3");
                                        var proimage4=document.querySelector("#proimage4");
                                        var quanval=proquan.value.trim().split(' ');
                                        var imageval1=proimage1.value.trim().split('\n');
                                        var imageval2=proimage2.value.trim().split('\n');
                                        var imageval3=proimage3.value.trim().split('\n');
                                        var imageval4=proimage4.value.trim().split('\n');
                                        console.log(procolor);
                                        var colorval=procolor.value.trim().split(' ');
                                       
                                        console.log("jsr"+colorval[0]);
                                        // var colcontent = `<select id="selectcol" class="col" onchange="myFunction()" style="width:90%;margin:5px 10px; padding :5px;" name="selectcol" required >`;
                                        // for (var i = 0; i < colorval.length; i++) {
                                        //     colcontent += `<option value="${colorval[i]}">${colorval[i]}</option>`;

                                        // }
                                        // colcontent += "</select>";
                                        // colopt.innerHTML = colcontent;
                                        var colcontent="";
                                        for (var i = 0; i < colorval.length; i++){
                                            colcontent +=`<br><hr><br><label for="procolor" class="label">color</label><input type="text" id="color${colorval[i]}" class="input" value="${colorval[i]}" name="${colorval[i]}color"/> `
                                            colcontent +=`<label for="proquan" class="label">Product Quantity</label><input type="text" id="color${colorval[i]}" class="input" value="${quanval[i]}" name="${colorval[i]}quantity"/> `
                                            colcontent +=`<label for="proimage1" class="label">Product Image 1</label><input type="text" id="textimage1${colorval[i]}" class="input" value="${imageval1[i]}" name="${colorval[i]}image1text"/><input type="file" id="image1${colorval[i]}" class="input" value="${imageval1[i]}" name="${colorval[i]}image1"/> `
                                            colcontent +=`<label for="proimage2" class="label">Product Image 2</label><input type="text" id="textimage2${colorval[i]}" class="input" value="${imageval1[i]}" name="${colorval[i]}image2text"/><input type="file" id="image2${colorval[i]}" class="input" value="${imageval2[i]}" name="${colorval[i]}image2"/> `
                                            colcontent +=`<label for="proimage3" class="label">Product Image 3</label><input type="text" id="textimage3${colorval[i]}" class="input" value="${imageval1[i]}" name="${colorval[i]}image3text"/><input type="file" id="image3${colorval[i]}" class="input" value="${imageval3[i]}" name="${colorval[i]}image3"/> `
                                            colcontent +=`<label for="proimage4" class="label">Product Image 4</label><input type="text" id="textimage4${colorval[i]}" class="input" value="${imageval1[i]}" name="${colorval[i]}image4text"/><input type="file" id="image4${colorval[i]}" class="input" value="${imageval4[i]}" name="${colorval[i]}image4"/><br><hr><br> `
                                        }
                                        colopt.innerHTML = colcontent;


                                        var prosize=document.querySelector("#prosize");
                                        var sizeopt=document.querySelector(".sizeopt");
                                        console.log(prosize);
                                        var sizeval=prosize.value.trim().split('|');
                                        console.log("jsr"+sizeval[0]);
                                        var sizecontent = `<select id="selectsize" class="size" style="width:90%;margin:5px 10px; padding: 5px;" name="selectsize" required >`;
                                        sizecontent += `<option value="select">Select</option>`;
                                        for (var i = 0; i < sizeval.length; i++) {
                                            sizecontent += `<option value="${sizeval[i]}">${sizeval[i]}</option>`;
                                        }
                                        sizecontent += "</select>";
                                        sizeopt.innerHTML = sizecontent;
                                    }
                                }
                            }
                        });

                        // Start observing the target node for configured mutations
                        observer.observe(targetElement, { attributes: true });
                        </script>
                               
                        <!-- <label for="disabled" class="label">Product Status</label> -->
                        <input type="text" id="disabled" class="input" name="disabled" hidden disabled>
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="POST">
                        <label for="" style="font-size:20px;font-weight:600">ADD Product Details</label>
                        <!-- <label for="prod-id" class="label">Product Id</label>
                        <input type="text" id="prod-id" class="input" name="product_id" pattern="[0-9]" title="(Please enter only numbers)" required> -->
                        <label for="catg_id" class="label">Category</label>
                        <!-- <input type="text" id="catg_id" class="input" name="Category_id" pattern="[0-9]" title="(Please enter only numbers)" required> -->
                        <?php
                        $query="SELECT * FROM `category`";
                        $restemp=$conn->query($query);
                        ?>
                        <select class="input2" id="catg_id2" name="Category_id">
                            <option value="" selected disabled>SELECT</option>
                            <?php
                            while($temprow=$restemp->fetch_assoc()){
                            ?>
                            <option value="<?php echo $temprow['category_id'];?>"><?php echo $temprow['Category_name'];?></option>
                            <?php
                            }
                        ?>
                        </select>
                        <label for="off_id" class="label">Offer</label>
                        <!-- <input type="text" id="off_id" class="input" name="off_id"  required> -->
                        <?php
                        $query="SELECT * FROM `offer`";
                        $restemp=$conn->query($query);
                        ?>
                        <select class="input2" id="off_id2" name="off_id">
                            <option value="" selected disabled>SELECT</option>
                            <?php
                            while($temprow=$restemp->fetch_assoc()){
                            ?>
                            <option value="<?php echo $temprow['offer_id'];?>"><?php echo $temprow['offer_name'];?></option>
                            <?php
                            }
                        ?>
                        </select>

                        <label for="grp" class="label">Group</label>
                        <!-- <input type="text" id="grp" class="input" name="grp" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required> -->
                        <select id="grp2" class="input2" name="grp">
                            <option value="" selected disabled>SELECT</option>
                            <option value="mens">Mens</option>
                            <option value="women">Women</option>
                            <option value="kids">Kids</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        
                        <label for="prod_name" class="label">Product name</label>
                        <input type="text" id="prod_name" class="input" name="product_name" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="prod_det" class="label">Product Detail</label>
                        <input type="text" id="prod_det" class="input" name="product_details" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <label for="pprice" class="label">Price</label>
                        <input type="text" id="pprice" class="input" name="price" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="pactpri" class="label">Actual Price</label>
                        <input type="text" id="pactpri" class="input" name="actprice" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="pprostat" class="label">Product Status</label>
                        <input type="text" id="pprostat" class="input" name="pprostat" required>
                        <hr>
                        <label for="pprocol" class="label">color</label>
                        <input type="text" id="pprocol" class="input" name="pprocol" required>
                        <label for="pproquan" class="label">Quantity</label>
                        <input type="text" id="pproquan" class="input" name="pproquan" required>
                        <label for="pprosize" class="label">sizes</label>
                        <select id="pprosize" class="input" name="pprosize[]" required multiple>
                            <option value="">Select Size</option>
                            <!-- Options from 1 to 12 -->
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                            <!-- Options from 26 to 30 -->
                            <?php for ($i = 26; $i <= 30; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                            <!-- Options from 36 to 45 -->
                            <?php for ($i = 36; $i <= 45; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>

                        <label for="pproimage1" class="label">Image1</label>
                        <input type="file" id="pproimage1" class="input" name="pproimage1" required>
                        <label for="pproimage2" class="label">Image2</label>
                        <input type="file" id="pproimage2" class="input" name="pproimage2" required>
                        <label for="pproimage3" class="label">Image3</label>
                        <input type="file" id="pproimage3" class="input" name="pproimage3" required>
                        <label for="pproimage4" class="label">Image4</label>
                        <input type="file" id="pproimage4" class="input" name="pproimage4" required>
                        <div class="addcontent0"></div><hr>
                        <div class="addmore0" style="font-weight:800;color:teal;text-align:right;width:90%;cursor:pointer" onclick="addMore()">Add more</div>
                        <!-- <label for="disabled" class="label">Product Status</label> -->
                        <input type="text" id="disabled" class="input" name="disabled" hidden disable>
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                    </div>
                    <div class="sub-prod">
                        
                           <h2>Product Details</h2><hr><br>
                            <table id="descript" class="table2 table-striped table-bordered" style="width:100%;background:white">
                                <thead>
                                    <tr>
                                        <th>product name</th>
                                        <th>product details</th>
                                        <th>color</th>
                                        <th>quantity</th>
                                        <th>image1</th>
                                        <th>image2</th>
                                        <th>image3</th>
                                        <th>image4</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                </tbody>
                            </table>
                        
                        <input type="button" class="hide" value="Cancel">
                    </div>
                    
            </div>
            </div>
            
            <div class="mainpage" id="ompage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Order</div>
                        <div class="add" style="display:none">Add order</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `order_tbl` ORDER BY 'order_id' DESC"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="order" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:60px">order id</th>
                                    <th style="width:60px">user id</th>
                                    <th style="width:100px">order date</th>
                                    <th style="width:100px">order status</th>
                                    <th style="width:110px">order amount (₹)</th>
                                    <th >shipping address</th>
                                    <th style="width:140px">Shipping Status</th>
                                    <th style="display:none">shipping status</th>
                                    <th style="width:100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['user_id']}</td>
                            
                            
                                    <td>
                            _END;
                                    $currentDate = $row['order_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    <td>{$row['order_status']}</td>
                                    <td>{$row['order_amount']}</td>
                                    <td>{$row['shipping_address']}</td>
                                    <td>{$row['shipping_status']}</td>
                                    <td style="display:none">
                            _END;
                                    $soid=$row['order_id'];
                                    $sql1="SELECT order_detail.order_id,order_detail.product_id,order_detail.quantity,order_detail.rate,order_detail.size,order_detail.color,order_detail.discount,order_detail.amount FROM order_tbl Join order_detail ON order_tbl.order_id=order_detail.order_id WHERE order_tbl.order_id=$soid ";
                                    $result1=$conn->query($sql1);
                                    while ($row1 = $result1->fetch_assoc()) {                                             
                                        echo $row1['product_id']."_". $row1['quantity']."_".$row1['rate']."_".$row1['size']."_". $row1['color']."_".$row1['discount']."_".$row1['amount']."@" ;                                     
                                    }
                                    echo<<<_END
                                </td style="width:100px">
                                    <td><span class="buttedit edit"><img src="public\img\pencil.png"></span><span class="buttedit other"><img src="public\img\chevron-right-circle.png"></span></td>
                                    
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">order</label>
                        <label for="oid" class="label">	Order_id</label>
                        <input type="number" id="oid" class="input" name="order_id" pattern="[0-9]" title="(Please enter only numbers)" required >
                        <label for="oid" class="label" id="oid_hid"></label>
                        <label for="uid" class="label">User_id</label>
                        <input type="text" id="uid" class="input" name="user_id" pattern="[0-9]" title="(Please enter only numbers)" required disabled>
                        <label for="od" class="label">Order_date</label>
                        <input type="text" id="od" class="input" name="order_date" required disabled>
                        <label for="os" class="label">order_status</label>
                        <input type="hidden" id="os" class="input" name="order_status" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        <select id="os2" class="input2" name="order_status2" >
                            <option value="Select" disabled selected>Select options </option>
                            <option value="placed">Placed</option>
                            <option value="packed">Packed</option>
                            <option value="complete">Complete</option>
                            
                        </select>
                        <label for="amt" class="label">order_amount</label>
                        <input type="text" id="amt" class="input" name="order_amount" pattern="[0-9]" title="(Please enter only numbers)" required disabled>
                        <label for="sadd" class="label">shipping_address</label>
                        <input type="text" id="sadd" class="input" name="shipping_address" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required disabled>
                        <label for="sstat" class="label">shipping_status</label>
                        <input type="hidden" id="sstat" class="input" name="shipping_status" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>

                        <select id="os3" class="input2" name="shipping_status2" >
                            <option value="Select" disabled selected>Select options </option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            
                            
                        </select>
                        
                        <!-- <input type="text" class="input" id= "oid_hid" name ="order_id1" value ="" > -->
                        
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer" style="display:none">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">order</label>
                        <label for="oid" class="label">	Order_id</label>
                        <input type="text" id="oid" class="input" name="order_id" >
                        <label for="uid" class="label">User_id</label>
                        <input type="text" id="uid" class="input" name="user_id" >
                        <label for="od" class="label">Order_date</label>
                        <input type="text" id="od" class="input" name="order_date" >
                        <label for="os" class="label">order_status</label>
                        <input type="text" id="os" class="input" name="order_status" >
                        
                        <label for="amt" class="label">order_amount</label>
                        <input type="text" id="amt" class="input" name="order_amount" >
                        <label for="sadd" class="label">shipping_address</label>
                        <input type="text" id="sadd" class="input" name="shipping_address" >
                        <label for="sstat" class="label">shipping_status</label>
                        <input type="text" id="sstat" class="input" name="shipping_status" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
                    <div class="sub-prod">
                        
                    <h2>Order Details</h2><hr><br>
                            <table id="descript" class="table2 table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="height:50px;width:100px;text-align:center;display:none">Order id</th>
                                        <th style="height:50px;width:100px;text-align:center;">product id</th>
                                        <th style="height:50px;width:100px;text-align:center;">quantity</th>
                                        <th style="height:50px;width:100px;text-align:center;">rate (&#8377;)</th>
                                        <th style="height:50px;width:100px;text-align:center;">size</th>
                                        <th style="height:50px;width:100px;text-align:center;">color</th>
                                        <th style="height:50px;width:100px;text-align:center;">discount (&#8377;)</th>
                                        <th style="height:50px;width:100px;text-align:center;">Amount (&#8377;)</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                </tbody>
                            </table>
                        
                        <input type="button" class="hide" value="Cancel">
                    </div>
            </div>
            </div>
            
            <div class="mainpage" id="feedpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Feedback</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `feedback`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="feedback" class="table table-striped table-bordered" style="width:auto">
                            <thead>
                                <tr>
                                    <th>feedback id</th>
                                    <th>user id</th>
                                    <th>product id</th>
                                    <th>feedback rating</th>
                                    <th>feedback description</th>
                                    <th>feedback date</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['feedback_id']}</td>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['feedback_rating']}</td>
                                    <td>{$row['feedback_desc']}</td>
                                    <td>
                             _END;
                                    $currentDate = $row['feedback_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    
            </div>
            </div>
            <div class="mainpage" id="cumpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Customer</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `user`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="user" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>user ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>gender</th>
                                    <th>Address</th>
                                    <th>PIN</th>
                                    <th>City</th>
                                    <th>Registration date</th>
                                    <th>user status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['userID']}</td>
                                    <td>{$row['fname']}</td>
                                    <td>{$row['lname']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['pin']}</td>
                                    <td>{$row['city']}</td>
                                    <td>
                             _END;
                                    $currentDate = $row['registration_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    <td>{$row['usr_status']}</td>
                                    
                            _END;
                            if($row['usr_status']=='Active'){
                                ?>
                                    <td><span class="button disable"><img src="public\img\trash.png" alt="disable" ></span></td>
                                <?php
                            }
                            else{
                                ?>
                                    <td><span class="button disable" style="border:2px solid teal"><img src="public\img\plus.png" alt="disable" ></span></td>
                                <?php
                            }
                        ?>
                        </tr>
                        <?php
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    
                    
            </div>
            </div>
            <div class="mainpage" id="subpage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Refund</div>
                        
                    </div>
                <?php
                    $sql = "SELECT * FROM `refund`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="refund" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>refund id</th>
                                    <th>order id</th>
                                    <th>request date</th>
                                    <th>refund date</th>
                                    <th>refund reason</th>
                                    <th>refund amount (₹)</th>
                                    <th>refund status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['refund_id']}</td>
                                    <td>{$row['order_id']}</td>
                                    <td>
                             _END;
                                    $currentDate = $row['request_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    <td>
                             _END;
                                    $currentDate = $row['refund_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    if($formattedDate2=="30 November, -0001" || $formattedDate2=="01 January, 1970" )
                                    $formattedDate2="Not Set";
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    
                                    <td>{$row['refund_reason']}</td>
                                    <td>{$row['refund_amt']}</td>
                                    <td>{$row['refund_status']}</td>
                                    <td><span class="buttedit edit"><img src="public\img\pencil.png" alt="edit" ></span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">REFUND</label>
                        <!-- <label for="refund_id" class="label">refund_id</label> -->
                        <input type="hidden" id="refund_id" class="input" name="refund_id" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="order_id" class="label">order_id</label>
                        <input type="text" id="order_id" class="input" name="order_id" pattern="[0-9]" title="(Please enter only numbers)" required disabled>
                        <label for="request_date" class="label">request_date</label>
                        <input type="text" id="request_date" class="input" name="request_date" disabled>
                        <label for="refund_date" class="label">refund_date</label>
                        <input type="text" id="refund_date" class="input" name="refund_date" disabled>
                        <label for="refund_reason" class="label">refund_reason</label>
                        <input type="text" id="refund_reason" class="input" name="refund_reason" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required disabled>
                        <label for="refund_amt" class="label">refund_amt</label>
                        <input type="text" id="refund_amt" class="input" name="refund_amt" pattern="[0-9]" title="(Please enter only numbers)" required disabled>
                        <label for="refund_status" class="label">refund_status</label>
                        <input type="hidden" id="refund_status" class="input" name="refund_status" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>

                        <select id="os4" class="input2" name="refund_status2" >
                            <option value="Select" disabled selected>Select options </option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="done">Done</option>
                            
                            
                        </select>
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                   
            </div>
            </div> 
            </div>
            <div class="mainpage" id="ofpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Offer</div>
                        <div class="add">Add Offer</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `offer`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="offer" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>offer Id</th>
                                    <th>offer name</th>
                                    <th>offer details</th>
                                    <th>offer status</th>
                                    <th>offer Percent</th>
                                    <th>offer start date</th>
                                    <th>offer end date</th>
                                    <th style="min-width:150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['offer_id']}</td>
                                    <td>{$row['offer_name']}</td>
                                    <td>{$row['offer_details']}</td>
                                    <td>{$row['offer_status']}</td>
                                    <td>{$row['offer_percent']}</td>
                                    <td>
                             _END;
                                    $currentDate = $row['offer_start_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    if($formattedDate2=="30 November, -0001" || $formattedDate2=="01 January, 1970" )
                                    $formattedDate2="Not Set";
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    <td>
                             _END;
                                    $currentDate = $row['offer_end_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                     
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    
                                    <td style="min-width:150px"><span class="buttedit edit"><img src="public\img\pencil.png" alt="edit" ></span>
                                _END;
                                if($row['offer_status']=='Enabled'){
                                    ?>
                                    <span class="button disable"><img src="public\img\trash.png" alt="disable" ></span></td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <span class="button disable" style="border:2px solid teal"><img src="public\img\plus.png" alt="disable" ></span></td>
                                    <?php
                                }
                                ?>
                                </tr>
                             <?php
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">OFFER</label>
                        <label for="offer_id" class="label">offer_id</label>
                        <input type="number" id="offer_id" class="input" name="offer_id" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="offer_name" class="label">offer_name</label>
                        <input type="text" id="offer_name" class="input" name="offer_name" pattern="[A-Za-z0-9]+" title="(Please enter only alphabets)" required>
                        <label for="offer_details" class="label">offer_details</label>
                        <input type="text" id="p2" class="input" name="offer_details" pattern="[A-Za-z0-9%., ]+" title="(Please enter only alphabets)" required>
                        <label for="offer_status" class="label">offer_status</label>
                        <input type="text" id="p3" class="input" name="offer_status" required>
                        <label for="offer_percent" class="label">offer_percent</label>
                        <input type="text" id="p4" class="input" name="offer_percent" required>
                        <label for="offer_start_date" class="label">offer_start_date</label>
                        <input type="date" id="p5" class="input" name="offer_start_date" required>
                        <label for="offer_end_date" class="label">offer_end_date</label>
                        <input type="date" id="p6" class="input" name="offer_end_date" required>

                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">OFFER</label>
                        <!-- <label for="offer_id" class="label">offer_id</label>
                        <input type="text" id="offer_id" class="input" name="offer_id" pattern="[0-9]" title="(Please enter only numbers)" required> -->
                        <label for="offer_nm" class="label">offer_name</label>
                        <input type="text" id="offer_nm" class="input" name="offer_name" pattern="[A-Za-z0-9]+" title="(Please enter only alphabets)" required>
                        <label for="offer_details" class="label">offer_details</label>
                        <input type="text" id="p2" class="input" name="offer_details" pattern="[A-Za-z0-9.,% ]+" title="(Please enter only alphabets)" required>
                        <label for="offer_status" class="label">offer_status</label>
                        <input type="text" id="p3" class="input" name="offer_status" required>
                        <label for="offer_percent" class="label">offer_percent</label>
                        <input type="text" id="p4" class="input" name="offer_percent" required>
                        <label for="offer_start_date" class="label">offer_start_date</label>
                        <input type="date" id="p3" class="input" name="offer_start_date" required>
                        <label for="offer_end_date" class="label">offer_end_date</label>
                        <input type="date" id="p4" class="input" name="offer_end_date" required>
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="paypage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Payment</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `payment`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="offer" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>transaction id</th>
                                    <th>order id</th>
                                    <th>payment mode</th>
                                    <th>payment date</th>
                                    <th>payment status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['transaction_id']}</td>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['payment_mode']}</td>
                                    <td>
                            _END;
                                    $currentDate = $row['payment_date']; 

                                    $timestamp2 = strtotime($currentDate); 

                                    $formattedDate2 = date("d F, Y", $timestamp2);
                                    echo $formattedDate2;
                            echo<<<_END
                                    </td>
                                    <td>{$row['payment_status']}</td>
                                    <td><span class="buttedit edit"><img src="public\img\pencil.png" alt="edit" ></span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">PAYMENT</label>
                        <label for="transaction_id" class="label">transaction_id</label>
                        <input type="number" id="transaction_id" class="input" name="transaction_id" pattern="[0-9]" title="(Please enter only numbers)" required>
                        <label for="order_id" class="label">order_id</label>
                        <input type="text" id="order_id" class="input" name="order_id" pattern="[0-9]" title="(Please enter only numbers)" required disabled>
                        <label for="payment_mode" class="label">payment_mode</label>
                        <input type="text" id="payment_mode" class="input" name="payment_mode" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required disabled>
                        <label for="payment_date" class="label">payment_date</label>
                        <input type="date" id="payment_date" class="input" name="payment_date" disabled>
                        <label for="payment_status" class="label">payment_status</label>
                        <input type="hidden" id="payment_status" class="input" name="payment_status" pattern="[A-Za-z]+" title="(Please enter only alphabets)" required>
                        
                        <select id="os5" class="input2" name="payment_status2" >
                            <option value="Select" disabled selected>Select options </option>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            
                            
                        </select>
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                   
            </div>
            </div>
        </section>
    </section>
    <script src="adminpanel.js" type="text/javascript"></script>
    <script>
        var title = document.querySelectorAll(".sideitem");
        var subtitle = document.querySelectorAll(".mainpage");
        var menu = document.querySelector(".amenu");
        var sidebar = document.querySelector(".sidebar");
        

    
        menu.addEventListener("click", () => {
            sidebar.classList.toggle("sview");
        })
        <?php
        if(isset($_GET['page'])){
            ?>
        subtitle[<?php echo $page; ?>].style.display = "block";
        title[<?php echo $page; ?>].style.background = "grey";
        <?php
        }
        else{
        ?>
        subtitle[0].style.display = "block";
        title[0].style.background = "grey";
        <?php
        }
        ?>

        for (let i = 0; i < title.length; i++) {
            
            title[i].addEventListener("click", () => {
                window.location.href = "adminpanel.php?page=" + i;
                
                for (let j = 0; j < subtitle.length; j++) {
                    subtitle[j].style.display = "none";
                    title[j].style.background = "teal";
                }
               
                title[i].style.background = "grey";
                subtitle[i].style.display = "block";
                
                
            });
        }
        // new DataTable('#example');
        // new DataTable('#product');
        // new DataTable('#order');
        new DataTable('.table');
        var formcontainer=document.querySelectorAll(".formcontainer");
        var addcontainer=document.querySelectorAll(".addcontainer");
        var edit=document.querySelectorAll(".edit");
        var disable=document.querySelectorAll(".disable");
        // var form=document.querySelector(".addcat");
        var cancel=document.querySelectorAll(".cancel");
        var submit=document.querySelectorAll(".submit");
        var cancela=document.querySelectorAll(".cancela");
        var submita=document.querySelectorAll(".submita")
        var add=document.querySelectorAll(".add");

        
        function logfunction() {
        window.location.href="logout.php";
    }
    function profile(){
        windows.location.href="user.html";
    }

        console.log(addcontainer[0]);
        for(let k=0;k<addcontainer.length;k++){
            console.log(k);
            add[k].addEventListener("click",()=>{
            addcontainer[k].style.display="block";
             })
            submita[k].addEventListener("click",()=>{
            // addcontainer[k].style.display = "none";
             })
            cancela[k].addEventListener("click", (event) => {
            event.preventDefault();
            // box.childNodes[6].reset();
            addcontainer[k].style.display="none";
            });
         }
         for(let i=0;i<disable.length;i++){
            var con=disable[i].textContent;
                    if(con=='Enabled'){
                        disable[i].innerHTML='bkabh';
                    }
                    console.log("hi"+disable[i])
            disable[i].addEventListener("click",(e)=>{
                // e.preventDefault();
                
                var len=e.currentTarget.parentNode.parentNode.getElementsByTagName('td').length;
                var prid=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[0].textContent;
                var header=e.currentTarget.parentNode.parentNode.parentNode.parentNode.getElementsByTagName('tr')[0].getElementsByTagName('th')[0].textContent;
                console.log(header);
                if(header=='Category ID')
                {

                    var value=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[3].textContent;
                    // console(value);
                    window.location.href="update.php?pid="+prid+"&value="+value+"&header="+header;

                }
                else if(header=='Product id'){
                    var value1=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[9].textContent;
                    console.log(value1);
                    window.location.href="update.php?pid="+prid+"&value1="+value1+"&header="+header;
                }
                else if(header=='prodesc_ID'){
                    var value2=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[4].textContent;
                    window.location.href="update.php?pid="+prid+"&value2="+value2+"&header="+header;
                }
                else if(header=='cid'){
                    var value3=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[3].textContent;
                    window.location.href="update.php?pid="+prid+"&value3="+value3+"&header="+header;
                }
                else if(header=='offer Id'){
                    var value4=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[3].textContent;
                    window.location.href="update.php?pid="+prid+"&value4="+value4+"&header="+header;
                }
                else if(header=='user ID'){
                    var value5=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[10].textContent;
                    window.location.href="update.php?pid="+prid+"&value5="+value5+"&header="+header;
                }
            //    console.log(header);
            //    console.log(value);
                // console.log(prid)
            
        })
            
        }
        for(let i=0;i<edit.length;i++){
            edit[i].addEventListener("click",(e)=>{
                // e.preventDefault();
                
                var len=e.currentTarget.parentNode.parentNode.getElementsByTagName('td').length;
                console.log(len);
                var arr = new Array(len-1);
                for(var j=0;j<len-1;j++){
                
                
                
                var box=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                console.log("box"+box);
                console.log(box.childNodes[5]);
                box.childNodes[5].style.display="block";
                for(var k=0;k<cancel.length;k++){
                    submit[k].addEventListener("click",()=>{
                        box.childNode[5].style.display = "none";
                     })
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
               
                // console.log(colorval[0]);
                // console.log(colorval[1]);
                // console.log(colorval.length);
                // console.log("jsr"+box.querySelectorAll(".input")[j].value);
            }
            

           });
        }
        var other=document.querySelectorAll(".other");
        var sub_prod=document.querySelectorAll(".sub-prod");
        
        var hide=document.querySelector(".hide");
        
        console.log("length"+other.length);
        
        for(var i=0;i<other.length;i++){
            other[i].addEventListener("click",(e)=>{
            
                var len=e.currentTarget.parentNode.parentNode.getElementsByTagName('td').length;
                console.log("len"+len);
                var arr = new Array(len-1);
                for(var j=0;j<len-1;j++){
                
                
                
                var box=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                
                console.log(e.currentTarget.parentNode.parentNode);
                // sub_prod.style.display="block";
                // var box=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                console.log("vfx"+box);
                console.log(box.childNodes[9]);
                box.childNodes[9].style.display="block";
                box.childNodes[9].querySelector(".hide").addEventListener("click",(a)=>{
                    box.childNodes[9].style.display="none";
            });
                }
                var val=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[len-2].textContent;
                // console.log("parent " + e.currentTarget.parentNode.parentNode.parentNode.parentNode.getElementsByTagName('tr')[0].textContent);
                var text=val.split('@');
                // console.log(text);
                var tbody=box.childNodes[9].querySelector('.tbody');
                tbody.innerHTML='';
                
                for(var k=0;k<(text.length)-1;k++){
                    console.log(tbody.parentNode.getElementsByTagName('tr')[0].getElementsByTagName('th')[0].textContent);
                    var subtext=text[k].split('_');
                    // console.log(subtext);
                    var row = document.createElement('tr');
                    var column="";
                    for(var l=0;l<subtext.length;l++){
                        if(l>=4 && l<=7 && (tbody.parentNode.getElementsByTagName('tr')[0].getElementsByTagName('th')[0].textContent)!=="Order id" ){
                            column+=`<td style="background:white;text-align:center;"><img src="${subtext[l]}" alt="image" style="height:100px;width:100px;background:white;text-align:center;"><br>${subtext[l]}</td>`;
                        }
                        else{

                            column+=`<td style="background:white;text-align:center;"><br>${subtext[l]}</td>`;
                        }
                    }
                    // column+=`<td><span class="buttedit edit">Edit</span></td>`;
                    row.innerHTML=column;
                    // console.log(row);
                    tbody.appendChild(row);
                    // console.log(tbody);
                    // tbody.parentNode.classList.add("table");
                    // console.log();
               
                }
                
                
                
            });
            
        }
        

            

        const login=document.querySelector(".subtitle");
const loginitem=document.querySelector(".logindrop");

login.onclick = function () {
    loginitem.classList.toggle("visible");
    // console.log("Menu button clicked");
    // console.log("link-container class list:", menuitem.classList);
};

    </script>
     <script>
        var procolor=document.querySelector("#procolor");
        console.log(procolor);
        console.log("hello "+procolor.value)
    </script>
    <script>
        var buttedit=document.querySelectorAll(".buttedit");

    </script>
    <script>
        function myFunction(){
            var proquan=document.querySelector("#proquan");
            var proimage1=document.querySelector("#proimage1");
            var quanval=proquan.value.trim().split(' ');
            var imageval1=proimage1.value.trim().split(' ');
            var selectElement = document.getElementById("selectcol");
            var selectedValue = selectElement.value;
            console.log("Selected value: " + selectedValue);
        }
    </script>

<script>
    let count=1;
    function addMore() {
        document.querySelector(".addcontent"+(count-1)).innerHTML = `<hr>
            <label for="pprocol${count}" class="label">Color</label>
            <input type="text" id="pprocol${count}" class="input" name="pprocol${count}" required>
            <label for="pproquan${count}" class="label">Quantity</label>
            <input type="text" id="pproquan${count}" class="input" name="pproquan${count}" required>
            <label for="pprosize${count}" class="label">Sizes</label>
            <select id="pprosize${count}" class="input" name="pprosize${count}[]" required multiple>
                <option value="">Select Size</option>
                <!-- Options from 1 to 12 -->
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
                <!-- Options from 26 to 30 -->
                <?php for ($i = 26; $i <= 30; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
                <!-- Options from 36 to 45 -->
                <?php for ($i = 36; $i <= 45; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>

            <label for="pproimage1${count}" class="label">Image1</label>
            <input type="file" id="pproimage1${count}" class="input" name="pproimage1${count}" required>
            <label for="pproimage2${count}" class="label">Image2</label>
            <input type="file" id="pproimage2${count}" class="input" name="pproimage2${count}" required>
            <label for="pproimage3${count}" class="label">Image3</label>
            <input type="file" id="pproimage3${count}" class="input" name="pproimage3${count}" required>
            <label for="pproimage4${count}" class="label">Image4</label>
            <input type="file" id="pproimage4${count}" class="input" name="pproimage4${count}" required>
            <div class="addcontent${count}"></div>
            <hr>
            <div class="addmore${count}" style="font-weight:800;color:teal;text-align:right;width:90%;cursor:pointer" onclick='addMore()'>Add more</div>
        `;
        document.querySelector(".addmore"+(count-1)).style.display="none"
        count++;
    }

    
</script>
<!-- <script>
    // Get the #oid and #oid_hid elements
    const oidInput = document.querySelector("#oid");
    const oidHid = document.querySelector("#oid_hid");
    oidHid.innerText = oidInput.value;
    // Add an event listener to #oid for input events
    oidInput.addEventListener("input", function() {
        // Set the text of #oid_hid to the value of #oid
        oidHid.innerText = oidInput.value;
    });
</script>
     -->
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