
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




function inscription($nom,$prenom , $email, $telephone, $date_naissance, $password ,$c_password=""){
    $conn = connexionDB();

        // creation du mysqli pour annuler les attaque par injection sql niveau 1 
    
        $nom = mysqli_real_escape_string($conn,$nom);
        $prenom = mysqli_real_escape_string($conn,$prenom);
        $email = mysqli_real_escape_string($conn,$email);
        $telephone = mysqli_real_escape_string($conn,$telephone);
        $date_naissance = mysqli_real_escape_string($conn,$date_naissance);
        $password = mysqli_real_escape_string($conn,$password);
  
  
  //   crypter le mot de passe
  $password = password_hash($password,PASSWORD_DEFAULT);
  
  $sql = "INSERT INTO users(nom,prenom,email,mot_de_passe,telephone,date_naissance) 
  values (?,?,?,?,?,?)";
    // vas dans le conn qui est un object et utilise la methode(fonction) prepare   
  $stmt = $conn->prepare($sql);
  
  $stmt->bind_param("ssssss",$nom,$prenom,$email,$password,$telephone,$date_naissance);
  $resultat = $stmt->execute();
  return $resultat;

    //if($resultat){
       // echo "Utilisateur enregistre";
       // return 

    //}
    //else{
       // echo "Une erreur est survenue";
    //}

}

function login($email,$psw){
    $connexion = connexionDB();
    

    $sql ='SELECT mot_de_passe FROM users WHERE email= ?';

    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("s",$email);
    $resultat = $stmt->execute();
    $resultat = $stmt->get_result();
    $result  = $resultat->fetch_assoc();
  
    $resultatUtilisateur=password_verify($psw, $result['mot_de_passe']);
    if( $resultatUtilisateur){
      session_start();//demarrage de la session
    $_SESSION['email']=$email;
     $_SESSION['user_authenticated']= true;
     header('Location: index.php'); // Rediriger vers la page d'authentification si l'utilisateur n'est pas authentifié
     exit();
 
      }
     else{echo "<script> alert('verifier votre login ou mot de passe')</script>";
    
    
    }
}

function isAuthenticated(){
    session_start();
// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['user_authenticated']) || $_SESSION['user_authenticated'] != true) {
    header('Location: login.php'); // Rediriger vers la page d'authentification si l'utilisateur n'est pas authentifié
    exit();
}
}

function ajoutPanier($id,$quantite){
    $_SESSION['panier'][$id]= $quantite;
   header('Location: ./index.php');
}
function quantiterPanier(){
    $compteElement = count($_SESSION['panier']);
    
    return $compteElement;





}
function getAllPanier(){
    return $_SESSION['panier'];  
}
 
function prixTotal($a,$b){
return $a*$b;
}



function getVoiture(){
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


function getVoitureById($id){

    $conn = connexionDB();
    $sql = 'SELECT * FROM voitures where idVoiture =?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $voiture = $resultat->fetch_assoc();

    return $voiture;
}




    
