<center>
    <div class='container'>
        <h2 class='form-title'>Sign in</h2>
        <div class='line'></div>

        <form method="post" action="index.php?val=trait">
            <div class='component'>
                <label for='name'></label>
                <input type="text" id="name" name="username" placeholder="Nom d'utilisateur" required><br>
            </div>
            <div class='component'>
                <label for='passwd'>Password:</label>
                <input type="password" id="passwd" name="password" placeholder="Mot de passe" required><br>
            </div>
            <center><input type="submit" name="register" value="register" /></center>

        </form>
        <p>Already registered ? <a href="index.php?val=login">Log in here</a></p>
    </div>
</center> 