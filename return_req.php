<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>FootFusion - Return Request</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        #return-request-sec {
            background-color: #fff;
            padding: 80px 80px;
            text-align: center;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            height:500px;
        }

        h2 {
            color: #008080; /* Teal color */
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        .return-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #008080; /* Teal color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            cursor: pointer;
        }

        .return-button:hover {
            background-color: #006666; /* Darker Teal color on hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #return-request-sec, .return-button {
            animation: fadeIn 0.5s ease-in-out;
        }
    </style>
</head>
<body>
<div class="navbar">
        <?php include 'nav.php';?>
    </div>
    <section id="return-request-sec">
        <h2>Return Request</h2>
        <p>If you are not satisfied with your purchase, you can initiate a return request by clicking the button below.</p>
        <a href="#" class="return-button">Initiate Return</a>
    </section>
    <footer>
    
    </footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
