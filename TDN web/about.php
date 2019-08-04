<?php

require_once 'app/helpers.php';
session_start();
$page_title = 'About Us';

?>

<?php include 'tpl/header.php'; ?>

<section>
  <div class="container-fluid" id="aboutSec">
    <div class="row mw-100 mh-100 justify-content-center text-center">
      <div class="col-9 mt-5">
        <h2 class="mb-5">At The Devoted Nomad, our mission is to awaken the fundamental need for <span id="wandering">wandering </span>through sharing of travel knowledge.</h2>
        <div id="read-on">
          <a class="text-canter text-light" href="#about">READ ON<br><i class="fas fa-sort-down"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <main class="min-height-600 about" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <img width="80px" src="images/biology-161716_1280.png" alt="tree-logo" class="mt-5 mb-2">
      </div>
      <div class="row">
        <div>
          <h1 class="display-4">About The Devoted Nomad</h1>
          <div class="row justify-content-center">
            <div class="col-7 softBack quotations">
              <i class="fas fa-quote-left mb-5 quotation"></i>
              <p>The Devoted Nomad is a multi-user thought-sharing platform, inspired by pure love for traveling and adventure.</p>
              <p>TDN is dedicated to a simple idea: the more you know, the better you travel. We aim to use collective knowlege and experience to inspire about destinations around the globe.</p>
              <p>By Jeep, by kayak, by plane and most of all on foot, travel writing can be funny, powerful and personal. TDN is the place to share and record those unforgettable moments experienced in far away lands, and to get inspired by those of others. </p>
              <p>So go ahead and explore, it's your nature.</p>
              <i class="fas fa-quote-right mt-5 quotation"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'tpl/footer.php'; ?>
</section>
</main>