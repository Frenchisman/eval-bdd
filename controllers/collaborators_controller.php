<?php 
	class CollaboratorsController{
		public function index(){
			//Store all elements in a variable
			$collaborators = Collaborator::all();
			require_once('views/collaborators/index.php');
		}

		public function show(){
			//expect an url with a code.
			if(!isset($_GET['code'])){
				return call('pages', 'error');
			}

			$collaborator = Collaborator::find($_GET['code']);
			require_once('views/collaborators/show.php');
		}

		public function add(){
			require_once('views/collaborators/add.php');
		}

		public function save(){
			//check is done client side but should be reckecked here, no time.
			Collaborator::save($_POST['name']);
			$this->index();

		}

		public function delete(){
			//expect an url with a code
			if(!isset($_GET['code'])){
				return call('pages', 'error');
			}
			Collaborator::delete($_GET['code']);
			$message = "Collaborateur éliminé.";
			$this->index();


		}

		public function update(){
			//expect an url with a code.
			if(!isset($_GET['code'])){
				return call('pages', 'error');
			}
			$collaborator = Collaborator::find($_GET['code']);
			$previous = array( 'name' => $collaborator->name);
			require_once('views/collaborators/add.php');
		}




	}
 ?>