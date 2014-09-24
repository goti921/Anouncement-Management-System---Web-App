<?php
    include('process/db.php');    
    session_start();
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
                    <h3><li>FACULTY</li></h3>
                    <a href="fcpage.php"><li>Approve Announcement</li></a>
                    <a href="fcview.php"><li>View Announcements</li></a>
                    <a href="changepassword.php"><li>Change Password</li></a>
                    <a href="logout.php"><li style="color: red;">Logout</li></a>
                </ul>
            </aside>
            <section id="container">
                <h2>Recent Announcements:</h2>
                <?php
                    $chapter = $_SESSION['chapter'];
                    $query   = "select * from announcements where chapter='$chapter' order by date";
                    
                    $qans = mysql_query($query) or die(mysql_error());
                    
                    if(mysql_num_rows($qans) == 0) {
                        echo "<p style='color: red;'>Sorry! There are no announcements to display</p>";
                    }
                    else {
                        $cnt = 0;
                        echo "<table><tr><th>Srno</th><th>Announcement</th><th>Chapter</th><th>Posted On</th><th>Approve</th><th>Reject</th></tr>";
                        while($qres = mysql_fetch_assoc($qans)) {
                            $cnt++;
                            $ann_id = $qres['ann_id'];
                            echo "<tr><td>".$cnt."</td><td style='text-align: justify;'>".$qres['announcement']."</td><td>".$qres['chapter']."                                      </td><td>".$qres['date']."</td><td>
                                <form action='process/approve.php' method='POST'>
                                <input type='hidden' name='ann_id' value='".$ann_id."'' />
                                <input type='submit' name='submit' value='Approve' />
                                </form>
                                </td><td>
                                <form action='process/reject.php' method='POST'>
                                <input type='hidden' name='ann_id' value='".$ann_id."'' />
                                <input type='submit' name='submit' value='Reject' />
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
