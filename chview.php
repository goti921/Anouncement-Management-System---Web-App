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
                <h2>Recent Announcements:</h2>
                <?php
                    $query = "select * from announcements order by date";
                    $qans  = mysql_query($query) or die(mysql_error());
                    
                    if(mysql_num_rows($qans) == 0) {
                        echo "<p style='color: red;'>Sorry! There are no announcements to display</p>";
                    }
                    else {
                        $cnt = 0;
                        echo "<table><tr><th>Srno</th><th>Announcement</th><th>Chapter</th><th>Posted On</th><th>Status</th></tr>";
                            while($qres = mysql_fetch_assoc($qans)) {
                                $cnt++;
                                echo "<tr><td>".$cnt."</td><td style='text-align: justify;'>"
                                    .$qres['announcement']."</td><td>".$qres['chapter']."</td><td>".$qres['date']."</td>";
                                if($qres['status'] === "approved")
                                    echo "<td style='color: green;'>".$qres['status']."</td>";
                                else
                                    echo "<td style='color: red;'>".$qres['status']."</td>";
                                echo "</tr>";
                            }
                        echo "</table>";
                    }
                ?>
            </section>
        </section>
        <script type="text/javascript" src="js/height.js"></script>
    </body>
</html>
