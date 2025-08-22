<?php
    include('connection.php');
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['users'])){
            $sid = json_decode($_POST['users']);
            foreach($sid as $s){
                //echo "<h1>".$s."</h1>";
                $sql = "DELETE FROM employee WHERE emp_id='$s'";
                //$sql = "SELECT * FROM employee e WHERE e.emp_id='$s'";
                $result = mysqli_query($conn,$sql);
                $sql2 = "DELETE FROM salary WHERE emp_id='$s'";
                //$sql = "SELECT * FROM employee e WHERE e.emp_id='$s'";
                $result2 = mysqli_query($conn,$sql2);
                //$ok = mysqli_fetch_assoc($result);
                //echo "<h1>".$ok['emp_id']."</h1>";
            }

        }else{
            echo "NO USERS";
        }
    }else{
        echo "NO POST"; 
    }
?>