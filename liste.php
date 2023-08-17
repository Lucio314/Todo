<div class="tasks">
    <?php
    session_start();
    require "connexion.php";
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?val=home");
        exit;
    }

    $user = $_SESSION['user'];
    
    $sql = "SELECT * FROM users WHERE username = ? ";
    $req = $connexion->prepare($sql);
    $req->execute([$user['username']]);
    $result = $req->fetch();

    $sql = "SELECT  * FROM tasks WHERE id_user = ?";
    $req = $connexion->prepare($sql);
    $req->execute([$result['id_user']]);
    while ($row = $req->fetch()) {
        if ($row['status'] === 'In progress') {
            echo " <br/>
            <center>
            <form method='POST' action=index.php?val=trait>
            <input type='hidden' name='status' value=" . $row['status'] . ">
            <input type='hidden' name='mon_id' value=" . $row['id_task'] . ">
                 <div class='form-task'>
                    <div class='id_task'>
                    <h2>Task N° " . $row['id_task'] . " </h2> <h3 style='color:gold;'> " . $row['status'] . " </h3> </div>
                    <div class='line'></div>
                    <div class='desc-task'>
                        <h3>Description: </h3>
                        <p>
                            " . $row['description'] . "
                        </p>
                    </div>
                    <div class='date-task'>" . $row['dates'] . "</div>
                    <div class=' status-task>
                    </div>
                    <br>
                    <div class='button-task'>     
                    <center>
                        <button name='action' class='btn-update' value='update'>Update</button>
                        <button name='action' class='btn-delete' value='delete'>Delete</button>
                        <button name='action' class='btn-finish' value='finish'>Finish</button>
                    <center/>
                    </div>
                </div>
            </center></form>";
        } else {
            echo "<br/>
            <center>
            <form method='POST' action=index.php?val=trait>
            <input type='hidden' name='status' value=" . $row['status'] . ">
            <input type='hidden' name='mon_id' value=" . $row['id_task'] . ">
                 <div class='form-task'>
                    <div class='id_task'>
                    <h2>Task N° " . $row['id_task'] . " </h2> <h3 style='color:green;'> " . $row['status'] . " </h3> </div>
                    <div class='line'></div>
                    <div class='desc-task'>
                        <h3>Description: </h3>
                        <p>
                            " . $row['description'] . "
                        </p>
                    </div>
                    <div class='date-task'>" . $row['dates'] . "</div>
                    <div class=' status-task>
                    </div>
                    <br>
                    
                    <div class='button-task'>                       
                    <center> <button name='action' class='btn-delete' value='delete'>Delete</button><center/>
                    </div>
                
                </div>
            </center></form>";
        }
    }
    ?>
</div>