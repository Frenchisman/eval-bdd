<form method="post" action="?controller=folders&action=save">
	<label for="client">Client :</label>
	<input name="client" type="text" placeholder="Client" <?php if(isset($previous)){ echo 'value="'.$previous['client'].'"';} ?> required />
	<label for="date_creation">date_creation :</label>
	<input name="date_creation" type="date" placeholder="" <?php if(isset($previous)){ echo 'value="'.$previous['date_creation'].'"';} ?> required />
	<label for="intitule">intitulé :</label>
	<input name="intitule" type="text" placeholder="intitulé" <?php if(isset($previous)){ echo 'value="'.$previous['intitule'].'"';} ?> required />
	<button type="submit" name="btn-save">Enregistrer</button>
</form>
