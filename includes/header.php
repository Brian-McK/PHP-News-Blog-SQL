<!-- the head section -->

<?php
/**
 * Start the session.
 */
session_start();

?>

<head>
    <title>News Blog</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <!-- a helper script for validating the form-->
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>

<!-- the body section -->

<body>
    <header>
        <nav>
            <div class="nav-middle">
                <h1>My News Blog</h1>
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </div>
            <div class="nav-right">
                <ul class="font-150">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php
                    if (isset($_SESSION['user_id']) || isset($_SESSION['logged_in'])) {
                    ?>
                        <li><a href="users_list.php">View Users</a></li> 
                        <li><a href="logout.php">Logout</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>