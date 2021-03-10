<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    // ABOVE CODE NEEDS TO BE FIXED
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get blogPosts for selected category
$queryblogPosts = "SELECT * FROM blogPosts
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryblogPosts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$blogPosts = $statement3->fetchAll();
$statement3->closeCursor();

// Get a blogPost by name in category
$queryblogPostsByName = "SELECT * FROM blogPosts
WHERE categoryID = :category_id AND postTitle = :post_title
ORDER BY recordID";
$statement4 = $db->prepare($queryblogPosts);
$statement4->execute(array(':category_id' => $category_id, ':post_title' => $post_title));
$blogPostsByName = $statement4->fetchAll();
$statement4->closeCursor();

?>

<div class="main-container">
    <?php
    include('includes/header.php');
    ?>
    <div class="main-container-header">

        <h1 class="tac">Categories</h1>

        <div class="category-navigation">
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    </div>


    


    <!-- display a table of blogPosts -->
    <h2><?php echo "Post " . $category_name; ?></h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Post Title</th>
            <th>Post Body</th>
            <th>Date Posted</th>
            <th>Time Posted</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($blogPosts as $blogPost) : ?>
            <tr>
                <td><img src="image_uploads/<?php echo $blogPost['image']; ?>" width="100px" height="100px" /></td>
                <td>
                    <h3><?php echo $blogPost['postTitle']; ?></h3>
                </td>
                <td><?php echo $blogPost['postBody']; ?></td>
                <td><?php echo "Date Posted: " . date('d/m/Y', strtotime($blogPost['dateTime'])); ?></td>
                <td><?php echo "Time Posted: " . date('H:i:s', strtotime($blogPost['dateTime'])); ?></td>
                <td>
                    <form action="delete_blog_post.php" method="post" id="delete_blog_post_form">
                        <input type="hidden" name="record_id" value="<?php echo $blogPost['recordID']; ?>">
                        <input type="hidden" name="category_id" value="<?php echo $blogPost['categoryID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
                <td>
                    <form action="edit_blog_post_form.php" method="post" id="delete_blog_post_form">
                        <input type="hidden" name="record_id" value="<?php echo $blogPost['recordID']; ?>">
                        <input type="hidden" name="category_id" value="<?php echo $blogPost['categoryID']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="add_blog_post_form.php">Add Blog Post</a></p>
    <p><a href="category_list.php">Manage Post Categories</a></p>
    </section>
</div>
<?php
include('includes/footer.php');
?>