<?php

namespace lib;

class random{
    public function gen(){
		$str = 'abcdefghijklmnopqrstuvwxyz0123456789';
		for($i=0;$i<15;$i++){
			$random  = rand(0,strlen($str)-1);
			$tmp_str.= $str[$random];
		}
		return $tmp_str;
	}
}