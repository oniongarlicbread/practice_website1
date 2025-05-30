<?php
    include_once 'header.php';
?>

    <!-- Login Section -->
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">Log In</h2>
            <div class="login-container">
                <form action="includes/login.inc.php" method="post">
                    <div class="form-group">
                        <label for="username">Email / Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Email / Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="form-text">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn" style="width: 100%;">Log In</button>
                    <div>
                        <!-- display error message to user -->
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p>Fill in all fields.</p>";
                            }
                            else if ($_GET["error"] == "wronglogin") {
                                echo "<p>Incorrect login information.</p>";
                            }
                        }
                        ?>
                    </div>
                    <div class="form-footer">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>    

<?php
    include_once 'footer.php'
?>