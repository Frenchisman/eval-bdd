<?php 
	class Collaborator{
		public $code;
		public $name;
	

		public function __construct($code, $name){
			$this->code = $code;
			$this->name = $name;
		}

		public static function all(){
			$collabList = [];
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM collaborateur');

			foreach($req->fetchAll() as $collaborator){
				$collabList[] = new Collaborator($collaborator['code'], $collaborator['prenom']);
			}
			return $collabList;
		}

		public static function find($code){
			$db = Db::getInstance();
			//Make sure id is an integer
			$code = intval($code);

			$req = $db->prepare('SELECT * FROM collaborateur WHERE code = :code');

			$req->execute(array('code' => $code));
			$collaborator = $req->fetch();

			return new Collaborator($collaborator['code'], $collaborator['prenom']);
		}

		public static function save($name){
			$db = Db::getInstance();

			$req = $db->prepare('INSERT INTO collaborateur (prenom) VALUES (:name)');

			$req->execute(array('name' => $name));
		}

		public static function delete($code){
			$db = Db::getInstance();
			$req = $db->prepare('DELETE FROM collaborateur WHERE code = :code');

			$req->execute(array('code' => $code));
		}


	}


 ?>