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
<?php
include('includes/header.php');
?>
<div class="main-container">

       <div class="main-container-header">
              <h1 class="tac">Edit Blog Post</h1>
       </div>
       <div class="view-home-page tac font-120">
              <a href="index.php">View Homepage</a>
       </div>
       <div class="form-container font-150">
              <form action="edit_blog_post.php" method="post" enctype="multipart/form-data" id="add_blog_post_form" class="pushdown">
                     <input type="hidden" name="original_image" value="<?php echo $blogPosts['image']; ?>" />
                     <input type="hidden" name="record_id" value="<?php echo $blogPosts['recordID']; ?>">

                     <label>Category ID:</label>
                     <input type="category_id" name="category_id" value="<?php echo $blogPosts['categoryID']; ?>">
                     <br>

                     <label>Post Title:</label>
                     <input type="input" name="postTitle" value="<?php echo $blogPosts['postTitle']; ?>" required placeholder="Enter post title..." pattern=".{2,}" title="Post Title must be greater than 2 characters">
                     <br>

                     <label>Post Body:</label>
                     <textarea name="postBody" required><?php echo $blogPosts['postBody']; ?></textarea>
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
       </div>
</div>

<?php
include('includes/footer.php');
?>