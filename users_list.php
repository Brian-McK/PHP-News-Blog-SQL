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

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td>Delete</td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php
include('includes/footer.php');
?>