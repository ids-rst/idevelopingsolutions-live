<?php include 'header.php'; ?>
<?php
if (isset($_POST['send_mail'])) {

	echo "<pre>";
  echo"here we";
	print_r($_POST);
	echo "</pre>";
  die;
}
?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs contact-page">
  <div class="breadcrumbs-inner text-center">
    <h1 class="page-title">Contact Us</h1>
    <ul>
      <li title="I developing sloutions">
        <a class="active" href="index.php">Home</a>
      </li>
      <li>Contact Us</li>
    </ul>
  </div>
</div>
<!-- Breadcrumbs End -->
<!-- Contact Section Start -->
<div class="rs-contact pt-120 md-pt-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 md-mb-60">
        <div class="contact-box">
          <div class="sec-title mb-45">
            <span class="sub-text new-text white-color">Let's Talk</span>
            <h2 class="title white-color">Speak With Our Experts.</h2>
          </div>
          <div class="address-box mb-25">
            <div class="address-icon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <div class="address-text">
              <span class="label">Email:</span>
              <a href="mailto:contact@idevelopingsolutions.com">contact@idevelopingsolutions.com</a>
            </div>
          </div>
          <div class="address-box mb-25">
            <div class="address-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="address-text">
              <span class="label">Phone:</span>
              <a href="tel:+91-7009239004">+91-7009239004</a>
            </div>
          </div>
          <div class="address-box">
            <div class="address-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="address-text">
              <a href="https://www.google.com/maps/dir//Incredible+Developing+Solutions,+Dalhousie+Road,+near+Axis+Bank,+Pathankot,+Punjab+145001/@32.2024032,75.4262128,11z/data=!4m8!4m7!1m0!1m5!1m1!1s0x391c80e488d9abc1:0xbac1c81dab431a0f!2m2!1d75.6558872!2d32.2700392"
                target="_blank">
                <span class="label">Address:</span>
                <div class="desc">Dalhousie Road, Pathankot</div>
            </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-8 pl-70 md-pl-15 contact-form-block">
        <input type="hidden" class="send-mail-responce" value="">
        <div class="contact-widget">
          <div class="sec-title2 mb-40">
            <span class="sub-text contact mb-15">Get In Touch</span>
            <h2 class="title testi-title">Fill Your Details Below</h2>
          </div>
          <div id="form-messages"></div>
          <form id="contact-form" method="post">
            <fieldset>
              <div class="row">
                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                  <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">
                  <div class="invalid-feedback">
                    Please provide a valid Name.
                  </div>
                </div>
                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                  <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail" required="">
                  <div class="invalid-feedback">
                    Please provide a valid Email.
                  </div>
                </div>
                <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                  <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone Number"
                    pattern="[0-9]*" minlength="10" maxlength="10" required="">
                  <div class="invalid-feedback">
                    Please provide a valid Phone.
                  </div>
                </div>
                <div class="col-lg-12 mb-30">
                  <textarea class="from-control" id="message" name="message" placeholder="Your message Here"
                    required=""></textarea>
                  <div class="invalid-feedback">
                    Please enter your message here.
                  </div>
                </div>
              </div>
              <div class="btn-part">
                <div class="form-group mb-0">
                  <input class="readon learn-more submit send_contact_mail" type="submit" name="send_mail"
                    value="Submit Now">
                </div>
                
              </div>
               
            </fieldset>
          </form>
          
        </div>
        <div class="jumbotron email-sent-message text-center" style="display:none;">
          <h2 class="display-4 mb-0">Thank You!</h2>
          <p class="lead"><strong>The Form was submitted successfully.</strong></p>
        </div>
        <div class="jumbotron emil-sent-failed-message text-center invalid-feedback" style="display:none;">
          <h2 class="display-8 mb-0">Sorry, something went wrong.</h2>
        </div>
      </div>
    </div>
    
  </div>
  <div class="map-canvas pt-120 md-pt-80">
    <div class="map-responsive">
      <iframe 
        src="https://maps.google.com/maps?hl=en&q=idevelopingsolution&t=&z=14&ie=UTF8&iwloc=B&output=embed"
        frameborder="0"
        scrolling="no"
        allowfullscreen
        loading="lazy">
      </iframe>
    </div>
  </div>
</div>
</div>
<!-- Contact Section Start -->
</div>
<!-- Main content End -->
<!-- Footer Start -->
<?php include 'footer.php'; ?>