<?php
include './includes/fonction.php';
$paniers = getAllPanier();
if(isset($_POST['modifierProduit'])){
    var_dump($_POST);
    $id = $_POST['id'];
    $quantiteDemander = $_POST['quantiterDemander'];
    ajoutPanier($id,$quantiteDemander);
}
?>
<main>
    <section>
        <h1>Mon Panier</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Marque</th>
            <th scope="col">Model</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">Quantiter Demander</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
 
            <?php foreach ($paniers as $idVoiture => $quantiterDemander) {
                $voiture = getVoitureById($idVoiture );
                ?>
            <form method="post">
                <tr>
            <th scope="row"><input type="number" name="id_voiture" value="<?php echo  $voiture; ?>" ></th>
            <td><?php echo $voiture['marque']; ?></td>
            <td><?php echo $voiture['model']; ?></td>
            <td><?php echo  $voiture['prix']; ?></td>
            <td><?php echo  $voiture['description']; ?></td>
            <td><input min="1" max="<?php echo  $voiture['quantite'] ?>" type="number" value="<?php echo $quantiterDemander ?>" name="quantiterDemander"></td>
            <td>
            <button type="submit" class="btn btn-info" name ="modifierProduit">
                <i class="bi bi-pencil-square">
                </i>
                </button>
                <a href="supprimerPanier.php?id=<?php echo  $voiture['id']; ?>" class="btn btn-danger">
                <i class="bi bi-trash"></i>
                    </a>
            </td>
            </tr>
            </form>
        <?php } ?>
       
        </tbody>
        </table>
    </section>
</main>