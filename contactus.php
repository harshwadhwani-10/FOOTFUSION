<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>Contact FootFusion</title>
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
        .contact {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #008080; /* Teal color */
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #008080; /* Teal color */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div class="navbar">
        <?php include 'nav.php';?>
    </div>
    <section class="contact">
        <h2>Get in Touch</h2>

        <p>Have questions, feedback, or just want to say hello? We'd love to hear from you! Fill out the form below, and we'll get back to you as soon as possible.</p>

        <form>
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>

    <footer>
       
    </footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
