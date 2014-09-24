<?php
    include('process/db.php');  
    session_start();  
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
    <title>VIT | AMS</title>
        <link rel="stylesheet" href="css/page.css">
        <!-- <script type="text/javascript" src="js/"></script> --> 
        <meta name="viewport" conatent = "width=device-width" >
    </head>
    <body>
        <header >
            <section id="header">VIT <span id="text">ANNOUNCEMENT MANAGEMENT</span> SYSTEM</section>
        </header>
        <section id="main">
            <aside id="vnav">
                <ul id="login">
                    <h3><li>STUDENT</li></h3>
                    <a href="stupage.php"><li>View Announcement</li></a>
                    <a href="stusave.php"><li>Saved Announcements</li></a>
                    <?php 
                    $qans = mysql_query("select * from reminder where username = '$username'") or die(mysql_error());
                    if(mysql_num_rows($qans))
                        echo "<a href='stureminder.php' style='text-decoration: underline; font-weight: bold;'><li>Reminders</li></a>";
                    else
                        echo "<a href='stureminder.php'><li>Reminders</li></a>";
                    ?>
                    <a href="changepassword.php"><li>Change Password</li></a>
                    <a href="logout.php"><li style="color: red;">Logout</li></a>
                </ul>
            </aside>
            <section id="container">
                <h2>Recent Announcements:</h2>
                <?php
                    $query = "select * from announcements order by date";
                    
                    $qans = mysql_query($query) or die(mysql_error());
                    
                    if(mysql_num_rows($qans) == 0) {
                        echo "<p style='color: red;'>Sorry! There are no announcements to display</p>";
                    }
                    else {
                        $cnt = 0;
                        echo "<table><tr><th>Srno</th><th>Announcement</th><th>Chapter</th><th>Posted On</th><th>Action</th><th>Reminders</th></tr>";
                        
                        while($qres = mysql_fetch_assoc($qans)) {
                            $cnt++;
                            $ann_id = $qres['ann_id'];
                            echo "<tr><td>".$cnt."</td><td style='text-align: justify;'>".$qres['announcement']."</td><td>".$qres['chapter']."                                      </td><td>".$qres['date']."</td><td>
                                <form action='process/save.php' method='POST'>
                                <input type='hidden' name='ann_id' value='".$ann_id."'' />
                                <input type='submit' name='submit' value='Save' />
                                </form>
                                </td><td>
                                <form action='process/reminder.php' method='POST'>
                                <input type='hidden' name='ann_id' value='".$ann_id."'' />
                                <input type='submit' name='submit' value='Set Reminder' />
                                </form>
                                </td></tr>";
                        }
                        echo "</table>";
                    }
                ?>
            </section>
        </section>
        <script type="text/javascript" src="js/height.js"></script>
    </body>
</html>
