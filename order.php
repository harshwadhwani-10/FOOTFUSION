<?php
include 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <head>    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <style>
        .lighter-text {
            color: #ABB0BE;
        }

        .main-color-text {
            color: $main-color;
        }

        .badge {
            background-color: #6394F8;
            border-radius: 10px;
            color: white;
            display: inline-block;
            font-size: 12px;
            line-height: 1;
            padding: 3px 7px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }
        .container{
            width:100%;
            height:100%;
            padding:auto;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }

        .shopping-cart {
            /* margin: 20px 0; */
            float: right;
            background: white;
            width: 80%;
            /* margin:100px; */
            /* position: absolute; */
            top:72px;
            right:47px;
            border-radius: 3px;
            padding: 20px;
            /* display:none; */
            /* border:2px solid black; */
            /* box-shadow:0px 0px 20px black; */
        }


        .shopping-cart-header {
            border-bottom: 1px solid #E8E8E8;
            padding-bottom: 15px;
        }

        .shopping-cart-total {
                float: right;
                }
        

            .shopping-cart-items {

                padding-top: 20px;
            

                li {
                    margin-bottom: 18px;
                    list-style:none;
                }

                img {
                    float: left;
                    margin-right: 12px;
                }

                .item-name {
                    display: block;
                    padding-top: 10px;
                    font-size: 16px;
                }

                .item-price {
                    color: $main-color;
                    margin-right: 8px;
                }

                .item-quantity {
                    color: $light-text;
                }
            }

        

        .shopping-cart:after {
            bottom: 100%;
            left: 89%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: white;
            border-width: 8px;
            margin-left: -8px;
        }

        .cart-icon {
            color: #515783;
            font-size: 24px;
            margin-right: 7px;
            float: left;
        }




        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }
   .search form{
    width:100%;
    display:flex;
    flex-direction:row;
} 
.checkout{
    text-decoration:none;
    background-color:blue;
    color:white;
    height:1000px;
    width:250px;
}
.paymentcontainer{
  width:100%;
  display:flex;
  justify-content:center;
  align-items:left;
  flex-direction:column;
  background-color:whitesmoke;
  margin:50px 0;
  padding:20px;
}
    </style>
    
</head>
<body>
  <?php 
  if(isset($_COOKIE['userID']) && $user!="" && isset($_POST['ui'])){
   $sql="SELECT * FROM cart_tbl WHERE user_id='$user' AND p_quantity!=0";
   $result=$conn->query($sql);
  }
  if(isset($_COOKIE['userID']) && $user!="" && isset($_POST['ui']) && $result->num_rows !=0)
  {
    if(isset($_POST['discount']) && $_POST['discount']!=NULL){
    $discount = intval($_POST['discount']);
    // echo $discount;
   }
   else
    $discount = 0;

   if(isset($_POST['overdiscount']) && $_POST['overdiscount']!=NULL){
    $pdisc=intval($_POST['overdiscount']);
    // echo $pdisc;
   }
   else{
    $pdisc=0;
   }
  
  ?>
        <div class="container"><?php
                          
                           $total=50.0;
                           ?>
                        
                <div class="shopping-cart">
            <ul class="shopping-cart-items">
                        <?php
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
                                ?>
                <!--end shopping-cart-header -->

                        
                                <li class="clearfix">
                                    <img src="<?php echo $crtrow['Image_path1'];?>" height="100px" alt="item1" />
                                    <span class="item-name"><?php echo $crtrow['product_details'];?></span>
                                    <span class="item-price"><?php echo $crtrow['price'];?></span>
                                    <span class="item-quantity">Quantity: <?php echo $crtquan;?></span>
                                </li>
                            <?php
                            $total=$total+($crtrow['price']*$crtquan);
                           }
                           $total=$total-$discount-$pdisc;
                           ?>
                           <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo $result->num_rows;?></span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text"><?php echo $total;?></span>
                </div>
            </div> 
              </ul>
        </div> 
    <div class="formcontainer">
      <form class="orderform" action="manage.php" method="get">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationDefault01">First name</label>
              <input type="text" class="form-control" id="validationDefault01" name="fname" placeholder="First name"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefault02">Last name</label>
              <input type="text" class="form-control" id="validationDefault02" name="lname" placeholder="Last name"  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefaultUsername">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                </div>
                <input type="email" class="form-control" id="validationDefaultUsername" name="email" placeholder="Email" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault03">Phone</label>
              <input type="number" class="form-control" id="validationDefault03" name="phone" placeholder="Phone" required>
            </div>
            <div class="col-md-10 mb-3">
              <label for="validationDefault03">Shipping Address</label>
              <textarea class="form-control" id="validationDefault03" name="addr" placeholder="Address" row="3" col="50" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault03">City</label>
              <input class="form-control" id="disabledInput" type="text" placeholder="Ahmedabad" value="Ahmedabad" name="city" disabled>
              <input class="form-control" id="disabledInput" type="hidden" placeholder="Ahmedabad" value="Ahmedabad" name="city">    </div>

            <div class="col-md-3 mb-3">
              <label for="validationDefault04">State</label>
              <input class="form-control" id="disabledInput" type="text" placeholder="Gujarat" value="Gujarat" name="state" disabled> 
              <input class="form-control" id="disabledInput" type="hidden" placeholder="Gujarat" value="Gujarat" name="state">  </div>
            <div class="col-md-3 mb-3">
              <label for="validationDefault05">Zip</label>
              <input type="text" class="form-control" id="validationDefault05" name="zip" placeholder="Zip" required>
              <input type="hidden" value="<?php echo $pdisc;?>" name="pdisc">
              <input type="hidden" value="<?php echo $discount;?>" name="discount">
              <input type="hidden" value="<?php echo $total;?>" name="total">
            </div>
          </div>
          
          <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->

        
        <div class="paymentcontainer" >
          <h4>Select Payment method</h4><br>

          <div class="form-check" style="margin-bottom:15px">
            <input class="form-check-input" value="COD" type="radio" name="paymentmet" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              COD(Charges Applicable)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" value="online" type="radio" name="paymentmet" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Online Payments
            </label>
          </div>
          <br>
        </div>

        <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="checked" name="term" id="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                Agree to terms and conditions
              </label>
            </div>
        </div>
        <input type="submit"  class="submit btn btn-primary" value="Proceed" style="width:200px">
      </form>
    </div>
    <?php
    }
    else{
      header("location:index.php");
    }
    ?>
    

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    // Function to reset the form after submission
    function resetForm() {
        var form = document.querySelector('.orderform');
        form.reset(); // Reset the form
    }

    // Add event listener to the form submit event
    document.querySelector('.orderform').addEventListener('submit', function() {
        // Call the resetForm function after a brief delay to ensure the form submission is completed
        setTimeout(resetForm, 100); // Adjust the delay time if needed
    });
</script>



</body>
</html>