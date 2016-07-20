<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = 'normal';	

    if($name == '' || $city == '' || $phone == '' || $email == '' || $password == ''){
        echo 'please fill all values';
    }else{
        require_once('dbConnect.php');
        $sql = "SELECT * FROM users WHERE email='$email'";

        $rows = mysqli_fetch_array(mysqli_query($con,$sql));

        if(isset($rows)){
            echo 'Email already exist';
        }else{
            $sql = "INSERT INTO users VALUES('','$name','$city','$phone','$email','$password','$user_type')";
            if(mysqli_query($con,$sql)){
                $sql = "SELECT LAST_INSERT_ID()";
                $res = mysqli_query($con,$sql);
                $row = mysqli_fetch_row($res);
                $id = $row[0];

                $sql = "SELECT * FROM users WHERE id = '$id'";
                $res = mysqli_query($con,$sql);
                $assoc = mysqli_fetch_assoc($res);

                echo "1".$assoc['email']." ".$assoc['name']." ".$id." ".$assoc['phone'];
            }else{
                echo 'oops! Please try again!';
            }
        }
        mysqli_close($con);
    }
}else{
    echo 'error';
}

?>