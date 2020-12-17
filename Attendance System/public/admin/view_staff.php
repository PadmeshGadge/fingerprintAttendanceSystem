<?php
  function view(){
    $servername = "localhost";
    $dbname = "attend_sys";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
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
  mysqli->close();
}
?>
