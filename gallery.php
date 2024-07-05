<?php include 'header.php';?>
<!-- Breadcrumbs Start -->
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
<div class="container h-100">
   <div class="sec-title2 text-center mb-45">
      <h2 class="title title2">
         Our Gallery
      </h2>
      <div class="heading-line"></div>
      <div class="desc desc2 custom-desc2">
      We have a team of professionals with years of experience, knowledge, and skills in all the latest technologies of software and web development.
      </div>
   </div>
  <div class="row mx-auto h-100">
    <div id="gallery" class="carousel slide w-100 align-self-center" data-ride="carousel">
      <div class="carousel-inner mx-auto w-90" role="listbox" data-toggle="modal" data-target="#lightbox">
        <div class="carousel-item active">
          <div class="col-lg-5 col-md-3">
            <img class="img-fluid" src="assets/images/gallery/pic-1.jpg" data-target="#lightbox-gallery" data-slide-to="0">
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-lg-3 col-md-3">
            <img class="img-fluid" src="assets/images/gallery/pic-2.jpg" data-target="#lightbox-gallery" data-slide-to="1">
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-lg-3 col-md-3">
            <img class="img-fluid" src="assets/images/gallery/pic-3.jpg" data-target="#lightbox-gallery" data-slide-to="2">
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-lg-3 col-md-3">
            <img class="img-fluid" src="assets/images/gallery/pic-4.jpg" data-target="#lightbox-gallery" data-slide-to="3">
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-lg-3 col-md-3">
            <img class="img-fluid" src="assets/images/gallery/pic-5.jpg" data-target="#lightbox-gallery" data-slide-to="4">
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-lg-3 col-md-3">
            <img class="img-fluid" src="assets/images/gallery/pic-6.jpg" data-target="#lightbox-gallery" data-slide-to="5">
          </div>
        </div>
      </div>
      <div class="w-100">
        <a class="carousel-control-prev w-auto" href="#gallery" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next w-auto" href="#gallery" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade h-100" id="lightbox" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/101123/close.png" />
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
              <div class="carousel-item active">
                <div class="item-img">
                  <img class="d-block" src="assets/images/team/style1/gallery/pic-1.jpg">
                </div>
              </div>
              <div class="carousel-item">
                <div class="item-img">
                    <img class="d-block" src="assets/images/team/style1/gallery/pic-2.jpg">
                </div>
              </div>
              <div class="carousel-item">
                <div class="item-img">
                    <img class="d-block" src="assets/images/team/style1/gallery/pic-3.jpg">
                </div>
              </div>
              <div class="carousel-item">
                <div class="item-img">
                    <img class="d-block" src="assets/images/team/style1/gallery/pic-4.jpg">
                </div>
              </div>
              <div class="carousel-item">
                <div class="item-img">
                    <img class="d-block" src="assets/images/team/style1/gallery/pic-5.jpg">
                </div>
              </div>
              <div class="carousel-item">
                <div class="item-img">
                    <img class="d-block" src="assets/images/team/style1/gallery/pic-6.jpg">
                </div>
              </div>
            </div>
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
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';?>
<script>
  jQuery('#gallery').carousel({
  interval: 5000
})

// Modify each slide to contain five columns of images
jQuery('#gallery.carousel .carousel-item').each(function(){
    var minPerSlide = 10;
    var next = jQuery(this).next();
    if (!next.length) {
    next = jQuery(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo(jQuery(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = jQuery(this).siblings(':first');
      	}
        next.children(':first-child').clone().appendTo(jQuery(this));
      }
});

</script>
