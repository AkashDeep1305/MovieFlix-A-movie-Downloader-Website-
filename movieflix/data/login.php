<?php
  $showError = false;
  $showWarn = false;
  $login = false;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("data/connect.php");

    if (isset($_POST["submit-reg"])) { // Registration form submitted
      // Check if the terms and conditions are agreed to
      if (!isset($_POST['terms'])) {
        $showWarn = "Please agree to the terms and conditions before signing up.";
      } else {
      $username = $_POST["username"];
      $email = $_POST["email-reg"];
      $password = $_POST["password-reg"];
      $cpassword = $_POST["cpassword-reg"];

      // Check if user already exists
      $existsSql = "SELECT * FROM `movieflix` WHERE email=?";
      $stmt = $conn->prepare($existsSql);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      $numRows = $result->num_rows;
      if ($numRows > 0) {
        $showWarn = "Account already exists.";
      } else {
        if ($password != $cpassword) {
          $showError = "Passwords do not match";
        } else {
          // Hash the password
          $hash = password_hash($password, PASSWORD_DEFAULT);

          // Get a random image for the profile
          function getRandomImage() {
              $imageDirectory = 'profile_img/';
              $images = glob($imageDirectory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
              $randomImage = $images[array_rand($images)];
              return $randomImage;
          }

          $randomImage = getRandomImage();
          $profileImageName = basename($randomImage);

          // Use a prepared statement to prevent SQL Injection
          $stmt = $conn->prepare("INSERT INTO `movieflix` (`username`, `email`, `password`, `profile_image`, `dt`) VALUES (?, ?, ?, ?, current_timestamp())");
          $stmt->bind_param("ssss", $username, $email, $hash, $profileImageName);
          if ($stmt->execute()) {
            // Start session and set session variables after successful registration
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["profile_image"] = $profileImageName;

            // Redirect to index.php
            header("location: index.php");
            exit(); // Make sure the script stops after the redirect
          } else {
            $showError = "Error in registration.";
            }
          }
        }
      }
    } elseif (isset($_POST["submit"])) { // Login form submitted
      $email = $_POST["email"];
      $password = $_POST["password"];

      // Check if user with given email exists
      $Sql = "SELECT * FROM `movieflix` WHERE email=?";
      $stmt = $conn->prepare($Sql);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $results = $stmt->get_result();
      $num = $results->num_rows;
      if ($num == 1) {
        $user = $results->fetch_assoc();
        $hashed_password = $user["password"];
        if (password_verify($password, $hashed_password)) {
          $login = true;
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["username"] = $user["username"];
          $_SESSION["email"] = $user["email"];
          $_SESSION["profile_image"] = $user["profile_image"];
          header("location: index.php");
        } else {
          $showError = "Invalid Password Credentials";
        }
      } else {
        $showError = "Invalid Email Credentials";
      }
    }  
  }
?>