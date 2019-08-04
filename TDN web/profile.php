<?php

require_once 'app/helpers.php';
session_start();

if (!auth_user()) {

  header('location: signin.php');
  exit;
}

$page_title = 'Profile Page';

$uid = $_SESSION['user_id'];

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
mysqli_query($link, "SET NAMES utf8");
$sql = "SELECT u.name, u.email, up.avatar
        FROM users u 
        JOIN users_profile up ON u.id = up.user_id
        where u.id = $uid";
$result = mysqli_query($link, $sql);
$post = mysqli_fetch_assoc($result);

$errors = [
  'name' => '',
  'email' => '',
  'password' => '',
];

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
    } elseif ($email != $_POST['email']) {
      if (email_exist($email, $link)) {
        $errors['email'] = '* Email address is taken';
      }
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

      $uid = $_SESSION['user_id'];
      $password = password_hash($password, PASSWORD_BCRYPT);
      $sql = "UPDATE users u
              SET u.name = '$name', u.email = '$email', u.password = '$password'
              WHERE id = $uid";
      $result = mysqli_query($link, $sql);

      $uid = $_SESSION['user_id'];
      $sql = "UPDATE users_profile up
              SET up.avatar = '$file_name'
              WHERE up.user_id = $uid";
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

  $token = csrf_token();
} else {

  $token = csrf_token();
}
// echo "<pre>";
// print_r($_SESSION);
// die;
?>

<?php include 'tpl/header.php'; ?>

<main class="min-height-600 profile">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1 id="profileTitle">User Profile</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8 softBack2">
        <img src="images/<?= $post['avatar'] ?>" alt="avatar" class="img-thumbnail float-center profileImage mb-3">
        <h5 class="display-4 ml-3 mb-3">Hello <?= $_SESSION['user_name'] ?>,</h5>
        <p class="col-md-12 text-justify">Here you can review your user profile information added upon signup. If you wish to update the data, you can simply edit the inputs below and click on the "Update profile" button. Please note that in case you choose to update one detail or more, all inputs must be filled (even if there is no change).</p>
        <div class="row justify-content-center mt-5">
          <form class="col-md-8" method="POST" action="" autocomplete="off" novalidate="novalidate" enctype="multipart/form-data">
            <input type="hidden" name="token" value="<?= $token; ?>">
            <div class="form-group">
              <label for="name">* Name:</label>
              <input type="text" value="<?= $_SESSION['user_name']; ?>" name="name" id="name" class="form-control" placeholder="Your Name Here..."> <span class="text-danger"><?= $errors['name']; ?></span>
            </div>
            <div class="form-group">
              <label for="email">* Email:</label>
              <input type="email" value="<?= $post['email'] ?>" name="email" id="email" class="form-control" placeholder="Your Email Here...">
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
                <label class="custom-file-label text-left" for="inputGroupFile01"><?= $post['avatar'] ?></label>
                <input type="file" name="image" class="custom-file-input" id="image">
              </div>
            </div>
            <button id="signup" type="submit" name="submit" class="btn btn-primary mt-5 button">Update Profile</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include 'tpl/footer.php'; ?>
</main>