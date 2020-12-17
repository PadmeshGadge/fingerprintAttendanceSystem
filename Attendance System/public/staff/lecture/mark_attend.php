<?php require_once('../../../private/initialize.php'); ?>

<?php
// $api_key_value = "tPmAT5Ab3j7F9";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Subject_ID,Branch_ID from staff where Subject_ID not in (select s.subject_id from staff s join attendance a on a.Total_lec = s.Total_lec)";
if($result = $conn->query($sql)){
  $row = $result->fetch_assoc();
  $subject = $row['Subject_ID'];
  $branch = $row['Branch_ID'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $api_key = test_input($_POST["api_key"]);
    // if($api_key == $api_key_value) {
        $id = test_input($_POST["id"]);

        $sql = "UPDATE attendance SET attended = attended + 1 WHERE Subject_ID = '$subject' AND Branch_ID = '$branch' AND Stud_ID = $id";
        if ($conn->query($sql)) {
            echo "Lecture attended";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    // }
    // else {
    //     echo "Wrong API Key provided.";
    // }
}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
