<?php
/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in or the correct user type to access the page
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in and or not the right user type to proceed to the page. Redirect them back to the login.php page.
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<?php
include('includes/header.php');
?>

<div class="main-container">
    <div class="main-container-header error-bg">
        <h1 class="tac">Error</h1>
    </div>

    <p class="tac m-40px font-200"><?php echo $error; ?></p>
</div>

<?php
include('includes/footer.php');
?>