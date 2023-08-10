<?php
require("connexion.php");

// Vérification de l'action à effectuer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save-tache'])) {
        $action = $_POST['save-tache'] ?? "";
        if ($action === 'Register') {
            // Récupération des données du formulaire
            $title = $_POST['title'] ?? "";
            $description = $_POST['description'] ?? "";
            $dates = $_POST['dates'] ?? "";

            // Insertion de la tâche dans la base de données
            $sql = "INSERT INTO taches(title, description, dates) VALUES (?, ?, ?)";
            $req = $connexion->prepare($sql);
            $req->execute([$title, $description, $dates]);

            echo "<h1 style='color: gold; background:green; padding: 80px;'>Task added successfully!♠♣♦☺☻♥</h1>";
            header('Refresh: 3; URL=index.php?val=list');
            exit; // Terminer le script ici
        } elseif ($action === 'Updated') {
            // Récupération des données du formulaire
            $id = $_POST['id'] ?? 0;
            $title = $_POST['title'] ?? "";
            $description = $_POST['description'] ?? "";
            $dates = $_POST['dates'] ?? "";

            // Mise à jour dans la base de données
            $sql = "UPDATE taches SET title=?, description=?, dates=? WHERE id=?";
            $req = $connexion->prepare($sql);
            $req->execute([$title, $description, $dates, $id]);

            echo "<h1 style='color: gold; background:green; padding: 80px;'>Task n°" . $id . " updated successfully♥</h1>";
            header('Refresh: 2; URL=index.php?val=list');
            exit; // Terminer le script ici
        }
    }

    if (isset($_POST['action'])) {
        $mon_id = $_POST['mon_id'];
        $action = $_POST['action'] ?? "";

        // suppression d'une tâche
        if ($action === "delete") {
            $sql = "DELETE FROM taches WHERE id = :mon_id";
            $req = $connexion->prepare($sql);
            $req->bindParam(':mon_id', $mon_id, PDO::PARAM_INT);
            $req->execute();

            //  echo "Tâche n°" . $mon_id . " supprimée avec succès.";
            header('Refresh:0 ; URL=index.php?val=list');
            exit; // Terminer le script ici
        } elseif ($action === 'update') {
            header('Location: index.php?val=task&mon_id=' . $mon_id);
            exit; // Terminer le script ici
        } elseif ($action === 'finish') {
            $d = new DateTime();
            $today = $d->format('l d M Y H:i');
            $fin = "Completed (" . $today . ")";

            $sql = "UPDATE taches SET status=? WHERE id=?";
            $req = $connexion->prepare($sql);
            $req->execute([$fin, $mon_id]);

            //   echo "Tâche n°" . $mon_id . " terminée";
            header('Refresh:1; URL=index.php?val=list');
            exit; // Terminer le script ici
        }
    }
}
