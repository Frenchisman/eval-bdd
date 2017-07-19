<form method="post" action="?controller=collaborators&action=save">
	<label for="name">Prénom :</label>
	<input name="name" type="text" placeholder="Prénom" <?php if(isset($previous)){ echo 'value="'.$previous['name'].'"';} ?> required />
	<button type="submit" name="btn-save">Enregistrer</button>
</form>
