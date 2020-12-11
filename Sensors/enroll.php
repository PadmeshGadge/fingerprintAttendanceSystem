<!DOCTYPE html>
<html><body>
<?php
$servername = "localhost";
$dbname = "test";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>

<form name="student-data" action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
  <label for="Name">Name</label> <input type="text" name="Name">
  <label for="Branch">Branch</label> <input type="text" name="Branch">
  <input type="submit" value="Submit">
</form>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = test_input($_POST["Name"]);
  $branch = test_input($_POST["Branch"]);
  $sql = "Insert into stud_data(Name,Branch) values('$name','$branch')";
  if(empty($name) || empty($branch)){
    echo '<script>alert("Please fill all values")</script>';
  }
  else{
    if($conn->query($sql) === TRUE){
      echo "Record inserted";
    }
    else {
      echo "Failed";
    }
  }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$sql = "SELECT id, name, branch FROM stud_data ORDER BY id";

echo '<table cellspacing="5" cellpadding="5">
      <tr>
        <td>ID</td>
        <td>NAME</td>
        <td>BRANCH</td>
      </tr>';

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_name = $row["name"];
        $row_branch = $row["branch"];
        echo '<tr>
                <td>' . $row_id . '</td>
                <td>' . $row_name . '</td>
                <td>' . $row_branch . '</td>
              </tr>';
    }
    $result->free();
}
?>
</body>
</html>
