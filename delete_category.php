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
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($category_id == null || $category_id == false) {
    $error = "Invalid category ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM categories 
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>
