<?php
    include('process/db.php');    
?>

<!DOCTYPE html>
<html>
    <head>
    <title>VIT | AMS</title>
        <link rel="stylesheet" href="css/page.css">
        <script type="text/javascript" src="js/"></script>   
    </head>
    <body>
        <header >
            <section id="header">VIT <span id="text">ANNOUNCEMENT MANAGEMENT</span> SYSTEM</section>
        </header>
        <section id="main">
            <aside id="vnav">
                <ul id="login">
                    <h3><li>CHAPTER</li></h3>
                    <a href="chpage.php"><li>Post Announcement</li></a>
                    <a href="chview.php"><li>View Announcements</li></a>
                    <a href="changepassword.php"><li>Change Password</li></a>
                    <a href="logout.php"><li style="color: red;">Logout</li></a>
                </ul>
            </aside>
            <section id="container">
                <fieldset>
                <legend>Post Announcement</legend>
                    <form action="process/chpage.php" method="POST" id="form">
                        <p><label for="ann"><h2 style="padding-left: 10px;">Announcement:</h2></label></p>
                        <p><textarea name="announcement" id="ann" cols="90" rows="10" ></textarea></p>
                        <div id="submit">   <input type="submit" name="submit" value="POST" /></div>
                    </form>
                </fieldset>
            </section>
        </section>
    </body>
    <?php
        if(isset($_GET['msg']))
        {
            if($_GET['msg'] === 'posted')
                echo "<script type='text/javascript'>alert('Your announcement has been recorded.')</script>";
        }
    ?>
</html>
