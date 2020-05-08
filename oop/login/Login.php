<?php
/**
 * 
* PHP version 7
* @category   Lånekalkylator
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/


class Login{

public function __construct($connDb)
{
    $this->conn = $connDb;
}

    /* registrera en användare */
    public function registrera($user, $pass)
    {
        /* skapa en hash av lösenordet */
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        /* SQL för spara i en tabell */
        $sql = "INSERT INTO admin SET anamn='$user', hash='$hash'";

        /* kör sql frågan */
        $resultat = $this->conn->query($sql);

        /* stäng ner anslutingnen */
        $this->conn->close();

        /* gick det bra? */
        if (!$resultat) {
            trigger_error("Kunde inte köra sql-frågan:" . $this->conn->error);
            /* die("<p class=\"alert alert-warning\">Kunde inte köra sql-frågan: $this->conn->error </p>"); */
        } else {
            return 1;
        }
}

    /* kontrollera om användaren finns i tabellenS */
    public function kontroll($user, $pass)
    {
        /* SQL för spara i en tabell */
        $sql = "SELECT * FROM admin WHERE anamn='$user'";

        /* kör sql frågan */
        $resultat = $this->conn->query($sql);

        /* stäng ner anslutingnen */
        $this->conn->close();

        /* gick det bra? */
        if (!$resultat) {
            die("<p class=\"alert alert-warning\">Kunde inte köra sql-frågan: $this->conn->error </p>");
        } else {

            /* hittar vi en användare?- */
            if ($resultat->num_rows == 0) {
                return 0;
            } else {
                /* hittat, plocka ut raden med data */
                $rad = $resultat->fetch_assoc();

                /* kontrollera om lösenordet stämmer */
                if (password_verify($pass, $rad['hash'])) {
                    return 1;
                } else {
                    return 2;
                }
                
            }
            
        }
    }

}