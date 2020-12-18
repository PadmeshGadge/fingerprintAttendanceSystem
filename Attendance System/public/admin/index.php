<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Admin Area'; ?>
<?php include(SHARED_PATH.'/header.php'); ?>
    <navigation>
      <ul>
        <li><a href="../index.php">Logout</a></li>
      </ul>
    </navigation>

    <div id="content">
      <form method="post">
        <input class="btn" type="submit" name="view-staff" value="VIEW STAFF" />
        <input class="btn" type="submit" name="edit-staff" value="EDIT STAFF" />
        <input class="btn" type="submit" name="add-subject" value="ADD/ASSIGN SUBJECT" />
      </form>

<?php
  if(array_key_exists('view-staff',$_POST)){
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
      echo '<table cellspacing="5" cellpadding="5">
        <tr>
          <td>Name</td>
          <td>Subject</td>
          <td>Total lectures</td>
          <td>Branch</td>
        </tr>';
      $sql = "SELECT s.name as name, sb.name as subject, Total_lec, b.name as branch from staff s, subjects sb, branch b WHERE s.Subject_ID = sb.ID AND s.Branch_ID = b.ID";
      if($result = $conn->query($sql)){
          while($row = $result->fetch_assoc()){
            $row_name = $row['name'];
            $row_sub = $row['subject'];
            $row_total = $row['Total_lec'];
            $row_br = $row['branch'];
            echo '<tr>
                    <td>' . $row_name . '</td>
                    <td>' . $row_sub . '</td>
                    <td>' . $row_total . '</td>
                    <td>' . $row_br . '</td>
                  </tr>';
          }
      }
    $result->free();
    }
  }
?>
</div>
<div class="foot" >
  <?php include(SHARED_PATH.'/footer.php'); ?>
</div>
