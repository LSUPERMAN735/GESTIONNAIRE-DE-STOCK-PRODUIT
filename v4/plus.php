<!DOCTYPE html> 
<html> 
    <head> 
        <title>Ajouter un à la quantité</title> 
    </head> 
<body> 
    <h1>Ajouter un à la quantité</h1> 
    <?php 
        // connexion mysqli et base de données complété
        $rt=mysqli_connect('localhost:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur"); 
        //mysqli_select_db('MyTestDB') or die("Erreur de connexion à la base de données");
        if(isset($_GET['id'])) { 
            // Requête DELETE…. Permettant de supprimer l’enregistrement associé à l’id sélectionné 
			$id=$_GET['id'];	
            //$query="DELETE $auteur, $id, $titre FROM bibliographie WHERE id='$id'"; -> erreur de syntaxe et ne marchera pas
            $query="UPDATE bibliographie SET prix=prix+prix/quantite, quantite=quantite+1  WHERE id='$id'"; 
			$result = $rt->query($query); 
			 
            // on va à la page confirmant que tout est Ok 
            header('Location: consultation.php'); 
            } 
        else {
            echo 'Aucune suppression effectu&eacute;e.'; 
            }    
        mysqli_close($rt); 
    ?> 
</body> 
</html>
