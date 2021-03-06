<?php
    // creation constantes
    define('CHAINE_DE_CONNEXION', 'mysql:host=localhost;dbname=basetest');
    define('DB_USER', 'root');

function initTabFilms()
{
    echo "Debut initTabFilms" . "<br>";
    
    static $initEnsFilms = [
                    ["titre" => "Dracula", "realisateur" => "Francis Fiord Copola","annee" => 1993],
                    ["titre" => "Kung fu Panda", "realisateur" => "Mark Osborne","annee" => 2008],
                    ["titre" => "La guerre des mondes", "realisateur" => "Steven Spielberg",  "annee" => 2005]
                            ];    
    try {
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    /*
     * CREATE TABLE `basetest`.`tab` ( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(12) NOT NULL , `mdp` VARCHAR(12) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
     */
    //echo "<br>" . "Debut foreach";
    
    foreach ($initEnsFilms as $value) {
      echo '<br>Debut transaction pour insertion >' . $value["titre"] . '<';
       $pdo->beginTransaction();
       $Statement = $pdo->prepare("INSERT INTO tabfilms (titre,realisateur,annee) VALUES (:monTitre,:monRealisateur,:monAnnee)");  
       $Statement->bindValue("monTitre", $value["titre"]);
       $Statement->bindValue("monRealisateur", $value["realisateur"]);
       $Statement->bindValue("monAnnee", $value["annee"]);
       echo '<br>========== execute';
       $Statement->execute();
       echo '<br>========== commit <br>';
       $pdo->commit();
    }    
}

function creatTabUsers()
{
    try {
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }   
    /*
     * CREATE TABLE `basetest`.`tab` ( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(12) NOT NULL , `mdp` VARCHAR(12) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
     */
    try {
        $pdo->exec("CREATE TABLE tabusers ( id INT NOT NULL AUTO_INCREMENT , login VARCHAR(12) NOT NULL , mdp VARCHAR(12) NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB");
    } catch (Exception $ex) {
        //echo $ex->getMessage();
    }
    
}

function creatTabFilms()
{
    //echo "Debut creatTabFilms" . "<br>";
    try {
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    } catch (Exception $ex) {
        //echo $ex->getMessage();
    }
    $ret = $pdo->exec("DROP TABLE tabfilms");
    /*
     * CREATE TABLE `basetest`.`tab` ( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(12) NOT NULL , `mdp` VARCHAR(12) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
     */
    
    $ret = $pdo->exec("CREATE TABLE tabfilms ( id BIGINT NOT NULL AUTO_INCREMENT , titre VARCHAR(32) NOT NULL ,  realisateur VARCHAR(32) NOT NULL, annee INT NOT NULL, PRIMARY KEY (id)) ENGINE = InnoDB");
    //echo "<br>" . " Ret >" . $ret . "<";
        
    initTabFilms();
}

function lister_Films()
{
    $res = array();
    
    //echo "Debut lister_Films" . "<br>";
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    
    $statement = $pdo->query("SELECT * From tabfilms ORDER BY titre");
    
//    foreach ($statement->fetchAll() as $lefilm) 
//    {
//        $res[] = $lefilm["titre"];
//    }
    return $statement->fetchAll();
}

function stockFilm($titre)
{
    try {
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    $pdo->beginTransaction();
    $Statement = $pdo->prepare("INSERT INTO tabfilms (titre) VALUES (:montitre)");  
    $Statement->bindValue("montitre", $titre);
    $Statement->execute();
    $pdo->commit();
    
}

function delFilm($titre)
{
    try {
        $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    $pdo->beginTransaction();
    $Statement = $pdo->prepare("DELETE FROM tabfilms  WHERE titre = :montitre");  
    $Statement->bindValue("montitre", $titre);
    $Statement->execute();
    $pdo->commit();
    
}

//$creatTabFilms = creatTabFilms();