 <?php
include "./includes/fonction.php";

if(isset($_POST['envoyer'])){
    // recuperation des elements de mon formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_naissance = $_POST['date_naissance'];
    $password = $_POST['password'];
    $c_password = $_POST['c-password'];

    if (empty($nom) ||empty($email)|| empty($password)) {
        echo 'Remplir tous les champs';
       }
       else{
            if ($password === $c_password) {

                $resultat=inscription($nom,$prenom , $email, $telephone, $date_naissance, $password ,$c_password);
                if($resultat){

                login( $email, $password);


             echo "Utilisateur inscrits";
        

                }
                else{
                 echo "Une erreur est survenue";
                }
            
            
            
            }
        }
 




    }

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">
    <link href="public/css/sign-in.css" rel="stylesheet">
</head>

<body>

<main class="form-signin w-100 m-auto border mt-4">

    <!-- début template listeFilms -->
    <section>
        <h3 class="text-center">Inscription</h3>
       
        <form method="post">
           <div class="container mb-1">
                <div class="mb-1">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" >
                </div>
                <div class="mb-1">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Courriel</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-1">
                    <label for="telephone" class="form-label">Numero de telephone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone" >

                </div><div class="mb-1">
                    <label for="date_naissance" class="form-label">Date de Naissance</label>
                    <input type="date" name="date_naissance" class="form-control" id="date_naissance" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">Confirmer Mot de passe</label>
                    <input type="password" name="c-password" class="form-control" id="exampleInputPassword1">
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button type="submit" name="envoyer" class="btn btn-primary">Inscription</button>
                </div>
           
           </div>
        </form>
        <div class="text-center mt-3">
  <a class="text-center" href="login.php">Login</a>
  </div>
    </section>


</main>
</body>
</html>