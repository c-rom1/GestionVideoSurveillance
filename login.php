<?php 
// Active les sessions
session_start();
include("viewer/function/authentificationClass.php"); 
$auth = new authentificationClass();
$auth->authentification();
?>
<!DOCTYPE html>
<!--
page d'authentification
-->

<html>
    <head>
        <meta charset="UTF-8">
        <!--
        Cette ligne concerne uniquement les mobiles. 
        On demande que l'affichage occupe tout 
        l'espace disponible
        -->        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="language" content="fr"/>
        <meta name="author" content="rhum1" />
        <title>VideoSurveillance</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 class="titre login">Authentification</h1>
                    <form name="authentification" method="POST" action="./login.php">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">Utilisateur :</div>
                            <div class="col-md-3"><input name="utilisateur" id="utilisateur" type="text"/></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">Mot de passe :</div>
                            <div class="col-md-3"><input name="password" id="password" type="password"/></div>
                        </div>
                        <div class="row valid">
                            <div class="col-md-5"></div>
                            <div class="col-md-6">
                                <input type="submit" value="Valider" name="valid" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
