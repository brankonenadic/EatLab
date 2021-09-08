<?php include './sections/header.section.php'; ?>
 
<?php include './sections/navbar.section.php'; ?>



  <section id="section-jumbotron" class="jumbotron jumbotron-fluid landing text-white d-flex justify-content-center align-items-center">
      <div class="container text-center text-light">
        <h1 class="display-1 text-uppercase text-hover">EatLab</h1>
        <p class="display-4 d-none d-sm-block text-hover">New way of restorant managment</p>
        <p class="lead text-hover">Create stunning photos and videos by using the built-in features for enhancement.</p>
        <p class="lead text-hover">Share your best shots with your friends and the rest of the world instantly.</p>
        
        <?php 
          if($_SESSION['login'] == false) { 
            echo '
            <p class="lead text-hover">Signe up now!</p>
            <a href="./registar" class="btn btn-lg btn-signup">Signe up</a>
            ';
          }
        ?>
      </div>
    </section>
    <div class="container">
      <section id="section-description">
        <h2 class="display-4 text-center">What is EatLab?</h2>
        <p>EatLab is an innovative camera app for both iOS and Android that lets you capture the best moments in life either on still photos or video. EatLab have many useful features to enhance the photos and videos with editing tools, filters and effects. And when you're done you can easily share your result with all of your friends and the rest of the world through Instagram.</p>
        <p>EatLab has been designed from the bottom up by photography experts and award-winning app developers to make sure you get the best camera app ever created. We are continuously improving the app with new features – this is just the beginning.</p>
      </section>
     
      <section id="section-features">
        <h2 class="display-4 text-center">Features</h2>
        <div class="row">
          <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center mb-5">
            <div class="h1"><i class="fa fa-paint-brush mb-4 text-new" aria-hidden="true"></i></div>
            <h3 class="h4 mb-4 text-center">Enhance your photos</h3>
            <p>Easily enhance your photos with a selection of editing tools, filters and effects.</p>
            <a href="#" class="btn btn-outline-new mt-auto">Read more...</a>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center mb-5">
            <div class="h1"><i class="fa fa-video-camera mb-4 text-new" aria-hidden="true"></i></div>
            <h3 class="h4 mb-4 text-center">Also made for video</h3>
            <p>With EatLab you get dedicated video effects like slow motion, timelapse and transitions.</p>
            <a href="#" class="btn btn-outline-new mt-auto">Read more...</a>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center mb-5">
            <div class="h1"><i class="fa fa-instagram mb-4 text-new" aria-hidden="true"></i></div>
            <h3 class="h4 mb-4 text-center">Share on Instagram</h3>
            <p>You can easily share your photos with your friends and the rest of the world on Instragram.</p>
            <a href="#" class="btn btn-outline-new mt-auto">Read more...</a>
          </div>
          <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center mb-5">
            <div class="h1"><i class="fa fa-mobile mb-4 text-new" aria-hidden="true"></i></div>
            <h3 class="h4 mb-4 text-center">Works on all devices</h3>
            <p>EatLab works on all platforms and all devices no matter the size of your screen.</p>
            <a href="#" class="btn btn-outline-new mt-auto">Read more...</a>
          </div>
        </div>
      </section>     
      <section id="section-pricing">
        <h2 class="display-4 text-center">Choose your plan</h2>
        <div class="row">
          <div class="col-12 col-md-4 mb-4">
            <div class="card card-outline-success">
              <div class="card-header bg-success text-white text-center card-header-new">
                <h2>Starter</h2>
                <h4>Free</h4>
              </div>
              <div class="card-body">
                <p class="card-text">Perfect for those who won't wait for a waiter.</p>
              </div>
              <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i>Online ordering</li>
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i>Ordering from restorans</li>
              </ul>
              <div class="card-footer text-center card-footer-new">
                <a href="#" class="btn btn-outline-success btn-radius">Select plan</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-4">
            <div class="card card-outline-warning">
              <div class="card-header bg-warning text-white text-center card-header-new">
                <h2>Business</h2>
                <h4>$44.99 / month</h4>
              </div>
              <div class="card-body">
                <p class="card-text">Perfect for restorans that want a complite CMS.</p>
              </div>
              <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Restourant menagment</li>
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Employees menagment</li>
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> 24/7 Support</li>
              </ul>
              <div class="card-footer text-center card-footer-new">
                <a href="#" class="btn btn-outline-warning btn-radius">Select plan</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 mb-4">
            <div class="card card-outline-danger">
              <div class="card-header bg-danger text-white text-center card-header-new">
                <h2>Ultra Business</h2>
                <h4>$94.99 / month</h4>
              </div>
              <div class="card-body">
                <p class="card-text">Perfect for connecting mulltiple restorans into single CMS.</p>
              </div>
              <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Restourant menagment</li>
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Employees menagment</li>
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Multiple restorans</li>
                <li class="list-group-item"><i class="fa fa-fw fa-check" aria-hidden="true"></i> 24/7 Support</li>
              </ul>
              <div class="card-footer text-center card-footer-new">
                <a href="#" class="btn btn-outline-danger btn-radius">Select plan</a>
              </div>
            </div>
          </div>
        </div>
      </section>
   
    </div>
 
    <footer class="bg-light">
      <div class="container py-3 py-sm-5">
        <div class="row">
          <div class="col-12 col-sm-6 col-lg-3">
            <h6>Quick links</h6>
            <ul class="list-unstyled">
              <li><a href="#" class="text-new">Home</a></li>
              <li><a href="#" class="text-new">What's new?</a></li>
              <li><a href="#" class="text-new">Support</a></li>
              <li><a href="#" class="text-new">My account</a></li>
              <li><a href="#" class="text-new">Cancel subscription</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
           <h6>Information</h6>
            <ul class="list-unstyled">
              <li><a href="#" class="text-new">About us</a></li>
              <li><a href="#" class="text-new">Jobs</a></li>
              <li><a href="#" class="text-new">Press-success</a></li>
              <li><a href="#" class="text-new">Contact</a></li>
              <li><a href="#" class="text-new">Partnership</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <h6>Follow us</h6>
            <ul class="list-unstyled">
              <li><a href="#" class="text-new"><i class="fa fa-fw fa-facebook" aria-hidden="true"></i> Facebook</a></li>
              <li><a href="#" class="text-new"><i class="fa fa-fw fa-instagram" aria-hidden="true"></i> Instagram</a></li>
              <li><a href="#" class="text-new"><i class="fa fa-fw fa-twitter" aria-hidden="true"></i> Twitter</a></li>
              <li><a href="#" class="text-new"><i class="fa fa-fw fa-youtube" aria-hidden="true"></i> YouTube</a></li>
              <li><a href="#" class="text-new"><i class="fa fa-fw fa-linkedin" aria-hidden="true"></i> LinkedIn</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <h6>Our location:</h6>
            <address>
              <strong>EatLab</strong><br>
              350 5th Avenue<br>
              New York, NY 10118<br>
              <i class="fa fa-fw fa-phone" aria-hidden="true"></i><span class="sr-only">Telephone:</span> <a href="tel:+12127363100" class="text-new">(212) 736-3100</a><br>
              <i class="fa fa-fw fa-inbox" aria-hidden="true"></i><span class="sr-only">Mail:</span> <a href="mailto-success@EatLab.com" class="text-new">info@EatLab.com </a>
            </address>
          </div>
        </div>
         <div class="container-footer mt-4 pt-4">
            <div class="row justify-content-center align-items-center">
              <div class="col-auto">
              <a class="text-new" href="#">Privacy Policy</a>
              <a class="text-new" href="#">Terms of Usage</a>
               <a class="text-new" href="#">FAQ</a>
              </div>
            </div>
            <div class="row justify-content-center align-items-center">
              <div class="col-auto">
              <span>Copyright &copy; 2020<span> | <a class="text-new" href="index">Lab387</a>
              </div>
            </div>
          </div>
        </div>
    
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/12.1.5/js/smooth-scroll.min.js" integrity="sha256-MMt0/21G3z0Zg4ET1kI3HC9npItDowkitRDVr0FhCxA=" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function () {
        var scroll = new SmoothScroll('a[href*="#section-"]');
      });
    </script>

  </body>
</html>

