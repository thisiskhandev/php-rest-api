<?php

include_once "config.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Public API *
header("Access-Control-Allow-Method: GET");


$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($output);
    // echo "</pre>";
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No record found.', 'status' => '404'));
}

// if (mysqli_num_rows($result) > 0) {
//     foreach ($result as $keys) {
//         // echo "<pre>";
//         // print_r($keys);
//         // echo "</pre>";

//         $output = json_encode($keys) . ",";
//         echo $output;
//     }
// }
