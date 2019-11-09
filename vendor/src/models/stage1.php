<?php
session_start();
ob_start();
/*
* create date wed,05/22/2019
* script made bY Johny Aka PETR03X
* Thank to all or other member N45HT
*/

namespace models;

class Request{
	private $request;
	
	public function __construct(){
		$this->request = new unconfig();
	}
	public function login($user,$pass){
		try{
			$dbh = $this->request->connection;
			$stmt= $dbh->prepare("select * from tb_ctf where username=:user and password=:pass");
			$stmt->execute(['user'=>$user,'pass'=>$pass]);
			$result= $stmt->rowCount();
			if($result>=1){
				$_SESSION['ctf_user']=$user;
				return true;
				}else{
				return false;
					}
		}catch(PDOException $e){
			return false;
			}
	}
}
if((isset($_POST['user']) and !empty($_POST['user'])) or (isset($_POST['pass']) and !empty($_POST['pass']))){
	$call = new Request();
	print $call->login($_POST['user'],$_POST['pass']);
	}
?>
