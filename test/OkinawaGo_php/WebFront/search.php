
<?php 
session_start();
require_once "../../OkinawaGo/AccessDataBase/access_data.php";
require_once "../../OkinawaGo/Entity/CombinedSite.php";
require_once "../../OkinawaGo/Entity/Comment.php";
require_once "../../OkinawaGo/Entity/Category.php";
require_once "../../OkinawaGo/Entity/Image.php";
require_once "../../OkinawaGo/Entity/Site.php";
require_once "../../OkinawaGo/Entity/Area.php";
require_once "../../OkinawaGo/Entity/CombinedSite.php";

//<!-- トップ画面からフリーワード検索 -->
$text = trim($_GET["toptext"]); 
if(isset($text)){

    //$textの値を受け取り一致するデータを取得
    $infolist= AccessData::selectByFreeword($text);
    if(empty($infolist)){
        $_SESSION['err'] = "入力された条件で情報が見つかりませんでした"; 
        header('Location: http://localhost/OkinawaGo/WebFront/index.php');
        exit();
    }
    $_SESSION['freeword'] = $infolist; 
        header('Location: http://localhost/OkinawaGo/WebFront/searchSite.php');
        exit();
    }
 

?>