<?php
    include 'db.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $req= $db->prepare('SELECT * FROM client WHERE id=?');
        $req->execute(array($id));

        $client= $req->fetch();

        if(!$client){
            header('location:ajout.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de ligne</title>
</head>
<body>
    <a href="ajout.php">Ajout des clients</a><br>
    <a href="affichage.php">Liste des clients</a><br>
    <h2>Modification des information de <?= $client['nom']?> <?= $client['prenom']?></h2>

    <div>
        <?php
            if(isset($_POST['modifier'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $passe=$_POST['passe'];
                $ville=$_POST['ville'];

                if(isset($nom,$prenom,$email,$passe,$ville) and !empty($nom) and 
                !empty($prenom) and !empty($email) and !empty($passe) and !empty($ville)){
                    $requete=$db->prepare('UPDATE client SET nom=?, prenom=?, email=?, password=?, ville=? WHERE id=?');
                    $requete->execute(array($nom,$prenom,$email,md5($passe),$ville,$id));

                    $msg="<label style='color: green;font-weight:bold;'>Les informations ont été modifiées avec succès !</label>";
                }else{
                    $msg="<label style='color: red; font-weight:bold;'>Veuillez compléter tous les chmaps</label>";
                }
            }
        ?>
        <form action="" method="post">
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="" value="<?=$client['nom']?>"><br>

            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="" value="<?=$client['prenom']?>"><br>

            <label for="email">E-mail</label><br>
            <input type="email" name="email" id="" value="<?=$client['email']?>"><br>

            <label for="passe">Mot de passe</label><br>
            <input type="password" name="passe" id=""><br>

            <label for="ville">Ville</label><br>
            <input type="text" name="ville" id="" value="<?=$client['ville']?>"><br><br>

            <button type="submit" name="modifier">Modifier</submit>
        </form>
</div>
</body>
</html>
