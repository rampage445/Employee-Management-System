<?php
    include('conn.php');
    $username = $_SESSION['actUser'];
    $sql = "SELECT d.dept_name,e.type_of_work,e.hourly_rate,a.city,p.project_name,s.net_salary,s.salary_date FROM employee e 
        JOIN dept d ON d.dept_id=e.dept_id
        JOIN address a ON a.emp_id=e.emp_id
        JOIN ft_pt_work fw ON fw.emp_id=e.emp_id
        JOIN project p ON p.project_id=fw.project_id
        JOIN salary s ON s.emp_id=e.emp_id
        WHERE e.emp_name='$username'";
    $result = mysqli_query($conn,$sql);
    $users = array();
    while($row=mysqli_fetch_assoc($result)){
        $users[] = $row;
    }
    /*
    $users = [
        ['id' => 1, 'username' => 'johndoe', 'email' => 'johndoe@example.com'],
        ['id' => 2, 'username' => 'janesmith', 'email' => 'janesmith@example.com'],
        ['id' => 3, 'username' => 'mikejohnson', 'email' => 'mikejohnson@example.com']
    ];*/

    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>".$user['dept_name']."</td>";
        echo "<td>".$user['type_of_work']."</td>";
        echo "<td>".$user['hourly_rate']."</td>";
        echo "<td>".$user['city']."</td>";
        echo "<td>".$user['project_name']."</td>";
        echo "<td>".$user['net_salary']."</td>";
        echo "<td>".$user['salary_date']."</td>";
        echo "</tr>";
    }
?>
