<?php
    require_once "../Entity/CombinedSite.php";

?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	crossorigin="anonymous">

<!-- Original CSS -->
<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!--favicon-->
<link href="favicon.ico" rel="shortcut icon">
<title>詳細結果画面｜OkinawaGo</title>
</head>

<body>

	<div class="content">
		<h1>
			<a href="index.php"><img src="img/logo&img/logo.jpg" alt="ロゴ"></a>
		</h1>
		<a href="javascript:history.back();"><i class="fas fa-arrow-left"></i>前のページへ戻る</a>
		

		<div class="topImg">
        <?php
		//POSTで写真を受け取る
		$image = $_POST['image'];
		echo '<img src="'.$image.'">';
        ?></h2>
		</div>

		<h2><?php
        //POSTで観光地名を受け取る
		$name_site = $_POST['name_site'];
		echo $name_site;
		?>
		<br>
		<?php
  		//POSTで住所を受け取る
 		$address = $_POST['address'];
 		echo $address;
        ?></h2>
		
		
		
		<h3>コメント</h3>
		<table class="comment">
        <?php
		//POSTでコメント受け取る
        $comments = $_POST['comment'];
		foreach($comments as $com) {
			echo $com;
			echo '<br>';
		}

        ?>
		</table>

		<!-- コメント投稿 -->
		<form action="commentServlet.php" method="post" id="commentForm"
			name="commentForm" enctype="multipart/form-data" class="com">
			
			<textarea name="comment_tx" required maxlength="140"
				placeholder="本文（140字まで）" class="comment_text" ></textarea>
			
			<div class="submit_button">
				<button type="submit" id="button" name="name">コメント投稿</button>
			</div>
			<?php
				$id_site = $_POST['id_site'];
				echo '<input type="hidden" name="id_site" value="' . $id_site . '">';
        	?>
		</form>


</div>
		</div>
		<script>
			var element = document.getElementById("commentForm");
			const button = document.getElementById("button");

			button.addEventListener("click", click);
			function click() {
				var click = element.checkValidity();
				if (click) {
					alert('投稿しました！');
				}
			}
		</script>
	</div>




	<footer>
		<p></p>
	</footer>
	<script src="js/weatherForcast.js"></script>
</body>
</html>
