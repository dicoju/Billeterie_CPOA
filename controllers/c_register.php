<?php
session_start();

if (isset($_POST['btonSubmit'])){
    if ($_POST['userName'] and $_POST['userPassword'] and $_POST['userPasswordVerify'] and $_POST['userEmail']){
        $userName = htmlspecialchars($_POST['userName']);
        $userPassword = htmlspecialchars($_POST['userPassword']);
        $userPasswordVerify = htmlspecialchars($_POST['userPasswordVerify']);
        $userEmail = htmlspecialchars($_POST['userEmail']);

        if ($userPassword == $userPasswordVerify){
            // On ajoute en base
            $userPassword = md5($userPassword); // On crypte le mdp
            require_once (PATH_MODELS . 'UserDAO.php');
            $userDAO = new UserDAO();
            $userDAO->createUser($userName, $userPassword, $userEmail);

            $_SESSION['userName'] = $userName;
            $success = "Votre compte à bien été enregistré";
        }
        else{
            $erreur = "Les deux mot de passes ne sont pas identiques";
        }
    }
    else{
        $erreur = "Veuillez renseigner tous les champs";
    }
}




//Redirection ou appel de la vue
if(isset($erreur)) // affichage des erreurs
{
    header('Location: index.php?page=register&erreur=' . $erreur);
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

