<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <!--force l'encodage-->
        <title> Projet Gestion des stocks </title> <!-- nom de l'onglet-->
        <link href="./wilvis.css" rel="stylesheet">
    </head> 
    <body> 
        <h1> Projet Gestion des stocks </h1> <!-- en-tête type1 afin de l'afficher avec ce style-->
        <a href="ajouter.php">Ajouter un objet</a>  <!--lien vers la page ajouter pour ajouter la référence-->
        <a href="consultation.php">Consultation original </a><!--Pour retourner sur la page originale-->
		<br /> 
            <table> 
                <tr> <!-- table row = colonnes-->
                    <th>Géré par</th>  <!--table header en-tête de la table 1ère colonne-->
                    <th>Salle</th>  <!--table header en-tête de la table 1ère colonne-->
                    <th>Nom</th>  <!--table header en-tête de la table 2ème colonne-->
                    <th>Quantité</th>  <!--table header en-tête de la table 1ère colonne-->
                    <th>Prix</th>  <!--table header en-tête de la table 1ère colonne-->
                    <th>Prix à l'unité</th>  <!--table header en-tête de la table 1ère colonne--> 
                    <th>Options</th>  <!--table header en-tête de la table 1ère colonne-->
                    <th> </th>  <!--table header en-tête de la table 1ère colonne-->
                    <th>&nbsp;</th> <!--espace insécable entre les colonnes -> espace ordinaire--> <!--peu de diff sans-->
                </tr> 
                    <?php 
                    // Connexion à mysql en local (localhost est équivalent à 127.0.0.1) // Sélectionner la base MyTestDB en php7.2
                    $rt=mysqli_connect('127.0.0.1:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur"); 
                    // On récupère maintenant tous les enregistrements de la table bibliographie 
                    // variable $query pour contenir la requete SQL de selection de ts les champs de la table bibliographie 
                    $query = 'SELECT id, salle, nom, gere, quantite, prix FROM bibliographie ORDER BY gere DESC'; //AJOUT DE ORDER BY ID ASC
                    // Lance la requête SQL 
                    $result = $rt->query($query) or die('Erreur SQL !<br>'.$query.'<br>'.mysqli_error()) ;                    
                    // On parcourt la liste des enregistrements 
                    while ($row = mysqli_fetch_assoc($result)) { 
                    // htmlentities convertie les caractères accentués pour qu’ils s’affichent correctement en HTML 
                        $gere = htmlentities($row['gere']); 
                        $salle = htmlentities($row['salle']); 
                        $nom = htmlentities($row['nom']); //$row est notre variable contenant la liste
                        $id = $row['id']; 
                        $quantite = htmlentities($row['quantite']); //$row est notre variable contenant la liste
                        $prix = htmlentities($row['prix']); //$row est notre variable contenant la liste
                        $prixunit=$prix/$quantite;
                        echo "<tr> \n"; //table row
                        echo "<td>$gere</td> \n";  //table div 
                        echo "<td>$salle</td> \n";  //table div 
                        echo "<td>$nom</td> \n"; 
                        echo "<td>$quantite</td> \n"; 
                        echo "<td>$prix</td> \n"; 
                        echo "<td>$prixunit</td> \n"; 
                        echo " <td> <a href=\"moins.php?id=$id\">-</a></td>"; 
                        echo "<td> <a href=\"plus.php?id=$id\">+</a></td>"; 
                        //renvoie des paramètres associés vers la page modifier.php à chaque ligne de la BDD
                        echo "<td><a href=\"modifier.php?id=$id&salle=$salle&nom=$nom\">Modifier</a>"; 
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
