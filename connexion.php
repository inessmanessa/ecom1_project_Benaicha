<?php
$dbhost = "localhost";
$dbuser="root";
$dbpassword="php";
$dbname ="php";
$dbport = 3306;



if (isset($_POST['connexion'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    if (!empty($email) && !empty($mot_de_passe)) {
        $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
        if(!$conn){
            die("Connexion echoue => ".mysqli_connect_error());
        }
        // SELECT * FROM utilisateur WHERE email="tom@jerry.ca" and mot_de_passe ="Tom1234";
        $sql ='SELECT * FROM utilisateur WHERE email="'.$email.'"';

        $resultat = mysqli_query($conn,$sql);
        
        // permet de recuperer la ligne retourner par ma requette

        // echo "Le resultat sans l'utilisation du fetch_assoc<br>";
        // var_dump($resultat);
        // echo "Le resultat avec l'utilisation du fetch_assoc<br>";
        $resultatUtilisateur  = $resultat->fetch_assoc();
        // var_dump($resultatUtilisateur);
        /* Verification de si le mot de passe dans la base de donnee est la meme chose
         que celui rentre par le client */
        $verificationMdp = password_verify($mot_de_passe,$resultatUtilisateur['mot_de_passe']);

        if($verificationMdp){
            echo "L' utilisateur existe";
        }
        else{
            echo "L'utilisateur n' existe pas";
        }
        // if(mysqli_num_rows($resultat) == 1){
        //     echo "L' utilisateur existe";
        // }
        // else{
        //     echo "L'utilisateur n' existe pas";
        // }

       
        mysqli_close($conn);
    }   


   

   

}


?>