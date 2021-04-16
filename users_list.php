<?php
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
                <th>Delete</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                        <form action="delete_user.php" method="post" id="delete_product_form">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <input type="submit" value="Delete">
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