<?php 
include "./includes/fonction.php";
isAuthenticated();
//executer la requete()
$voitures =getVoiture();
include "./includes/header1.php";
include "./includes/nav.php";
?>
      <div class="ecommerce-homepage pt-5 mb-9">


        <section class="py-0 px-xl-3">

          <div class="container px-xl-0 px-xxl-3">
            <div class="row g-3 mb-9">
              <div class="col-12">
                <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                  <div class="bg-holder z-index--1 product-bg" style="background-image:url(images/tesla2.jpeg);background-position: bottom right;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="bg-holder z-index--1 shape-bg" style="background-image:url(images/th.jpeg);background-position: bottom left;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="banner-text light">
                  </div><a class="btn btn-lg btn-primary rounded-pill banner-button" href="#!">Shop Now</a>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="gift-items-banner w-100 rounded-3 overflow-hidden">
                  <div class="bg-holder z-index--1 banner-bg" style="background-image:url(images/HYUNDAI1.jpeg);">
                  </div>
                  <!--/.bg-holder-->

                  <div class="banner-text text-md-center light">
                    </div>
                </div>
              </div>
              <div class="col-12 col-xl-6">
                <div class="best-in-market-banner rounded-3">
                  <div class="bg-holder z-index--1 banner-bg" style="background-image:url(images/header.jpeg);">
                  </div>
                </div>
              </div>
            </div>


            <div class="mb-6">
              <div class="d-flex flex-between-center mb-3">
                <h3>Nos voitures</h3><a class="fw-bold d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>
              </div>
              <div class="swiper-theme-container products-slider">
                <div class="swiper swiper-container theme-slider" data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                  <div class="swiper-wrapper">


                  <?php foreach ($voitures as $voiture) {?>

                    <div class="swiper-slide">
                      <div class="position-relative text-decoration-none product-card h-100">
                        <div class="d-flex flex-column justify-content-between h-100">
                          <div>
                          <a href="voitureDetail.php?id=<?php echo $voiture['idVoiture']; ?>" >
                            <div class="border border-1 rounded-3 position-relative mb-3">
                             <img class="img-fluid" src="images/<?php echo $voiture['image']; ?>" alt="" />
                            </div>
                            
                              <h6 class="mb-2 lh-sm line-clamp-3 product-name"><?php echo $voiture['marque']; ?></h6>
                            </a>
                            <p class="fs--1">
                            <span class="text-500 fw-semi-bold ms-1"><?php echo $voiture['quantite']; ?> en stock</span>
                            </p>
                          </div>

                          <!-- afficher prix -->
                          <div>
                            <h3 class="text-1100"><?php echo $voiture['prix']; ?>CAD</h3>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="swiper-nav">
                  <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                  <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                </div>
              </div><a class="fw-bold d-md-none" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>
            </div>


          </div>
          <!-- end of .container-->

        </section>

      </div>
      <?php 
include "./includes/footer.php";
?>
      
