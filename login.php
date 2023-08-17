<center>
    <div class='container'>
        <h2 class='form-title'>Log in</h2>
        <div class='line'></div>

        <form method="post" action="index.php?val=trait">
            <div class='component'>
                <label for='title'>Log in</label>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
            </div>
            <div class='component'>
                <label for='title'>Password:</label>
                <input type="password" name="password" placeholder="Mot de passe" required><br>
            </div>
            <center><input type="submit" name="login" value="login" /></center>
            <p>Not registered yet? <a href="index.php?val=signin">Register here</a></p>
        </form>
    </div>
</center>