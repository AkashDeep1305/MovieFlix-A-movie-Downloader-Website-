<?php
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connect.php");

    if (isset($_POST["update_profile"])) { // Profile update form submitted
        $username = $_POST["username"];
        $email = $_POST["email"];
        $o_password = $_POST["o-password"];
        $n_password = $_POST["n-password"];
        $c_password = $_POST["cpassword"];
        $profile_image = $_FILES["profile_image"]["name"];

        // Ensure session email is set
        if (!isset($_SESSION["email"])) {
            $showError = "Session expired. Please log in again.";
        } else {
            $session_email = $_SESSION["email"];

            // Fetch the current user data
            $stmt = $conn->prepare("SELECT * FROM `movieflix` WHERE email=?");
            $stmt->bind_param("s", $session_email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            // Update username and email without verifying old password
            $stmt = $conn->prepare("UPDATE `movieflix` SET username=?, email=? WHERE email=?");
            $stmt->bind_param("sss", $username, $email, $session_email);
            $stmt->execute();

            // Update password if new password is provided and matches the confirmation

             // Check if new password is provided
            if (!empty($n_password)) {
                // Ensure old password is provided
                if (empty($o_password)) {
                    $showError = "Old password is required to set a new password.";
                } else {
                    // Verify the old password
                    if (!password_verify($o_password, $user["password"])) {
                        $showError = "Incorrect old password.";
                    } else {
                        // Check if new password and confirm password match
                        if ($n_password === $c_password) {
                            $hash = password_hash($n_password, PASSWORD_DEFAULT);
                            $stmt = $conn->prepare("UPDATE `movieflix` SET password=? WHERE email=?");
                            $stmt->bind_param("ss", $hash, $session_email);
                            $stmt->execute();
                        } else {
                            $showError = "New passwords do not match.";
                        }
                    }
                }
            }

            // Update profile image if provided
            if (!empty($profile_image)) {
                $target_dir = "../profile_img/";
                $target_file = $target_dir . basename($profile_image);
                move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);
                $stmt = $conn->prepare("UPDATE `movieflix` SET profile_image=? WHERE email=?");
                $stmt->bind_param("ss", $profile_image, $session_email);
                $stmt->execute();
                $_SESSION["profile_image"] = $profile_image; // Update session variable
            }

            // Update session variables
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;


        }
    }
}
?>
