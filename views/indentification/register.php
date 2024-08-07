<?php
    require_once '../../parts/id_header.php';
?>
<body>
    <div class="container">
        <form action="..\..\controllers\indentification\registerController.php" class="form" method="post">
            <h2 id="title">Register</h2>
            <div class="input-container" id="username">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="input-container" id="email">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" placeholder="Email" name="email" required>
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