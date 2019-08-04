<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="icon" href="images/pines-576313_1280.png" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Dosis|Tulpen+One|Gilda+Display|Six+Caps|Amatic+SC|Dancing+Script|Cabin+Sketch" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="http://static.tumblr.com/xz44nnc/o5lkyivqw/jquery-1.3.2.min.js"></script>
  <title>TDN | <?= $page_title; ?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand text-primary text-center" href="./"><img id="navImage" src="images/biology-161716_1280.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="articles.php">Articles & Stories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <?php if (!auth_user()) : ?>
              <li class="nav-item">
                <a class="nav-link" href="signin.php"><i class="fas fa-sign-in-alt"></i>&nbsp Signin </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php">Signup &nbsp<i class="fas fa-user-plus"></i></a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="profile.php"><i class="fas fa-user"></i>&nbsp <?= htmlentities($_SESSION['user_name']); ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout &nbsp<i class="fas fa-sign-out-alt"></i></a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <a href="#content" class="back-to-top">Top</a>
  </header>