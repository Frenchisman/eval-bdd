<?php 

class FoldersController{
	public function index(){
			//Store all elements in a variable
		$folders = Folder::all();
		require_once('views/folders/index.php');
	}

	public function add(){
		require_once('views/folders/add.php');	
	}

	public function save(){
					//check is done client side but should be reckecked here, no time.
		Folder::save($_POST['client'], $_POST['date_creation'], $_POST['intitule']);

		$this->index();
	}
}
?>