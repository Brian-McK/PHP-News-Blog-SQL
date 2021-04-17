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

// Get all categories
$query = 'SELECT * FROM categories
              ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<?php
include('includes/header.php');
?>

<div class="main-container">
    <div class="main-container-header">
        <h1 class="tac">Categories</h1>
    </div>
    <div class="add-category-form-container box-shadow">
        <h1>Add Category</h1>

        <form action="add_category.php" method="post" id="add_category_form">
            <label>Name:</label>
            <input type="input" size="30" name="name" required placeholder="Enter new category name..." pattern=".{2,}" title="Category name must be greater than 2 characters">
            <input id="add_category_button" type="submit" value="Add">
        </form>

        <div class="delete-categories">
            <nav>
                <h1>Delete Categories</h1>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                        <li><?php echo $category['categoryName']; ?></li>
                        <form action="delete_category.php" method="post" id="delete_product_form">
                            <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="view-home-page tac font-120">
        <a href="index.php">View Homepage</a>
    </div>

    <?php
    include('includes/footer.php');
    ?>