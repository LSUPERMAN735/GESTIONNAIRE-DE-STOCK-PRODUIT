<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <!--force l'encodage-->
        <title> Références bibliographiques </title> <!-- titre de l'onglet-->
    </head> 
    <body> 
        <h1> Références bibliographiques </h1> <!-- en-tête type1 afin de l'afficher avec ce style-->
        <a href="ajouter.php">Ajouter une référence bibliographique</a>  <!--lien vers la page ajouter pour ajouter la référence-->
        <a href="consultation.php">Consultation original </a><!--Pour retourner sur la page originale-->
		<br /> 
            <table> 
                <tr> <!-- table row = colonnes-->
                    <th>Auteur</th>  <!--table header en-tête de la table 1ère colonne-->
                    <th>Titre</th>  <!--table header en-tête de la table 2ème colonne-->
                    <!--<th>&nbsp;</th> ne se met pas ici !!!-->
                    <th>ZE ID</th>  <!--table header en-tête de la table 3ème colonne-->
                    <th>&nbsp;</th> <!--espace insécable entre les colonnes -> espace ordinaire--> <!--peu de diff sans-->
                </tr> 
                    <?php 
                    // Connexion à mysql en local (localhost est équivalent à 127.0.0.1) // Sélectionner la base MyTestDB en php7.2
                    $rt=mysqli_connect('127.0.0.1:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur"); 
                    // On récupère maintenant tous les enregistrements de la table bibliographie 
                    // variable $query pour contenir la requete SQL de selection de ts les champs de la table bibliographie 
                    $query = 'SELECT id, auteur, titre FROM bibliographie'; //ou SELECT * FROM bibliographie
                    // Lance la requête SQL 
                    $result = $rt->query($query) or die('Erreur SQL !<br>'.$query.'<br>'.mysqli_error()) ;                    
                    // On parcourt la liste des enregistrements 
                    while ($row = mysqli_fetch_assoc($result)) { 
                    // htmlentities convertie les caractères accentués pour qu’ils s’affichent correctement en HTML 
                        $auteur = htmlentities($row['auteur']); 
                        $titre = htmlentities($row['titre']); //$row est notre variable contenant la liste
                        $id = htmlentities($row['id']); //ajout de htmlentities puis de la balise td et th
                        echo "<tr> \n"; //table row
                        echo "<td>$auteur</td> \n";  //table div 
                        echo "<td>$titre</td> \n"; 
                        echo "<td>$id</td> \n"; //ajout de l'affichage de l'id
                        //renvoie des paramètres associés vers la page modifier.php à chaque ligne de la BDD
                        echo "<td><a href=\"modifier.php?id=$id&auteur=$auteur&titre=$titre\">Modifier</a>"; 
						//renvoie juste l'id associé vers la page supprimer.php à chaque ligne de la BDD
                        echo " <a href=\"supprimer.php?id=$id\">Supprimer</a></td>"; 
                        echo "</tr>"; 
                    } 
                    // Fermeture de la connexion à la BD  via mysqli_connect pour PHP7 avec la variable
                    mysqli_close($rt); 
                    ?> 
            </table> 
    </body> 
</html> 
