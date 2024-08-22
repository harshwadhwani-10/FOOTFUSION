<?php
include_once 'connection.php';

$sql="SELECT * FROM `product`";
$result=$conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public\img\ff logo.jpeg" type="image/x-icon">
    <link rel="icon" href="public\img\ff logo.jpeg" type="image/x-icon">
    <title>Foot Fusion</title>
    <link rel="stylesheet" type="text/css" href="public\css\home.css">

    <style>
        .pre-btn,
.nxt-btn {
    /* display:none; */
    border: none;
    width: 10vw;
    height: 100%;
    position: absolute;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    /* background: linear-gradient(90deg, rgba(255, 255, 255, 1) 0%, #fff 100%); */
    background:transparent;
    cursor: pointer;
    z-index: 8;
}
 *{
    margin: 0;padding: 0;
}
body{
    overflow-x:hidden;
}
footer{
    position: relative;
    width: 100%;
    padding: 40px 5vw;
    padding-top:0;
    padding-bottom: 80px;
    /* background: #e2e2e2; */
    border-top: 0.5px solid #818181;
    box-shadow: -2px -2px 50px #818181;
}

.footer-content{
    display: flex;
    flex-direction: row-reverse;
    width: 100%;
    justify-content: space-between;
    /* background: #e2e2e2; */
}

.about{
    width:30%;
    display: flex;
    flex-direction: column;
    /* background: #e2e2e2; */
}
.about-section{
    display:flex;
    flex-direction: column;
   
}
.logo{
    width:80%;
    height:40%;
}
.logo img{
    height:100%;
    width:100%;
}
.footer-ul-container{
    width: 70%;
    margin:47px 0 0 0;
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    padding-right: 10vw;
}

.footer-category{
    /* width: 200px; */
    /* display: grid; */
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 10px;
    list-style: none;
    justify-content:space-between;
}

.category-title{
    /* grid-column: span 2; */
    text-transform: capitalize;
    color:teal;
    font-size: 20px;
    margin-bottom: 20px;
    font-weight: 600;
}

.footer-category .footer-link{
    text-decoration: none;
    text-transform: capitalize;
    color:black;
    /* margin-top: 20px; */
}
.footer-category li{
    margin-top: 20px;
}

.footer-link:hover{
    color:teal;
}
.footer-title, .info{
    color: teal;
    margin: 20px 0;
    text-transform: capitalize;
}

.footer-title{
    margin-top: 80px;
    color:teal;
}

.footer-social-container{
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
}
.intro{
    margin: 10px;
    margin-left: 0;
    color:black;
    text-align:justify;
}
.social{
    margin:10px;
    margin-top: 5px;
    color: teal;
    margin-left: 0px;
    text-transform: capitalize;
    
}
.social ul{
    display:flex;
    flex-direction: row;
}
.social ul a{
    height:25px;
    width:25px;
    margin:10px;
    margin-left: 0px;
    margin-right: 15px;
    text-decoration: none;
    list-style: none;
    color:teal
}
.social ul a li img{
    width:100%;
    height:100%;
}
.contact{
    margin:10px;
    margin-left: 0px;
    list-style: none;
    color:teal;
}
.contact li{
    margin-bottom: 10px;
}
.contact li a{
    text-decoration: none;
    color:black;
}

/* .social:nth-child(1){
    margin-left: 0;
} */

.footer-credit{
    width: 100%;
    padding: 10px;
    position: absolute;
    left: 0;
    bottom: 0;
    text-align: center;
    color: teal;
    background: rgba(0, 0, 0, 0.2);
}
@media only screen and (max-width:1068px){
    .footer-content{
        flex-direction: column;
        justify-content: center;
    }
    .footer-ul-container{
        width:90%;
        margin-top: 40px;
        flex-direction:row;
        flex-wrap: wrap;
    }
    .footer-category{
        margin:10px;
    }
    .about{
        width:100%;
    }
    .intro{
        /* width:80%; */
        margin-bottom: 40px;
    }
}
@media only screen and (max-width:600px){
    .footer-content{
        flex-direction: column;
        justify-content: center;
    }
    .footer-ul-container{
        /* width:90%; */
        flex-direction:row;
        flex-wrap: wrap;
    }
    .footer-category{
        margin:10px;
    }
    .heading{
        font-size:20px;
        margin:auto;
        text-align:center;
        margin-top:20px;
    }
}
    </style>
    <style>
        .collection:nth-child(3) {
    grid-column:span 1;
    margin-bottom: 10px;
    /* height:60vh; */
}
.whole-container{
    position:fixed;
    top:20%;
    left:20%;
    right:20%;

    display:none;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    height:500px;
    width:auto;
    background:white;
    /* border:1px solid black; */
    box-shadow: 0 0 25px 1px black;
    /* filter: blur(5px); */
    border-radius:15px;
    z-index: 1001;
}
.whole-poster,.whole-img{
    height:100%;
    width:100%;
    border-radius:15px;
    
}
.whole-cross{
    position:absolute;
    top: 2%;
    right: 2%;
    cursor:pointer;
    z-index:1002;
    color:white;
}

    </style>
</head>

<body>
    <nav class="navbar">
    <?php
        include_once 'nav.php';
        ?>
</nav>

        
    <!-- hero section -->
    <header class="hero-section">
        <!-- <div class="content">
            <img src="" class="logo" alt="logo">
            <p class="sub-heading">best fashion collection of all time</p>
        </div> -->
        <div class="slider">
            <div class="container">
                <div class="parent">
                    <img src="public\img\banner.jpeg" alt="" class="img" id="img1">
                    <img src="public\img\banner2.webp" alt="" class="img" id="img2">
                    <img src="public\img\banner3.jpg" alt="" class="img" id="img3">
                    <img src="public\img\banner1.jpg" alt="" class="img" id="img4">
                </div>
            </div>
        </div>
    </header>

    
        <div class="whole-container">
            <div class="whole-cross">X</div>
            <div class="whole-poster">
                <img src="public\img\wholesale.jpg" alt="" class="whole-img">
            </div>
        </div>
    

    <section class="product">
        <div class="product-category heading" style="color:teal;font-weight:800">BEST SELLING</div>
        <button class="pre-btn"><img src="public\img\nextbutton.png" alt="prebtn"></button>
        <button class="nxt-btn"><img src="public\img\nextbutton.png" alt="nxtbtn"></button>

        <div class="product-container">
        <?php
            $row=$result->fetch_assoc();
        ?>
            <a href="product.php?id=1026&color=blue" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">25% off</span>
                        <img src="public\img\1026-1-blu.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <p class="product-short-des">Paragon K1026G Men Walking Shoes | Athletic Shoes with Comfortable Cushioned Sole for Daily Outdoor Use</p>
                        <span class="price">₹ 999</span><span class="actual-price">₹ 1599</span>
                    </div>
                </div>
            </a>


            <a href="product.php?id=5002&color=blue" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">35% off</span>
                        <img src="public\img\5002-3-bl.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <p class="product-short-des">WALKAROO MEN SOLID THONG SANDALS ART WG5002</p>
                        <span class="price">₹ 299</span><span class="actual-price">₹ 329</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=4866&color=creambrown" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">35% off</span>
                        <img src="public\img\4866-1-crbr.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <p class="product-short-des">WALKAROO WOMEN FLIP FLOP WC4866</p>
                        <span class="price">₹ 269</span><span class="actual-price">₹ 299</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=5100&color=blue" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">25% off</span>
                        <img src="public\img\5100-1-bl.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lee Copper</h2>
                        <p class="product-short-des">Polyurethane Slipon Men's Sport Sandals</p>
                        <span class="price">₹ 1499</span><span class="actual-price">₹ 1999</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=5109&color=green" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">30% off</span>
                        <img src="public\img\5109-1-gr.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lee Copper</h2>
                        <p class="product-short-des">Polyurethane Slipon Men's Sport Sandals</p>
                        <span class="price">₹ 1699</span><span class="actual-price">₹ 2199</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=5687&color=brown" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">35% off</span>
                        <img src="public\img\5687-4-bro.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <p class="product-short-des">Walkaroo Men Cross strap Slide Sandals - W5687</p>
                        <span class="price">₹ 319</span><span class="actual-price">₹ 354</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=8004&color=blue" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">25% off</span>
                        <img src="public\img\8004-4-blu.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <p class="product-short-des">Paragon EVK8004C Unisex Clogs For Kids | Outdoor and Indoor Casual, Durable Clogs</p>
                        <span class="price">₹ 749</span><span class="actual-price">₹ 999</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=77075&color=    maroon" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">10% off</span>
                        <img src="public\img\77075-1-mar.jpeg" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <p class="product-short-des">Women's Solea Maroon Sandal</p>
                        <span class="price">₹ 349</span><span class="actual-price">₹ 399</span>
                    </div>
                </div>
            </a>

        </div>
    </section>
    <!-- collections -->
    <section class="collection-container">
        <a href="#" class="collection">
            <img src="public\img\21.png" alt="">
            <!-- <p class="collection-title">women <br> apparels</p> -->
        </a>
        <a href="#" class="collection">
            <img src="public\img\1.png" alt="">
            <!-- <p class="collection-title">men <br> apparels</p> -->
        </a>
        <a href="#" class="collection">
            <img src="public\img\kids.png" alt="">
            <!-- <p class="collection-title">accessories</p> -->
        </a>
        <a href="#" class="collection">
            <img src="public\img\accessories.png" alt="">
            <!-- <p class="collection-title">accessories</p> -->
        </a>
    </section>
    <br>
    <h2 class="shopByCat heading" style="color:teal;font-weight:bold;">SHOP BY CATEGORY</h2>
    <section class="product">
        <!-- <div class="product-category">best selling</div>
        <button class="pre-btn"><img src="public\img\nextbutton.png" alt="prebtn"></button>
        <button class="nxt-btn"><img src="public\img\nextbutton.png" alt="nxtbtn"></button> -->
        <div id="myBtnContainer">
            <!-- <button class="btn active" onclick="filterSelection('all')"> Show all</button> -->
            <button class="btn active" onclick="filterSelection('mens')"> mens</button>
            <button class="btn" onclick="filterSelection('aurat')"> womens</button>
            <button class="btn" onclick="filterSelection('kids')"> kids</button>
            <!--  <button class="btn" onclick="filterSelection('colors')"> Colors</button> -->
        </div>
        <div class="productcontainer brands">
            <div class="filterDiv mens">

                <a href="select.php?brand=walkaro&grp=Mens" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">35% off</span>
                            <img src="public\img\5687-1-bla.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Walkaroo</h2>
                             <!-- <p class="product-short-des">a short line about the cloth..</p> -->
                             <!--<span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv mens" >

                <a href="select.php?brand=paragon&grp=Mens" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">10% off</span>
                            <img src="public\img\1026-2-wh.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Paragon</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?brand=venus&grp=Kids" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\568-1-red.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Venus</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?brand=venus&grp=Womans" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\258-1-ma.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Venus</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv mens" >

                <a href="select.php?brand=lee-cooper&grp=Mens" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">30% off</span>
                            <img src="public\img\5002-2-bl.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Lee Cooper</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?brand=paragon&grp=Womans" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\8004-1-blu.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Paragon</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?brand=campus&grp=Kids" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\2C-1-bl.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Campus</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?brand=walkaro&grp=Womans" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">35% off</span>
                            <img src="public\img\4866-1-crbr.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Walkaroo</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?brand=paragon&grp=Womans" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\77075-2-pi.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Paragon</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?brand=venus&grp=Kids" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\897-1-wh.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Venus</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?brand=paragon&grp=Kids" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\8004-4-blu.jpeg" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Paragon</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv mens" >

                <a href="select.php?brand=campus&grp=Mens" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\cam.webp" class="product-thumb" alt="">
                            <!--   -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Campus</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    

    <section id="brand-sec">
        <h2 class="heading" style="color:teal;font-weight:bold">BRANDS</h2>
        <div class="brands">
            <a href="select.php?brand=walkaro" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">35% off</span>
                        <img src="public\img\walbrand.jpg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=paragon" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\parbrand.jpg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=campus" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\cambrand.jpeg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Campus</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=lee-copper" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\leebrand.jpeg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lee Copper</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=lehar" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\lehbrand.jpeg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lehar</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=nike" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\nikbrand.jpeg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Nike</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=adidas" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\adibrand.jpeg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Adidas</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?brand=flite" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public/img/flitebrand.jpeg" class="product-thumb" alt="">
                        <!--   -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Flite</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section class="del-icon">
        <div class="del-icon-cont">
            <div class="icons">
                <img src="public\img\shiping-icon.svg" alt="" class="del-img">
                <div class="icon-text">
                    On Time Delivery
                </div>
            </div>
            <div class="icons">
                <img src="public\img\reverse-icon.svg" alt="" class="del-img">
                <div class="icon-text">
                    Easy Replacement
                </div>
            </div>
            <div class="icons">
                <img src="public\img\cod-icon.svg" alt="" class="del-img">
                <div class="icon-text">
                    COD Available
                </div>
            </div>
        </div>
    </section>
    <section class="contactus">
        <div class="contact-cont">
            <input type="email" class="contact-input" placeholder="Enter your Email Address">
            <input type="submit" class="contact-input-btn" value="Submit">
        </div>
    </section>
    <footer>
    </footer>
    <script>
        const createFooter = () => {
    let footer = document.querySelector('footer');

    footer.innerHTML = `
    <div class="footer-content">
        <div class="about">
            <div class="logo">
                <img src="public/img/logo.jpg" alt="">
            </div>
            <div class="about-section">
                <div class="intro">
                Welcome to Foot Fusion, where innovation meets comfort in the world of footwear! We specialize in the art of foot fusion, a cutting-edge approach that seamlessly blends style and support to create the perfect pair of shoes for your unique needs.
                </div><br>
                <h3 style="color:teal">Follow Us On<h3>
                <div class="social">
                    <ul>
                    <a href="https://www.instagram.com" target="_blank"><li class="instagram">
                    <img src="public/img/instagram.jpg" alt="ins">
                    </li></a>
                    <a href="https://www.facebook.com" target="_blank"><li class="facebook">
                    <img src="public/img/facebook.jpg" alt="fac">
                    </li></a>
                    <a href="https://www.linkedin.com" target="_blank"><li class="insta">
                    <img src="public/img/linkedin.jpg" alt="lin">
                    </li></a>
                    </ul>
                </div>
                <div class="contact">
                    <li class="mobile">Mobile: <a href="tel:+918799553324">8799553324</a></li>
                    <li class="email">Email: <a href="mailto:footfusion16@gmail.com">footfusion16@gmail.com</a></li>
                </div>
            </div>
        </div>
        <div class="footer-ul-container">
            <ul class="footer-category">
                <li class="category-title">ABOUT COMPANY</li>
                <li><a href="aboutus.php" class="footer-link">About Us</a></li>
                <li><a href="contactus.php" class="footer-link">Contact Us</a></li>
                <li><a href="locator.php" class="footer-link">Store Locator</a></li>
                <li><a href="blog.php" class="footer-link">Blog</a></li>
                <li><a href="#" class="footer-link"></a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">ONLINE SHOPPING</li>
                <li><a href="select.php?page=newarrivals" class="footer-link">New Arrival</a></li>
                <li><a href="select.php?grp=Mens" class="footer-link">Men</a></li>
                <li><a href="select.php?grp=Womans" class="footer-link">Women</a></li>
                <li><a href="select.php?&grp=Kids" class="footer-link">Kids</a></li>
                <li><a href="index.php?brands" class="footer-link">Brands</a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">POLICIES</li>
                <li><a href="return.php" class="footer-link">Return Policy</a></li>
                <li><a href="privacy.php" class="footer-link">Privacy Policy</a></li>
                <li><a href="term.php" class="footer-link">Terms & Conditions</a></li>
                <li><a href="shipping.php" class="footer-link">Shipping Information</a></li>
            </ul> 
            <ul class="footer-category">
                <li class="category-title">CUSTOMER SERVICE</li>
                <li><a href="faq.php" class="footer-link">FAQ</a></li>
                <li><a href="return_req.php" class="footer-link">Return Request</a></li>
            </ul>
        </div>
    </div>
   
    <p class="footer-credit">Footwear, Best footwear online store</p>
    `;
}

createFooter();
    </script>
    <script src="public\js\home.js"></script>
    <script>
       window.addEventListener("load", () => {
        setTimeout(() => {
        
        
        const wholeContainer = document.querySelector('.whole-container');
        const wholeCross = document.querySelector('.whole-cross');

        
        const elementsToBlur = document.querySelectorAll('body > *:not(.whole-container)');
        elementsToBlur.forEach(element => {
        element.style.filter = 'blur(2px)';
        element.style.pointerEvents = 'none';
        });
        wholeContainer.style.display="flex";
        wholeCross.addEventListener('click', function() {
            
            wholeContainer.style.display = 'none'; // Hide the container
            const elementsToBlur = document.querySelectorAll('body > *:not(.whole-container)');
            elementsToBlur.forEach(element => {
            element.style.filter = 'none';
            element.style.pointerEvents = 'auto';
            });
        });
    }, 5000);
    
});

    </script>
    
</body>

</html>