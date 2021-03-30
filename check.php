<?php
require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (!empty($_POST['firstname'] || !empty($_POST['lastname'] ))) {

        $lastname = trim($_POST['lastname']); // get the data from a form
        $firstname = trim($_POST['firstname']);

        $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
        $statement = $pdo->prepare($query);

        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);

        $statement->execute();
        $friends = $statement->fetchAll();

        header('Location: index.php');
    }
}
