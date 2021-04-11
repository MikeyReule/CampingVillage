<?php

class database 
{
    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;


    function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'camping_village';

        try
        {
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->dbh = new PDO($dsn, $this->user, $this->pass); 
        }
        catch(PDOException $e)
        {
            die("Unable to connect: " . $e->getMessage());
        }
    }

    function insertActiviteit($username, $keuze)
    {
        $sql = "INSERT INTO activiteiten(ID, naam, keuzeactiviteit) VALUES (:ID, :naam, :keuzeactiviteit)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'ID'=>NULL,
            'naam'=>$username,
            'keuzeactiviteit'=>$keuze
        ]);
    }

    function insertReservering($username, $adres, $datum, $duur, $keuze_verblijf, $aantal_personen)
    {
        $sql = "INSERT INTO reservering(ID, naam, adres, datum, duur, keuze_verblijf, aantal_personen) VALUES (:ID, :naam, :adres, :datum, :duur, :keuze_verblijf, :aantal_personen)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'ID'=>NULL,
            'naam'=>$username,
            'adres'=>$adres,
            'datum'=>$datum,
            'duur'=>$duur,
            'keuze_verblijf'=>$keuze_verblijf,
            'aantal_personen'=>$aantal_personen
        ]);
    }

    function loginMedewerker($username, $password)
    {
        $sql="SELECT * FROM medewerkers WHERE naam = :naam";

        $stmt = $this->dbh->prepare($sql); 
        $stmt->execute(['naam'=>$username]); 

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
         
        if($result)
        {
            if($password == $result["wachtwoord"]) 
            {
                header("Location: ./overzicht-admin.php");
            } 
            else 
            {
                echo "Password is incorrect!";
            }
        } 
        else 
        {
            echo "Naam of password is niet correct!";
        }

    }

    public function getAllActivities()
    {

        $sql = "SELECT * FROM activiteiten";

        $statement = $this->dbh->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function getAllReseveringen()
    {

        $sql = "SELECT * FROM reservering";

        // prepared statement (send statement to server  + checks syntax)
        $statement = $this->dbh->prepare($sql);

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

}

?>