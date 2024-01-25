<!doctype html>
<html lang="en">

<?php 
$pageTitle = "Register - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
require_once('includes/header_nav.php'); 
?>

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
    
    <?php 
require_once('includes/footer.php'); 
?>
    
    <script src="./js/validate.js"></script>
</body>
</html>
            
