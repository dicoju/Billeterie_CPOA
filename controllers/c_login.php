<?php
session_start();

if (isset($_POST['btonSubmit'])){
    if ($_POST['userName'] and $_POST['userPassword']){
        $userName = htmlspecialchars($_POST['userName']);
        $userPassword = htmlspecialchars($_POST['userPassword']);
        $userPassword = md5($userPassword); // On crypte le mdp
        require_once (PATH_MODELS . 'UserDAO.php');
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userName);
        if ($user == null){
            $erreur = "Pseudo incorrect";
        }
        else{
            if ($user->getUserPassword() == $userPassword) {
                $_SESSION['userName'] = $userName;
                $success = "Connexion réussie";
            }
            else{
                $erreur = "Mot de passe incorrect";
            }
        }
    }
    else{
        $erreur = "Veuillez renseigner tous les champs";
    }
}


//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs
{
    header('Location: index.php?page=login&erreur=' . $erreur);
    exit();
}
elseif (isset($success)){
    header('Location: index.php?page=accueil&success=' . $success);
    exit();
}
else
{
    require_once(PATH_VIEWS.$page.'.php');
}


