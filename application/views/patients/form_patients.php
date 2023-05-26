<!DOCTYPE html>
<html>
<head>
    <title>Formulaire Patient</title>
</head>
<body>

<h2>Formulaire Patient</h2>

<?php echo validation_errors(); ?>

<form method="post" action="<?php echo site_url('patients/enregistrer'); ?>">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>
      <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom" required><br><br>
      <label for="telephone">Telephone :</label>
    <input type="text" id="telephone" name="telephone" required><br><br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Enregistrer">
</form>

</body>
</html>
