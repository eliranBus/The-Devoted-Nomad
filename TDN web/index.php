<?php

require_once 'app/helpers.php';
session_start();
$page_title = 'Home Page';

?>

<?php include 'tpl/header.php'; ?>
<main class="min-height-600 home">
  <section class="container mt-3">
    <div class="row">
      <div class="col-12">
        <section id="join-us" class="text-center">
          <h1 class="title"><span class="capitol">T</span>he <span class="capitol">D</span>evoted <span class="capitol">N</span>omad</h1>
          <p id="subTitle">In Your Nature.</p>
          <?php if (auth_user()) : ?>
            <p>
              <a class="btn btn-outline-dark font-weight-bold btn-lg m-5 button" href="blog.php">Start Posting</a>
            <?php else : ?>
              <a class="btn btn-outline-dark font-weight-bold btn-lg m-5 button" href="signup.php">Create a user</a>
            </p>
          <?php endif; ?>
        </section>
      </div>
    </div>
  </section>
  <?php include 'tpl/footer.php'; ?>
</main>