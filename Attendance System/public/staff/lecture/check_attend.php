<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Check Attendance'; ?>
<?php include(SHARED_PATH.'/header.php'); ?>
    <navigation>
      <ul>
        <li><a href="<?php echo WWW_ROOT.'/staff/index.php' ?>" >Back</a></li>
      </ul>
    </navigation>

    <div id="content">
      <form action="mark_attend.php" method="post">
        <label for="id">ID</label><input type="text" name="id" />
        <input type="submit" value="Submit" /> //Dummy value for marking attendance with sensor
      </form>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
      <label for="subject"></label><input type="text" name="subject" value="CSC701" />
      <input type="submit" value="Submit">
    </form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $subject_id = $_POST['subject'];
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  else {
    $sql = "SELECT st.name as student, b.name as branch, s.name as subject, a.attended, a.Total_lec from attendance as a, branch as b, subjects as s, students as st WHERE subject_id='$subject_id' and b.ID = a.Branch_ID and s.ID = a.Subject_ID and st.ID = a.Stud_ID";

    echo '<table cellspacing="5" cellpadding="5">
      <tr>
        <td>Student</td>
        <td>Branch</td>
        <td>Subject</td>
        <td>Attended</td>
        <td>Total Lectures</td>
      </tr>';
    if($result = $conn->query($sql)){
        while($row = $result->fetch_assoc()){
          $row_name = $row['student'];
          $row_br = $row['branch'];
          $row_sub = $row['subject'];
          $row_attended = $row['attended'];
          $row_total = $row['Total_lec'];
          echo '<tr>
                  <td>' . $row_name . '</td>
                  <td>' . $row_br . '</td>
                  <td>' . $row_sub . '</td>
                  <td>' . $row_attended . '</td>
                  <td>' . $row_total . '</td>
                </tr>';
              }
        }
    }
  }
?>

</div>
<div class="foot">
  <?php include(SHARED_PATH.'/footer.php'); ?>
</div>
