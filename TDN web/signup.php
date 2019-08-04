<?php

require_once 'app/helpers.php';
session_start();

if (auth_user()) {

  header('location: ./');
  exit;
}

$errors = [
  'name' => '',
  'email' => '',
  'password' => '',
];

$page_title = 'Signup Page';

if (isset($_POST['submit'])) {

  if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {

    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
    mysqli_set_charset($link, 'utf8');
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($link, $name);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $email = mysqli_real_escape_string($link, $email);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($link, $password);
    $form_valid = true;

    if (!$name || mb_strlen($name) < 2 || mb_strlen($name) > 255) {

      $errors['name'] = '* Name is reuqired for min: 2 chars and max: 255 chars';
      $form_valid = false;
    }

    if (!$email) {
      $errors['email'] = '* A valid email is required';
      $form_valid = false;
    } elseif (email_exist($email, $link)) {
      $errors['email'] = '* Email address is taken';
      $form_valid = false;
    }

    if (!$password || mb_strlen($password) < 6 || mb_strlen($password) > 20) {
      $errors['password'] = '* A password is required for min: 6 chars and max: 20 chars';
      $form_valid = false;
    }

    $file_name = 'default_avatar.png';


    if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {

      $ex = ['png', 'jpeg', 'gif', 'jpg', 'bmp'];
      define('MAX_UPLOAD_SIZE', 1024 * 1024 * 5);

      if (isset($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

        if (isset($_FILES['image']['size']) &&  $_FILES['image']['size'] <= MAX_UPLOAD_SIZE) {

          $parts = pathinfo($_FILES['image']['name']);

          if (in_array(strtolower($parts['extension']), $ex)) {

            $file_name = date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $file_name);
          }
        }
      }
    }

    if ($form_valid) {

      $password = password_hash($password, PASSWORD_BCRYPT);
      $sql = "INSERT INTO users VALUES(null,'$name','$email','$password')";
      $result = mysqli_query($link, $sql);

      if ($result && mysqli_affected_rows($link) > 0) {

        $uid = mysqli_insert_id($link);
        $sql = "INSERT INTO users_profile VALUES(null,$uid,'$file_name')";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_affected_rows($link) > 0) {
          $_SESSION['user_id'] = $uid;
          $_SESSION['user_name'] = $name;
          $_SESSION['user_email'] = $email;
          $_SESSION['user_avatar'] = $file_name;
          $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
          $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
          header('location: blog.php');
        }
      }
    }
  }

  $token = csrf_token();
} else {

  $token = csrf_token();
}

?>

<?php include 'tpl/header.php'; ?>
<main class="min-height-600 signup">
  <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-12">
          <h1 class="display-4 mb-5">Signup for new account</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 softBack mt-2">
          <form method="POST" action="" autocomplete="off" novalidate="novalidate" enctype="multipart/form-data">
            <input type="hidden" name="token" value="<?= $token; ?>">
            <div class="form-group">
              <label for="name">* Name:</label>
              <input type="text" value="<?= old('name'); ?>" name="name" id="name" class="form-control" placeholder="Your Name Here..."> <span class="text-danger"><?= $errors['name']; ?></span>
            </div>
            <div class="form-group">
              <label for="email">* Email:</label>
              <input type="email" value="<?= old('email'); ?>" name="email" id="email" class="form-control" placeholder="Your Email Here...">
              <span class="text-danger"><?= $errors['email']; ?></span>
            </div>
            <div class="form-group">
              <label for="password">* Password:</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Preferred Password Here...">
              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              <span class="text-danger"><?= $errors['password']; ?></span>
            </div>
            <div class="form-group">
              <label for="image">Profile Image:</label>
            </div>
            <div class="input-group mb-3">
              <div class="custom-file">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                <input type="file" name="image" class="custom-file-input" id="image">
              </div>
            </div>
            <div class="form-group">
              <input id="18" type="checkbox" class="mr-2" onchange="enable()">
              <label for="image" class="mt-5">* I am over the age of 16</label>
            </div>
            <button id="signup" type="submit" name="submit" class="btn btn-primary mt-2 button mb-4" disabled>Sign Up</button>
            <p>Already have an account? <a class="font-weight-bold" href="signin.php">Sign In</a></p>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php include 'tpl/footer.php'; ?>
</main>