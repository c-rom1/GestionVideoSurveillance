<?php
session_start();
/*
 * validation de l authentification
 */

// On teste si le formulaire a été soumis :

class authentificationClass {

    /*
     * récuperation des informations
     * d'authentification
     */
    function authentification() {
        if ((isset($_POST['utilisateur'])) && (isset($_POST['password']))) {
            $goodAuth = false;
            $lignes = file("auth/ident.auth");
            foreach ($lignes as $ligne) {
                $pos = strpos($ligne, ":");
                $Identifiant = substr($ligne, 0, $pos);
                $Mot_de_passe = substr($ligne, $pos + 1, -1);

                // On teste les données entrées dans le formulaire avec celles du fichier :
                if (($_POST['utilisateur'] == $Identifiant) && (md5($_POST['password']) == $Mot_de_passe)) {
                    // Si celles-ci sont identiques, on créait les sessions `identification`
                    //  et `mot_de_passe` :
                    $_SESSION['identifiant'] = $_POST['utilisateur'];
                    $_SESSION['mot_de_passe'] = md5($_POST['password']);

                    // Puis on redirige le visiteur vers la page d'accueil de l'espace perso :
                    header('Location: ./index.php');
                    exit();
                }
            }
            // Si celles-ci ne sont pas identiques, on incrémente le nombre d'essai : 
            $_SESSION['essai'] ++;
            // Puis on redirige le visiteur vers la page d'authentification :
            header('Location: ./login.php');
            exit();
        }
    }

    /*
     * deconnection
     */
    function deconnection() {
        // suppression des sessions :
        unset($_SESSION['identifiant'], $_SESSION['mot_de_passe']);

//redirection :
        header('Location: ../login.php');

        session_destroy();
        exit();
    }

    /*
     * verifie que l'authentification
     * est bien valide
     */
    function validAuthentification() {
        // On teste la présence des sessions d'identification :
        if ((isset($_SESSION['identifiant'])) && (isset($_SESSION['mot_de_passe']))) {

            $goodAuth = false;
            // Si celles-ci existent, on inclus les données de connexion :
            $lignes = file("auth/ident.auth");
            foreach ($lignes as $ligne) {
                $pos = strpos($ligne, ":");
                $Identifiant = substr($ligne, 0, $pos);
                $Mot_de_passe = substr($ligne, $pos + 1, -1);

                // On teste les données des sessions avec celles du fichier :
                if (($_SESSION['identifiant'] == $Identifiant) && ($_SESSION['mot_de_passe'] == $Mot_de_passe)) {
                    $goodAuth = true;
                }
            }
            if (!$goodAuth) {
                header('Location: ./login.php');
                exit();
            }
        } else {
            // Si les sessions n'existent pas, on redirige à la page d'authentification :
            header('Location: ./login.php');
            exit();
        }
    }

}
