<?php 
function call($controller, $action){
	//Require the file matching the controller's name
	require_once('controllers/'.$controller.'_controller.php');

	//Create an instance of the required controller
	switch($controller){
		case 'pages':
			$controller = new PagesController();
		break;
		case 'collaborators':
			require_once('models/collaborator.php');
			$controller = new CollaboratorsController();
		break;
		case 'folders':
			require_once('models/folder.php');
			$controller = new FoldersController();
		break;
	}

	$controller->{ $action }();
}

	//Allowed values for controllers
$controllers = array(
	'pages' => ['home', 'error'],
	'collaborators' => ['index', 'show', 'add', 'save', 'delete', 'update'],
	'folders' => ['index', 'add', 'save'],
	);

	//Check that the controller and the acction are allowed.
	//else we redirect to error.
if(array_key_exists($controller, $controllers)){
	if(in_array($action, $controllers[$controller])){
		call($controller, $action);
	}
	else{
		call('pages', 'error');
	}
}
else{
	call('pages', 'error');
}
?>