
<?php
function connexionDB(){

    $dbhost = "localhost";
    $dbuser="php";
    $dbpassword="php"; 
    $dbname ="voituredb";
    $dbport = 3306;

    $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname,$dbport);

    if (!$conn) {
        die("Erreur de connexion => ".mysqli_connect_error());
    }
    return $conn;
}


function affichervoiture(){
    $connexion = connexionDB();
    $sql="SELECT * FROM voitures";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    
    $voitures = array();
    foreach ($resultats as $voiture) {
        $voitures[] = $voiture;
    }
    $stmt->close();
    $connexion->close();
    return $voitures;
}

function deleteById($id){
    $conn = connexionDB();
    // recherche element 
    $voiture = getVoitureById($id);
   //
    if($voiture){
        $sql = 'delete from voitures where idVoiture = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $result = $stmt->execute();
    if ($result) {
        header('Location: mesvoitures.php');
    }
    }
    else{
        echo "Erreur de suppression";
    }
}



function   getVoitureById($id){

    $conn = connexionDB();
    $sql = 'SELECT * FROM voitures where idVoiture =?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $voiture = $resultat->fetch_assoc();

    return $voiture;
}

function ajoutvoiture($marque,$model,$annee,$prix,$quantite,$description=""){
    $connexion = connexionDB();

    $sql = "INSERT INTO VOITURES (marque,model,Annee,prix,quantite,description) values(?,?,?,?,?,?)";
    $stmt = $connexion->prepare($sql);
    // s =>string , d => double|float, i => int, b => bool
    $stmt->bind_param("ssidis",$marque,$model,$annee,$prix,$quantite,$description);
    $resultat = $stmt->execute();
    if($resultat){

       header('Location: mesvoitures.php');


    }else{
        echo "Une erreur lors de l'ajout du voiture";
    }
    $stmt->close();
    $connexion->close();

}

function updateVoitureById($id,$marque,$model,$annee, $prix,$quantite,$description){
    $conn = connexionDB();

    $sql = 'Update voitures set marque = ?,model = ?,Annee= ?,prix= ?,  quantite = ?, description = ?  where idVoiture = ?';
     
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssidisi',$marque,$model,$annee, $prix,$quantite,$description,$id);
    $result =$stmt->execute();
    
    if ($result) {
        header('Location: mesvoitures.php');
    }


}

function login($email,$psw){
    $connexion = connexionDB();

    $connexion = connexionDB();
    $sql ='SELECT nom, prenom FROM utilisateur WHERE email= ? and mot_de_passe = ?';
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss",$email,$psw);
    $resultat = $stmt->execute();
    $resultat = $stmt->get_result();

    $resultatUtilisateur  = $resultat->fetch_assoc();
    if( $resultatUtilisateur){
      session_start();//demarrage de la session
    $_SESSION['email']=$email;
     $_SESSION['user_authenticated']= true;
     header('Location: index.php'); // Rediriger vers la page d'authentification si l'utilisateur n'est pas authentifié
     exit();
      }
     else{ echo"<script> alert('verifier votre login ou mot de passe')</script>";}
}
    







    //if (isset($_POST['connexion'])) {
        //     $email = $_POST['email'];
        //     $mot_de_passe = $_POST['mot_de_passe'];
        //     if (!empty($email) && !empty($mot_de_passe)) {
        //         $conn = mysqli_connect("localhost","php","php","voituredb","3306");
        //         if(!$conn){
        //             die("Connexion echoue => ".mysqli_connect_error());
        //         }
                
        //         $sql ='SELECT nom, prenom FROM utilisateur WHERE email= ? and mot_de_passe = ?';
        
        //         $stmt = $conn->prepare($sql);
        
        //         $stmt->bind_param("ss",$email,$mot_de_passe);
        
        //         $resultat = $stmt->execute();
        //         $resultat = $stmt->get_result();
        //         $resultatUtilisateur  = $resultat->fetch_assoc();
        //         if( $resultatUtilisateur){
        //           session_start();//demarrage de la session
        //           $_SESSION['email']=$email;
        
        //           $_SESSION['user_authenticated']= true;
        
        //           header('Location: index.php'); // Rediriger vers la page d'authentification si l'utilisateur n'est pas authentifié
        //           exit();
        //         }
        //         else{ echo" verifier votre login et mot de passe";}
    
        
        //}
//}

