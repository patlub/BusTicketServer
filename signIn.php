<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $details = array();

    require_once('dbConnect.php');
    $sql = "select * from users where email='$email' and password='$password'";

    $rows = mysqli_fetch_assoc(mysqli_query($con, $sql));
    if (isset($rows)) {
            echo "1".$rows['email']." ".$rows['name']." ".$rows['id']." ".$rows['phone'];
    } else {
        echo "Invalid Username or Password";
    }

} else {
    echo "error try again";
}


?>