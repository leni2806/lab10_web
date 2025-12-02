<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['user'] = 'admin';

    header("Location: /project_praktikum9/project/index.php?page=dashboard");
    exit;
}
?>
<section class="login-wrap">
    <div class="login-card">
        <div class="login-illustration">💫</div>
        <h2>Masuk</h2>
        <p class="muted">Silakan login untuk mengakses fitur (demo).</p>

        <form method="post" class="login-form">
            <label>Username</label>
            <input type="text" name="username" value="admin" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</section>
