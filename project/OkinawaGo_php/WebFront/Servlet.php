
<?php
//マップをクリック後、検索結果画面へのサーブレット
require_once "../AccessDataBase/access_data.php";
$selectedSpot = $_POST["spotmap"];
$combined = AccessData::selectByAreaName($selectedSpot);
print_r($combined);
header( "Location: ./searchSite.php?sites={$combined}") ;
exit();
?>