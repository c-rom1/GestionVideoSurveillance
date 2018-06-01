<?php 
// Active les sessions
session_start();
include("viewer/function/authentificationClass.php");
include("viewer/function/functionClass.php");
include("viewer/affichageClass.php");

$auth = new authentificationClass();
$auth->validAuthentification();

$affichage = new affichageClass();
$function = new functionClass();
?>
<!DOCTYPE html>
<!--
Ecran de recuperation des videos et photos 
issues de la camera de surveillance
@author Rhum1
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

        <link rel="shortcut icon" href="images/logo.png" type="image/gif" />
        
    </head>
    
    <body>
        <div class="container">
            <div class="row" >
                <div class="col-md-2"></div>
                <div class="col-md-8 cadre">   
                    <h1 class="titre">Alertes vid&eacute;o surveillance</h1>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 soustitre">Vid&eacute;o
                                    <button value='' onclick='javascript:suppr(this.value, "","video");'>
                                        <img src='images/suppr.png'/>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $affichage->alerteVideos();?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 soustitre" >Photo
                                    <button value='' onclick='javascript:suppr(this.value, "","photo");'>
                                        <img src='images/suppr.png'/>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $affichage->alertePhotos();?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 information">
                            <a href="viewer/interfaces.php?logout=1" title="Se déconnecter">Se déconnecter</a>
                        </div>
                    </div>
                            
                </div>
            </div>
        </div>
        <footer id="footer">
            <div class="text-center ">
                <br />
                <p>&copy; 2018 <a href="http://www.arnes-consulting.fr/">Arn&egrave;s-Consulting</a>.</p>
            </div>
        </footer>
    </body>
<!--
Recuperation des javascript bootstrap et jquery
-->
    <script src="js/jquery-3.3.1.min.js"></script>
        
<!--
Suppression des fichiers présents
photo et video
-->
    <SCRIPT TYPE="text/javascript">
        function suppr(fichier, indice, type)
	{    
            $(document).ready(function(){
                $.ajax({
                    url: "viewer/interfaces.php",
                    type: "POST",
                    data : {fichier: fichier, type: type}
                });
                switch(type) {
                    case "" :
                        $('#'+indice).remove();
                        break;
                    case "photo" :
                        $('#photo').remove();
                        $('#photoVide').show();
                        break;
                    case "video" :
                        $('#video').remove();
                        $('#videoVide').show();
                        break;
                }
            });
        }
        $('#photoVide').hide();
        $('#videoVide').hide();
    </SCRIPT>

</html>