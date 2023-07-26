<?php
//コメント投稿（detail.php）からの遷移
 require_once "../AccessDataBase/access_data.php";
$comment = $_POST['comment_tx'];
$id_site = $_POST['id_site'];
AccessData::insertByComment($id_site, $comment);
header( "Location: ./index.php") ;
exit();
?>