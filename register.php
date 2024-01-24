<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LIFE</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link rel="manifest" href="./images/site.webmanifest">
   
</head>
<body>
    <header>
        <div class="logo">
            <p><a href="./index.php"><img src="./images/logo.png" alt="LIFE Logo">Living It Fully Everyday!</a></p>
            
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
        <div class="registration-header">
            <h1>Welcome to LIFE Registration</h1>
            <p>Join our community to explore a range of wellness services and resources.</p>
        </div>
        
        <form id="registrationForm" class="registration-form">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" required>
            <span class="error" id="firstNameError">Please enter your valid first name.</span>

            
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" required>
            <span class="error" id="lastNameError">Please enter your valid last name.</span>

            <label for="email">Email Address:</label>
            <input type="email" id="email" required>
            <span class="error" id="emailError">Please enter a valid email address.</span>

            <label for="confirmEmail">Confirm Email:</label>
            <input type="email" id="confirmEmail" required>
            <span class="error" id="confirmEmailError">Email addresses do not match.</span>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber">
            <span class="error" id="phoneError">Please enter a valid Australian mobile number.</span>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>
            <span class="error" id="ageError"> Please enter a valid age or you must be at least 16 years old to register.</span>


            <label for="studentStatus">Are you a student:</label>
            <input type="radio" id="studentYes" name="studentStatus" value="Yes">
            <label for="studentYes">Yes</label>
            <input type="radio" id="studentNo" name="studentStatus" value="No" >
            <label for="studentNo">No</label>
            <span class="error" id="studentStatusError">Please select your student status.</span>

            <label for="employmentStatus">Are you employed:</label>
            <input type="radio" id="employmentYes" name="employmentStatus" value="Yes">
            <label for="employmentYes">Yes</label>
            <input type="radio" id="employmentNo" name="employmentStatus" value="No" >
            <label for="employmentNo">No</label>
            <span class="error" id="employmentStatusError">Please select your employment status.</span>

            <div class="membership-fee">
                <h3>Annual Membership Fee</h3>
                <p id="membershipFee">To be calculated...</p>
            </div>
    
            <button type="submit">Register</button>
        </form>
    </main>
    
    <footer>
        <div class="footer-container">
            <div class="about">
                
                <h3>About LIFE</h3>
                <p>Empowering your wellness journey with online yoga, meditation, and more.</p>
                <img src="./images/logo.png" alt="LIFE Logo" class="footer-logo">
                
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
    
    <script src="./validate.js"></script>
</body>
</html>
            