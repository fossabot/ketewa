<?php
require_once 'iprocess.php';
/**
* 
*/
class Process extends Database implements IProcess
{
	private $textID = false;

	function __construct(){
		parent::__construct();
	}

	function processText($text)
	{
		$this->_add_to_database($text);
		return $this->textID;
	}

	function fetchText($textID)
	{
		return $this->_fetch_from_database($textID);
	}

	private function _add_to_database($text){
		$tid = $this->genTextID();
		try{
			$sth = $this->pdo->prepare("INSERT INTO kt_texts (textid, textcontent, timeadded) VALUES (?, ?, ?)");
			if($sth->execute([$tid, $text, time()])) $this->textID = $tid;
		}
		catch(PDOException $ex){}
	}

	private function _fetch_from_database($textID){
		try{
			$sth = $this->pdo->prepare("SELECT * FROM kt_texts WHERE textid = ? LIMIT 1");
			$sth->execute([$textID]);
			return $sth->fetchObject();
		}
		catch(PDOException $ex){
			return [];
		}
	}

	private function genTextID(){
		$spice = "ketewa#";
		$uniqID = uniqid("$spice");
		return hash("crc32", $uniqID);
	}
}