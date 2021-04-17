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

// Get all users
$query = 'SELECT * FROM users ORDER BY id ASC';
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
?>

<?php
include('includes/header.php');
?>

<div class="main-container">

    <div class="main-container-header">
        <h1 class="tac">View Users</h1>
    </div>

    <div class="table-container">
        <table class="myTable box-shadow">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>User Type</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><i class="fa fa-hashtag" aria-hidden="true"></i>
                        <?php echo $user['id']; ?></td>
                    <td><i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $user['username']; ?></td>

                    <?php
                    if (($user['userType']) == 1) {
                    ?>
                        <td><i class="fa fa-lock" aria-hidden="true"></i>
                            <?php echo "Admin"; ?></td>
                    <?php
                    } else {
                    ?>
                        <td><i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo "User"; ?></td>
                    <?php
                    }
                    ?>

                    <td>
                        <form action="delete_user.php" method="post" id="delete_product_form">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" class="delete-btn">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php
include('includes/footer.php');
?>