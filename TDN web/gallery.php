<?php

require_once 'app/helpers.php';
session_start();

$page_title = 'Gallery Page';

?>

<?php include 'tpl/header.php'; ?>
<main class="min-height-600 galler">
  <section class="mt-5">
    <h1 id="galleryH1">Gallery</h1>
    <div class="container">
      <div class="justify-content-center softBack">
        <div class="col-12">
          <h4 class="font-weight-bold text-white">Welcome to the Gallery!</h4>
          <h5>Here you'll find a special collection travel images that were sent to us by our devoted users.<br> This is where we put the spotlight on those great shots that really caught our eye.</h5>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="galleryContainer">
      <div class="gallery">

        <figure class="gallery__item gallery__item--1 img__wrap" id="reveal">
          <a class="lightbox" href="#1">
            <img src="images/IMG_1410.jpg" alt="Gallery image 1" class="gallery__img">
            <h4 class="img__description">Jessica Alba - <br>Provence, France</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="1">
          <img src="images/IMG_1410.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--2 img__wrap" id="reveal">
          <a class="lightbox" href="#2">
            <img src="images/IMG_0235.jpg" alt="Gallery image 2" class="gallery__img">
            <h4 class="img__description">Tal Haim - <br>Mestia, Georgia</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="2">
          <img src="images/IMG_0235.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--3 img__wrap" id="reveal">
          <a class="lightbox" href="#3">
            <img src="images/IMG_0892.jpg" alt="Gallery image 3" class="gallery__img">
            <h4 class="img__description">Tal Haim - <br>Mestia, Georgia</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="3">
          <img src="images/IMG_0892.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--4 img__wrap" id="reveal">
          <a class="lightbox" href="#4">
            <img src="images/IMG_9719.jpg" alt="Gallery image 4" class="gallery__img">
            <h4 class="img__description">Johnny Depp - <br>Tel-Aviv, Israel</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="4">
          <img src="images/IMG_9719.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--5 img__wrap" id="reveal">
          <a class="lightbox" href="#5">
            <img src="images/IMG_6531-2.jpg" alt="Gallery image 5" class="gallery__img">
            <h4 class="img__description">Roberto Cavalli - <br>Madrid, Spain</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="5">
          <img src="images/IMG_6531-2.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--6 img__wrap" id="reveal">
          <a class="lightbox" href="#6">
            <img src="images/IMG_7703.jpg" alt="Gallery image 6" class="gallery__img">
            <h4 class="img__description">Eliran Buskila - <br>Utrecht, Netherlands</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="6">
          <img src="images/IMG_7703.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--7 img__wrap" id="reveal">
          <a class="lightbox" href="#7">
            <img src="images/IMG_6516.jpg" alt="Gallery image 6" class="gallery__img">
            <h4 class="img__description">Eliran Buskila - <br>Utrecht, Netherlands</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="7">
          <img src="images/IMG_6516.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--8 img__wrap" id="reveal">
          <a class="lightbox" href="#8">
            <img src="images/IMG_3587.jpg" alt="Gallery image 6" class="gallery__img">
            <h4 class="img__description">Jessica Alba - <br>Provence, France</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="8">
          <img src="images/IMG_3587.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--9 img__wrap" id="reveal">
          <a class="lightbox" href="#9">
            <img src="images/IMG_1401.jpg" alt="Gallery image 6" class="gallery__img">
            <h4 class="img__description">Tal Haim - <br>Heifa, Israel</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="9">
          <img src="images/IMG_1401.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--10 img__wrap" id="reveal">
          <a class="lightbox" href="#10">
            <img src="images/IMG_6514.jpg" alt="Gallery image 6" class="gallery__img">
            <h4 class="img__description">Eliran Buskila - <br>Utrecht, Netherlands</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="10">
          <img src="images/IMG_6514.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

        <figure class="gallery__item gallery__item--11 img__wrap" id="reveal">
          <a class="lightbox" href="#11">
            <img src="images/IMG_1899.jpg" alt="Gallery image 6" class="gallery__img">
            <h4 class="img__description">Tal Haim - <br>Heifa, Israel</h4>
          </a>
        </figure>

        <div class="lightbox-target" id="11">
          <img src="images/IMG_1899.jpg" />
          <a class="lightbox-close" href="#"></a>
        </div>

      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="justify-content-center softBack">
        <div class="col-12">
          <h4>Want your great photos to be posted here as well?</h4>
          <h5>Send them along with some descriptive text to eliran.bus@gmail.com </h5>
        </div>
      </div>
    </div>
  </section>
  <?php include 'tpl/footer.php'; ?>
</main>

</div>