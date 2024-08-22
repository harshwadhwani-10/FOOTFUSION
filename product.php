<?php
include_once 'connection.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $col=$_GET['color'];
}
else{
    header("Location:index.php");
}
$moresug="";
?>
<!DOCTYPE html>
<html lang="en">
<!-- background-image: url(&quot;http://localhost/SDP_Project/public/img/1026-1-blu.jpeg&quot;); -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="public\css\home.css">
    <link rel="stylesheet" href="public\css\product.css">
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
        .image-slider {
    width: 40vw;
    height: 31vw;
    position: relative;
    /* background-image: url(''); */
    background-size: contain;
    background-repeat: no-repeat;
    /* box-shadow: 1px 1px 20px black; */
    margin: 0 5%;
    /* position: sticky; */
    top: 0px;
}
@media only screen and (max-width: 810px){
.image-slider {
    position: relative;
    width: 90vw;
    height: 70vw;
}
}
.colorpro{
    width:64px;
}
.recommendation{
    height:40px;
    line-height:35px;
} 
@media only screen and (max-width:500px){
    .image-slider{
        width: 60vw;
        height: 60vw;
    }
    .form-container{
        height:70vh;
        top:15%;
    }
}

    </style>
    <style>

        .qa-container {
            margin-bottom: 20px;
        }

        .question, .answer {
            padding: 15px;
            border-radius: 5px;
        }

        .question {
            cursor: pointer;
            background-color: #f0f0f0;
            transition: background-color 0.3s ease-in-out;
        }

        .answer {
            display: none;
            background-color: #D5F5E3;
            color:teal;
            margin-left: 0;
            animation: fadeIn 0.5s ease-in-out;
        }
        .faq-container {
            font-size: 18px;
            line-height: 1.5;
        }
        .faq {
            max-width: 1300px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .cartbtn:hover{
            color:white;
        }
    </style>
</head>

<body>
    <?php
if(isset($_GET['upd'])){
    $upd=$_GET['upd'];
    if($upd=='e'){
        $quant=$_GET['quant'];
        echo<<<_END
        <div class="alert">
        <div class="alerttext">quantity must be less than {$quant} </div><span class="cross" onclick="cross()">✔</span>
        </div>
        _END;
        
    }
    if($upd=='u'){
        ?>
        <div class="alert">
        <div class="alerttext">Your cart is updated successfully!</div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
    if($upd=='s'){
        ?>
        <div class="alert">
        <div class="alerttext">You have already added this item </div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
    if($upd=='i'){
        ?>
        <div class="alert">
        <div class="alerttext">Your item is added to cart successfully!</div><span class="crossed" onclick="cross()">✔</span>
    </div>
        <?php
    }
}

?>


    <nav class="navbar"><?php include_once 'nav.php'; ?></nav>
    <section class="product-details">
    <?php
        $imgsql="SELECT * FROM `product` JOIN color ON product.Product_id = color.product_id JOIN image ON color.cid = image.cid WHERE product.Product_id=$id AND color.color='$col'";
        $imgres=$conn->query($imgsql);
        $imgrow=$imgres->fetch_assoc();
        $moresug=$imgrow['grp'];
    ?>
        <div class="image-slider" style="background-image:url('http://localhost/SDP_Project/<?php echo $imgrow['Image_path1']; ?>')">
            <div class="product-images">
                    <img src="<?php echo $imgrow['Image_path1']; ?>" class="active" alt="">
                    <img src="<?php echo $imgrow['Image_path2']; ?>" alt="">
                    <img src="<?php echo $imgrow['Image_path3']; ?>" alt="">
                    <img src="<?php echo $imgrow['Image_path4']; ?>" alt="">
                    <?php
                ?> 
                
            </div>
        </div>

        <!-- image slider -->
        <div class="details">
            <?php
                $sql="SELECT * FROM `product` WHERE `Product_id`='$id'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            ?>
            <div class="product-brand"><?php echo $row['product_name']; ?></div>
            <p class="product-short-des"><?php echo $row['product_details']; ?></p>
            <span class="product-price"><?php echo "₹".$row['price']; ?></span>
            <span class="product-actual-price"><?php echo "₹".$row['actual_price']; ?></span>
            <span class="product-discount">(<?php echo round(($row['actual_price'] - $row['price']) / $row['actual_price'] * 100); ?> % off)</span>
            <br>
            <?php
            $sum=0;
            $flag="IN STOCK";
                $colsql="SELECT * FROM `color` WHERE `product_id`=$id";
                $colres=$conn->query($colsql);
                while($row=$colres->fetch_assoc())
                {
                    $a=$row['cid'];
                    $prodessql="SELECT `quantity` FROM `product_desc` WHERE `cid`=$a";
                    $prodesres=$conn->query($prodessql);
                    while($row1=$prodesres->fetch_assoc())
                    {
                        $sum+=$row1['quantity'];
                    }

                }
                if($sum>0)
                {
                    $flag="IN STOCK";
                }
                else
                {
                    $flag="OUT OF STOCK";
                }
            ?>
            <span class="avail">Availability: <span class="avail-value"><?php echo $flag; ?></span></span>
            
            <form action="" class="form-container" style="top:5%;z-index:14;overflow-y:scroll">
                <div class="imgchart" style="width:100%;height:400px"><img style="width:100%;height:100%;border:2px solid black" src="public\img\sizechart.jpg" alt=""></div>
                <span style="display:none">ENTER YOUR SIZE</span>
                <input type="number" class="size-height box" placeholder="Enter your height in cm" name="height" style="display:none">
                <input type="number" class="feet-height box" placeholder="Enter your feet length in cm" name="feet" style="display:none">
                <div class="button">
                    <input type="submit" class="submit box" name="submit" style="display:none">
                    <input type="submit" class="cancel box" name="cancel" value="cancel">
                </div>
                <span class="result box"></span>

            </form>
            <div class="prod-form">
                <form id="myForm" action="addcart.php" method="get">
                    <br><span class="recommendation">size recommendation</span>
                    <div class="size">
                    <?php
                    
                          $sizesql="SELECT `cid` FROM `color` WHERE `product_id`=$id";
                          $ressize=$conn->query($sizesql);
                          $row3=$ressize->fetch_assoc();
                            $i=0;
                              $a=$row3['cid'];
                              $prodessql="SELECT `size` FROM `product_desc` WHERE `cid`=$a";
                              $prodesres=$conn->query($prodessql);
                              while($row4=$prodesres->fetch_assoc())
                              {
                                ?>
                                 <input type="radio" name="size" value="<?php echo $row4['size']; ?>" hidden id="<?php echo $row4['size']; ?>-size" required <?php if ($i == 0) echo "checked"; ?>>
                                 <label for="<?php echo $row4['size']; ?>-size" class="size-radio-btn <?php if ($i == 0) echo "check"; ?>"><?php echo $row4['size']; ?></label>
                                <?php
                                $i+=1;
                              }
          
                          
                         
                    ?>
                    </div>
                        <span class="qty">Quantity: </span><br> 
                        <input class="quantity" id="id_form-0-quantity" min="1" name="quantity" value="1" type="number">
                        <input type="hidden" value="<?php echo $col;?>" name="color">
                        <input type="hidden" value="<?php echo $id;?>" name="id">

            <br>
            <input type="submit" class="btn cart-btn cartbtn" value="Add to cart">
            <!-- <button class="btn wish-btn" onclick="changeFormAction('wishlist.php')">Add to wishlist</button> -->

            </form>
            </div>
        </div>
    </section>
    <?php
    

    ?>
    <section class="faq-container faq">
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q0')">Feedbacks and review<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q0">
            <?php
            // echo $id;
            $feedbackquery="SELECT * FROM `feedback` WHERE `product_id`='$id' ORDER BY `feedback_date` DESC";
            $feedresult=$conn->query($feedbackquery);
            while($row=$feedresult->fetch_assoc()){
                ?>
                <hr>
                <br>
                  <!-- <p><strong>Material:</strong> High-quality leather</p> -->
                    <p><strong>Date:</strong> <?php
                    $currentDate = $row['feedback_date']; 

                    $timestamp2 = strtotime($currentDate); 

                    $formattedDate2 = date("d F, Y", $timestamp2);
                   echo $formattedDate2;
                    ?></p>
                    <p><strong>rating :</strong> <?php echo $row['feedback_rating'];?>/5</p>
                    <p><strong>Feedback:</strong> <?php echo $row['feedback_desc'];?></p>
                <br>
                <?php
            }
            ?>
            </div>
            </div>
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q1')">More Information<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q1">   
                  <p><strong>Material:</strong> High-quality leather</p>
                    <p><strong>Color:</strong> Brown</p>
                    <p><strong>Size Options:</strong> Available in various sizes</p>
                    <p><strong>Features:</strong> Waterproof, comfortable insole, durable sole</p></div>
            </div>
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q2')">Product Details<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q2"> 
            <p>The waterproof design ensures that you can confidently wear them in any weather conditions. The cushioned insole provides maximum comfort, making these shoes ideal for long walks or daily use. The durable rubber sole guarantees long-lasting performance.
        Available in a range of US sizes from 6 to 12, the ComfortStride 2000 caters to different foot sizes. Whether you're heading to the office, a casual outing, or a special event, these shoes complement your style effortlessly.
        Enjoy the convenience of free shipping on all orders, and rest assured with our 30-day return policy. The XYZ Shoes ComfortStride 2000 comes with a 1-year warranty for added peace of mind.</p>
  
            </div>
        </div>
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q3')">Return & Exchange Policy<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q3">Our return policy allows you to return items within 30 days of purchase. Please see our <a href="return.php">return policy</a> for more details.</div>
        </div>
     </section>
    <section class="product">
        <div class="product-category">You may also like</div>
        <button class="pre-btn"><img src="public\img\nextbutton.png" alt="prebtn"></button>
        <button class="nxt-btn"><img src="public\img\nextbutton.png" alt="nxtbtn"></button>

        <div class="product-container">
        <?php
            $row=$result->fetch_assoc();
        ?>

        <?php
        $moreqry= "SELECT * FROM `category` INNER JOIN `product` ON product.Category_ID=category.category_id INNER JOIN `color` ON color.product_id=product.Product_id INNER JOIN `product_desc` ON product_desc.cid=color.cid INNER JOIN `image` ON image.cid=color.cid WHERE product_desc.quantity != 0 AND product.grp='$moresug' GROUP BY color.cid";	
		$moreres=$conn->query($moreqry);
        while($morerow=$moreres->fetch_assoc()){
          ?>
          <a href="product.php?id=<?php echo $morerow['product_id'];?>&color=<?php echo $morerow['color'];?>" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag"><?php echo round(($morerow['actual_price']-$morerow['price'])/$morerow['actual_price']*100);?> % off</span>
                        <img src="<?php echo $morerow['Image_path1'];?>" class="product-thumb" alt="">
                         
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand"><?php echo $morerow['product_name'];?></h2>
                        <p class="product-short-des"><?php echo $morerow['product_details'];?></p>
                        <span class="price">₹ <?php echo $morerow['price'];?></span><span class="actual-price">₹ <?php echo $morerow['actual_price'];?></span>
                    </div>
                </div>
            </a>
          <?php  
        }
        
        ?>
           

        </div>
    </section>

    <footer></footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
    <script src="public\js\home.js"></script>
    <script src="public\js\product.js"></script>
    <script>
        const productImages = document.querySelectorAll(".product-images img"); // selecting all image thumbs
const productImageSlide = document.querySelector(".image-slider"); // seclecting image slider element

let activeImageSlide = 0; // default slider image

productImages.forEach((item, i) => { // loopinh through each image thumb
    item.addEventListener('click', () => { // adding click event to each image thumbnail
        productImages[activeImageSlide].classList.remove('active'); // removing active class from current image thumb
        item.classList.add('active'); // adding active class to the current or clicked image thumb
        productImageSlide.style.backgroundImage = `url('${item.src}')`; // setting up image slider's background image
        activeImageSlide = i; // updating the image slider variable to track current thumb
    })
})

    function changeFormAction(actions) {
        document.querySelector('#myForm').action = actions;
    }
    </script>
    <script>
    
        function toggleAnswer(questionId) {
            const answer = document.getElementById(questionId);
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
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