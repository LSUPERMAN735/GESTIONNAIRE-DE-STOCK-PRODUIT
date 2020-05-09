<!DOCTYPE html> 
<html> 
    <head> 
        <title>operationOk?</title> 
    </head> 
<body> 
    <h1> Tout s'est bien passé !!!! </h1>
    <h1>Êtes-vous satisfait de votre modification ?</h1> 
    <h1>Pour retourner à l'accueil appuyer sur le bouton OUI</h1> 
    <h2> Sinon appuyer sur le bouton NON pour retourner à la page précédente</h2>
    <form>
        <input type="button" value="NON" onclick="history.go(-1)"> <!-- j'utilise l'historique à partir de laquelle normalement
         l'utilisateur provient d'une de nos pages ajouter,modifier ...-->
    </form>
    <a href="consultation.php"><input type="button" value="OUI  "></a>
    <i><h3> <u> Notes :</u> Cette page vous redirigera après 5 secondes vers consultation.php </h3></i>
    <?php 
            // on va à la page confirmant que tout est Ok  balise header supplémentaire 
            //pour rediriger vers la page consultation après les 5 sec 
            header( "refresh:5;url=consultation.php" );

    ?> 
</body> 
</html>
