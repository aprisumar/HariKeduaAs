<?php
ob_start();
/*
* create date wed,05/22/2019
* script made bY Johny Aka PETR03X
* Thank to all or other member N45HT
*/
require_once('../asset/config/config_unsafe/config.php');
include_once('../substr/header.php');
include_once('../asset/config/config_safe/flag.php');
if(isset($_SESSION['user'])){
if($call->level($_SESSION['user'])==1){

class page{
public $id;
protected $request;

public function __construct(){
$this->request = new unconfig();
}
public function view(){
try{
$dbh = $this->request->connection;
$stmt= $dbh->prepare("select id,page from tb_ctf where id=".$this->id);
$stmt->execute();
if($stmt->rowCount()>=1){
$data =  $stmt->fetchAll(PDO::FETCH_OBJ);
return $data;
}else{
return ['0'=>(object)['id'=>$this->id,'page'=>'unknow resource!']];
}
}catch(PDOException $e){
$e = preg_match_all('/You have(.*?)line 1/i',$e, $o)? $o[0][0]:preg_match_all('/Column(.*?)\' /i',$e, $o)? $o[0][0]:preg_match_all('/Cardinality (.*?)columns/i',$e, $o)? $o[0][0]:$e;
print "Error : $e";

}
}

}
print'
    <div class="container-fluid bg-light text-white  justify-content-center">
    <div class="row border border-secondary text-dark">
    <div id="content" class="pb-1 col-lg-10 bg-light text-dark">
    <div class="mt-1 card">
<div class="card-body">
<h5 class="card-title">BreakingNews!</h5>
';
$call = new page();
if(isset($_GET['id']) and !empty($_GET['id'])){
if(!preg_match('/by/i', strtolower($_GET['id']))){
$id = str_replace('order by','',strtolower($_GET['id']));
$call->id = $id;
$parse = $call->view()[0];
if(preg_match('/union/i',$id)){
print("
<!--
".$parse->page."
-->");
}else{
print($parse->page);
}
}else{
print"uh oh function order by didn't allowed!";
}
}else{
header('Location: ?id=1');
}
print'
</div>
</div>
</div>
</div>
';
}else{
header('Location: /index.php?info=missed_level');
}
}else{
header('Location: /index.php?info=user_undefine');
}
include_once('../substr/footer.php');
ob_flush();
?>