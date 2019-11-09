<?php
namespace system;

session_start();

use config\website as path;

class getView{
	private $path;

	public function view($page){
		$dirs    = 'view';
		$format = '.php';

		$path = new path;
		$this->path = dirname(__DIR__)."/$dirs/";
		if(file_exists($this->path.$page.$format)){
 		 include($this->path.$page.$format);
		}else{
		 include($this->path.'404'.$format);
		}
	}
}
	