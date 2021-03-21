<footer>
    <p>&copy; <?php echo date("Y"); ?> My News Blog App</p>
</footer>
</div><!-- close div container -->
<script language="JavaScript">
    var frmvalidator = new Validator("contactform");
    frmvalidator.addValidation("name", "req", "Please provide your name");
    frmvalidator.addValidation("email", "req", "Please provide your email");
    frmvalidator.addValidation("email", "email", "Please enter a valid email address");
</script>
</body>
</html>