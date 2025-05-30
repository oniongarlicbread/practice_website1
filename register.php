<?php
    include_once 'header.php'
?>

    <!-- Register Section -->
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">Sign up</h2>
            <div class="login-container">
                <form action="includes/register.inc.php" method="post">
                <div class="form-group">
                        <label for="username">Full Name</label>
                        <input type="text" id="realname" name="realname" class="form-control" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email here">
                    </div>
                    <div class="form-text">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username here" required>
                        <p>Username is publicly visible.</p>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password here">
                        <p>Entering a password is required.</p>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pwdRepeat" name="pwdRepeat" class="form-control" placeholder="Repeat your password">
                    </div>
                    <button type="submit" class="btn" style="width: 100%;">Sign up</button>
                    <div>
                        <!-- display error message to user -->
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p>Fill in all fields.</p>";
                            }
                            else if ($_GET["error"] == "invaliduid") {
                                echo "<p>Choose a proper username.</p>";
                            }
                            else if ($_GET["error"] == "invalidemail") {
                                echo "<p>Choose a proper email.</p>";
                            }
                            else if ($_GET["error"] == "passwordsdontmatch") {
                                echo "<p>Passwords don't match.</p>";
                            }
                            else if ($_GET["error"] == "stmtfailed") {
                                echo "<p>Something went wrong, please try again.</p>";
                            }
                            else if ($_GET["error"] == "usernametaken") {
                                echo "<p>Username already taken.</p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<p>You have signed up!</p>";
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php'
?>