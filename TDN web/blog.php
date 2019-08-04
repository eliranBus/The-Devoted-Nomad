<?php

require_once 'app/helpers.php';
session_start();

$page_title = 'Posts Page';

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
mysqli_query($link, "SET NAMES utf8");
$sql = "SELECT u.name,up.avatar,p.*,DATE_FORMAT(p.date,'%d/%m/%Y %H:%i:%s') pdate 
        FROM posts p 
        JOIN users u ON u.id = p.user_id
        JOIN users_profile up ON u.id = up.user_id
        ORDER BY p.date DESC";

$result = mysqli_query($link, $sql);

$uid = $_SESSION['user_id'] ?? false;

?>

<?php include 'tpl/header.php'; ?>
<main class="min-height-600 blog">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1 class="display-4">Posts</h1>
        <p class="mt-3">
          <?php if (auth_user()) : ?>
            <a class="btn btn-primary button" href="add_post.php"><i class="fa fa-plus"></i>&nbsp Add New Post</a>
          <?php else : ?>
            <a class="btn btn-primary button" href="signup.php">Open account and start sharing</a>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <?php if ($result && mysqli_num_rows($result) > 0) : ?>
      <div class="row">
        <?php while ($post = mysqli_fetch_assoc($result)) : ?>
          <div class="col-12 mt-2">
            <div class="card mb-3" id="reveal">
              <div class="card-header bg-info">
                <span>
                  <img id="zoomable" width="80" class="img-thumbnail mr-2" src="images/<?= $post['avatar']; ?>" alt="User avatar image">
                  <strong id="postName"><?= htmlentities($post['name']); ?></strong>
                </span>
                <span class="float-right"><?= $post['pdate']; ?></span>
              </div>
              <div class="card-body">
                <h4><?= htmlentities($post['title']); ?></h4>
                <p><?= str_replace("\n", '<br>', htmlentities($post['article'])); ?></p>
                <?php if ($uid && $uid == $post['user_id']) : ?>
                  <div class="dropdown float-right">
                    <button class="btn btn-secondary dropdown-toggle button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="edit_post.php?pid=<?= $post['id']; ?>"><i class="fas fa-pencil-alt" aria-hidden="true"></i>&nbsp Edit</a>
                      <a class="dropdown-item delete-post-btn" href="delete_post.php?pid=<?= $post['id']; ?>">
                        <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>&nbsp Delete
                      </a>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php include 'tpl/footer.php'; ?>
</main>