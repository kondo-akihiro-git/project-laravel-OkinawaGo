<?php
//エリアから観光地を検索
require_once "../AccessDataBase/access_data.php";
$combined = null;
if (isset($_POST["spotmap"])) {
    $spot = $_POST["spotmap"];
    $combined = AccessData::selectByAreaName($spot);
}
?>


<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	crossorigin="anonymous">

<!-- Original CSS -->
<link rel="stylesheet" type="text/css" href="css/search.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!--favicon-->
<link href="favicon.ico" rel="shortcut icon">
<!--jQuery-->
<script type='text/javascript'
	src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'
	id='jquery-js'></script>
<script src="js/paginathing.min.js"></script>

<title>検索結果画面｜OkinawaGo</title>
</head>
<body>
	<div class="content" style="text-align: center;">
		<h1>
			<a href="index.php"><img src="img/logo&img/logo.jpg" alt="ロゴ"></a>
		</h1>

            <?php
// フリーワード検索の結果表示
if (is_null($combined)) {
    session_start();
    $freeword = $_SESSION['freeword'];
    if (isset($freeword)) {
        foreach ($freeword as $site1) {
            echo '<form method="POST" action="detail.php">';
            echo '<input type="image" name="image" value="' . $site1->image[0] . '" src="' . $site1->image[0] . '" class="inputimg">';
            echo '<input type="hidden" name="name_site" value="' . $site1->site->name_site . '">';
			echo '<input type="hidden" name="id_site" value="' . $site1->site->id_site . '">';
            echo '<input type="hidden" name="address" value="' . $site1->site->address . '">';
            echo '<input type="hidden" name="image" value="' . $site1->image[0] . '">';
            foreach ($site1->comment as $com) {
                echo '<input type="hidden" name="comment[]" value="' . $com . '">';
            }
            echo '</form>';
        }
    }
} else {
    // エリア検索の結果表示
    session_start();
    header('Expires:-1');
    header('Cache-Control:');
    header('Pragma:');
	echo '</form>';
    foreach ($combined as $site) {
        echo '<form method="POST" action="detail.php">';
        echo '<input type="image" name="image" value="' . $site->image[0] . '" src="' . $site->image[0] . '" class="inputimg">';
        echo '<input type="hidden" name="name_site" value="' . $site->site->name_site . '">';
		echo '<input type="hidden" name="id_site" value="' . $site->site->id_site . '">';
        echo '<input type="hidden" name="address" value="' . $site->site->address . '">';
        echo '<input type="hidden" name="image" value="' . $site->image[0] . '">';
        foreach ($site->comment as $com) {
            echo '<input type="hidden" name="comment[]" value="' . $com . '">';
        }
		echo '</form>';
    }
}
?>
		
	</div>
	<footer>
		<p></p>
	</footer>
</body>
</html>