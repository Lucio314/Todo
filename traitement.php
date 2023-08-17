<?php
session_start();
include("connexion.php");

// Vérification de l'action à effectuer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (isset($_POST['save-tache'])) {
            $action = $_POST['save-tache'] ?? "";
            if ($action === 'Register') {
                // Récupération des données du formulaire
                $title = $_POST['title'] ?? "";
                $description = $_POST['description'] ?? "";
                $dates = $_POST['dates'] ?? "";
                $sql = "SELECT `id_user` FROM users WHERE username = ? ";
                $req = $connexion->prepare($sql);
                $req->execute([$user['username']]);
                $user = $req->fetch();
                // Insertion de la tâche dans la base de données
                $sql = "INSERT INTO tasks(title, description, dates,id_user) VALUES (?, ?, ?,?)";
                $req = $connexion->prepare($sql);
                $req->execute([$title, $description, $dates, $user['id_user']]);

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
                $sql = "UPDATE tasks SET title=?, description=?, dates=? WHERE `id_task`=?";
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
                $sql = "DELETE FROM tasks WHERE `id_task`= :mon_id";
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

                $sql = "UPDATE tasks SET status=? WHERE `id_task`=?";
                $req = $connexion->prepare($sql);
                $req->execute([$fin, $mon_id]);

                //   echo "Tâche n°" . $mon_id . " terminée";
                header('Refresh:1; URL=index.php?val=list');
                exit; // Terminer le script ici
            }
        }
    }
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE username = ? ";
        $req = $connexion->prepare($sql);
        $req->execute([$username]);
        $user = $req->fetch();

        if (!empty($user)) {
            header('Refresh:1; URL=index.php?val=signin');
            echo "username already exist!";
        } else {
            $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
            $result = $connexion->prepare($query);
            $result->execute();
            if ($result) {
                echo "Inscription réussie.";
                header('Refresh:1,URL=index.php?val=login');
                exit;
            } else {
                echo "Erreur lors de l'inscription : " . $connexion->errorCode();
            }
        }
    }
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $connexion->prepare($query);
        $result->execute();
        $user = $result->fetch();
        var_dump($user);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php?val=home");
            exit;
        } else {
            echo "Identifiants invalides.";
        }
    }
}
