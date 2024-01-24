document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('registrationForm');

    // Function to validate Australian mobile numbers
    function validatePhoneNumber(number) {
        var re = /^\+61\s?4\d{2}\s?\d{3}\s?\d{3}$/;
        return re.test(number);
    }

    // Function to check if a string contains digits
    function containsDigits(str) {
        return /\d/.test(str);
    }



    // Real-time validation for names
    function validateNameField(fieldId, errorId) {
        var fieldValue = document.getElementById(fieldId).value.trim();
        if (!fieldValue || containsDigits(fieldValue)) {
            document.getElementById(errorId).style.display = 'block';
        } else {
            document.getElementById(errorId).style.display = 'none';
        }
    }

    
    document.getElementById('firstName').addEventListener('blur', function() {
        validateNameField('firstName', 'firstNameError');
    });

    document.getElementById('lastName').addEventListener('blur', function() {
        validateNameField('lastName', 'lastNameError');
    });


    // Real-time validation for other fields
    function validateField(fieldId, errorId, validationFunction) {
        var fieldValue = document.getElementById(fieldId).value.trim();
        if (!validationFunction(fieldValue)) {
            document.getElementById(errorId).style.display = 'block';
        } else {
            document.getElementById(errorId).style.display = 'none';
        }
    }


  

    document.getElementById('email').addEventListener('blur', function() {
        validateField('email', 'emailError', function(value) {
            return /\S+@\S+\.\S+/.test(value);
        });
    });

    document.getElementById('confirmEmail').addEventListener('blur', function() {
        var email = document.getElementById('email').value.trim();
        validateField('confirmEmail', 'confirmEmailError', function(value) {
            return value === email;
        });
    });

    document.getElementById('phoneNumber').addEventListener('blur', function() {
        validateField('phoneNumber', 'phoneError', validatePhoneNumber);
    });

    document.getElementById('age').addEventListener('blur', function() {
        validateField('age', 'ageError', function(value) {
            var age = parseInt(value, 10);
            return !isNaN(age) && age >= 16 && age <= 100;
        });
    });


    // Validation on form submit
    form.addEventListener('submit', function(event) {
        event.preventDefault(); 

        var firstName = document.getElementById('firstName').value.trim();
        var lastName = document.getElementById('lastName').value.trim();
        var email = document.getElementById('email').value.trim();
        var confirmEmail = document.getElementById('confirmEmail').value.trim();
        var phoneNumber = document.getElementById('phoneNumber').value.trim();

        var isValid = true;

        // Validate First Name
        if (!firstName) {
            document.getElementById('firstNameError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('firstNameError').style.display = 'none';
        }

        // Validate Last Name
        if (!lastName) {
            document.getElementById('lastNameError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('lastNameError').style.display = 'none';
        }

        // Validate Email
        if (!email || !/\S+@\S+\.\S+/.test(email)) {
            document.getElementById('emailError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('emailError').style.display = 'none';
        }

        // Validate Confirm Email
        if (email !== confirmEmail) {
            document.getElementById('confirmEmailError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('confirmEmailError').style.display = 'none';
        }

        // Validate Phone Number
        if (!validatePhoneNumber(phoneNumber)) {
            document.getElementById('phoneError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('phoneError').style.display = 'none';
        }

        
        // Validate Age
        var age = document.getElementById('age').value.trim();
        if (!age || isNaN(age) || age < 16 || age > 100) {
            document.getElementById('ageError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('ageError').style.display = 'none';
        }

        // Check Student Status
        var studentYes = document.getElementById('studentYes').checked;
        var studentNo = document.getElementById('studentNo').checked;
        if (!studentYes && !studentNo) {
            document.getElementById('studentStatusError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('studentStatusError').style.display = 'none';
        }

        // Check Employment Status
        var employmentYes = document.getElementById('employmentYes').checked;
        var employmentNo = document.getElementById('employmentNo').checked;
        if (!employmentYes && !employmentNo) {
            document.getElementById('employmentStatusError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('employmentStatusError').style.display = 'none';
        }
        
        // If all validations pass
        if (isValid) {
            console.log('Registration form is valid. Form data:', {
                firstName: firstName,
                lastName: lastName,
                email: email,
                phoneNumber: phoneNumber,
                age: age,
                studentStatus: studentYes ? 'Yes' : 'No',
                employmentStatus: employmentYes ? 'Yes' : 'No'
            });
            
            
            // Construct the email content
            var emailBody = `First Name: ${firstName}\nLast Name: ${lastName}\nEmail: ${email}\nPhone Number: ${phoneNumber}\nAge: ${age}\nStudent Status: ${studentYes ? 'Yes' : 'No'}\nEmployment Status: ${employmentYes ? 'Yes' : 'No'}`;
            var subject = "Registration Form Submission";
            var mailtoLink = `mailto:LIFE@localcouncil.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(emailBody)}`;


            // Show a confirmation dialog
            if (confirm('Thank you for registering! Click OK to open your email application to send us your details.')) {
                // Open the mail client if the user clicked 'OK'
                window.location.href = mailtoLink;
            } 
        }
    });


    function calculateMembershipFee() {
        var baseMonthlyFee = 10;
        var age = parseInt(document.getElementById('age').value.trim(), 10);
        var isStudent = document.getElementById('studentYes').checked;
        var isUnemployed = document.getElementById('employmentNo').checked;
        var discount = 0;
    
        // Apply age discount
        if (age >= 16 && age <= 20) {
            discount += 0.10; // 10% discount
        }
    
        // Apply student discount
        if (isStudent) {
            discount += 0.05; // 5% discount
        }
    
        // Apply unemployment discount
        if (isUnemployed) {
            discount += 0.40; // 40% discount
        }
    
        // Calculate final fee
        var finalMonthlyFee = baseMonthlyFee * (1 - discount);
        var annualFee = finalMonthlyFee * 12;
    
        // Display the fee
        document.getElementById('membershipFee').textContent = `Annual Membership Fee: $${annualFee.toFixed(2)}`;
    }
    
    // Call this function whenever age, student status, or employment status changes
    document.getElementById('age').addEventListener('change', calculateMembershipFee);
    document.getElementById('studentYes').addEventListener('change', calculateMembershipFee);
    document.getElementById('studentNo').addEventListener('change', calculateMembershipFee);
    document.getElementById('employmentYes').addEventListener('change', calculateMembershipFee);
    document.getElementById('employmentNo').addEventListener('change', calculateMembershipFee);
    
    // Initial calculation on form load
    calculateMembershipFee();
    

});

