<?php
if (!isset($_REQUEST['val'])) {
    include "accueil.php";
} else {
    switch ($_REQUEST['val']) {
        case 'trait':
            include "traitement.php";
            break;
        case 'list':
            include "liste.php";
            break;
        case 'task':
            include "form-task.php";
            break;
        case 'login':
            include "login.php";
            break;
        case 'signin':
            include "signin.php";
            break;
        case 'home':
            include "accueil.php";
            break;
        default:
            include "accueil.php";
    }
}
