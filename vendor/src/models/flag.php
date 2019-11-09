<?php
namespace models;

session_start();

require_once('../../vendor/autoload.php');

use config\database as config;
use lib\random;

class grab{
	private $request;
	private $generated;

	public function __construct(){
		$this->request = new config();
		$this->generated = new random();
	}
	
	public function update_flag($user){
	try{
		$dbh = $this->request->connection;
		$stmt= $dbh->prepare("update user set tm_flag=:flag where username=:user");
		$result = $stmt->execute(['user'=>$user,'flag'=>'fl4g_'.$this->generated->gen()]);
		return $result;
		}catch(PDOException $e){
			print"database has shutdown!";
			exit;
		}
	}
	
	public function check_flag($user,$flag){
		try{
			$dbh = $this->request->connection;
			$stmt= $dbh->prepare("select tm_flag from user where username=:user");
			$stmt->execute(['user'=>$user]);
			$result = $stmt->fetchAll();
			if($result[0]['tm_flag']==$flag){
				$stmt = $dbh->prepare("update user set stage=stage+1 where username=:user");
				$result = $stmt->execute(['user'=>$user]);
				return $result;
			}else{
				return false;
			}
		}catch(PDOException $e){
			print"database has shutdown!";
			exit;
		}
	}
	
	public function read_flag($u){
		try{
			$dbh = $this->request->connection;
			$stmt= $dbh->prepare("select tm_flag from user where username=:user");
			$stmt->execute(['user'=>$u]);
			$result = $stmt->fetchAll();
			return $result[0]['tm_flag'];
		}catch(PDOException $e){
			print"database has shutdown!";
			exit;
		}
	}

	public function level($u){
		try{
			$dbh = $this->request->connection;
			$stmt= $dbh->prepare("select stage from user where username=:user");
			$stmt->execute(['user'=>$u]);
			$result = $stmt->fetchAll();
			return $result[0]['stage'];
		}catch(PDOException $e){
			print"database has shutdown!";
			exit;
		}
	}
}	
$call = new grab();
