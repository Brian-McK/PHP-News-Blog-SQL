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

    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?php echo $user['username']; ?></li>
        <?php endforeach; ?>
    </ul>

</div>

<?php
include('includes/footer.php');
?>