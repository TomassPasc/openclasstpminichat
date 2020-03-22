<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini chat</title>
    </head>

    <body>

            <!--Formulaire -->

    <form action="minichat_post.php" method="post">
        <p>
            <label>Pseudo :<input type="text" name="pseudo" /></label><br />
            <label>Message: <input type="text" name="message" /></label><br />
            <input type="submit" value="Envoyer" />
        </p>
    </form>
         <!--le mini chat -->
<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    $reponse = $bdd->query('SELECT * FROM manichat ORDER BY ID DESC LIMIT 0,10');


    while ($donnees = $reponse->fetch())
        {
        ?>
        <P>
        <strong> <?php echo $donnees['pseudo'] . ': ';?></strong>
        <?php echo $donnees['message']; ?>
        
        </p>

        <?php }
$reponse->closeCursor();
 ?> 
 
    </body>
</html>