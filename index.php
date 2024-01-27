<!doctype html>
<html lang="en">
    
<?php 
$pageTitle = "LIFE - Living It Fully Everyday";
require_once('includes/head.php'); 
?>


<body>

<?php 
require_once('includes/header_nav.php'); 
?>


<main>
    <section class="hero">
        <h1>Welcome to LIFE</h1>
        <p>Start your journey towards healing and wellness in the post-COVID era.</p>
        <button onclick="location.href='./services.php'">Discover Your Path to Wellness</button>
    </section>

    <section class="welcome-message-hero">
        <h2>Welcome to Healing and Growth with LIFE - Living It Fully Everyday</h2>
        <p>As we emerge from the pandemic, LIFE is here to support your journey towards mental and emotional wellbeing. Our online wellness services are designed to help you manage stress, find inner peace, and build healthy habits for a fulfilling life.</p>
    </section>

            <!-- Accordion JS Widget -->
    <ul id="my-accordion" class="accordionjs">
        <!-- Yoga Services -->
        <li>
            <div>Yoga for Wellness</div>
            <div>
                <p>Discover our range of Yoga classes designed to promote physical health and mental well-being. From beginner to advanced levels, find the perfect class to suit your needs.</p>
            </div>
        </li>

        <!-- Meditation Services -->
        <li>
            <div>Meditation and Mindfulness</div>
            <div>
                <p>Explore the power of mindfulness with our guided meditation sessions. Learn techniques to reduce stress, enhance concentration, and improve your overall emotional balance.</p>
            </div>
        </li>

        <!-- Healthy Habits Workshops -->
        <li>
            <div>Building Healthy Habits</div>
            <div>
                <p>Join our workshops on cultivating healthy habits for a happier life. Learn about nutrition, exercise, sleep hygiene, and more to build a holistic and balanced lifestyle.</p>
            </div>
        </li>

        <!-- Special Events -->
        <li>
            <div>Upcoming Events</div>
            <div>
                <p>Stay tuned for our upcoming events, including wellness retreats, expert talks, and interactive sessions that inspire and empower your journey to wellness.</p>
            </div>
        </li>
    </ul>


    <div class="content-area">
        <section class="services">
            <h2>Our Online Wellness Services</h2>
            <p>Explore our range of online wellness services designed for your mental and physical health.</p>
    
            <div class="service-box">
                <h3><a href="./services.php#yoga" class="service-link">Yoga</a></h3>
                <img src="./assets/yoga.gif" alt="Yoga">
                <p>Explore the balance of mind and body through our tailored Yoga sessions.</p>
            </div>


            <div class="service-box">
                <h3><a href="./services.php#meditation" class="service-link">Meditation</a></h3>
                <img src="./assets/meditation.gif" alt="Meditation">
                
                <p>Explore mindfulness and mental clarity with guided meditation.</p>
            </div>
            <div class="service-box">
                <h3><a href="./services.php#healthy-habits" class="service-link">Healthy Habits</a></h3>
                <img src="./assets/healthy-habits.gif" alt="Healthy Habits">
                <p>Learn sustainable habits for a healthier lifestyle.</p>
            </div>
            <div class="service-box">
                <h3><a href="./services.php#stretching" class="service-link">Stretching</a></h3>
                <img src="./assets/stretching.gif" alt="Stretching">
                <p>Improve flexibility and reduce muscle tension with our stretching routines.</p>
            </div>
        </section>

       
    </div>

    <section id="about-us">
        <h2>About Us</h2>
        <p>At LIFE, our mission is to inspire and support personal growth and wellness. Founded by wellness experts, we offer a range of services and resources aimed at enhancing mental, physical, and emotional well-being. </p>
        <br>
        <p>Our team comprises certified and experienced professionals in yoga, meditation, and lifestyle coaching. We believe in personalized care, ensuring each member receives guidance that resonates with their individual journey. Our online sessions are not just classes; they're experiences crafted to bring balance, clarity, and harmony into your life.</p>
            <div class="about-us-images">
                <img src="./assets/team-photo.jpg" alt="Our Dedicated Team" />
                <img src="./assets/yoga-session.jpg" alt="Yoga Session at LIFE" />
                <img src="./assets/tranquil-landscape.jpg" alt="Tranquil Landscape" />
            </div>
            <br>
            <br>
            <p>Incorporating our philosophy of holistic health, we believe in the power of balancing the mind, body, and spirit. We invite you to join our community and explore the path to a healthier and more fulfilling life.</p>
            <br>
        <img id="about-logo" src="./assets/logo.png" alt="About LIFE" />
    </section>

  
</main>

<?php 
require_once('includes/footer.php'); 
?>

<!-- Accordion JS Widget setup-->
<script src="js/accordion_setup.js"></script>

</body>
</html>
