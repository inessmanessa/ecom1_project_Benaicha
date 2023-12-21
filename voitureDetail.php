
<?php 
include "./includes/fonction.php";

isAuthenticated();
//executer la requete()


if(isset($_GET['id'])){
  $id = $_GET['id'];
  $voiture =getVoitureById($id);
}

if(isset($_POST['ajoutPanier'])){
 $quantite = $_POST['quantite'];
 if($quantite > 0){
      ajoutPanier($id,$quantite);
  }

}

include "./includes/header1.php";
include "./includes/nav.php";
?>


<div class="pt-5 pb-9">       
<!-- <section> begin ============================-->

<section class="py-0">

<div class="container-small">
 
  <div class="row g-5 mb-5 mb-lg-8" data-product-details="data-product-details">  
    <div class="col-12 col-lg-6">
      <div class="row g-3 mb-3">
      <img class="img-fluid mb-5 rounded-3" src="images/<?php echo $voiture['image']; ?> " alt="">



      </div>
      
    </div>
    <div class="col-12 col-lg-6">
      <div class="d-flex flex-column justify-content-between h-100">
        <div>
          <div class="d-flex flex-wrap">
            <div class="me-2"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
            <span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
            <span class="fa fa-star text-warning"></span>
            </div>
            <p class="text-primary fw-semi-bold mb-2">6548 People rated and reviewed </p>
          </div>

            <h3 class="mb-3 lh-sm"><?php echo $voiture['marque']; ?> / <?php echo $voiture['model']; ?></h3>
           <div class="d-flex flex-wrap align-items-center">

            <h1 class="me-3"><?php echo $voiture['prix']; ?> $</h1>
            </div>
          <p class="text-success fw-semi-bold fs-1 mb-2">  <?php echo $voiture['quantite']; ?>en stock</p>
        </div>
        <br>

<form method="post" >

        <div class="d-flex">
        <button class="btn btn-lg btn-warning rounded-pill w-100 fs--1 fs-sm-0" name ="ajoutPanier" type ="submit"><span class="fas fa-shopping-cart me-2"></span>Ajouter au panier</button>
      </div>

<div>
  <label clas="form-label fs-0 text-1000 ps-0" >  Quantité </label>
  <input class="form-control" type="number" name="quantite" >
</div>



<!-- end of .container-->

</section>

  
        <section class="py-0">

          <div class="container-small">
            <ul class="nav nav-underline mb-4" id="productTab" role="tablist">
              <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Description</a></li>
               </ul>
            <div class="row gx-3 gy-7">
              <div class="col-12 col-lg-7 col-xl-8">
                <div class="tab-content" id="productTabContent">
                  <div class="tab-pane pe-lg-6 pe-xl-12 fade show active text-1100" id="tab-description" role="tabpanel" aria-labelledby="description-tab">
                    <p class="mb-5"><?php echo $voiture['description']; ?></p>
                  </div>
 
                </div>
              </div>
            
            </div>
          </div>
          <!-- end of .container-->

        </section>
</div>        
        <?php 
include "./includes/footer.php";
?>
      

  





      
   