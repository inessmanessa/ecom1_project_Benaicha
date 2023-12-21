<?php

include "./includes/fonction.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $voiture = getVoitureById($id);
  
        if(isset($_POST['save'])){
            $marque= $_POST['marque'];
            $model= $_POST['model'];
            $annee = $_POST['annee'];
            $prix=$_POST['prix'];
            $quantite = $_POST['quantite'];
            $description = $_POST['description'];

        if (empty($model) || empty($prix) || empty($quantite)|| empty($marque) ) {
            echo 'Remplir tous les champs';
        }
        else{
                updateVoitureById($id,$marque,$model,$annee, $prix,$quantite,$description);
        }
   }
}

?>
<main>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <section>
        <h1>Modifier</h1>


        <form class="row g-3" method="post">

<div class="col-md-6">
<label class="form-label"  for="inputmarque">Marque</label>
<input type="text" name="marque" id="inputmarque" class="form-control" value="<?php echo $voiture['marque'] ?>">
</div>
<div class="col-md-6">
<label class="form-label"  for="inputmodel">Model</label>
<input type="text" id="inputmodel" name="model" class="form-control" aria-label="Sizing example input"  value="<?php echo $voiture['model'] ?>">
</div>

<div class="col-12">
<label class="form-label"  for="inputannee">Année</label>
<input id="inputannee" name="annee" class="form-control" aria-label="Année" value="<?php echo $voiture['Annee'] ?>">
</div>
<div class="col-12">
<label class="form-label"  for="inputprix">Prix</label>
<input type="number" id="inputprix" name="prix" class="form-control" value="<?php echo $voiture['prix'] ?>">
</div>
<div class="col-12">
<label class="form-label"  for="inputquantite">Quantité</label>
<input type="number" id="inputquantite" name="quantite" class="form-control" value="<?php echo $voiture['quantite'] ?>">
</div>

<div class="col-12">
    <label class="form-label" for="floatingTextarea">Description</label>
    <textarea class="form-control" name="description" id="floatingTextarea"><?php echo $voiture['description']; ?></textarea>
</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<input type="submit" name="save" value="Modifier" class="btn btn-primary me-md-2">
<input type="reset" value="Annuler" class="btn btn-primary">
</div>
</form>




</main>