<p>Liste des Dossiers</p>

<?php if(isset($message)){ ?>
	<p><?php echo $message ?>
<?php } ?>

	<a href="?controller=folders&action=add">Ajouter un dossier</a>
	<?php foreach($folders as $folder) { ?>
	<p>
		<?php echo "$folder->client $folder->date_creation $folder->intitule"; ?>
		<a href="?controller=folders&action=show&code=<?php echo $folder->code; ?>">Détails</a>
		<a href="?controller=folders&action=delete&code=<?php echo $folder->code; ?>">Supprimer</a>
		<a href="?controller=folders&action=update&code=<?php echo $folder->code; ?>">Modifier</a>
	</p>

	<?php } ?>