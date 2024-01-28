<?php
// Start or resume the existing session.
session_start();

// Destroy the current session, effectively logging out the user.
session_destroy();

// Redirect the user to the login page.
header('Location: /~s3917002/wp/a2/login.php');
exit();
?>
