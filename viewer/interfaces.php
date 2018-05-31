<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("function/authentificationClass.php");
include("function/functionClass.php");


if (isset($_POST['fichier'])) {
    $function = new functionClass();
    $function->supprFiles($_POST['fichier'], $_POST['type']);
    exit;
}

if (isset($_GET['logout'])) {
    if($_GET['logout'] == 1) {
        $auth = new authentificationClass();
        $auth->deconnection();
    }
    exit;
}