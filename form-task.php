<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?val=home");
    exit;
}

$user = $_SESSION['user'];
require('connexion.php');
if (isset($_REQUEST['mon_id'])) {
    $query = 'SELECT `id_task` FROM tasks';
    $req = $connexion->prepare($query);
    $req->execute();
    while ($list_id = $req->fetch()) {
        if ($_REQUEST['mon_id'] == $list_id['id_task']) {
            $mon_id = $_REQUEST['mon_id'];
            $sql = sprintf("SELECT * FROM tasks WHERE `id_task`=%d", $mon_id);
            $req = $connexion->prepare($sql);
            $req->execute();
            $row = $req->fetch();
        }
    }
}
?>

<center>
    <h1> <?php echo 'Bienvenue  ' . $user['username'] . $user['id_user']; ?> !</h1>
    <div class='container'>
        <h2 class='form-title'>Add Task</h2>
        <div class='line'></div>
        <form action='index.php?val=trait' method='POST'>
            <div class='form-components'>
                <input type='hidden' name='id' id='id' value=' <?php if (isset($row)) echo $row['id']; ?> '>
                <div class='component'>
                    <label for='title'>Title:</label>
                    <input type='text' name='title' id='title' value='<?php if (isset($row)) echo $row['title']; ?>'>
                </div>
                <div class='component'>
                    <div> <label for='description'>Description:</label></div>
                    <div class='form-area'><textarea name='description' id='description' rows='3' required><?php if (isset($row))  echo $row['description']; ?></textarea>
                    </div>
                </div>
                <div class='component'>
                    <label for='dates'>Date:</label>
                    <input type='date' name='dates' value='<?php if (isset($row))  echo $row['dates']; ?>' required id='dates'>
                </div>
                <center>
                    <div>
                        <input type='submit' name='save-tache' value='<?php $a =  (isset($row)) ?  'Updated' : 'Register';
                                                                        echo $a ?>' required id='submits'>
                    </div>
                </center>
            </div>
        </form>
    </div>
</center>";