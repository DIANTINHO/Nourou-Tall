<?php
    require_once "../configuration/connexion.php"  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    <header>
        <!-- 🔹 Conteneur pour logo + texte -->
        <div class="logo-section">
            <a href="./index.php"><img src="../assets/images/babamaillot.jpg" alt="Logo Baba Maillot" id="logo"></a>
            <a href="./index.php" style="text-decoration: none;"><p id="baba">Baba Maillot</p></a>
        </div>
        <div class="menu-icon" id="menuBtn" aria-label="Ouvrir le menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>
    <nav id="menu">
        <button class="close-btn" id="closeMenu" aria-label="Fermer le menu">×</button>
    </nav>
</body>
</html>