<?php 
//code php7.2 !!!! mysqli au lieu de mysql
    if (isset($_POST['salle']) && isset($_POST['nom'])) { 
        // Récupération de l'salle et du nom du formulaire
        $gere= addslashes($_POST['gere']);
        $salle = addslashes($_POST['salle']); //ADDSLASHED AJOUTE DES ANTI-SLASH dans la chaîne 
        $nom = addslashes($_POST['nom']); //ainsi on évite les injections PHP/SQL
        $quantite=addslashes($_POST['quantite']);
        $prix=addslashes($_POST['prix']);
        // Connexion à mysql et à la base bibliographie 
        $rt=mysqli_connect('127.0.0.1:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur sql");      

		//$id=$_GET['id']++;//$id='4'; USECASE#5340
		// Requête SQL mise à jour dans la table bibliographie pour les champs salle et nom 
        $query="INSERT INTO bibliographie (gere, salle, nom, quantite, prix) VALUES ('$gere','$salle','$nom','$quantite', '$prix') ";  //autoincrémentation de l'id 
        //$query="INSERT INTO bibliographie VALUES ($id,'$salle','$nom') "; //->cnw but bad only one id allowed USECASE 5340
		$result = $rt->query($query); 
        // déconnexion 
        mysqli_close($rt); 
        // On va vers la page operationOk.php 
        header('Location: operationOk.php'); 
    } 
?> 
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <title> Ajouter une référence </title> 
    </head> 
    <body> 
        <h1> Ajouter une références </h1> 
            <form action="ajouter.php" method="POST"> 
           
            <table> 
                <tr> 
                    <td align="right">géré par :</td> 
                    <td><input name="gere"         /></td> 
                </tr>
                <tr> 
                     <td align="right">salle</td> 
                     <td><input name="salle"         /></td> 
                </tr>
                <tr> 
                    <td align="right">nom</td> 
                    <td><input name="nom" value="" /></td>
                </tr>
                <tr> 
                    <td align="right">Quantité :</td> 
                    <td><input name="quantite"         /></td> 
                </tr>                <tr> 
                    <td align="right">Prix total :</td> 
                    <td><input name="prix"         /></td> 
                </tr>
                <!--<tr> <td><input type="hidden" name="id" value="4" /> </td> </tr> --> <!-- id pour la méthode #5340-->
                <tr><td align="center" colspan="2"><input type="submit" value="Ajouter"/> </tr> 
            </table> 
            </form> 
    </body> 
</html>
