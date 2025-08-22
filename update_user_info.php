<?php
    include('connection.php');
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['userdata'])){
            $sid = json_decode($_POST['userdata']);
            
            foreach($sid as $s){
                $id =  $s->chkval;
                $bv =  $s->bv;
                $av =  $s->av;
                $dv =  $s->dv;
                $sv = $s->dv;
                $sql = "UPDATE salary
                SET basic = '$bv', allowance = '$av', deduction = '$dv', net_salary = '$sv' WHERE emp_id='$id';";
                //$sql = "SELECT * FROM employee e WHERE e.emp_id='$s'";
                $result = mysqli_query($conn,$sql);
                //echo implode(',',(array)$s);
                //echo implode(','json_decode($s));
                //$sql = "DELETE FROM employee WHERE emp_id='$s'";
                //$sql = "SELECT * FROM employee e WHERE e.emp_id='$s'";
                //$result = mysqli_query($conn,$sql);
                //$sql2 = "DELETE FROM salary WHERE emp_id='$s'";
                //$sql = "SELECT * FROM employee e WHERE e.emp_id='$s'";
               // $result2 = mysqli_query($conn,$sql2);
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