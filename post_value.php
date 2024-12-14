<?php

include "connection.php";

// Retrieve values from POST request
$value1 = $_POST['value1'];
$value2 = $_POST['value2'];
$value3 = $_POST['value3'];
$value4 = $_POST['value4'];
$value5 = $_POST['value5'];
$value6 = $_POST['value6'];

// Initialize v4 variable
$v5 = '';

// Check the last 4 records for value4 being 0
$sql_check = "SELECT value5 FROM vellore_glove ORDER BY id DESC LIMIT 4";
$result_check = mysqli_query($conn, $sql_check);

// $value5_all_zero = true;
// while ($row_check = mysqli_fetch_assoc($result_check)) {
//     if ($row_check['value5'] != 0) {
//         $value5_all_zero = false;
//         break;
//     }
// }

// Determine the value of v4 based on value4 and the last 4 records
if ($value5 == 0) {
        $v5 = rand(80, 90);
} else{
    $v5 = ''; // Insert an empty value if value4 is 1
}

// Insert data into the database
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO vellore_glove(value1, value2, value3, value4,value5,value6, v5, reading_time)
       VALUES ('$value1', '$value2', '$value3', '$value4','$value5','$value6', '$v5', '$timestamp')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "New record created successfully";
} else {
    echo "Values Are Not Entered";
}

// Check if the table has more than 50 rows and delete the oldest entry if true
$sql4 = "SELECT * FROM vellore_glove";
$result4 = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result4) > 50) {
    $sql51 = "DELETE FROM vellore_glove ORDER BY id ASC LIMIT 1";
    $result51 = mysqli_query($conn, $sql51);
    if ($result51) {
        echo "Deleted Successfully";
    }
}

?>
