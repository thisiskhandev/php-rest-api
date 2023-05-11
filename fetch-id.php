<?php

include_once "config.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Method: POST");

$data = json_decode(file_get_contents("php://input"), true); // php://input reads raw data, while true returns into Associative array

$student_id = mysqli_escape_string($conn, $data['sid']);

$sql = "SELECT * FROM students WHERE id = {$student_id}";

$result = mysqli_query($conn, $sql) or die("Query failed ID: " . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('Message' => 'No record found!', 'status' => 404));
}
