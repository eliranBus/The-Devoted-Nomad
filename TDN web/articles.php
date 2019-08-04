<?php

require_once 'app/helpers.php';
session_start();

$postDate = function ($str) {
  $date = strtotime($str);
  $now = time();
  $datediff = $now - $date;
  return round($datediff / (60 * 60 * 24));
};

$page_title = 'Articles & Stories Page';

?>

<?php include 'tpl/header.php'; ?>
<main class="min-height-600 articles">
  <section class="container mt-5">
    <h1 id="articleH1">Articles <span style="font-family:Amatic sc; font-weight:700">&</span> Stories</h1>
    <h4 class="font-weight-bold text-white text-center mb-5">From our favourite travel blogs:</h4>
    <div class="row">
      <div class="col-md-5 mb-4">
        <div class="list-group">
          <div class="row col-md-10" id="list-group">
            <h4 class="font-weight-bold text-white"><span class="text-warning">R&K:</span> Selected Articles</h4>
            <a href="https://roadsandkingdoms.com/2019/know-before-you-go-to-chicago/" target="blank" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 col-9 text-info">KNOW BEFORE YOU GO: CHICAGO</h5>
                <small class="text-muted"><?= $postDate("2019-07-19"); ?> days ago</small>
              </div>
              <p class="mb-1">How to survive the weather and how to eat a hot dog: A guide to the heart of the Midwest.</p>
              <small class="text-primary float-right">Read More</small>
            </a>
            <a href="https://roadsandkingdoms.com/2019/know-before-you-go-to-delhi/" target="blank" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 col-9 text-info">22 THINGS TO KNOW ABOUT DELHI</h5>
                <small class="text-muted"><?= $postDate("2019-07-5"); ?> days ago</small>
              </div>
              <p class="mb-1">Where to stay, eat, drink, and party in India’s capital.</p>
              <small class="text-primary float-right">Read More</small>
            </a>
            <a href="https://www.atlasandboots.com/things-to-do-in-the-faroe-islands/" target="blank" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 col-9 text-info">TEACH A MAN TO FISH</h5>
                <small class="text-muted"><?= $postDate("2019-06-21"); ?> days ago</small>
              </div>
              <p class="mb-1">Turkey's fish crisis.</p>
              <small class="text-primary float-right">Read More</small>
            </a>
            <a href="https://roadsandkingdoms.com/2019/borders-of-water/" target="blank" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 col-9 text-info">BORDERS OF WATER</h5>
                <small class="text-muted"><?= $postDate("2019-05-02"); ?> days ago</small>
              </div>
              <p class="mb-1">Canada’s mining industry clashes with Alaskan tribes and state government over practices on transboundary watersheds.</p>
              <small class="text-primary float-right">Read More</small>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <h4 class="font-weight-bold text-white"><span class="text-warning">Maptia:</span> Selected Stories</h4>
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a href="https://maptia.com/daisygilardini/stories/voices-from-a-melting-world" target="blank">
                  <img src="images/menglong-bao-qPvyQxkQK0k-unsplash.jpg" class="d-block w-100" alt="polar bear">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-body">Voices From A Melting World</h5>
                    <p class="text-body">A story about conservation and hope by Daisy Gilardini.</p>
                  </div>
                </a>
              </div>
              <div class="carousel-item">
                <a href="https://maptia.com/marcuswestberg/stories/the-lion-guardians" target="blank">
                  <img src="images/lion-588144_1920.jpg" class="d-block w-100" alt="A lion">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>The Lion Guardians</h5>
                    <p>A story about a human-wildlife conflict by Marcus Westberg.</p>
                  </div>
                </a>
              </div>
              <div class="carousel-item">
                <a href="https://maptia.com/tonywu/stories/a-gathering-of-giants" target="blank">
                  <img src="images/ocean-2051760_1920.jpg" class="d-block w-100" alt="A whale">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>A Gathering of Giants</h5>
                    <p>Tony Wu has been engaged in a dramatic frenzy of physical contact and biosonar communication, and lived to tell the tale.</p>
                  </div>
                </a>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'tpl/footer.php'; ?>
</main>