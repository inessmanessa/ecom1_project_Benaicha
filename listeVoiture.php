 <?php
$conn=new mysqli("localhost","php","php","voituredb","3306");
if($conn){
echo("connection reussie");}
else{
    
echo("connection echouee");}
//definir la requete
 $sql="SELECT idVoiture, marque, model, annee ,description,image FROM voitures";
//executer la requete
$result = $conn->query($sql);
?> 

<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Voitures</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>

Header
</header>

<main>

  <section class="py-5 text-center container">
section
  </section>



     

        <?php
//lire la reponse du serveur mysql($result)
if ($result->num_rows > 0) {
  // output data of each row

  while($row = $result->fetch_assoc()) {

   echo" 
   <div class='row '>
   
   <div class='card mb-3' style='max-width: 540px;'>
    <div class='row g-0'>
      <div class='col-md-4'>
        <img src='images/{$row['image']}' class='img-fluid rounded-start' alt='...'>
      </div>
      <div class='col-md-8'>
        <div class='card-body'>
          <h5 class='card-title'>{$row['marque']}</h5>
          <p class='card-text'>{$row['description']}</p>
          <p class='card-text'><small class='text-body-secondary'>Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
    </div> 
  </div>";
  }
}else {
  echo '0 results';
}
$conn->close();
?>



</main>




    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
