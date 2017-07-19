<p>List des Collaborateurs</p>

<?php if(isset($message)){ ?>
	<p><?php echo $message ?>
<?php } ?>

	<a href="?controller=collaborators&action=add">Ajouter un collaborateur</a>
	<?php foreach($collaborators as $collaborator) { ?>
	<p>
		<?php echo $collaborator->name; ?>
		<a href="?controller=collaborators&action=show&code=<?php echo $collaborator->code; ?>">Détails</a>
		<a href="?controller=collaborators&action=delete&code=<?php echo $collaborator->code; ?>">Supprimer</a>
		<a href="?controller=collaborators&action=update&code=<?php echo $collaborator->code; ?>">Modifier</a>
	</p>

	<?php } ?>