<?php
/**
* PHP version 7
* @category   OOP klass
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/

class Blog{
    private $conn;

    public function __construct($connDb)
{
    $this->conn = $connDb;
}

/* hämta alla inlägg */
    public function läsa()
    {
        /* sql fråga för att hämta alla inlägg */
        $sql = "SELECT * FROM blog";

        /* kör sql frågan */
        $resultat = $this->conn->query($sql);

        /* stäng ner anslutingnen */
        $this->conn->close();

        if ($resultat) {
            return $resultat;
        }
    }

    /* skriv ett inlägg */
    public function skriva($rubriken, $inlägget)
    {
        /* sql fårga */
        $sql = "INSERT INTO blog SET inlagg='$inlägget', rubrik='$rubriken'";

        /* kör sql fråga */
        $resultat = $this->conn->query($sql);

        if ($resultat) {

            /* returnera id på registrerade posten i tabellen */
            return $this->conn->insert_id;
        }

        /* stäng ner anslutingnen */
        $this->conn->close();
    }

    /* spara ett inlägg */
    public function radera()
    {
        
    }

    /*  */
    public function uppdatera()
    {
        
    }
}