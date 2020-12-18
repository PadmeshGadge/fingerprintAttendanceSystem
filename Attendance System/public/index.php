<?php require_once('../private/initialize.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href='stylesheets/login.css' >
    <title>Attendance System</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="box">
    <h1>Login to continue</h1>

    <input type="text" name="username" value="username" onFocus="field_focus(this, 'username');" onblur="field_blur(this, 'username');" class="email" />

    <input type="password" name="password" value="email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />

    <input class="btn" type="submit" value="Login" />

    </div>
    </form>
  </body>
</html>
<script type="text/javascript">
function field_focus(field, username)
{
  if(field.value == username)
  {
    field.value = '';
  }
}

function field_blur(field, email)
{
  if(field.value == '')
  {
    field.value = email;
  }
}

//Fade in dashboard box
$(document).ready(function(){
  $('.box');
  });

//Stop click event
$('a').click(function(event){
  event.preventDefault();
});
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  else {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    if($name == 'admin' && $pass == 'admin')
    {
      header('Location: '.WWW_ROOT.'/admin/index.php');
    }
    $sql = "SELECT * FROM `staff` WHERE Name='$name' AND password='$pass'";   //check staff table for total lectures
    if($result = $conn->query($sql)){
        if($row = $result->fetch_assoc()){
          $conn->close();
          header('Location: '.WWW_ROOT.'/staff/index.php');
        }
    }
    else {
      echo mysqli_error($conn);
    }
  }
}
?>
