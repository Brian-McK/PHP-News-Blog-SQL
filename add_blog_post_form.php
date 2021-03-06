<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Add Blog Post</h1>
    <form action="add_blog_post.php" method="post" enctype="multipart/form-data" id="add_blog_post_form">

        <label>Category:</label>
        <select name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Post Title:</label>
        <input type="input" name="postTitle" required placeholder="Enter post title..." pattern=".{2,}" title="Post Title must be greater than 2 characters">
        <br>

        <!-- TODO - SHOULD HAVE A TEXTAREA HERE INSTEAD -->
        <label>Post Body:</label>
        <input type="input" name="postBody" required placeholder="Enter post body..." pattern=".{2,}" title="Post Body must be greater than 2 characters">
        <br>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Post">
        <br>
    </form>
    <p><a href="index.php">View Homepage</a></p>
    <?php
    include('includes/footer.php');
    ?>