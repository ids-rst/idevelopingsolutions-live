<?php include 'header.php';?>
<!-- Breadcrumbs Start -->
<style>
   body .cs-gallery.img4.our-team {
    background: url(assets/images/breadcrumbs/our-collage.jpg);
   }
   .cs-gallery .cs-space.breadcrumbs-inner {
    padding: 174px 0 150px;
    position: relative;
   }
   .rs-breadcrumbs.cs-gallery.img4.our-team {
    position: relative;
   }
   .cs-gallery:before {
    content: "";
    width: 100%;
    height: 100%;
    background:#00000060;
    position: absolute;
    left: 0;
    top: 0;
  }
  /* bootstrap mod: carousel controls */
.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%2322313F' stroke-miterlimit='10' stroke-width='2' viewBox='0 0 34.589 66.349'%3E%3Cpath d='M34.168.8 1.7 33.268 34.168 65.735'/%3E%3C/svg%3E");
  height: 100px;
}

.carousel-control-next-icon {
  transform: rotate(180deg);
}

/* medium - display 4  */
@media (min-width: 768px) {
    #gallery .carousel-inner .carousel-item-right.active,
    #gallery .carousel-inner .carousel-item-next {
      transform: translateX(33.33333%);
    }
    
    #gallery .carousel-inner .carousel-item-left.active, 
    #gallery .carousel-inner .carousel-item-prev {
      transform: translateX(-33.33333%);
    }
}

/* large - display 5 */
@media (min-width: 992px) {
    #gallery .carousel-inner .carousel-item-right.active,
    #gallery .carousel-inner .carousel-item-next {
      transform: translateX(20%);
    }
    
    #gallery .carousel-inner .carousel-item-left.active, 
    #gallery .carousel-inner .carousel-item-prev {
      transform: translateX(-20%);
    }
}

#gallery .carousel-inner .carousel-item-right,
#gallery .carousel-inner .carousel-item-left{ 
  transform: translateX(0);
}


/* gallery slider */
#gallery .carousel-inner .carousel-item.active,
#gallery .carousel-inner .carousel-item-next,
#gallery .carousel-inner .carousel-item-prev {
  display: flex;
  align-items:center;
}

@media (max-width: 768px) {
  #gallery .carousel-inner .carousel-item > div {
    display: none;
  }
  #gallery .carousel-inner .carousel-item > div:first-child {
    display: block;
    text-align: center;
  }
}


/* modal carousel */
.modal .carousel-indicators {
  margin: 0;
  bottom: -34px;
  left: auto;
}

.modal .carousel-indicators > li {
  border-radius: 50%;
  width: 16px;
  height: 16px;
  border: 1px solid #fff;
  background: transparent;
  margin-right: 0;
  margin-left: 10px;
}

.modal .carousel-indicators > li.active {
  background: #fff;
}

.modal .close, .modal .carousel-control-prev, .modal .carousel-control-next {
  opacity: 1;
}

@media (min-width: 992px) {
  .modal .carousel-control-prev {
    left: -140px;
  }

  .modal .carousel-control-next {
    right: -140px;
  }
}


/* modal mods */
.modal {
  background: rgba(34, 49, 63, 0.9);
}

.modal-dialog {
  max-width: 80% !important;
}

.modal-header {
  border: none !important;
}

.modal-content {
  border: none !important;
  border-radius: 0 !important;
  background-color: transparent !important;
}

.modal-body {
  padding: 0 !important;
}

.close img {
  max-width: 40px;
  max-height: 40px;
}

.modal-footer {
  padding: 2rem 0;
  border: none !important;
}


/* bootstrap mod addons */
.w-90 {
  width: 90%;
}

.col-5,
.col-sm-5,
.col-md-5,
.col-lg-5,
.col-xl-5 {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}

.col-5 {
  flex: 0 0 20%;
  max-width: 20%;
}

@media (min-width: 576px){
  .col-sm-5 {
    flex: 0 0 20%;
    max-width: 20%;
  }
}
@media (min-width: 768px){
  .col-md-5 {
    flex: 0 0 20%;
    max-width: 20%;
  }
}
@media (min-width: 992px){
  .col-lg-5 {
    flex: 0 0 20%;
    max-width: 20%;
  }
}
@media (min-width: 1200px){
  .col-xl-5 {
    flex: 0 0 20%;
    max-width: 20%;
  }
}
</style>
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
