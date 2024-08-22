<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <link rel="stylesheet" type="text/css" href="public\css\nav.css">
    <title>FootFusion - FAQ</title>
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
        .faq {
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

        .faq-container {
            font-size: 18px;
            line-height: 1.5;
        }

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
            background-color: #92b7a6;
            color:white;
            margin-left: 30px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }


    </style>
</head>
<body>
<div class="navbar">
        <?php include 'nav.php';?>
    </div>

    <section class="faq-container faq">
        <h2>Frequently Asked Questions</h2>

        <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q1')">Q1: What types of footwear do you offer?</div>
            <div class="answer" id="q1"> We offer a wide range of footwear, including sneakers, boots, sandals, and more.</div>
        </div>

        <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q2')">Q2: How can I place an order?</div>
            <div class="answer" id="q2"> To place an order, simply browse our website, select the items you want, and proceed to checkout.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q3')">Q3: What payment methods do you accept?</div>
        <div class="answer" id="q3"> We accept various payment methods, including credit cards, debit cards, and PayPal.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q4')">Q4: Can I modify or cancel my order?</div>
        <div class="answer" id="q4"> Unfortunately, once an order is placed, it cannot be modified or canceled. Please double-check your order before completing the purchase.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q5')">Q5: How can I track my order?</div>
        <div class="answer" id="q5"> Once your order is shipped, you will receive a confirmation email with a tracking number. You can use this number to track your order.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q6')">Q6: Do you offer international shipping?</div>
        <div class="answer" id="q6"> No, we don't offer international shipping.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q7')">Q7: What is your return policy?</div>
        <div class="answer" id="q7"> Our return policy allows you to return items within 30 days of purchase. Please see our <a href="return.php">return policy</a> for more details.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q8')">Q8: How do I contact customer support?</div>
        <div class="answer" id="q8"> You can contact our customer support team by visiting our <a href="contactus.php">contact page</a>.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q9')">Q9: Are there any promotions or discounts available?</div>
        <div class="answer" id="q9"> We occasionally run promotions and offer discounts. Keep an eye on our website or subscribe to our newsletter for updates.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q10')">Q10: How can I stay updated on new arrivals?</div>
        <div class="answer" id="q10">A You can stay updated on new arrivals by checking our website regularly or following us on social media.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q11')">Q11: Do you have a physical store?</div>
        <div class="answer" id="q11">A Currently, we operate exclusively online. You can browse and purchase our products through our website.</div>
        </div>
        <div class="qa-container">
        <div class="question" onclick="toggleAnswer('q12')">Q12: Can I change my shipping address after placing an order?</div>
        <div class="answer" id="q12">A Unfortunately, we cannot change the shipping address once an order is placed. Please ensure the accuracy of your address during checkout.</div>
        </div>


    </section>

    <footer>
        
    </footer>

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
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
</body>
</html>
