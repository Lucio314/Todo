<form action="submit.php" method="POST" enctype="multipart/form-data">
    <!-- Ajout des champs email et message -->
    <div class="mb-1">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" />
    </div>
    <div class="mb-2">
        <label for="message">Votre message</label>
        <input type="text" name="message" id="message" />
    </div>
    <!-- Ajout champ d'upload ! -->
    <div class="mb-3">
        <label for="screenshot" class="form-label">Votre capture d'écran</label>
        <input type="file" class="form-control" id="screenshot" name="screenshot" />
    </div>
    <!-- Fin ajout du champ -->
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>