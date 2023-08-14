# App「OkinawaGo」

## 概要

沖縄の観光地を検索するWebアプリです。  
Javaで作成された観光地検索アプリのPHPバージョンです。

## 機能

CRUD機能  
- 観光地フリーワード検索機能
- エリア検索機能

## インストールと使い方　

1. Laravel+VirtualBox+Vagrantによる開発環境を構築する。  
   ※以下資料にならって作成している。  
   https://qiita.com/7968/items/97dd634608f37892b18a  
   
3. PostgreSQLにてプロジェクトファイル配下の以下のテストデータクエリを実行する  
   ```TableQuery.sql.txt```  
   ```setupQuery.sql.txt```
   
5. デバッグ実行すると、  
   エリアで色分けされた沖縄県本土が表示され、  
   観光地のエリア検索ができる。

## 参考資料　
https://github.com/kondo-akihiro-git/project-java-OkinawaGo/edit/master/README.md
