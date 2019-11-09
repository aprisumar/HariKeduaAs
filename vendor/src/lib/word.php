<?php

namespace lib;

class word{

	public function filter($str, $int){
	    $total = strlen($str)-1;
	    $result = null;
	    for($i=0;$i<strlen($str);$i++){
	        $cc = 0;
	        $str_tmpt = null;
	        for($c=$i;$c<strlen($str);$c++){
	            if($str[$i]!=$str[$c] || $i==$total){
	                if($cc > $int || $i==$total){
	                    $result .= $str[$i];
	                }else{
	                    $result .= $str_tmpt;
	                }
	                if($i!=$total){
 	                    $i = $c-1;
	                }
                    break;
	           }else{
	                $cc++;
	                $str_tmpt .= $str[$i];
	            }
	        }
	    }
	  return $result;
	}
	
	
	public function find_badword($str){
		$filter = ['kontol','ktl','ktol','kt0l','kontl','knt0l','kt0l','kntl','k0ntl','memek','anjing','anjg','4nj1ng','anj1nk','anj3ng','4nj3ng','anj3nk','4nj3nk','bangsat','bodoh','goblog','gblk','gblg','bngsd','bngt','k0nt0l','k0n70l','babi','b4b1','b4bi','bab1','monyet','m0nyet','m0ny3t','mnyt','monyt','m0nyt','mnyet','mny3t','g0bl0g','gobl0g','b4ngs4t','m3m3k','mem3k','m3emek','mem3ek','m3mek','mm3k','mmk','m3emk','m3em3ek','mem3ek','me3mek','mme3k','mm3ek','m3m3ek','4su','asu','4so','4s0'];
		$escape = ['masuk'];
		$str = str_replace($escape, '', $str);

		foreach($filter as $bad_word){
			if(stristr($str, $bad_word)){
				return ['status' => false, 'detected'=> $bad_word];
			}
		}
	return ['status' => true];
	}

}