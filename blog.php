<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>FootFusion Blog</title>
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
        .blg {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        .blog-post {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .blog-post img {
            width: 250px; /* Set a fixed width for images */
            height: 150px;
            margin-right: 20px;
        }

        .blog-post-content {
            flex: 1;
        }

        .blog-post h3 {
            color: #008080; /* Teal color */
        }

        .blog-post p {
            line-height: 1.8;
        }
    </style>
</head>
<body>

<div class="navbar">
        <?php include 'nav.php';?>
    </div>

    <section class="blg">
        <div class="blog-post">
            <img src="public\img\blog1.jpeg" alt="Blog Image 1">
            <div class="blog-post-content">
                <h3>Top Shoe Trends of the Season</h3>
                <p>Discover the hottest shoe trends that will elevate your style this season. From comfortable sneakers to stylish heels, we've got you covered.</p>
            </div>
        </div>

        <div class="blog-post">
            <img src="public\img\blog2.jpeg" alt="Blog Image 2">
            <div class="blog-post-content">
                <h3>How to Care for Your Leather Shoes</h3>
                <p>Learn essential tips for keeping your leather shoes in top condition. From cleaning to polishing, we share the secrets to maintaining that polished look.</p>
            </div>
        </div>

        <div class="blog-post">
            <img src="public\img\blog3.jpeg" alt="Blog Image 3">
            <div class="blog-post-content">
                <h3>Choosing the Right Athletic Shoes</h3>
                <p>Whether you're a runner or a gym enthusiast, find out how to choose the perfect athletic shoes that provide the support and comfort you need.</p>
            </div>
        </div>

        <div class="blog-post">
            <img src="public\img\blog4.jpeg" alt="Blog Image 4">
            <div class="blog-post-content">
                <h3>Fashionable Winter Boots for Every Occasion</h3>
                <p>Stay stylish and warm this winter with our guide to fashionable winter boots. From casual outings to formal events, we've got the perfect pair for every occasion.</p>
            </div>
        </div>

        <!-- Add more blog posts as needed -->

    </section>

    <footer>
       
    </footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
