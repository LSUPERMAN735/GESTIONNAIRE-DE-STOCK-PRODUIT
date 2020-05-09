<?php //modifier.php 
    // Si on vient de la page modifier.php (on utilise la méthode POST pour transmettre les données du formulaire modifiée) 
    if (isset($_POST['enreg']) ) { 
        // Connexion à mysql complété !!!!
        $rt=mysqli_connect('localhost:3308', 'root', '','MyTestDB') or die("Erreur de connexion au serveur"); 
        // Selection à la base MyTestDB complété à l'intérieur de mysqli
        //mysqli_select_db('MyTestDB') or die("Erreur de connexion à la base de données"); n'existant pas 
        
	   //ici je réadapte de la méthode GET à la méthode post je les récupère dans la boucle de préférence
        $gere= $_POST['gere'];
        $salle=$_POST['salle'];
		$id=$_POST['id'];
        $nom=$_POST['nom'];
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];           
        // modification de l'enregistrement correspondant à l'id  
        // je préfère mettre entre simple quote si ces des chaines de caractères donc $id étant un int peut être sans quote
		$query="UPDATE bibliographie SET gere='$gere', nom='$nom', salle='$salle', quantite='$quantite', prix='$prix' where id='$id'"; 
        $result = $rt->query($query); 
        mysqli_close($rt); 
        // on va à la page confirmant que tout est Ok 
        //header('Location: operationOk.php'); //la page n'étant pas encore créé -> consultation.php
        header('Location:consultation.php'); 
    } 
?> 
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
        <title> Modification d'une référence </title> 
    </head> 
    <body> 
        <h1> Modifier un objet</h1> 
        <form action="modifier.php" method="POST"> 
        <table> 
        <tr> <td align="right">géré par</td> 
            <td><input name="gere" value="<?php echo $_GET['gere']; ?>" 
            /></td> 
        </tr> 
        <tr> <td align="right">salle</td> 
            <td><input name="salle" value="<?php echo $_GET['salle']; ?>" 
            /></td> 
        </tr> 
            <tr> <td align="right">nom</td> 
            <td><input name="nom" value="<?php echo $_GET['nom']; ?>" /></td>
        </tr>
        <tr> <td align="right">Quantité</td> 
            <td><input name="quantite" value="<?php echo $_GET['quantite']; ?>" 
            /></td> 
        </tr> 
        <tr> <td align="right">Prix total:</td> 
            <td><input name="prix" value="<?php echo $_GET['prix']; ?>" 
            /></td> 
        </tr> 
        <tr> <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /> </td> </tr> 
        <tr> <td><input type="hidden" name="enreg"  /> </td> </tr> 
            <tr> <td align="center" colspan="2"><input type="submit" value="Modifier" /> </tr> 
        </table> 
        </form> 
    </body> 
</html>
