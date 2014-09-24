<!DOCTYPE html>
<html>
    <head>
    <title>VIT | AMS</title>
        <link rel="stylesheet" href="css/login.css">
        <script type="text/javascript" src="js/"></script>   
    </head>
    <body>
        <header >
            <section id="header">VIT <span id="text">ANNOUNCEMENT MANAGEMENT</span> SYSTEM</section>
        </header>
        <section id="main">
            <aside id="vnav">
                <ul id="login">
                    <h3><li>AMS LOGIN</li></h3>
                    <a href="chapter.php"><li>Chapter Login</li></a>
                    <a href="student.php"><li>Student Login</li></a>
                    <a href="faculty.php"><li>Faculty Login</li></a>
                    <a href="index.php"><li style="color: red;">Back To Home</li></a>
                </ul>
            </aside>
            <section id="container">
                <form action="process/chapter.php" method="POST">
                    <fieldset>
                        <legend>Chapter Login</legend>
                        <table>
                        <tr><td width="150px" style="padding:15px;"><label for="uname">Chapter ID</label></td><td><input type="text" name="username" id="uname" required></td></tr>
                        <tr><td style="padding:15px;"><label for="pwd">Password</label></td><td><input type="password" name="password" id="pwd" required></td></tr>                   
                        </table>
                        <input type="submit" name="submit" value="Login">
                    </fieldset>
                </form>
            </section>
        </section>   
    </body>
    <?php
        if(isset($_GET['msg']))
        {
            if($_GET['msg'] === "fail" )
                echo "<script type=\"text/javascript\">alert(\"Please enter a valid username.\");</script>";
            else
                echo "<script type=\"text/javascript\">alert(\"Your username and password do not match.\");</script>";
        }
    ?>
</html>
