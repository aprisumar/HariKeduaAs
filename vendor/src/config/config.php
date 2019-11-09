<?php
/*
* config database
* create at Mom,05/20/2019
* bye...
*/
namespace config;

class website{

  public $url, $title, $css, $js;
  
  public function __construct(){
	if(isset($_SERVER['HTTP_HOST'])){
		$this->url = 'http://'.$_SERVER['HTTP_HOST'];
	}else{
  	if(isset($_SERVER['SERVER_PORT']) and $_SERVER['SERVER_PORT']!='80'){
		$this->url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
	   }else{
		$this->url = 'http://'.$_SERVER['SERVER_NAME'];
		}
	}
    
        $this->css = $this->url.'/asset/css';
    	  $this->js  = $this->url.'/asset/js';
		  $this->title = 'hello, world!';
  }
}

class database{
    private   $host       = "localhost";
    private   $database   = "db_user";
    private   $user       = "root";
    private   $pass       = "";
    public    $connection = null;
    
    public function __construct(){
      try{
          $this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
          $this->connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      }catch(\PDOException $e){
        $f = fopen('log.cat', 'w');
		  fwrite($f, $e);
		  fclose($f);
      }
    }
    
    public function __destruct(){
      $this->connection = null;
    }

}
