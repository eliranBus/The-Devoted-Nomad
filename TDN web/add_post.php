<?php

require_once 'app/helpers.php';
session_start();

if (!auth_user()) {

  header('location: signin.php');
  exit;
}

$page_title = 'Add Post Page';

$errors['title'] = $errors['article'] = '';

if (isset($_POST['submit'])) {

  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
  $form_valid = true;

  if (!$title || mb_strlen($title) < 3 || mb_strlen($title) > 255) {
    $errors['title'] = 'Title is required for min:3 and max:255';
    $form_valid = false;
  }

  if (!$article || mb_strlen($article) < 3) {
    $errors['article'] = 'Article is required for min:3 chars';
    $form_valid = false;
  }

  if ($form_valid) {

    $uid = $_SESSION['user_id'];
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
    mysqli_set_charset($link, 'utf8');
    $title = mysqli_real_escape_string($link, $title);
    $article = mysqli_real_escape_string($link, $article);
    $sql = "INSERT INTO posts VALUES(null,$uid,'$title','$article',NOW())";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_affected_rows($link) > 0) {

      header('location: blog.php');
      exit;
    }
  }
}


?>

<?php include 'tpl/header.php'; ?>
<main class="min-height-600 addPost">
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-12">
        <h1 class="display-4">Add A New Post</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5 softBack">
        <form action="" method="POST" novalidate="novalidate" autocomplete="off">
          <div class="form-group">
            <label for="title">* Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= old('title'); ?>">
            <span class="text-danger"><?= $errors['title']; ?></span>
          </div>
          <div class="form-group">
            <label for="article">* Article:</label>
            <textarea name="article" class="form-control" id="article" cols="30" rows="10"><?= old('article'); ?></textarea>
            <span class="text-danger"><?= $errors['article']; ?></span>
          </div>
          <button name="submit" class="btn btn-primary button" type="submit">Save Post</button>
          <a class="btn btn-secondary button" href="blog.php">Cancel</a>
        </form>
      </div>
    </div>
  </div>
  <?php include 'tpl/footer.php'; ?>
</main>