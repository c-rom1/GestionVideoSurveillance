<?php

/* * ************************
 * * récuperation fichiers **
 * ************************ */

class functionClass {
    /*
     * récupere les fichiers presents
     * dans le $path
     */

    function getFiles($path) {
        $files = array();

        foreach (new RecursiveDirectoryIterator($path) as $file) {
            if (!is_dir($file)) {
                //$files[] = new SplFileInfo($file);
                $fileInfo = new SplFileInfo($file);
                $files[] = array('date' => date("Ymd",$fileInfo->getCTime()), 
                    'path' => $fileInfo->getPathname(), 
                    'name' => $fileInfo->getFilename());
            }
        }
        /* récupere la liste de colonne date */
        foreach ($files as $key => $row) {
            $date[$key]  = $row['date'];
        }
        /* tri du tableau via la colonne date 
         * par ordre croissant*/
        array_multisort($date, SORT_ASC, $files);
        return $files;
    }

    /* ajout d'une variable type
     * qui permet de savoir quel
     * répertoire doit être vider
     * s'il est vide dans ce cas
     * c'est seulement le fichier
     * en parametre qui doit être
     * supprimer
     */

    function supprFiles($fichier, $type) {
        
        if (!empty($type)) {
            if ($type == "video") {
                array_map('unlink', glob("../FI9821P_00626E812B99/record/*.*"));
            } else {
                array_map('unlink', glob("../FI9821P_00626E812B99/snap/*.*"));
            }
        } else {
            unlink("../" . $fichier);
        }
    }

}
