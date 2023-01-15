<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Captureur d'image</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <p>Captureur d'image</p>
</header>

<body>

    <h1>Bienvenue sur le captureur d'image</h1>

    <form class="form" action="index.php" method="post" enctype="multipart/form-data">
        <?php
        echo '
            <tr>
                <td>
                    <input type="text" placeholder="Entrez votre nom" name="nom">
                </td>
            </tr><br/>

            <tr>
                <td>
                    <input type="file" name="image">
                </td>
                </tr><br/> 
            <button>Envoyer</button><br/>';       
        
            if(isset($_POST['nom']) && ($_FILES['image'])) {
                
                $name = htmlspecialchars($_POST['nom']);

                echo '<p class="hello"> Bonjour '.$name.' vous avez 2 nouveaux messages </p><br/>';
                echo 'Bien envoyer le fichier : '.$_FILES['image']['name'].'';
            }
    echo '</form>
    <p class="gallery">
        <h1>Hello '.$name.' et bienvenue.
    </p>';
    ?>

</body>
</html>