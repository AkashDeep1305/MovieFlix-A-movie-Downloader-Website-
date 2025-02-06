<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: ../x.php");
    exit;
}

  include ('update.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/m.css">
  <link rel="shortcut icon" href="../icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>MovieFlix | Movie & Series</title>
</head>

<body>
  <nav class="nav">
      <?php if(isset($showError) && !empty($showError)){
      echo '<div id ="error-alert" class="alert alert-danger" role="alert">
      <strong>Error!</strong> '.$showError.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>';
    }
    ?>
  </nav>
  <div class="wrapper">
    <div class="form-box">
      <h3>Manage Profile</h3>
      <form method="post" enctype="multipart/form-data">
        <div class="input-box">
          <label for="username">Username:</label>
          <span class="icon"><i class="bi bi-person-circle"></i></span>
          <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" autocomplete="off" autocapitalize="on">
        </div>
        <div class="input-box">
          <label for="email">Email:</label>
          <span class="icon"><i class="bi bi-envelope"></i></span>
          <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" autocomplete="off">
        </div>
        <div class="input-box">
          <label for="o-password">Old Password:</label>
          <span class="icon ic-o"><i class="bi bi-shield-lock" onclick="show('o')"></i></span>
          <input type="password" id="o-password" name="o-password" autocomplete="off">
        </div class="input-box">
        <div class="input-box">
          <label for="n-password">New Password:</label>
          <span class="icon ic-n"><i class="bi bi-shield-lock" onclick="show('n')"></i></span>
          <input type="password" id="n-password" name="n-password" autocomplete="off">
        </div>
        <div class="input-box">
          <label for="c-password">Confirm New Password:</label>
          <span class="icon ic-c"><i class="bi bi-shield-lock" onclick="show('c')"></i></span>
          <input type="password" id="c-password" name="cpassword" autocomplete="off">
        </div>
        <div class="box">
          <label for="profile_image">Profile Image:</label>
          <input type="file" id="profile_image" name="profile_image">
        </div>
        <div>
          <button class="btun" type="submit" name="update_profile">Update Profile</button>
        </div>
        <div>
          <a id="go-back" class="back  del-btn">Go Back</a>
        </div>
      </form>
    </div>
  </div>

  <script src="../js/m.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>