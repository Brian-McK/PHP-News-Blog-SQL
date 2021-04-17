<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in or the correct user type to access the page
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || ($_SESSION['user_type'] == 0) ){
    //User not logged in and or not the right user type to proceed to the page. Redirect them back to the login.php page.
    session_destroy();
    header('Location: login.php');
    exit;
}

// Get ID
$user_id= filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($user_id== null || $user_id== false) {
    $error = "Invalid User ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Remove the user from the database
    $query = 'DELETE FROM users 
              WHERE id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Users List page
    include('users_list.php');
}
?>