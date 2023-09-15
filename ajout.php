<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
</head>
<body>
    <a href="affichage.php">Liste des clients</a>
    <h1>Ajouter un client</h1>
    
    <div>
        <?php
            if(isset($_POST['ajouter'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $mail=$_POST['email'];
                $passe=$_POST['passe'];
                $ville=$_POST['ville'];


                if(isset($nom,$prenom,$mail,$passe,$ville) and !empty($nom) and !empty($prenom) and !empty($mail) and !empty($passe) and !empty($ville))
                {
                    include 'db.php';
                    $requete=$db->prepare('INSERT INTO client(nom,prenom,email,ville,password) VALUES(?,?,?,?,?)');

                    $requete->execute(array($nom,$prenom,$mail,$ville,md5($passe)));

                    $msg="<label style='color:green;'>Les informations ont été ajoutées avec succès</label>";
                }else{
                    $msg="<label style='color:red;'>Veuillez compléter tous les champs</label>";
                }
            }

            if(isset($msg)){
                echo $msg;
            }
        ?>

        <form action="" method="post">
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id=""><br>

            <label for="prenom">Prénoms</label><br>
            <input type="text" name="prenom" id=""><br>

            <label for="email">E-mail</label><br>
            <input type="email" name="email" id=""><br>

            <label for="passe">Mot de passe</label>
            <input type="password" name="passe" id=""><br>

            <label for="ville" >Ville</label><br>
            <input type="text" name="ville" id=""><br><br>

            <button type="submit" name="ajouter">Ajouter</button>
        </form>
    </div>
</body>
</html>