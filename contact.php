<?php
include("header.php");
?>
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/img2.jpeg">
      <div class="container pt-100 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-theme-colored">Contact us</h3>
              <ul class="breadcrumb white">
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

   <!-- Section: Have Any Question -->
    <section id="contact" class="divider">
      <div class="container pt-60 pb-60">
        <div class="section-title mb-60">
          <div class="row">
            <div class="col-md-12">
              <div class="esc-heading small-border text-center">
                <h3 data-aos="fade-down"  data-aos-duration="600">Have any Questions?</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="section-content" >
          <div class="row">
		  <?php
		  /*
            <div class="col-sm-12 col-md-4" data-aos="fade-up"  data-aos-duration="600">
              <div class="contact-info text-center">
                <i class="fa fa-phone font-36 mb-10 text-theme-colored"></i>
                <h4>Call Us</h4>
                <h6 class="text-gray">Phone: 9972853368</h6>
              </div>
            </div>
		*/
		?>
            <div class="col-sm-12 col-md-3" data-aos="fade-up"  data-aos-duration="600">
              <div class="contact-info text-center">
                <i class="fa fa-map-marker font-36 mb-10 text-theme-colored"></i>
                <h4>Address</h4>
                <h6 class="text-gray">
5th floor, Bangalore
<br>
</h6>
              </div>
            </div>
            <div class="col-sm-12 col-md-3" data-aos="fade-up"  data-aos-duration="600">
              <div class="contact-info text-center">
                <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
                <h4>General Enquiry</h4>
                <h6 class="text-gray">info@samplewebsite.com</h6>
                <h6 class="text-gray">admin@samplewebsite.com</h6>
              </div>
            </div>
            <div class="col-sm-12 col-md-3" data-aos="fade-up"  data-aos-duration="600">
              <div class="contact-info text-center">
                <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
                <h4>Marketing/Sales</h4>
                <h6 class="text-gray">ziyad@samplewebsite.com</h6>
              </div>
            </div>
            <div class="col-sm-12 col-md-3" data-aos="fade-up"  data-aos-duration="600">
              <div class="contact-info text-center">
                <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
                <h4>Managing Director</h4>
                <h6 class="text-gray">waleed@samplewebsite.com</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Contact -->
    <section id="contact" data-bg-img="images/pattern/p4.png"> 
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase font-28 mt-0"><span class="text-theme-colored">Contact</span> Us</h2>
            </div>
          </div>
        </div>
        <div class="section-content">          
          <div class="row">
            <div class="col-md-12" data-aos="fade-up"  data-aos-duration="600">
            
              <!-- Contact Form -->
              <form class="contact-form-transparent" id="contact_form" action="mailer/mailer1.php" name="contact-form" method="post">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input id="form_name" name="form_name" class="form-control" type="text" placeholder="Enter Name" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input id="form_phone" name="form_phone" class="form-control" type="text" placeholder="Enter Phone" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input id="form_subject" name="form_services" class="form-control required" type="text" placeholder="Enter services">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                </div>
                <div id="contact-form-result" class="alert alert-success" role="alert" style="display: none;">
                </div>
                <div class="form-group text-center mb-0">
                  <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button data-loading-text="Please wait..." class="btn btn-colored btn-rounded btn-theme-colored pl-30 pr-30" type="submit">Send your message</button>
                </div>
              </form>
              <!-- Contact Form Validation-->
              <script type="text/javascript">
                $("#contact_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              </script>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  

<hr>
<div class="row">
	<div class="col-md-12">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107660.25496045555!2d12.964432038913394!3d32.51591721602872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13a8ce35cc454fe5%3A0xcdb38cdca065e682!2zQWwtyr9BesSresSreWFoLCBMaWJ5YQ!5e0!3m2!1sen!2sin!4v1580774482314!5m2!1sen!2sin" style="width: 100%;height: 600px;"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
</div>

    </section>
  </div>
  <!-- end main-content -->
<?php
include("footer.php");
?>