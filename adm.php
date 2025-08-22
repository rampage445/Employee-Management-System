<?php
    include('conn.php');
    $username = $_SESSION['actUser'];
    $sql = "SELECT e.emp_id,e.emp_name,d.dept_name,e.password,e.email,s.basic,s.allowance,s.deduction,s.net_salary as salary,e.admin 
        FROM employee e 
        JOIN dept d ON d.dept_id=e.dept_id
        JOIN salary s ON s.emp_id=e.emp_id";
    //$sql = "SELECT * FROM employee";
    $result = mysqli_query($conn,$sql);
    $users = array();
    while($row=mysqli_fetch_assoc($result)){
        $users[] = $row;
    }
    //echo 'legth'.count($users);
    foreach ($users as $user) {
        $id = $user['emp_id'];
        echo "<tr id='$id'>";
        echo "<td><input type='checkbox' class='check' value='".$user['emp_id']."'></td>";
        echo "<td>".$user['emp_id']."</td>";
        if($user['admin'])
            echo "<td><b>".$user['emp_name']." </b><span style='background:#7ECD44'>[Admin]</span></td>";
        else
            echo "<td>".$user['emp_name']."</td>";
        echo "<td>".$user['dept_name']."</td>";
        echo "<td>".$user['password']."</td>";
        echo "<td>".$user['email']."</td>";
        echo "<td id='b' contenteditable='true'>".$user['basic']."</td>";
        echo "<td id='a' contenteditable='true'>".$user['allowance']."</td>";
        echo "<td id='d' contenteditable='true'>".$user['deduction']."</td>";
        echo "<td id='s' contenteditable='true'>".$user['salary']."</td>";
        echo "</tr>";
    }
?>
