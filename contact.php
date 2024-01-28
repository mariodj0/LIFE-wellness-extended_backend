<!doctype html>
<html lang="en">

<?php 
// Set the page title and include the header file.
$pageTitle = "Contact Us - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
// Include the navigation header.
require_once('includes/header_nav.php'); 
?>

<main>
    <!-- Contact header section with title and introductory text -->
    <section class="contact-header">
        <h1>Contact LIFE</h1>
        <p>Reach out to us for any inquiries, feedback, or just to say hello!</p>
    </section>

    <!-- Contact details section with email, phone, address, and social media links -->
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

    <!-- Form for sending a direct message -->
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

    <!-- Feedback form section -->
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

<?php 
// Include the footer file.
require_once('includes/footer.php'); 
?>

</body>
</html>
