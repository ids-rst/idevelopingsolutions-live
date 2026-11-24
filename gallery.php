<?php include 'header.php';?>
<div class="rs-breadcrumbs cs-gallery img4 our-team">
   <div class="breadcrumbs-inner cs-space text-center">
      <h1 class="page-title">Our Gallery</h1>
      <ul>
         <li title="Home">
            <a class="active" href="index.php">Home</a>
         </li>
         <li>Our Gallery</li>
      </ul>
   </div>
</div>
<div class="rs-team modify1 pt-120 pb-95 md-pt-80 md-pb-75">
  <div class="container">
    <div class="sec-title2 text-center mb-45">
      <h2 class="title title2">Our Gallery</h2>
      <div class="heading-line"></div>
      <div class="desc desc2 custom-desc2">
        We have a team of professionals with years of experience, knowledge, and skills in all the latest technologies of software and web development.
      </div>
    </div>

    <div id="gallery" class="owl-carousel owl-theme gallery-carousel">
      <div class="gallery-item">
        <a class="gallery-thumb" href="assets/images/gallery/pic-1.jpg" data-index="0">
          <img src="assets/images/gallery/pic-1.jpg" alt="Gallery image 1">
        </a>
      </div>
      <div class="gallery-item">
        <a class="gallery-thumb" href="assets/images/gallery/pic-2.jpg" data-index="1">
          <img src="assets/images/gallery/pic-2.jpg" alt="Gallery image 2">
        </a>
      </div>
      <div class="gallery-item">
        <a class="gallery-thumb" href="assets/images/gallery/pic-3.jpg" data-index="2">
          <img src="assets/images/gallery/pic-3.jpg" alt="Gallery image 3">
        </a>
      </div>
      <div class="gallery-item">
        <a class="gallery-thumb" href="assets/images/gallery/pic-4.jpg" data-index="3">
          <img src="assets/images/gallery/pic-4.jpg" alt="Gallery image 4">
        </a>
      </div>
      <div class="gallery-item">
        <a class="gallery-thumb" href="assets/images/gallery/pic-5.jpg" data-index="4">
          <img src="assets/images/gallery/pic-5.jpg" alt="Gallery image 5">
        </a>
      </div>
      <div class="gallery-item">
        <a class="gallery-thumb" href="assets/images/gallery/pic-6.jpg" data-index="5">
          <img src="assets/images/gallery/pic-6.jpg" alt="Gallery image 6">
        </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lightbox" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="lightbox-gallery" class="carousel slide" data-ride="carousel" data-interval="false">
          <ol class="carousel-indicators">
            <li data-target="#lightbox-gallery" data-slide-to="0"></li>
            <li data-target="#lightbox-gallery" data-slide-to="1"></li>
            <li data-target="#lightbox-gallery" data-slide-to="2"></li>
            <li data-target="#lightbox-gallery" data-slide-to="3"></li>
            <li data-target="#lightbox-gallery" data-slide-to="4"></li>
            <li data-target="#lightbox-gallery" data-slide-to="5"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active"><img class="d-block mx-auto lightbox-image" src="assets/images/gallery/pic-1.jpg" alt="Gallery image 1"></div>
            <div class="carousel-item"><img class="d-block mx-auto lightbox-image" src="assets/images/gallery/pic-2.jpg" alt="Gallery image 2"></div>
            <div class="carousel-item"><img class="d-block mx-auto lightbox-image" src="assets/images/gallery/pic-3.jpg" alt="Gallery image 3"></div>
            <div class="carousel-item"><img class="d-block mx-auto lightbox-image" src="assets/images/gallery/pic-4.jpg" alt="Gallery image 4"></div>
            <div class="carousel-item"><img class="d-block mx-auto lightbox-image" src="assets/images/gallery/pic-5.jpg" alt="Gallery image 5"></div>
            <div class="carousel-item"><img class="d-block mx-auto lightbox-image" src="assets/images/gallery/pic-6.jpg" alt="Gallery image 6"></div>
          </div>
          <a class="carousel-control-prev" href="#lightbox-gallery" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#lightbox-gallery" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';?>
<script>
jQuery(document).ready(function () {
  jQuery('#gallery').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    smartSpeed: 800,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    responsive: {
      0: { items: 1 },
      768: { items: 2 },
      992: { items: 3 }
    }
  });

  jQuery('.gallery-thumb').on('click', function (event) {
    event.preventDefault();

    var index = parseInt(jQuery(this).attr('data-index'), 10);

    jQuery('#lightbox-gallery').carousel(0);
    jQuery('#lightbox-gallery').carousel(index);

    jQuery('#lightbox').modal('show');
  });

  jQuery('#lightbox').on('shown.bs.modal', function () {
    jQuery('#lightbox-gallery').carousel('pause');
  });

  jQuery('#lightbox').on('hidden.bs.modal', function () {
    jQuery('#lightbox-gallery').carousel(0);
  });
});
</script>
