<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients</title>
</head>
<body>
    <!--juste un test-->
    <a href="ajout.php">Ajouter client</a>
    <h1>Liste des clients</h1>

    <div>
        <table>
            <?php
                include 'db.php';
                $requete=$db->query('SELECT * FROM client ORDER BY id ASC');
                if($requete->rowCount()>0){
            ?>

            <tr>
                <td style='text-decoration:underline;font-weight:bold;'>ID</td>
                <td style='text-decoration:underline;font-weight:bold;'>Noms</td>
                <td style='text-decoration:underline;font-weight:bold;'>Prénoms</td>
                <td style='text-decoration:underline;font-weight:bold;'>E-mail</td>
                <td style='text-decoration:underline;font-weight:bold;'>Ville</td>
                <td style='text-decoration:underline;font-weight:bold;'>Action</td>
            </tr>

            <?php
                while($res=$requete->fetch()){
            ?>

            <tr>
                <td> <?=$res['id']?> </td>
                <td> <?=$res['nom']?> </td>
                <td> <?=$res['prenom']?> </td>
                <td> <?=$res['email']?> </td>
                <td> <?=$res['ville']?> </td>
                <td>
                    <a href="modification.php">Modifier</a>
                    <a href="suppression.php">Supprimer</a>
                </td>
            </tr>

            <?php
                }
            }else{
                echo "Aucune information disponible.";
            }
            ?>
        </table>
    </div>
</body>
</html>