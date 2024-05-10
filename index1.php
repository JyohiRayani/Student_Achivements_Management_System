<?php 
session_start();
$_SESSION['active'] = 'index';
include 'nav.php';
include 'db.php';
?>
  
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1 style="font-family: magneto; font-size: 70px;" >Student Achievements</h1>
      <p style="font-family: magneto; font-size: 40px;">I'm <span  class="typed" data-typed-items="a BECian,an Achiever,"></span></p>
    </div>
    
  </section>
  <marquee direction="right"><p class="bg-primary text-white p-2">About latest Events</p></marquee>
  <center>
    <div id="popup">

<!-- and here comes the image -->
<img src="pop2.jpg" alt="popup" height="500" width="350" class="img-fluid rounded rounded-5">

    <!-- Now this is the button which closes the popup-->
   <span class="btn btn-close" id="close"></span>

    <!-- and finally we close the POPUP FRAME-->
    <!-- everything on it will show up within the popup so you can add more things not just an image -->
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
//your jquery script here
//with this first line we're saying: "when the page loads (document is ready) run the following script"
            $(document).ready(function () {

            //select the POPUP FRAME and show it
            $("#popup").hide().fadeIn(8000);

            //close the POPUP if the button with id="close" is clicked
            $("#close").on("click", function (e) {
                e.preventDefault();
                $("#popup").fadeOut(1000);
            });

            });
</script></center>
  <main >
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
        
          <h2 style="font-family: Forte; font-size: 30px;">Student_Achievers</h2>
          <p>These are the BECians who highlighted their Success through this Website by Showcasing their Talents</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Sprint">Athletics</li>
              <li data-filter=".filter-Techinical">Techinical</li>
              <li data-filter=".filter-CCA">CCA</li>
              <li data-filter=".filter-Cricket">Cricket</li>
              <li data-filter=".filter-Kabaddi">Kabaddi</li>
            </ul>
          </div>
        </div>

       
        
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
           <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i1.jpeg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i1.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca1.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Cricket">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i2.jpeg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i2.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Techinical">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/t1.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/t1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Techinical">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/t2.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/t2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          
          <div class="col-lg-4 col-md-6 portfolio-item filter-Cricket">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i3.jpeg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i3.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Cricket">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i4.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i4.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Kabaddi">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i5.jpeg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i5.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Kabaddi">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i8.jpeg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i8.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
               
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Kabaddi">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i9.jpeg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i9.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                
              </div>
            </div>
          </div>
        
          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i12.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i12.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i13.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i13.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>            <div class="portfolio-wrap">

          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
              <img src="assets/img/portfolio/i14.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i14.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i11.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i11.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i15.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i15.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i16.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i16.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i17.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i17.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i18.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i18.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i19.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i19.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Cricket">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i25.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i25.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                
              </div>
            </div>
          </div>

         
          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i21.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i21.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Cricket">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i24.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i24.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
           
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Cricket">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i26.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i26.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
           
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-Sprint">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/i20.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/i20.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca2.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca3.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca4.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca5.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca6.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca7.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca8.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca9.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca10.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca10.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca11.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca11.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-CCA">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cca12.jpg" class="img-fluid rounded rounded-5" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/cca12.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bx bx-plus"></i></a>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php'?>
 