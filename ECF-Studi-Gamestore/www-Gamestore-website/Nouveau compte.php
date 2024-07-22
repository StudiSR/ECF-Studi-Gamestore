<!-- Variable de session-->
<?php session_start(); 

    $_SESSION['pseudo'] = "";

?>

<!DOCTYPE html>
<html>    
<head>  
    <title>Nouveau compte</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>

<body>
    <div id="page">
        <div id="header">
        <!-- Header -->
            <header>
                <p>
                    GAMESTORE - Nouveau compte
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
        <div id="contenu_nouveau_compte">
        <!-- Contenu nouveau compte -->
            <div class="créer_compte">
                <h1>
                    Inscription
                </h1>
                <form method="post">
                    <input type="email" name="email" id="email" placeholder="Votre e-mail" required><br/>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" required><br/>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe" required><br/>
                    <input type="submit" name="Confirmer" id="done" value="Valider">
                </form>

                <!-- Récupérer les champs -->
                <?php

                    if(isset($_POST['Confirmer'])){

                        extract($_POST);

                        if(!empty($email) && !empty($password) && !empty($cpassword)){
                            
                            if($password == $cpassword){
                                // sécurité mdp (hashing)
                                $options = [
                                    'cost' => 12,
                                ];

                                $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

                                include 'Inclusions/database.php';
                                global $db;
                                
                                $c = $db->prepare("SELECT email FROM utilisateurs WHERE email = :email");
                                $c->execute(['email' => $email]);
                                $result = $c->rowCount();

                                if($result == 0){
                                    $q = $db->prepare("INSERT INTO utilisateurs(email, password) VALUES(:email,:password)");
                                    $q->execute([
                                        'email' => $email,
                                        'password' => $hashpass
                                    ]);
                                    echo "Le compte a été créé avec succès !";
                                } else {
                                    echo "Un compte avec cet e-mail existe déjà.";
                                }

                            }

                        // affichage erreur champ vide
                        } else {
                            echo"Informations manquantes";
                        }

                    }
                
                ?>
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