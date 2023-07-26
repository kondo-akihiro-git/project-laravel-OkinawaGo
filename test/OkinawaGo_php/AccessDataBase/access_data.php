<?php
require_once "../Entity/Comment.php";
require_once "../Entity/Category.php";
require_once "../Entity/Image.php";
require_once "../Entity/Site.php";
require_once "../Entity/Area.php";
require_once "../Entity/CombinedSite.php";

class AccessData
{
    public static function selectByAreaName($selectedAreaName)
    {
        // 実行するSQL文のWHERE句
        $whereClause = "
            AREA.name_area = ?
        ";

        $combinedSites = self::select($selectedAreaName, $whereClause);
        return $combinedSites;
    }

    public static function selectByFreeword($inputWord)
    {
        // 実行するSQL文のWHERE句
        $whereClause = "
            site.name_site LIKE ? OR
            site.address LIKE ? OR
            category.name_category LIKE ?
        ";

        $combinedSites = self::select("%" . $inputWord . "%", $whereClause);
        return $combinedSites;
    }

    // 検索ワードとWHERE句を受け取って実行、結果を返す
    private static function select($input, $where)
    {
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()) {
            die("データベースの接続に失敗しました");
            return;
        }

        $query = "
        SELECT
            site.*,
            AREA.name_area,
            GROUP_CONCAT(COMMENT.content_comment),
            GROUP_CONCAT(img.img_file),
            GROUP_CONCAT(category.name_category)
        FROM
            site
        INNER JOIN AREA ON site.id_area = AREA.id_area
        INNER JOIN COMMENT ON site.id_site = COMMENT.id_site
        INNER JOIN img ON site.id_site = img.id_site
        INNER JOIN category ON site.id_site = category.id_site
        WHERE
            {$where}
        GROUP BY site.id_site;
        ";

        $stmt = $mysqli->prepare($query);

        // エリア検索とフリーワード検索の場合でバインドする数が異なるため分岐
        if (strpos($input, "%") !== false) {
            $stmt->bind_param('sss', $input, $input, $input);
        } else {
            $stmt->bind_param('s', $input);
        }

        $stmt->execute();

        // GROUP_CONCAT(category.name_category)は各テーブルの元のカラム名でバインド
        $stmt->bind_result(
            $id_site,
            $name_site,
            $id_area,
            $name_area,
            $address,
            $content_comment,
            $img_file,
            $name_category
        );

        $combinedSites = array();
        while ($stmt->fetch()) {
            $com = explode(",", $content_comment);
            $comment = array_unique($com);

            $img = explode(",", $img_file);
            $images = array_unique($img);

            $cate = explode(",", $name_category);
            $categories = array_unique($cate);

            $site = new Site($id_site, $name_site, $address);
            $area = new Area($id_area, $name_area);
            $combinedSite = new CombinedSite($site, $area, $comment, $images, $categories);
            array_push($combinedSites, $combinedSite);
        }

        $stmt->close();
        $mysqli->close();

        return $combinedSites;
    }

    public static function insertByComment($id_site, $comment)
    {
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()) {
            die("データベースの接続に失敗しました");
            return;
        }
        // コメント追加用のSQL
        $query = "INSERT INTO comment(id_site,content_comment) VALUES (?,?)";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);

        // SQL文中の ? の部分に$nameを格納
        $stmt->bind_param('ds', $id_site, $comment);

        $stmt->execute();

        $stmt->close();
        $mysqli->close();

    }
}
