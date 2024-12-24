<?php include 'header.php'; ?>
<div class="form-container">
    <h2>Login</h2>
    <form action="authenticate.php" method="post">
        <label for="Matric">Matric:</label>
        <input type="text" name="Matric" id="Matric" required>
        <label for="Password">Password:</label>
        <input type="Password" name="Password" id="Password" required>
        <input type="submit" name="submit" value="Login">
    </form>
	<p>
    <a href="register_form.php">Register</a> here if you have not.
</p>
<?php
    if (!empty($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
</div>
</body>
</html>