<?php

include 'database.php';

$msg = '';

if(isset($_POST['submit']))
{
    
    $fieldnames = ['username', 'keuze'];
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
        $obj->insertActiviteit($_POST['username'], $_POST['keuze']);
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
        <a href="inloggen-admin.php">Admin</a>
        <a href="reservering-formulier.php">Reserveren</a>
        <a class="active" href="#contact">Activiteiten</a>
        <a href="index.php">Home</a>
      </div>
    </div>

    <div class="activiteiten">
      <h3 class="text">Activiteiten Formulier</h3>
      <form class="acti-form" method="post" action="activiteiten-formulier.php">
        <input type="text" name="username" placeholder="Naam" required/><br>
          <select id="dropdown_menu" name="keuze" required>
            <option value="" disabled selected>Kies activiteit</option>
            <option value="Knutselen">Knutselen</option>
            <option value="Mountainbiken">Mountainbiken</option>
            <option value="Jeu de Boele wedstrijd">Jeu de Boele wedstrijd</option>
            <option value="Water Aerobics">Water Aerobics</option>
          </select>
        <button type="submit" name="submit" class="btn">Submit</button><br>
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