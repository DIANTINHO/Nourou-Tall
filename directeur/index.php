<?php
    require_once "../configuration/connexion.php"
?>
<?php
    if(isset($_POST['prenom'],$_POST['nom'],$_POST['mdp'],$_POST['date'],$_POST['lieu'],$_POST['adresse'],$_POST['tele'])){
        //insertion des informations
        $insertion="INSERT INTO directeur(prenom,nom,adresse,date_naissance,lieu_naissance,telephone) VALUES (:prenom,:nom,:adresse,:date_naissance,:lieu_naissance,:telephone)";
        $directeur=$pdo->prepare($insertion);
        $directeur=$directeur->execute([
            ':prenom'=>$_POST(['prenom']),
            ':nom'=>$_POST(['nom']),
            ':adresse'=>$_POST(['adresse']),
            ':date_naissance'=>$_POST(['date']),
            ':lieu_naissance'=>$_POST(['lieu']),
            ':talephone'=>$_POST(['tel']),
        
        ]);
        header("Location: acceuil.php");
    }
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- J'inclus google fonts pour avoir anton -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <title>Page d'inscription</title>
    <style>
        /* Reset et base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        /* La piste du scroll */
        ::-webkit-scrollbar-track {
            background: white;
            border-radius: 10px;
        }
        /* la barre de scroll */
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(white, #7F7F7F, black);
            border: 1px solid white;
            border-radius: 10px;
        }
        body {
            background: url("../images/body.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: black;
            width: 100%;
            padding: 20px;
            font-family: anton;
        }

        
        h1 {
            text-align: center;
            
            
            border-radius: 15px;
            font-family: 'Anton', sans-serif;
            width: 90%;
            max-width: 600px; 
            margin: 20px auto;
            padding: 15px;
            font-size: clamp(1.5rem, 4vw, 2.5rem); 
            /* clamp est une fonction css qui permet de gerer la responsivite 
            du format clamp(vmin,videal,vmax)
            avec vmin la valeur minimal 
            vmax la valeur maximal 
            et videal la valeur responsive (4vw c'est 4% de la largeur de la fenetre) */
        }

        /* Formulaire responsive */
        form {
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(17px);
            border-radius: 15px;
            width: 90%; 
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            gap: 15px;
        }

        /* Labels */
        label {
            font-family: 'Anton', sans-serif;
            font-size: clamp(1rem, 3vw, 1.5rem);
            color: black;
            margin-top: 10px;
        }

        
        .input-with-icon {
            position: relative;
            width: 100%;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 25px;
            height: 25px;
            pointer-events: none;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: 100%;
            padding: 15px 15px 15px 50px; 
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
        }

        /* Bouton responsive */
        .submit {
            background: #7F7F7F;
            padding: 15px 30px;
            border-radius: 10px;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s;
            width: 100%;
            max-width: 300px;
            align-self: center;
        }

        .submit:hover {
            background: #666;
        }

        /* Icône mot de passe */
        #mdp {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 25px;
            height: 25px;
            cursor: pointer;
        }

        /* MEDIA QUERIES - Adaptation mobile */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            h1 {
                width: 95%;
                padding: 10px;
                margin: 10px auto;
            }

            form {
                width: 95%;
                padding: 15px;
                gap: 10px;
            }

            input[type="text"],
            input[type="password"],
            input[type="date"],
            input[type="tel"] {
                padding: 12px 12px 12px 45px;
                font-size: 0.9rem;
            }

            .input-icon,
            #mdp {
                width: 20px;
                height: 20px;
            }
        }

        @media (max-width: 480px) {
            /* h1 {
                font-size: 1.8rem;
                padding: 8px;
            } */

            label {
                font-size: 1.2rem;
            }

            .submit {
                padding: 12px;
                font-size: 1rem;
            }

            form {
                padding: 10px;
            }
        }

        /* Pour très petits écrans */
        @media (max-width: 320px) {
            body {
                padding: 5px;
            }

            form {
                width: 100%;
                border-radius: 10px;
            }

            input[type="text"],
            input[type="password"],
            input[type="date"],
            input[type="tel"] {
                padding: 10px 10px 10px 40px;
            }
        }
    </style>
</head>
<body>
    <h1>Formulaire d'inscription</h1>
    <form action="index.php" method="POST">
        <label for="prenom">Prenom du directeur:</label>  
        <div class="input-with-icon">
            <img src="../images/login.png" alt="Icone login" class="input-icon">
            <input type="text" name="prenom" class="champ" placeholder="Prenom du directeur" required>
        </div>
        <label for="nom">Nom du directeur:</label>  
        <div class="input-with-icon">
            <img src="../images/login.png" alt="Icone login" class="input-icon">
            <input type="text" name="nom" class="champ" placeholder="Nom du directeur" required>
        </div>
        
        <label for="pass">Mot de passe:</label>  
        <div class="input-with-icon">
            <img src="../images/password.png" alt="Icone mot de passe" class="input-icon">
            <input type="password" name="pass" class="champ" id="password" placeholder="Mot de passe" required>
            <img src="../images/see.png" alt="Icone mot de passe" id="mdp" onclick="voir()">
        </div>
        
        <label for="cdmp">Confirmez votre mot de passe:</label>
        <input name="cdmp" type="password" id="cmdp" placeholder="Confirmez votre mot de passe">
        
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" placeholder="veuillez renseigner votre adresse" required>
        
        <label for="lieu">Lieu de naissance</label>
        <input type="text" name="lieu" placeholder="veuillez renseigner votre lieu de naissance" required>

        <label for="date">Date de naissance</label>
        <input type="date" name="date" placeholder="veuillez renseigner votre date de naissance" required>      
        <label for="tele">Numero de telephone du directeur</label>
        <div class="input-with-icon">
            <img src="../images/tel.png" alt="Icone de la date de naissance" class="input-icon">
            <input type="tel" name="tele" placeholder="771234567" required>
        </div>
        
        <input type="submit" class="submit" value="M'inscrire" id="button">     
    </form>
</body>
<script>
    function voir() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('mdp');
        if (pwd.type === "password") {
            pwd.type = "text";
            icon.src = "../images/unsee.png";
        } else {
            pwd.type = "password";
            icon.src = "../images/see.png";
        }
    }
    
    var button = document.getElementById("button");
    if (button) {
        button.addEventListener("click", function(event) {
            var cmdp = document.getElementById("cmdp").value;
            var mdp = document.getElementById("password").value;
            if (mdp !== cmdp) {
                alert("Vos mots de passe ne sont pas identiques");
                event.preventDefault();
                //ceci bloque l'envoie du formulaire
            }
        });
    }
</script>
</html>