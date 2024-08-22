<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>FootFusion - Return Policy</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        .notice-container {
            display: flex;
            width: 99vw;
            height: 27px;
            overflow: hidden;
            margin: auto;
            object-fit: fill;
            /* border:1px solid teal; */
            /* padding: 5px; */
        }

        .ret {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        h1, h2, h3 {
            color: #008080; /* Teal color */
        }

        h2 {
            border-bottom: 2px solid #008080; /* Teal color */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 15px;
        }

        .return-policy {
            font-size: 18px;
            line-height: 1.5;
        }

        .highlight {
            color: #008080; /* Teal color */
            font-weight: bold;
        }

        .bullet-point {
            list-style-type: disc;
            margin-left: 20px;
        }

       
    </style>
</head>
<body>
<div class="navbar">
        <?php include 'nav.php';?>
    </div>

    <section class="ret">
       

        <h2>Our Return Policy</h2>

        <div class="return-policy">
            <p>Welcome to FootFusion! We strive to provide you with high-quality footwear and accessories. If you are not satisfied with your purchase, we're here to help.</p>

            <p class="highlight">Return Conditions:</p>
            <ul class="bullet-point">
                <li>Items must be returned within 30 days of purchase.</li>
                <li>Items must be unworn and in their original condition.</li>
                <li>Footwear must be returned in the original shoebox.</li>
            </ul>

            <p class="highlight">How to Return:</p>
            <p>To initiate a return, please follow these steps:</p>
            <ol class="bullet-point">
                <li>Contact our customer support team to obtain a return authorization.</li>
                <li>Package the items securely.</li>
                <li>Include the original invoice and a note indicating the reason for the return.</li>
                <li>Ship the package to the provided address.</li>
            </ol>

            <p class="highlight">Refund Process:</p>
            <p>Once we receive your return, our team will inspect the items and process your refund within 7 days. The refund will be issued to the original payment method.</p>

            <p class="highlight">Exchanges:</p>
            <p>If you would like to exchange an item, please contact us to arrange the exchange. Exchanges are subject to product availability.</p>

            <p class="highlight">Important Note:</p>
            <p class="important-note">Please note that personalized and clearance items are non-returnable.</p>

            <p class="highlight">Contact Us:</p>
            </div>you have any questions about our return policy, feel free to <a href="contactus.php">contact us</a>.</p>
        </div>
    </section>

    <footer>
    
    </footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
