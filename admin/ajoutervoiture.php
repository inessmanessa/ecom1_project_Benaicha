<?php
    
    include "./includes/fonction.php";
    
     if(isset($_POST['save'])){
        $marque= $_POST['marque'];
        $model= $_POST['model'];
        $annee = $_POST['annee'];
        $prix=$_POST['prix'];
        $quantite = $_POST['quantite'];
        $description = $_POST['description'];
       
       if (empty($model) ||empty($marque)|| empty($quantite)) {
        echo 'Remplir tous les champs';
       }
       else{
            ajoutvoiture($marque,$model,$annee, $prix,$quantite,$description);
       }


    }
?>
<?php
include './includes/header.php';
?>
</body>
<main>
<h3  class="text-center">Nouvelle Voiture</h3>


       

        <form class="row g-3" method="post">

                <div class="col-md-6">
            <label class="form-label"  for="inputmarque">Marque</label>
            <input type="text" name="marque" id="inputmarque" class="form-control">
            </div>
                <div class="col-md-6">
                <label class="form-label"  for="inputmodel">Model</label>
            <input type="text" id="inputmodel" name="model" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default ">
            </div>

            <div class="col-12">
            <label class="form-label"  for="inputannee">Année</label>
            <input id="inputannee" name="annee" class="form-control" aria-label="Année" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="col-12">
            <label class="form-label"  for="inputprix">Prix</label>
            <input type="number" id="inputprix" name="prix" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="col-12">
            <label class="form-label"  for="inputquantite">Quantité</label>
            <input type="number" id="inputquantite" name="quantite" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default ">
            </div>
            
                <div class="col-12">
                <label class="form-label" for="floatingTextarea">Description</label>
                <textarea class="form-control" name="description" id="floatingTextarea"></textarea>
        
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" name="save" value="Ajouter" class="btn btn-primary me-md-2">
                <input type="reset" value="Annuler" class="btn btn-primary">
            </div>
        </form>
    
    </main>

</body>












<?php
include './includes/footer.php';
?>
