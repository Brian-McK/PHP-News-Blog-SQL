<?php
include('includes/header.php');
?>
<div class="main-container">
    <div class="main-container-header">
        <h1 class="tac">Contact Us</h1>
    </div>

    <!-- <div class="form-container font-150">
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
            <br> -->

    <!-- TODO - SHOULD HAVE A TEXTAREA HERE INSTEAD -->
    <!-- <label>Post Body:</label>
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
    </div> -->


    <!-- ADDING IN CONTACT FORM -->
    <div class="form-container font-150">

        <form method="POST" name="contactform" action="contact-form-handler.php" id="add_blog_post_form" class="box-shadow">
            <label for='name'>Your Name:</label>
            <input type="text" name="name">
            <br>
            <label for='email'>Email Address:</label>
            <input type="text" name="email">
            <br>
            <label for="phone">Enter your phone number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required placeholder="e.g 123-45-678">
            <br>
            <label for='message'>Message:</label>
            <textarea name="message"></textarea>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>


<?php
include('includes/footer.php');
?>