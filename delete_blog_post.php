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

require_once('database.php');

// Get IDs
$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($record_id != false && $category_id != false) {
    $query = "DELETE FROM blogPosts
              WHERE recordID = :record_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':record_id', $record_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>