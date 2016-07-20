<?php
require_once 'twilio-php/Services/Twilio.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['UserName'];
    $route = $_POST['route'];
    $level = $_POST['level'];
    $phone = $_POST['phone'];
    $email = $_POST['UserEmail'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $date = date('Y-m-d');
    $number = mt_rand(100, 999);
    $subject = "Ticket Number";
    $message = "Your Ticket Number is " . $number;

    require_once('dbConnect.php');

    $sql = "SELECT buses.bus_id, buses.capacity FROM buses INNER JOIN routes ON buses.route_id = routes.id WHERE buses.capacity < buses.maximum AND route = '$route'";

    if ($res = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            $assoc = mysqli_fetch_assoc($res);
            $bus_id = $assoc['bus_id'];
            $capacity = $assoc['capacity'];
            $capacity = $capacity + 1;

            $sql = "UPDATE buses SET buses.capacity = '$capacity' WHERE buses.bus_id = '$bus_id'";

            if (mysqli_query($con, $sql)) {
                $sql = "INSERT INTO ticket VALUES('','$number','$name','$route','$level','$date','$capacity','$price','$id')";

                if (mysqli_query($con, $sql)) {
                    try {

                        $AccountSid = 'AC313b90f4ab578747c11592a48ba68209'; // Your Account SID from www.twilio.com/console
//                        $AuthToken = 'b3bcb4773f8cd51a5ee1c250380c6547';   // Your Auth Token from www.twilio.com/console
                        $AuthToken = '567feeb0cc6d474a7e307ff4bd3180a3';   // Your Auth Token from www.twilio.com/console

                        $client = new Services_Twilio($AccountSid, $AuthToken);

                        $client->account->messages->create(array(
                            'From' => '+12512725894', // From a valid Twilio number
                            'To' => $phone, // Text this number
                            'Body' => $date.' name is '.$name.' Ticket no. is '.$number.' seat no is '.$capacity.' route is '.$route,
                        ));
//                        echo 'Details sent by sms';
                    }catch (Exception $e) {
                        echo 'Error: ' . $e->getMessage();
                    }
                    echo 'Details sent by sms';
                } else {
                    echo 'oops! Please try again!';
                }
            }
        } else {
            echo 'Sorry, No bus Available';
        }
    }
    mysqli_close($con);
} else {
    echo 'Wooooooo.What r u tryin to do.';
}
?>