<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'New Lecture'; ?>
<?php include(SHARED_PATH.'/header.php'); ?>
    <navigation>
      <ul>
        <li><a href="<?php echo WWW_ROOT.'/staff/index.php' ?>" >Menu</a></li>
      </ul>
    </navigation>

    <div id="content">
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="branch">Branch</label> <input type="text" name="branch" value="CS" />       //change this with drop down
        <label for="name">Name</label> <input type="text" name="name" value="DSP_teacher" />    //change this with drop down
        <label for="subject">Subject</label> <input type="text" name="subject" value="CSC701" />    //change this with drop down
        <input type="submit" name="start" value="Start" />
        <input type="submit" name="done" value="Done" />
      </form>


<?php
$servername = "localhost";
$dbname = "attend_sys";
$username = "root";
$password = "";
if(array_key_exists('start',$_POST)){   //check if start button is clicked
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $subject = $_POST['subject'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "UPDATE staff SET Total_lec = Total_lec + 1 WHERE Name = '$name' AND subject_id = '$subject'"; //make changes in staff table
      if($conn->query($sql)){
        echo 'Lecture started';
      }
      else {
        echo mysqli_error($conn);
      }
    }
  }
}
else if(array_key_exists('done', $_POST)) {     //check if done button is clicked
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $subject = $_POST['subject'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
      $sql = "SELECT * from staff Where subject_id = '$subject'";   //check staff table for total lectures
      if($result = $conn->query($sql)){
          $row = $result->fetch_assoc();
          $new_total = $row["Total_lec"];
        }
      $sql = "UPDATE attendance SET Total_lec = $new_total WHERE subject_id = '$subject'";    //update attendance table with same total lectures as staff
      if($conn->query($sql)){
        echo 'Lecture ended';
      }
      else {
        echo mysqli_error($conn);
      }
    }
  }
}
?>
</div>

<?php include(SHARED_PATH.'/footer.php'); ?>
