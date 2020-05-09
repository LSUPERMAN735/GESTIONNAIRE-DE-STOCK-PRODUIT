<!DOCTYPE html> 
<html> 
    <head> 
        <title>Mes Livres - Supprimer un livre</title> 
    </head> 
<body> 
    <h1>Supprimer un livre</h1> 
    <?php 
        // connexion mysqli et base de données complété
        $rt=mysqli_connect('localhost:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur"); 
        //mysqli_select_db('MyTestDB') or die("Erreur de connexion à la base de données");
        if(isset($_GET['id'])) { 
            // Requête DELETE…. Permettant de supprimer l’enregistrement associé à l’id sélectionné 
			$id=$_GET['id'];	
            //$query="DELETE $auteur, $id, $titre FROM bibliographie WHERE id='$id'"; -> erreur de syntaxe et ne marchera pas
            $query="DELETE FROM bibliographie WHERE id='$id'"; 
			$result = $rt->query($query); 
			 
            // on va à la page confirmant que tout est Ok 
            header('Location: operationOk.php'); 
            } 
        else {
            echo 'Aucune suppression effectu&eacute;e.'; 
            }    
        mysqli_close($rt); 
    ?> 
</body> 
</html>
