<?php 
class Folder{

	public $code_dossier;
	public $client;
	public $date_creation;
	public $intitule;
	

	public function __construct($code_dossier, $client, $date_creation, $intitule){
		$this->code_dossier = $code_dossier;
		$this->client = $client;
		$this->date_creation = $date_creation;
		$this->intitule = $intitule;
	}
	public static function all(){
		$folderList = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM dossier');

		foreach($req->fetchAll() as $folder){
			$folderList[] = new Folder($folder['code_dossier'], $folder['client'], $folder['date_creation'], $folder['intitule']);
		}
		return $folderList;
	}

	public static function save($client, $date_creation, $intitule){
		$db = Db::getInstance();

		$req = $db->prepare('INSERT INTO dossier (client, date_creation, intitule) VALUES (:client, :date_creation, :intitule)');

		$req->execute(array(
			'client' => $client,
			'date_creation' => $date_creation,
			'intitule' => $intitule,
			));
	}
}

?>