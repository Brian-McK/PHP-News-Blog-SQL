<?php
include('includes/header.php');
?>
<div class="main-container">
    <div class="main-container-header">
        <h1 class="tac">Contact Us</h1>
    </div>

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
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2|3}-[0-9]{4|5}" required placeholder="e.g 087-955-3432">
            <br>
            <label for='message'>Message:</label>
            <textarea name="message"></textarea>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<script language="JavaScript">
    var frmvalidator = new Validator("contactform");
    frmvalidator.addValidation("name", "req", "Please provide your name");
    frmvalidator.addValidation("email", "req", "Please provide your email");
    frmvalidator.addValidation("email", "email", "Please enter a valid email address");
</script>


<?php
include('includes/footer.php');
?>