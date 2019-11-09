<?php
namespace models;
session_start();
require_once('../../autoload.php');

use config\database as config;

class action{
	public $user;
	public $pass;
	protected $database;

	public function __construct(){
		$this->database = new config();
	}

	public function login($user,$pass){
	try{
		if(!empty($this->database->connection)){
		$db = $this->database->connection;
		$DBH= $db->prepare("select * from tbl_user where username=:user and password=MD5(:pass)");
		$DBH->execute(['user'=>$user,'pass'=>$pass]);
		$result = $DBH->rowCount();
		$data = $DBH->fetchAll(\PDO::FETCH_ASSOC);
		if($result>=1){
		$_SESSION['user']=$user;
		$_SESSION['logout']=$user;
		return ['user'=>$data[0]['name'],'status'=>true];
		}else{
		return ['status'=>false];
		}
}else{
		return ['status'=>false];
}
		}catch(\PDOException $e){
		return ['status'=>false];
		}
	}
}

$call = new action();
/*
$call->user = $_POST['username'];
$call->pass = $_POST['password'];
*/
if($_POST and isset($_POST['username'])){
$msg = $call->login($_POST['username'],$_POST['password']);
print(json_encode($msg, true));
}else{
$msg = ['status'=>false];
print(json_encode($msg, true));
}

