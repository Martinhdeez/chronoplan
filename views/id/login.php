<?php
    require_once '../../parts/id_header.php';
    require_once '../../includes/functions.php';
    session_start();
?>
<body>
    <div class="container">
        <form action="" class="form" method="post">
            <h2 id="title">Login</h2>
            <?php success(); ?>
            <div class="input-container" id="username">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="input-container" id="password">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <button type="submit" name="login_submit">Enter</button>
            <br>
            <a href="register.php">You still do not have an account?</a>
        </form>
    </div>
</body>
</html>