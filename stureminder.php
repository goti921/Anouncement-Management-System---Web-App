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
                    $username = $_SESSION['username'];
                    $query    = "select reminder_id from reminder where username='$username'";
                    
                    $qans = mysql_query($query) or die(mysql_error());
                    
                    if(mysql_num_rows($qans) == 0) {
                        echo "<p style='color: red;'>Sorry! There are no announcements to display</p>";
                    }
                    else {
                        $cnt = 0;
                        echo "<table><tr><th>Srno</th><th>Announcement</th><th>Chapter</th><th>Posted On</th></tr>";
                        
                        while($qres = mysql_fetch_assoc($qans)) {
                            $cnt++;
                            $ann_id = $qres['reminder_id'];
                            $query1 = "select * from announcements where ann_id=$ann_id";
                            
                            $qans1 = mysql_query($query1) or die(mysql_error());
                            
                            while($qres1 = mysql_fetch_assoc($qans1)) {
                                echo "<tr><td>".$cnt."</td><td style='text-align: justify;'>".$qres1['announcement']."</td>                   <td>".$qres1['chapter']."                                      </td><td>".$qres1['date']."</td></tr>";
                            }
                        }
                        echo "</table>";
                    }
                ?>
            </section>
        </section>
        <script type="text/javascript" src="js/height.js"></script>
    </body>
</html>
