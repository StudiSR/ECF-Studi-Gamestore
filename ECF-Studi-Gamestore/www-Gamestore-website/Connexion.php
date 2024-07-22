<!DOCTYPE html>
<html>    
<head>  
    <title>Gamestore - Connexion</title>
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
        <div id="contenu_connexion">
        <!-- Contenu connexion -->
            <div class="se_connecter">
            <!-- Se connecter -->
                <h1>
                    Connexion
                </h1>
                <form method="post">
                    <input type="email" name="email" id="email" placeholder="Votre e-mail" required><br/>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
                    <input type="submit" name="Confirmer" id="done" value="Valider">
                </form>

                <!-- Récupérer les champs -->
                <?php

                    if(isset($_POST['Confirmer'])){

                        extract($_POST);

                        if(!empty($email) && !empty($password)){
                            
                            include 'Inclusions/database.php';
                            global $db;

                            $q = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
                            $q->execute(['email' => $email]);
                            $result = $q->fetch();

                            if($result == true)
                            {
                                // Ce compte existe.
                                $hashpassword = $result['password'];

                                if(password_verify($password, $hashpassword))
                                {
                                    echo "Connexion réussie !";
                                } else {
                                    echo "Mot de passe incorrect.";
                                }
                            }
                            else
                            {
                              echo "L'adresse e-mail " . $email . " ne correspond à aucun compte.";
                            }

                        // affichage erreur champ vide
                        } else {
                            echo"Informations manquantes";
                        }

                    }
                
                ?>
            </div>
            <div class="oubli_mdp">
            <!-- Mot de passe oublié -->
                <h1>
                    Récupérez votre mot de passe.
                </h1>
                <p>Email : </p>
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