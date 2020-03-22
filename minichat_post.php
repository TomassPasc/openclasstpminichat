<?php

//connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //permet d'afficher les erreurs précises
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion des données envoyée dans la BDD

$req = $bdd->prepare('INSERT INTO manichat(pseudo, message) VALUES (:pseudo, :message)');
$req ->execute(array(
    'pseudo' => $_POST['pseudo'],
    'message' => $_POST['message']
));

// L'utilisateur est redirigé directement sur la page principal
header('Location: minichat.php'); 