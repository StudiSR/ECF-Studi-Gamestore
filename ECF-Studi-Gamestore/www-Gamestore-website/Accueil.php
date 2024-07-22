<!-- Variable de session-->
<?php session_start(); 

    $_SESSION['pseudo'] = "";

?>

<!DOCTYPE html>
<html>    
<head>  
    <title>Gamestore</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>

<body>
    <div id="page">
        <div id="header">
        <!-- Header -->
            <header>
                <p>
                    GAMESTORE
                </p>
            </header>
        </div>
        <div id="menu_de_navigation">
        <!-- Menu de navigation -->

        <nav class="menu-nav">
            <ul>
                <li class="bouton">
                    <a href="http://localhost/www%20Gamestore%20website/Accueil.php">
                        Accueil
                    </a>
                </li>
                <li class="bouton">
                    <a href="http://localhost/www%20Gamestore%20website/Mon%20espace.php"> 
                        Mon espace
                    </a>
                </li>
                <li class="bouton">
                    <a href="http://localhost/www%20Gamestore%20website/Panier.php"> 
                        Panier
                    </a>
                </li>
                <li class="bouton">
                    <a href="http://localhost/www%20Gamestore%20website/Connexion.php">
                        Connexion
                    </a>
                </li>
                <li class="bouton">
                    <a href="http://localhost/www%20Gamestore%20website/Nouveau%20compte.php">
                        Créer un compte
                    </a>
                </li>
                    <li class="bouton">
                        <a href="http://localhost/www%20Gamestore%20website/Page_admin.php">
                            Page admin
                        </a>
                    </li>
            </ul>
            </nav>
        </div>
        <div id="contenu_accueil">
        <!-- Contenu accueil -->
            <div class="leftbox">
            <!-- Descriptif de l'entreprise -->
                <h1>
                    Qui sommes-nous ?
                </h1>
            </div>
            <div class="rightbox">
            <!-- Derniers jeux et promotions -->
                <h1>
                    Derniers jeux et promos
                </h1>
            </div>
        </div>
        <div id="footer">
        <!-- Footer -->
            <footer>
                <p>
                    Copyright &copy; 2024 StudiSR - MIT License
                </p>
            </footer>
        </div>
    </div>
</body>
</html>