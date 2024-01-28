<!doctype html>
<html lang="en">

<?php
// Initialize the session.
session_start();
?>

<?php 
// Set the page title and include necessary head elements.
$pageTitle = "Register - LIFE";
require_once('includes/head.php'); 
?>

<body>
    
<?php 
// Include the website's navigation header.
require_once('includes/header_nav.php'); 
?>

<main>
    <!-- Header section for the registration form -->
    <div class="registration-header">
        <h1>Welcome to LIFE Registration</h1>
        <p>Join our community to explore a range of wellness services and resources.</p>
    </div>

    <!-- Display database error message if any -->
    <?php if(isset($_SESSION['registration_errors']['database'])): ?>
        <p class="error visible-error"><?php echo $_SESSION['registration_errors']['database']; ?></p>
    <?php endif; ?>
    
    <!-- Registration form -->
    <form id="registrationForm" class="registration-form" method="post" action="backend/register_process.php">
        
        <!-- First Name Field -->
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $_SESSION['user_input']['firstName'] ?? ''; ?>" required>
        <!-- validation errors for First Name -->
        <span class="error" id="firstNameError"></span>
        <?php if(isset($_SESSION['registration_errors']['firstName'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['firstName']; ?></span>
        <?php endif; ?>

        <!-- Last Name Field -->
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $_SESSION['user_input']['lastName'] ?? ''; ?>" required>
        <!-- Validation errors for Last Name -->
        <span class="error" id="lastNameError"></span>
        <?php if(isset($_SESSION['registration_errors']['lastName'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['lastName']; ?></span>
        <?php endif; ?>

        <!-- Email Address Field -->
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_input']['email'] ?? ''; ?>" required>
        <!-- Validation errors for Email -->
        <span class="error" id="emailError"></span>
        <?php if(isset($_SESSION['registration_errors']['email'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['email']; ?></span>
        <?php endif; ?>

        <!-- Confirm Email Field -->
        <label for="confirmEmail">Confirm Email:</label>
        <input type="email" id="confirmEmail" name="confirmEmail" value="<?php echo $_SESSION['user_input']['confirmEmail'] ?? ''; ?>" required>
        <!-- Validation errors for Confirm Email -->
        <span class="error" id="confirmEmailError"></span>
        <?php if(isset($_SESSION['registration_errors']['confirmEmail'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['confirmEmail']; ?></span>
        <?php endif; ?>

        <!-- Password Field -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <!-- Validation errors for Password -->
        <span class="error" id="passwordError"></span>
        <?php if(isset($_SESSION['registration_errors']['password'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['password']; ?></span>
        <?php endif; ?>

        <!-- Confirm Password Field -->
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <!-- Validation errors for Confirm Password -->
        <span class="error" id="confirmPasswordError"></span>
        <?php if(isset($_SESSION['registration_errors']['confirmPassword'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['confirmPassword']; ?></span>
        <?php endif; ?>

        <!-- Phone Number Field -->
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $_SESSION['user_input']['phoneNumber'] ?? ''; ?>" required>
        <!-- Validation errors for Phone Number -->
        <span class="error" id="phoneError"></span>
        <?php if(isset($_SESSION['registration_errors']['phoneNumber'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['phoneNumber']; ?></span>
        <?php endif; ?>

        <!-- Age Field -->
        <label for="age">Age:</label>
        <input type="text" id="age" name="age" value="<?php echo $_SESSION['user_input']['age'] ?? ''; ?>" required>
        <!-- Validation errors for Age -->
        <span class="error" id="ageError"></span>
        <?php if(isset($_SESSION['registration_errors']['age'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['age']; ?></span>
        <?php endif; ?>

        <!-- Student Status Radio Buttons -->
        <label for="studentStatus">Are you a student:</label>
        <input type="radio" id="studentYes" name="studentStatus" value="Yes" <?php echo ($_SESSION['user_input']['studentStatus'] ?? '') === 'Yes' ? 'checked' : ''; ?>>
        <label for="studentYes">Yes</label>
        <input type="radio" id="studentNo" name="studentStatus" value="No" <?php echo ($_SESSION['user_input']['studentStatus'] ?? '') === 'No' ? 'checked' : ''; ?>>
        <label for="studentNo">No</label>
        <!-- Validation errors for Student Status -->
        <?php if(isset($_SESSION['registration_errors']['studentStatus'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['studentStatus']; ?></span>
        <?php endif; ?>
        <span class="error" id="studentStatusError"></span>

        <!-- Employment Status Radio Buttons -->
        <label for="employmentStatus">Are you employed:</label>
        <input type="radio" id="employmentYes" name="employmentStatus" value="Yes" <?php echo ($_SESSION['user_input']['employmentStatus'] ?? '') === 'Yes' ? 'checked' : ''; ?>>
        <label for="employmentYes">Yes</label>
        <input type="radio" id="employmentNo" name="employmentStatus" value="No" <?php echo ($_SESSION['user_input']['employmentStatus'] ?? '') === 'No' ? 'checked' : ''; ?>>
        <label for="employmentNo">No</label>
        <!-- Validation errors for Employment Status -->
        <?php if(isset($_SESSION['registration_errors']['employmentStatus'])): ?>
            <span class="error visible-error"><?php echo $_SESSION['registration_errors']['employmentStatus']; ?></span>
        <?php endif; ?>
        <span class="error" id="employmentStatusError"></span>

        <!-- Display of Membership Fee -->
        <div class="membership-fee">
            <h3>Annual Membership Fee</h3>
            <p id="membershipFee">Membership Fee To be calculated on successful registration</p>
        </div>

        <!-- Registration Form Submission Button -->
        <button type="submit">Register</button>
    </form>
</main>

<?php 
// Include the footer file.
require_once('includes/footer.php'); 
?>

<!-- Client-Side show error Script (this is not validation. validation is on server side) -->
<script> 
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('registrationForm');

    form.querySelectorAll("input").forEach(input => {
        input.addEventListener('input', function() {
            var errorSpanId = input.id + "Error";
            var errorSpan = document.getElementById(errorSpanId);

            if (!input.validity.valid) {
                input.classList.add('error-input');
                errorSpan.textContent = input.validationMessage;
                errorSpan.classList.add('visible-error');
            } else {
                input.classList.remove('error-input');
                errorSpan.textContent = '';
                errorSpan.classList.remove('visible-error');
            }
        });
    });
});
</script>

</body>
</html>

<?php
// Clear session variables after displaying them.
unset($_SESSION['registration_errors']);
unset($_SESSION['user_input']);
?>
