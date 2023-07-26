
<?php 
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
//フリーワード検索
    echo $text;
    
    $infolist= AccessData::selectByFreeword($text);
    var_dump($infolist);
    
    

header('Location: http://localhost/OkinawaGo/WebFront/test.php');
exit();
}
/*} else if(isset(spotmap)){
    $spotmap = $_GET["spotmap"]
   
}*/

?>