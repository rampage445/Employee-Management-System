<?php
    if(isset($_POST['login'])){
        include('connection.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT e.admin FROM employee e WHERE emp_name='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $userinfo = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            session_start();
            $_SESSION['actUser'] = $username;
            if($userinfo['admin'])
                include("admin.html");
            else
                include("views.html");
        } else {
            // Failed login attempt
            echo "Invalid username or password.";
        }
    }
?>