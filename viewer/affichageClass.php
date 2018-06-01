<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Permet l'affichage des
 * photos et videos
 *
 * @author rhum1
 */
class affichageClass {

    /*
    * affichage des alertes photos
    */
    function alertePhotos() {
        $functionFiles = new functionClass();
        $fileCam = $functionFiles->getFiles('FI9821P_00626E812B99/snap');

        if (count($fileCam) > 0) {
            $compteur = 1;
            print_r("<ul id='photo'>");
            $date = 0;
            $nbDiffDate = 1;
            foreach ($fileCam as $path2) {
                /*comparer les dates
                * ajouter la ligne de 
                * la nouvelle date */
                if ($date == 0 ) {
                    $date = $path2['date'];
                    print_r("<ul id='photoDate".$nbDiffDate."' class='styleDateUL'><li class='styleDateLI'>".$path2['date']);
                    print_r("<button value='' onclick=''><img src='images/suppr.png'/></button>");
                    print_r("</li>");
                } else if ($date != $path2['date']) {
                    $date = $path2['date'];
                    print_r("</ul><ul id='photoDate".$nbDiffDate++."'><li>".$path2['date']);
                    print_r("<button value='' onclick=''><img src='images/suppr.png'/></button>");
                    print_r("</li>");
                }
                print_r("<li id='photo" . $compteur . "'><a href='" . $path2['path'] . "'>" . $path2['name'] . "</a>&nbsp;&nbsp;&nbsp;");
                print_r("<button value='" . $path2['path'] . "' onclick='javascript:suppr(this.value, \"photo" . $compteur . "\",\"\");'><img src='images/suppr.png'/></button>");
                print_r("</li>");
                $compteur = $compteur + 1;
            }
            print_r("</ul>");
            print_r("</ul>");
            print_r("<p id='photoVide'>Aucun fichier</p>");
        } else {
            print_r("<p>Aucun fichier</p>");
        }
    }

    /*
     * affichage des alertes videos
     */
    function alerteVideos() {
        $functionFiles = new functionClass();
        $fileCam = $functionFiles->getFiles('FI9821P_00626E812B99/record');
        
        if (count($fileCam) > 0) {
            $compteur = 1;
            print_r("<ul id='video'>");
            foreach ($fileCam as $path2) {
                /*comparer les dates
                * ajouter la ligne de 
                * la nouvelle date */
                if ($date == 0 ) {
                    $date = $path2['date'];
                    print_r("<ul id='videoDate".$nbDiffDate."' class='styleDateUL'><li class='styleDateLI'>".$path2['date']);
                    print_r("<button value='' onclick=''><img src='images/suppr.png'/></button>");
                    print_r("</li>");
                } else if ($date != $path2['date']) {
                    $date = $path2['date'];
                    print_r("</ul><ul id='photoDate".$nbDiffDate++."'><li>".$path2['date']);
                    print_r("<button value='' onclick=''><img src='images/suppr.png'/></button>");
                    print_r("</li>");
                }
                print_r("<li id=video" . $compteur . "><a href='" . $path2['path'] ."'>" . $path2['name'] . "</a>&nbsp;&nbsp;&nbsp;");
                print_r("<button value='" . $path2['path'] . "' onclick='javascript:suppr(this.value, \"video" . $compteur . "\",\"\");'><img src='images/suppr.png'/></button>");
                print_r("</li>");
                $compteur = $compteur + 1;
            }
            print_r("</ul>");
            print_r("</ul>");
            print_r("<p id='videoVide'>Aucun fichier</p>");
        } else {
            print_r("<p>Aucun fichier</p>");
        }
    }

}
