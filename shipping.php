<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>FootFusion - Shipping Information</title>
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

        .ship {
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

        .shipping-info {
            font-size: 18px;
            line-height: 1.5;
            text-align: justify;
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

    <section class="ship">
        <h2>Shipping Information</h2>

        <div class="shipping-info">
            <p>At FootFusion, we want to ensure a seamless and delightful shopping experience for our customers. Please review the following shipping information:</p>

            <p class="highlight">Shipping Options:</p>
            <p>We offer various shipping options to meet your delivery needs. The available options and estimated delivery times will be presented during the checkout process. Please select your preferred option accordingly.</p>

            <p class="highlight">Order Processing:</p>
            <p>Orders are typically processed and dispatched within 1-2 business days. Processing times may vary during peak seasons or promotions. Once your order has been shipped, you will receive a confirmation email with tracking information.</p>

            <p class="highlight">Shipping Costs:</p>
            <p>Shipping costs are calculated based on the selected shipping option, the weight of your order, and the destination. The total shipping cost will be displayed at checkout before you complete your purchase.</p>

            
            <p class="highlight">Tracking Your Order:</p>
            <p>Once your order has been shipped, you can track its progress using the provided tracking number. You can find the tracking information in the order confirmation email or by logging into your FootFusion account.</p>

            <p class="highlight">Contact Us:</p>
            <p>If you have any questions or concerns about shipping, please <a href="contact.html">contact us</a>. We are here to assist you.</p>
        </div>
    </section>

    <footer>
        
    </footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
