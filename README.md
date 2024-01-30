# LIFE Wellness Website Assignment 2

## Assignment Details
- **Course Name**: Web programming COSC3052
- **Institution**: RMIT University
- **Submission Date**: 28th January 2024
- **Student Name**: Mario Kweku Djameh
- **Student ID**: s3917002
- **live link 1**: `https://titan.csit.rmit.edu.au/~s3917002/wp/a2/index.php`
- **live link 2**: `https://titan.csit.rmit.edu.au/~s3917002/wp/a2/admin/portal.php`

## Overview
Assignment 2 of Web Programming COSC3052 at RMIT University builds upon the LIFE Wellness website from Assignment 1. This iteration focuses on enhancing the website's functionality through PHP backend integration, database management, session handling, and improved user interactivity.

## Project Description
The LIFE Wellness website, "LIFE - Living It Fully Everyday", now incorporates dynamic features such as user authentication, session management, form processing, and database interactions. The project continues to provide online wellness services like Yoga, Meditation, Stretching, and Healthy Habits, tailored to the needs of users in the post-COVID-19 era.




## Objective
The primary objective of Assignment 2 is to integrate backend technologies with the existing client-side interface. The focus is on:
- Implementing user authentication and session management.
- Creating dynamic and interactive web pages using PHP.
- Managing user data with MySQL database.
- Ensuring data security and privacy.


## Installation and Setup
The website is live at `https://titan.csit.rmit.edu.au/~s3917002/wp/a2/index.php` and at `https://titan.csit.rmit.edu.au/~s3917002/wp/a2/admin/portal.php` for the admin dashboard

## Website Overview
In addition to the features from assignment 1, The LIFE website now includes several key features:
- **User Registration and Login**: Secure registration and login functionality for users.
- **Dynamic Content Rendering**: Displaying content based on user interactions and database queries.
- **Personalized User Experience**: Customized content in 'My Services' based on user preferences.
- **Contact Form Processing**: Backend handling of contact form submissions.
- **Database Interaction**: Storing and retrieving user and service data from MySQL database.


## Structure
- `db_access.php`: Database connection and configuration.
- `login.php`, `register.php`: Authentication and user registration handling.
- `logout_process.php`: Session termination and user logout logic.
- `contact_process.php`: Backend processing of the contact form.
- `backend/`: Directory containing backend scripts and database interactions.
- `index.php`: The main landing page of the website.
- `services.php`: Details of the wellness services offered.
- `covid.php`: Dedicated page for COVID-19 resources.
- `contact.php`: Contact and feedback form.
- `register.php`: User registration form.
- `privacy.php`: Privacy policy page.
- `sitemap.php`: Sitemap of the website.
- `styles.css`: Stylesheet for the website.
- `validate.js`: JavaScript file for form validation.
- `see website structure below for full files`


## Technologies Used
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- JQuery
- Bootstrap

## Development Process
1. **Backend Development**: Implementing PHP scripts for dynamic content and user management.
2. **Database Integration**: Designing and setting up a MySQL database to store user and service data.
3. **Security Measures**: Ensuring secure data handling and user authentication.
4. **Testing and Debugging**: Rigorous testing to ensure functionality and data integrity.



## References
### Images and GIFs
All images and GIFs used on this website are sourced from [Pexels](https://www.pexels.com/), which allows free use for personal purposes.

Website Logo design was generated from stable diffusion. 

Logo icons and code snippet for head for webite was from [Favican](https://favicon.io/)

Icons for the myServices.php page was from [flaticon.com](https://www.flaticon.com/free-icons/yoga) Yoga icons created by monkik - Flaticon

Accordion JS Plugin from [accordion.js.org](https://accordion.js.org/)by [Andrei Surdu(awps)] 


### Code Snippets
For HTML, CSS, and JavaScript code snippets, the following resources were referenced:
- [Mozilla Developer Network (MDN)](https://developer.mozilla.org/)
- [W3Schools](https://www.w3schools.com/)
- [Stack Overflow](https://stackoverflow.com/)
- [CSS Tricks](https://css-tricks.com/)
- [PHP Documentation](https://www.php.net/docs.php)
- Course notes and lab material by lecturer Liam Pietralla and tutor Man Hou

## Acknowledgements
Special thanks to RMIT University, course lecturer Liam Pietralla,  tutor Man Hou and various online communities for resources and support in the development of this project.


## Files and structure of the website

```
LIFE Wellness Website structure and files 
|
|-- index.php                   # Main landing page of the website
|-- services.php                # Details of the wellness services offered
|-- covid.php                   # Dedicated page for COVID-19 resources
|-- contact.php                 # Contact and feedback form
|-- register.php                # User registration form
|-- login.php                   # User login page
|-- privacy.php                 # Privacy policy page
|-- sitemap.php                 # Sitemap of the website
|-- styles.css                  # Main stylesheet for the website
|-- README.md                   # Project documentation and overview
|-- healthy_habits_service.php  # Page for healthy habits service
|-- meditation_service.php      # Page for meditation service
|-- myServices.php              # Personalized services page for registered users
|-- stretching_service.php      # Page for stretching service
|-- welcome.php                 # Welcome page post-registration
|-- yoga_service.php            # Page for yoga service
|
|-- includes/                   # Folder containing reusable PHP include files
|   |-- footer.php              # Footer include file
|   |-- head.php                # Head include file
|   |-- header_nav.php          # Header and navigation include file
|
|-- js/                         # Folder containing JavaScript files
|   |-- accordion_setup.js      # JavaScript for accordion setup
|   |-- adjustMainPadding.js    # JavaScript for adjusting main padding
|   |-- durationTracker.js
|
|-- plugin/                     # Folder containing external plugins
|   |-- accordion.css           # CSS styles for the accordion plugin
|   |-- accordion.js            # JavaScript for the accordion functionality
|
|-- backend/                    # Folder containing backend PHP scripts
|   |-- db_access.php           # Database access and configuration
|   |-- logout_process.php      # Script for handling user logout
|   |-- register_process.php    # Script for handling user registration
|   |-- login_process.php       # Script for handling user login
|   |-- myservice_process.php
|
|
|-- admin/                      # Folder for admin-related files
|   |-- portal.php              # Admin portal page
|
|-- assets/                     # Folder containing all media, images, and icons
|   |-- [All media files, images, icons, etc.]
|   
|-- css/
|   |-- health.css
|   |-- meditation.css
|   |-- services.css
|   |-- stretching.css
|   |-- yoga.css
```