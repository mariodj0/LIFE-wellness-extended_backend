<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest">

    <?php
    if (basename($_SERVER['PHP_SELF']) == 'index.php') {

        echo '<!-- Accordion JS Plugin by [Andrei Surdu(awps)] -->';
        echo '<!-- More information at https://accordion.js.org/ and https://github.com/awps/Accordion.JS -->';

        echo '<link rel="stylesheet" href="plugin/accordion.css" />';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>';
        echo '<script src="plugin/accordion.js"></script>';
    }
    ?>
</head>