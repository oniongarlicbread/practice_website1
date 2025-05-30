<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>browser name xd</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <a href="index.php">ForumName</a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Members</a></li>
                    <!-- change toggle name if user is logged in -->
                    <?php
                        if (isset($_SESSION["username"])) {
                            echo "<li><a href='profile.php'>Profile page</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                        }
                        else {
                            echo "<li><a href='register.php'>Sign up</a></li>";
                            echo "<li><a href='login.php'>Log in</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
