<?php

require_once 'app/helpers.php';
session_start();

if (auth_user()) {

  header('location: ./');
  exit;
}

$page_title = 'Signin Page';
$error = '';

// אם הגולש לחץ על הכפתור - הוא באיטרקציה עם הטופס ולא רק הגיע
if (isset($_POST['submit'])) {

  if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {

    // איסוף הנתונים מהטופס למשתנים פשוטים

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // ולידיצה מוקדמת ובסיסית לפני אימות הנתונים
    if (!$email) {
      $error =  '* A valid email is required';
    } elseif (!$password) {
      $error = '* Password is required';
    } else {

      // יצירת חיבור לבסיס הנתונים
      $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
      $email = mysqli_real_escape_string($link, $email);
      $password = mysqli_real_escape_string($link, $password);
      $sql = "SELECT u.*, up.avatar
      FROM users u 
      JOIN users_profile up ON u.id = up.user_id
      WHERE email = '$email' LIMIT 1";
      $result = mysqli_query($link, $sql);

      // אם השאילתה נכונה והתקבל משאב מידע וכן יש רשומה אחת
      if ($result && mysqli_num_rows($result) == 1) {

        // email and password are ok!
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

          $_SESSION['user_id'] = $user['id'];
          $_SESSION['user_name'] = $user['name'];
          $_SESSION['user_email'] = $user['email'];
          $_SESSION['user_avatar'] = $user['avatar'];
          $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
          $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
          header('location: ./');
        } else {

          $error = ' * Wrong email and password combination';
        }
      } else {

        $error = ' * Wrong email and password combination';
      }
    }
  }

  $token = csrf_token();
} else {

  $token = csrf_token();
}

?>

<?php include 'tpl/header.php'; ?>
<section>
  <main class="min-height-600 signin">
    <div class="container mt-5 ">
      <div class="row">
        <div class="col-12">
          <h1 class="display-4">Signin to your account</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 softBack mt-3">
          <form method="POST" action="" autocomplete="off" novalidate="novalidate">
            <input type="hidden" name="token" value="<?= $token; ?>">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" value="<?= old('email'); ?>" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" class="form-control">
              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-4 mb-3 button">Sign In</button>
            <span class="text-danger"><?= $error; ?></span>
            <p>Don't have an accout yet? <a href="signup.php">Sign Up</a></p>
          </form>
        </div>
      </div>
    </div>
    <?php include 'tpl/footer.php'; ?>
  </main>
</section>