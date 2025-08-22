<?php
include('connection.php');
$username = $_SESSION['actUser'];
$sql = "SELECT e.admin,e.email FROM employee e WHERE e.emp_name='$username'";
$result = mysqli_query($conn,$sql);
$users = array();
while($row=mysqli_fetch_assoc($result)){
    $users[] = $row;
}
foreach ($users as $user) {
    echo "<h2>$username</h2>";
    echo "<p>Email:". $user['email']."</p>";
    echo "<p>Role: ".($user['admin'] ? 'Admin' : 'USER')."</p>";
}
?>