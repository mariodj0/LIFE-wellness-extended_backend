<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LIFE</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest">
</head>
<body>
<header>
    <div class="logo">
        <p><a href="./index.php"><img src="./assets/logo.png" alt="LIFE Logo">Living It Fully Everyday!</a></p>
        
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li class="dropdown">
                <a href="./services.php">Services</a>
                <ul class="dropdown-content">
                    <li><a href="./services.php#yoga">Yoga</a></li>
                    <li><a href="./services.php#meditation">Meditation</a></li>
                    <li><a href="./services.php#healthy-habits">Healthy Habits</a></li>
                     <li><a href="./services.php#stretching">Stretching</a></li>
                </ul>
            </li>
            <li><a href="./covid.php">COVID-19 Resources</a></li>
            <li><a href="./contact.php">Contact Us</a></li>
            <li><a href="./sitemap.php">Sitemap</a></li>
            <li><a href="./register.php" class="register-link">Register</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="contact-header">
        <h1>Contact LIFE</h1>
        <p>Reach out to us for any inquiries, feedback, or just to say hello!</p>
    </section>

    <section class="contact-details">
        <h2>Get in Touch</h2>
        <p>Email: <a href="mailto:LIFE@localcouncil.com">LIFE@localcouncil.com</a></p>
        <p>Phone: <a href="tel:+61412345123">+61 412 345 123</a></p>
        <p>Address: 12 Swanston circuit, Melbourne 3000</p>
        <p>Follow us on: 
            <a href="https://facebook.com/lifewellness">Facebook</a>, 
            <a href="https://twitter.com/lifewellness">Twitter</a>, 
            <a href="https://instagram.com/lifewellness">Instagram</a>
        </p>
    </section>

    <section class="message-form">
        <h2>Send Us a Message</h2>
        <form action="mailto:LIFE@localcouncil.com" method="post" enctype="text/plain">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>

    <section class="feedback">
        <h2>Feedback</h2>
        <p>Your feedback is valuable to us. Please let us know how we can improve.</p>
        <form action="mailto:LIFE@localcouncil.com" method="post" enctype="text/plain">
            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" rows="3" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </section>
</main>

<footer>
    <div class="footer-container">
        <div class="about">
            
            <h3>About LIFE</h3>
            <p>Empowering your wellness journey with online yoga, meditation, and more.</p>
            <img src="./assets/logo.png" alt="LIFE Logo" class="footer-logo">
            
        </div>
        <div class="quick-links">
            <h3>Browse</h3>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./services.php">Services</a></li>
                <li><a href="./covid.php">COVID-19 Resources</a></li>
                <li><a href="./contact.php">Contact Us</a></li>
                <li><a href="./sitemap.php">Sitemap</a></li>
                <li><a href="./register.php" class="register-link">Register</a></li>
            </ul>
        </div>
        <div class="covid-resources">
            <h3> <a href="./covid.php">COVID-19 Resources</a> </h3>
            <ul>
                <li><a href="https://health.gov.au/health-topics/novel-coronavirus-2019-ncov">Australian Government Department of Health</a></li>
                <li><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">World Health Organization: COVID-19 Pandemic</a></li>
                <li><a href="https://www.mentalhealth.gov/">MentalHealth.gov</a></li>
                <li><a href="./covid.php">Get more resources here</a></li>

            </ul>
        </div>
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p>Email at: <a href="mailto:LIFE@localcouncil.com">LIFE@localcouncil.com</a></p>
            <p>Phone: <a href="tel:+61412345123">+61 412 345 123</a></p>
            <p>Address : 12 Swanston circuit, Melbourne 3000</p>
            <p>Follow us on: <a href="https://facebook.com/life">Facebook</a>, <a href="https://twitter.com/life">Twitter</a>, <a href="https://instagram.com/life">Instagram</a></p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Living It Fully Everyday. All rights reserved.</p>
        <p><a href="./privacy.php">Privacy Policy</a></p>
        <p>Designed by Mario </p>
    </div>
</footer>

</body>
</html>
