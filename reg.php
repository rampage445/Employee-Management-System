<?php
    if(isset($_POST['register'])){
        include('conn.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $dept = $_POST['dept'];
        $dept_id = -1;
        $towf = $_POST['type'];
        $hr = $_POST['hr'];
        $tow ='F';
        
        if($dept === "Engineering"){
            $dept_id = 1;
        }else if($dept === "Foreman"){
          $dept_id = 2;
        }else{
          $dept_id = 3;
        }
        if($towf=== "FULL_TIME")
              $tow = 'F';
        else
            $tow = 'P';
        
        // Check if username already exists
        $check_query = "SELECT * FROM employee WHERE emp_name='$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert user into the database
            //$register_query = "SET FOREIGN_KEY_CHECKS=0";
            $reset = "ALTER TABLE employee AUTO_INCREMENT = 1";
            mysqli_query($conn, $reset);
            $ins_e = "INSERT INTO employee (emp_name, dept_id, type_of_work,hourly_rate, password, email) VALUES ('$username', '$dept_id','$tow','$hr', '$password', '$email')";
           // mysqli_query($conn, $register_query);
            mysqli_query($conn, $ins_e);
            $res1 = mysqli_query($conn,"SELECT emp_id FROM employee WHERE emp_name='$username'");
            $res = mysqli_fetch_assoc($res1);
            $ok = $res['emp_id'];
            $ins_s = "INSERT INTO salary (emp_id,basic,allowance,deduction,net_salary,salary_date) VALUES ('$ok', '0','0','0', '0', 'GETDATE()')";
           // mysqli_query($conn, $register_query);
            mysqli_query($conn, $ins_s);
            echo "Registration successful!";
            sleep(1);

            header('Location: login.html');
        }
    }
?>

