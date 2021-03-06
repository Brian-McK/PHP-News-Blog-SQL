<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM blogPosts
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$blogPosts = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $blogPosts['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $blogPosts['recordID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $blogPosts['categoryID']; ?>">
            <br>

            <label>Post Title:</label>
            <input type="input" name="postTitle"
                   value="<?php echo $blogPosts['postTitle']; ?>">
            <br>

            <label>Post Body:</label>
            <input type="input" name="postBody"
                   value="<?php echo $blogPosts['postBody']; ?>">
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($blogPosts['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $blogPosts['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>