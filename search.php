<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticketNumber = $_POST['ticketNumber'];

    require_once('dbConnect.php');

    $sql = "select * from ticket where number = '$ticketNumber'";

    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0) {

        $result = array();

        while ($row = mysqli_fetch_array($res)) {
            array_push($result,
                array('id' => $row[0],
                    'number' => $row[1],
                    'name' => $row[2],
                    'route' => $row[3],
                    'level' => $row[4],
                    'date' => $row[5],
                    'seat' => $row[6],
                    'user_id' => $row[8]
                ));
        }
        echo json_encode(array("result" => $result));
    }else{
        echo '0';
    }
} else {
    echo "error try again";
}

mysqli_close($con);

?>