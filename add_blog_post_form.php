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


<?php
include('includes/header.php');
?>
<div class="main-container">
    <div class="main-container-header">
        <h1 class="tac">Add Blog Post</h1>
    </div>

    <div class="form-container font-150">
        <form action="add_blog_post.php" method="post" enctype="multipart/form-data" id="add_blog_post_form" class="box-shadow">

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
    </div>
    <div class="view-home-page tac font-120">
        <a href="index.php">View Homepage</a>
    </div>

</div>


<?php
include('includes/footer.php');
?>