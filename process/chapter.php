<?php
    include('db.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = substr($username,0,2);
    if($id === "ch")
    {
        $query = "select * from users where username='$username' and password='$password'" or die(mysql_error());
        $qans  = mysql_query($query) or die(mysql_error());
        
        if(mysql_num_rows($qans)) {
            session_start();
            
            while($qres = mysql_fetch_assoc($qans))
                $chapter = $qres['chapter'];

            $_SESSION['username'] = $username;
            $_SESSION['chapter']  = $chapter;

            header("location: ../chpage.php");
        }
        else{
            header("location: ../chapter.php?msg=wrong");    
        }
    }
    else {
        header("location: ../chapter.php?msg=fail");
    }
?>
