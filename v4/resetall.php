<!DOCTYPE html> 
<html> 
    <head> 
        <title>Réinitialiser la table principale</title> 
    </head> 
<body> 
    <h1>Réinitialiser la table principale</h1> 
    <?php 
        // connexion mysqli et base de données complété
        $rt=mysqli_connect('localhost:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur"); 
        //mysqli_select_db('MyTestDB') or die("Erreur de connexion à la base de données");
        if(isset($_GET['id'])) { //on a transmis un fauxid  car le if requiert un id 
            //$query="DELETE FROM bibliographie "; //marche aussi 
            $query="TRUNCATE TABLE bibliographie "; //RESET LA VALEUR de l'auto-incrémentation
            $result = $rt->query($query);  
            
            $query2="insert Into bibliographie VALUES (1, 'salle 110','ordinateur', 'Wilvis', '10', '15') "; //RESET LA VALEUR de l'auto-incrémentation
            $result2 = $rt->query($query2);  
            
            $query3="insert into bibliographie VALUES (2,  'salle 110','ordinateur portable', 'Wilvis', '5', '300')"; //RESET LA VALEUR de l'auto-incrémentation
            $result3 = $rt->query($query3);  
            
            $query4="insert into bibliographie VALUES (3,  'salle 111','écran tout en un ', 'Youssef', '4', '500') "; //RESET LA VALEUR de l'auto-incrémentation
            $result4 = $rt->query($query4);  
            
            // on va à la page confirmant que tout est Ok 
            header('Location: operationOk.php'); 
            } 
        else {// bien sûr on aurait pu inverser le contenu du if et du else pour éviter la récup d'un id
            echo 'Aucune suppression effectu&eacute;e.'; 
            }    
        mysqli_close($rt); 
    ?> 
</body> 
</html>
