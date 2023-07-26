
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
<link rel="stylesheet" type="text/css" href="css/searchX.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!--favicon-->
<link href="favicon.ico" rel="shortcut icon">

<title>スポット検索画面｜OkinawaGo</title>
</head>
<body>
	<div class="content">
		<h1>
			<a href="index.php"><img src="img/logo&img/logo.jpg" alt="ロゴ"></a>
		</h1>
	</div>
	
	<!-- スポット検索のマップの表示 -->
		<h2>スポット検索</h2>
		<div class="imagemap">
			<section>
				<img src="img/logo&img/map.jpg" usemap="#ImageMap" alt="マップ" />
				<map name="ImageMap">
					<form method="post" action="searchSite.php">
						<button type="submit" style="display: none">
							<area shape="poly" alt="やんばる"
								coords="1216,512,1218,516,1247,477,1247,460,1271,475,1271,466,1250,446,1308,387,1316,393,1362,360,1364,336,1344,311,1398,297,1402,305,1418,287,1416,272,1446,260,1446,243,1494,199,1531,108,1510,74,1530,43,1565,41,1564,55,1590,79,1607,106,1637,105,1639,136,1663,166,1670,245,1669,287,1676,296,1664,313,1519,542,1353,548,1345,556,1359,594,1346,618,1309,613,1310,618,1295,626,1252,588,1258,577,1216,514,1191,501" />
						</button>
						<input type="hidden" name="spotmap" value="やんばる">
						<input type ="hidden" name="s_g_id" value="1">
					</form>

					<form method="post" action="searchSite.php">
						<button type="submit" style="display: none">
							<area shape="poly" alt="美ら海水族館周辺"
								coords="1214,513,1215,524,1252,572,1252,588,1295,628,1314,620,1324,622,1335,657,1352,673,1338,679,1330,705,1269,719,1261,735,1256,737,1250,750,1184,714,1160,722,1146,713,1163,751,1172,765,1166,773,1143,775,1133,791,1092,793,1085,805,1068,800,1031,755,965,793,942,749,951,726,967,729,992,713,1001,714,1038,661,1038,642,971,608,953,608,932,594,916,605,870,595,848,533,847,491,862,480,863,463,836,437,849,386,904,401,909,391,926,393,976,382,1018,392,1022,410,1087,426,1060,463,1058,483,1109,441,1115,466,1138,504,1097,498,1087,506,1069,495,1054,504,1057,512,1074,522,1082,541,1106,544,1139,539,1147,529,1160,533,1184,523,1212,513,1207,511" />
						</button>
						<input type="hidden" name="spotmap" value="美ら海水族館周辺">
						<input type ="hidden" name="s_g_id" value="1">
					</form>

					<form method="post" action="searchSite.php">
						<button type="submit" style="display: none">
							<area shape="poly" alt="アメリカンヴィレッジ周辺"
								coords="1027,756,1076,832,1024,883,988,876,968,914,976,940,836,904,785,948,793,957,764,971,836,1039,837,1090,932,1231,913,1238,820,1138,771,1169,637,1410,592,1397,585,1352,487,1337,484,1315,622,1230,619,1183,593,1165,602,1137,589,1094,644,1079,659,1035,679,1008,686,973,757,914,767,918,770,904,836,859,858,864,878,848,880,840,889,838,906,843,915,842,922,815,952,806,968,793,975,787,1001,779,1019,766" />
						</button>
						<input type="hidden" name="spotmap" value="アメリカンヴィレッジ周辺">
						<input type ="hidden" name="s_g_id" value="1">
					</form>

					<form method="post" action="searchSite.php">
						<button type="submit" style="display: none">
							<area shape="poly" alt="青の洞窟周辺"
								coords="941,752,961,797,922,811,909,843,889,835,863,865,835,857,767,903,683,972,647,1074,586,1094,542,1006,542,951,539,932,561,932,579,962,599,970,618,950,650,935,670,946,699,942,706,905,722,903,742,883,760,867,787,847,773,804,835,787,864,799,875,779,919,775,927,759,939,750,939,750" />
						</button>
						<input type="hidden" name="spotmap" value="青の洞窟周辺">
						<input type ="hidden" name="s_g_id" value="1">
					</form>

					<form method="post" action="searchSite.php">
						<button type="submit" style="display: none">
							<area shape="poly" alt="那須市"
								coords="459,1318,543,1360,584,1353,583,1387,541,1438,508,1434,430,1471,399,1423,411,1422,410,1402,425,1386,453,1399,454,1385,485,1376,476,1361,457,1327,448,1316" />
						</button>
						<input type="hidden" name="spotmap" value="那須市">
						<input type ="hidden" name="s_g_id" value="1">
					</form>

					<form method="post" action="searchSite.php">
						<button type="submit" style="display: none">
							<area shape="poly" alt="ひめゆりの搭周辺"
								coords="587,1392,635,1405,622,1427,669,1477,682,1477,711,1452,747,1448,745,1469,750,1504,687,1568,655,1561,660,1580,602,1597,555,1663,529,1656,481,1686,456,1681,433,1661,456,1589,444,1562,427,1549,449,1526,419,1484,499,1438,550,1435,585,1389,687,1447" />
						</button>
						<input type="hidden" name="spotmap" value="ひめゆりの搭周辺">
						<input type ="hidden" name="s_g_id" value="1">
					</form>

				</map>
			</section>
		</div>
	</div>
	
	<!-- マップの処理-->
	 <script
		src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>
	<script>
		imageMapResize();  
	</script>

	<footer>
		<p></p>
	</footer>

</body>
</html>