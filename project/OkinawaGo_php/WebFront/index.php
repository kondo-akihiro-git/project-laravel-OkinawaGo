<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Original CSS -->
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

	<!--favicon-->
	<link href="favicon.ico" rel="shortcut icon">


   <title>検索トップ画面｜OkinawaGo</title>
</head>
<body>

<div class="content">
<h1><a href="index.php"><img src="img/logo&img/logo.jpg" alt="ロゴ" ></a></h1>
  <!--検索結果がなかった際に、エラー文を表示-->
   <?php 
    session_start();     
    if(isset($_SESSION['err'])){
      $errmsg = $_SESSION['err']?>
    <div class="error">
			<p><?php echo $errmsg ?></p>
      <?php 
      unset($_SESSION['err'])?>
      </div>
      <?php } ?>
      
		
<h2>フリーワード検索</h2>
  <form action="search.php" method="get" class="input">
    <input type="search" name="toptext" class="input_var" required>
    <input type="submit" value="&#xf002;" class="fas">
  </form>
<div class="recomend">
    <a href="searchSpo.php">
<h2>スポット検索</h2>
<div class="wrapper img">
  <?php
    //ランダムに写真を3枚表示させる
    $count = 0;
    $images = glob("img/*.jpg");
    shuffle($images);
    foreach($images as $path) {
     $count++;
    echo '<img src= "' , $path , '" alt="" loading="lazy">';
  if($count == 3){
    break;
  }
}
?>
    </div>
  </div>
</div>
</a>
<footer>
    <p></p>
</footer>
</body>

</html>