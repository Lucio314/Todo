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
        default:
            include "accueil.php";
    }
}
