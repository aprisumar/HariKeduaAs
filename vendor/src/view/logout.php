<?php
session_start();

if(session_destroy()){
for($i=0;$i<5;$i++){
sleep(1);
if($i==999){
print json_encode(['status'=> true, 'msg'=>'<p class="alert alert-success p-1 mt-4"><span class="glyphicon glyphicon-info-sign"></span> &nbsp;Logout berhasil anda telah keluar...</p>'], true);
}
}
}else{
print json_encode(['status'=> false, 'msg'=>'<p class="alert alert-danger p-1 mt-4"><span class="glyphicon glyphicon-info-sign"></span> &nbsp;logout gagal...</p>'], true);
}
?>