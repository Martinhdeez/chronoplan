<?php
    require_once '../../parts/id_header.php';
    require_once '../../includes/functions.php';
    session_start();
?>
<body>
    <div class="container">
        <form action="..\..\controllers\indentification\registerController.php" class="form" method="post">
            <h2 id="title">Register</h2>
            <?php success(); ?>
            <div class="input-container" id="username">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" placeholder="Username" name="username" value="<?=isset($_SESSION['form_data']['username']) ? htmlspecialchars($_SESSION['form_data']['username']) : ''; ?>" required>
            </div>
            <div class="input-container" id="email">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" placeholder="Email" name="email"value="<?=isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>" required>
            </div>
            <div class="input-container" id="password">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="input-container">
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
            </div>
            <button type="submit" name="register_submit">Register</button>
            <br>
            <a href="login.php">Do you already have an account?</a>
        </form>
    </div>
</body>
</html>