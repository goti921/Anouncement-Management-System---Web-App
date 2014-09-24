<?php 
    include 'process/db.php'; 
    session_start();
?>
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
                <?php
                if(substr($_SESSION['username'],0,2) === "ch")
                {
                    echo "<ul id='login'>
                        <h3><li>CHAPTER</li></h3>
                        <a href='chpage.php'><li>Post Announcement</li></a>
                        <a href='chview.php'><li>View Announcements</li></a>
                        <a href='changepassword.php'><li>Change Password</li></a>
                        <a href='logout.php'><li style='color: red;'>Logout</li></a>
                      </ul>";    
                }
                else if(substr($_SESSION['username'],0,2) === "fc")
                {
                    echo "<ul id='login'>
                        <h3><li>FACULTY</li></h3>
                        <a href='fcpage.php'><li>Approve Announcement</li></a>
                        <a href='fcview.php'><li>View Announcements</li></a>
                        <a href='changepassword.php'><li>Change Password</li></a>
                        <a href='logout.php'><li style='color: red;'>Logout</li></a>
                       </ul>";
                }
                else
                {
                    echo "<ul id='login'>
                            <h3><li>STUDENT</li></h3>
                            <a href='stupage.php'><li>View Announcement</li></a>
                            <a href='stusave.php'><li>Saved Announcements</li></a>";
                    $username = $_SESSION['username'];
                    $qans = mysql_query("select * from reminder where username = '$username'") or die(mysql_error());
                    if(mysql_num_rows($qans))
                        echo "<a href='stureminder.php' style='text-decoration: underline; font-weight: bold;'><li>Reminders</li></a>";
                    else
                        echo "<a href='stureminder.php'><li>Reminders</li></a>";
                    
                            echo "<a href='changepassword.php'><li>Change Password</li></a>
                            <a href='logout.php'><li style='color: red;'>Logout</li></a>
                        </ul>";
                }
                
                ?>
            </aside>
            <section id="container">
                <form action="process/changepassword.php" method="POST">
                    <fieldset>
                        <legend>Change Password</legend>
                        <table>
                        <tr><td width="150px" style="padding:15px;"><label for="uname">Username</label></td><td><input type="text" name="username" id="uname" required></td></tr>
                        <tr><td style="padding:15px;"><label for="currpwd">Current Password</label></td><td><input type="password" name="currentpassword" id="currpwd" required></td></tr>
                        <tr><td style="padding:15px;"><label for="newpwd">New Password</label></td><td><input type="password" name="newpassword" id="newpwd" required></td></tr>
                        <tr><td style="padding:15px;"><label for="confpwd">Confirm Password</label></td><td><input type="password" name="confirmpassword" id="confpwd" required></td></tr>                   
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
            if($_GET['msg'] === "success" )
                echo "<script type=\"text/javascript\">alert(\"Password updated successfully.\");</script>";
            else if($_GET['msg'] === "nomatch")
                echo "<script type=\"text/javascript\">alert(\"Password confirmation failed.\");</script>";
            else if($_GET['msg'] === "invalid")
                echo "<script type=\"text/javascript\">alert(\"Your username and password do not match.\");</script>";
        }
    ?>
</html>
