<div class="tasks">
    <?php
    require "connexion.php";
    $sql = ("SELECT * FROM taches");
    $req = $connexion->prepare($sql);
    $req->execute();

    while ($row = $req->fetch()) {
        if ($row['status'] === 'En cours') {
            echo " <br/>
            <center>
            <form method='POST' action=index.php?val=trait>
            <input type='hidden' name='status' value=" . $row['status'] . ">
            <input type='hidden' name='mon_id' value=" . $row['id'] . ">
                 <div class='form-task'>
                    <div class='id-task'>
                    <h2>Task N° " . $row['id'] . " </h2> <h3 style='color:gold;'> " . $row['status'] . " </h3> </div>
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
                        <button name='action' class='btn-update' value='update'>Updated</button>
                        <button name='action' class='btn-delete' value='delete'>Deleted</button>
                        <button name='action' class='btn-finish' value='finish'>Finished</button>
                    <center/>
                    </div>
                </div>
            </center></form>";
        } else {
            echo "<br/>
            <center>
            <form method='POST' action=index.php?val=trait>
            <input type='hidden' name='status' value=" . $row['status'] . ">
            <input type='hidden' name='mon_id' value=" . $row['id'] . ">
                 <div class='form-task'>
                    <div class='id-task'>
                    <h2>Task N° " . $row['id'] . " </h2> <h3 style='color:green;'> " . $row['status'] . " </h3> </div>
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