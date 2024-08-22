<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>FootFusion Store Locator</title>
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
        .map {
            max-width: 1200px;
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

        .store-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .store {
            flex: 1;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .store:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(0, 128, 128, 0.3);
        }

        .store h3 {
            color: #008080; /* Teal color */
            margin-bottom: 10px;
            font-size: 24px;
        }

        .store p {
            margin: 8px 0;
        }

        .map-container {
            flex: 1;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: 0;
            border-radius: 10px;
        }


    </style>
</head>
<body>

    <div class="navbar">
        <?php include 'nav.php';?>
    </div>

    <section class="map"> 
        <h2>Find a FootFusion Store Near You</h2>

        <div class="store-container">
            <div class="store">
                <h3>Main Street Store</h3>
                <p>Address: 9, Jai Foot Wear, Nikol, Ahmedabad</p>
                <p>Phone: 8799553324</p>
                <p>Hours: Mon-Sat: 10 AM - 8 PM, Sun: 12 PM - 6 PM</p>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58745.16212811772!2d72.5784530216797!3d23.039458800000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e86ef80a34be5%3A0x135708a2df21eb6a!2sJAI%20&#39;S%20Shoes!5e0!3m2!1sen!2sin!4v1706356168872!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                   
            </div>
        </div>

    </section>

    <footer>
        
    </footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
