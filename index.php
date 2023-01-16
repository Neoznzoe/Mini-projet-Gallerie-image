<?php

    // VERIFIER SI L'IMAGE EST BIEN RECU

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $error = 1;

        // TAILLE
        if($_FILES['image']['size'] <= 3000000){

            // EXTENSION
            $infoImage = pathinfo($_FILES['image']['name']);
            $extensionImage = $infoImage['extension'];
            $extensionArray = array ('jpg', 'png', 'jpeg','gif');

            if(in_array($extensionImage, $extensionArray)){

                $imageName = 'uploads/'.time().rand().'.'.$extensionImage;

                // ENVOYER L'IMAGE
                move_uploaded_file($_FILES['image']['tmp_name'], $imageName);
                $error = 0;

            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Captureur d'image</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <h1 class="header">Captureur d'image</h1>
</header>

<body>
    <div>
        <h1 class="body_header">Bienvenue sur le captureur d'image</h1>

        <form action="index.php" method="post" enctype="multipart/form-data">
            <p>
                <input type="file" name="image" required><br>
                <button type="submit">Envoyer</button>
            </p>
        </form>

        <?php
            if(isset($error) && $error==0){

                echo '<div id="galery">
                        <img src="'.$imageName.'" id="image"/>';

            } elseif(isset($error) && $error !=0){
                echo 'Votre image ne peut pas être envoyée. Vérifiez son extension et sa taille (maximum à 3mo). </div>';
            }
        ?>
        
        </div>

    </body>
</html>