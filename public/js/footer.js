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
                    <a href="https://www.instagram.com"><li class="instagram">
                    <img src="public/img/instagram.jpg" alt="ins">
                    </li></a>
                    <a href="www.facebook.com"><li class="facebook">
                    <img src="public/img/facebook.jpg" alt="fac">
                    </li></a>
                    <a href="www.linkedin.com"><li class="insta">
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
                <li><a href="select.php?grp=Womens" class="footer-link">Women</a></li>
                <li><a href="select.php?grp=Kids" class="footer-link">Kids</a></li>
                <li><a href="index.php" class="footer-link">Brands</a></li>
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
                <li><a href="return_req.html" class="footer-link">Return Request</a></li>
            </ul>
        </div>
    </div>
   
    <p class="footer-credit">Footwear, Best footwear online store</p>
    `;
}

createFooter();
