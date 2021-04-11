<?php

include 'database.php';

$msg = '';

if(isset($_POST['submit']))
{
    
    $fieldnames = ['username', 'password'];
    $error = false;
    
    foreach($fieldnames as $fieldname)
    {
        if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
        {
            $error = true; 
            $msg = 'error';
        }
    }

    // Kan else statement hierbij doen, maar er gebeurt toch niks dus heeft geen zin om 't toe te voegen
    if(!$error)
    {
        $obj = new database();
        $obj->loginMedewerker($_POST['username'], $_POST['password']);
    }

}    


?>

<!DOCTYPE html>
<head>
    <title>Camping Village</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="background">
    <div class="container">
      <div class="navbar">
        <img class="logo" src="camping_village.png" alt="CV"/>
        <a class="active" href="#inloggen">Admin</a>
        <a href="reservering-formulier.php">Reserveren</a>
        <a href="activiteiten-formulier.php">Activiteiten</a>
        <a href="index.php">Home</a>
      </div>
    </div>
    <div class="activiteiten">
      <h3 class="text">Login</h3>
        <form class="activiteiten_form" method="post">
          <input type="text" name="username" placeholder="Gebruikersnaam" required/><br>
          <input type="password" name="password" placeholder="Wachtwoord" required/><br>
          <button type="submit" name="submit" class="btn">Login</button><br>
        </form>
    </div>
    
    <div class="bottom-container">
      <div class="contacten"><h3 class="email">r.zomeren@campingvillage.nl</h3></div>
      <div class="contacten"><h3 class="adres">Beroepsstraat 14, 1234 TR Otterlo</h3></div>
      <div class="contacten"><h3 class="telefoon">06123456789</h3></div>
    </div> 

  </div>
      
          
</body>
</html>      