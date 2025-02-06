<?php 
  include ('data/login.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="icon.png" type="image/x-icon"/>
  <link rel="stylesheet" type="text/css" href="css/x.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>MovieFlix | Movie & Series</title>

</head>

<body>
  <header>
    <h2 class="logo">
    <a>
         Movie <span>flix</span>
    </a>
    <h2>
    <nav class="navigation">
      <a id="home">Home</a>
      <a href="ABOUT FLIX.txt" target="_blank">About</a>
      <button class="btnlogin">Login</button>
    </nav>

  </header>

  <nav class="nav">
      <?php if(isset($showError) && !empty($showError)){
      echo '<div class="alert alert-danger" role="alert">
      <strong>Error!</strong> '.$showError.'
      <button type="button" class="btn-close btn-cl" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>';
    }
    ?>
      <?php if(isset($showWarn) && !empty($showWarn)){
      echo '<div class="alert alert-warning" role="alert">
      <strong>Warning!</strong> '.$showWarn.'
      <button type="button" class="btn-close btn-cl1" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>';
    }
    ?>
  </nav>

  <div class="container">
    <span>The biggest Bollywood & Hollywood hits. Ready to watch here</span>
    <span>Join today. Cancel anytime.</span>
    <span>Ready to watch? Enter your email to create or restart your membership.</span>
    <span style="color: yellow; font-weight: bold;">This Project is Just for Educational Purpose only.</span>
  </div>
  <div class="wrapper">
    <span class="icon-close"><i class="bi bi-x"></i></span>
    <div class="form-box login">
      <h2>Login</h2>
      <form method = "post">
        <div class="input-box">
          <span class="icon"><i class="bi bi-envelope"></i></span>
          <input type="email" id="email" name="email" required autocomplete="on">
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon ic-login"><i class="bi bi-shield-lock" onclick="show('login')"></i></span>
          <input id="login-password" type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot" id="rem">
          <label><input type="checkbox">Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn" name='submit'>Login</button>
        <div class="login-register">
          <p>Don't have a account?<a class="register-link"> Register</a></p>
        </div>
      </form>
      <div class="line"></div>
      <div class="social-media">
        <a href="index.php" class="field facebook"><i class="bi bi-facebook"></i><span>Login with facebook</span></a>
      </div>
      <div class="social-media">
        <a href="index.php" class="field google"><i class="bi bi-google"></i><span>Login with Google</span></a>
      </div>

    </div>
    <div class="form-box register">
      <h2>Create Account</h2>
      <form method="post">
        <div class="input-box">
          <span class="icon"><i class="bi bi-person-circle"></i></span>
          <input type="text" id="username" name="username" required autocomplete="on">
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><i class="bi bi-envelope"></i></span>
          <input type="text" id="current-email" name="email-reg" required autocomplete="on">
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon ic-register" ><i class="bi bi-shield-lock" onclick="show('register')"></i></span>
          <input id="register-password" type="password" name="password-reg" required>
          <label>Set Password</label>
        </div>
        <div class="input-box">
          <span class="icon ic-regist" ><i class="bi bi-shield-lock" onclick="show('regist')"></i></span>
          <input id="regist-password" type="password" name="cpassword-reg" required>
          <label>Confirm Password</label>
        </div>
        <div class="remember-forgot"id="rem" >
          <label><input type="checkbox" name = "terms" >I agree to the <a href="FLIX TERMS AND CONDITIONS.txt" target="_blank">terms & conditions</a></label>
        </div>
        <button type="submit" class="btn" name="submit-reg">Sign up</button>
        <div class="login-register">
          <p>Already have a account?<a class="login-link"> Login</a></p>
        </div>
      </form>
      <div class="line"></div>
      <div class="social-media">
        <a href="index.php" class="field facebook"><i class="bi bi-facebook"></i><span>Register with facebook</span></a>
      </div>
      <div class="social-media">
        <a href="index.php" class="field google"><i class="bi bi-google"></i><span>Register with Google</span></a>
      </div>
    </div>
  </div>
  <script src="js/x.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>