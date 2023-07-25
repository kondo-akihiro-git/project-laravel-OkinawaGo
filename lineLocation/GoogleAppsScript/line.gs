/*---------------------------------------
-----------------定義一覧-----------------
---------------------------------------*/

// DB接続情報
const projectId = '*****';
const area = '*****';
const instanceId = '*****';
const userName = '*****';
const password = '*****';
const dbName = '*****';
const urlstart = '*****';

// テーブル情報
const linetable = '*****';
const colLineId = '*****';
const colLocation = '*****';

const usertable = '*****';
const colUserID = '*****';



// LINE Messaging API
let token = "line Token";
let url = 'https://api.line.me/v2/bot/message/reply';

let replyToken = '*****';

/*---------------------------------------
----------------mainメソッド--------------
---------------------------------------*/

// mainメソッド
function doPost(e){ 

  // LINE情報を取得
  var info = [];    
  info = getInfo(e); 

  // UserIdの判定
  var _userId = false;
  _userId = flagUserId(e)

  if(_userId == true){
    //  UserIdをDBに登録
    insertUserData(info);
  }else{
    // LINE情報をDBへの登録
    insertLineData(info);
  }

/*---------------------------------------
----------------LINE情報を取得-------------
---------------------------------------*/

  // LINE情報を取得
  function getInfo(e){

    let eventData = JSON.parse(e.postData.contents).events[0];

    // ユーザーが現在地を送信
    let msglineId = eventData.source.userId;
    let msgLocation = eventData.message.text;
    replyToken = eventData.replyToken;

    info=[msglineId, msgLocation];

    return info;
  }

/*---------------------------------------
-----------LINE情報をDBへの登録------------
---------------------------------------*/

  function insertLineData(info) {
    try
    {
      var lineId = info[0];
      var location = info[1];

      // DB接続
      var connection =Jdbc.getCloudSqlConnection(urlstart+"://"+projectId+":"+area+":"+instanceId+"/"+dbName, userName, password);
      Logger.log('Connection OK: ' + connection);

      // クエリ
      var query = 
        "INSERT INTO "+ linetable +
        " (" +colLineId +", " +colLocation+ ")" +
        " VALUES(\'"+lineId+"\', \'"+location+"\');";

      // 実行
      var statement = connection.prepareStatement(query);
      statement.executeUpdate();

    } catch(e) {

    } finally{

      // 切断
      statement.close();
      connection.close();
    }
  }
/*---------------------------------------
-----------取得データのID判定-------------
---------------------------------------*/
  function flagUserId(e){
    var flag = false;

    const regex = new RegExp("([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})");

    let eventData = JSON.parse(e.postData.contents).events[0];
    flag = regex.test(eventData.message.text);

    return flag;
  }

/*---------------------------------------
-----------UserIdをDBに登録--------------
---------------------------------------*/

  function insertUserData(info){
    try
    {
      var lineId = info[0];
      var userId = info[1];

      // DB接続
      var connection =Jdbc.getCloudSqlConnection(urlstart+"://"+projectId+":"+area+":"+instanceId+"/"+dbName, userName, password);

      // クエリ
      colUserId = "userID"; //不自然な代入ですがスルー
      var sql = "INSERT INTO "+ usertable +" (" + colUserId  +", " +colLineId+ ")" +" VALUES(\'"+userId+"\', \'"+lineId+"\');";

      // 実行
      var statement = connection.prepareStatement(sql);
      statement.executeUpdate();
      
      sendMessage("userIdを登録しました。以後のメッセージはDBに位置情報として保存されるため、不必要に送らないようお気をつけください。")
    } catch(e) {
      Logger.log('Something Error: ' + e);
    } finally{

      // 切断
      statement.close();
      connection.close();
    }
  }
/*---------------------------------------
-----------登録メッセージの送信------------
---------------------------------------*/
  function sendMessage(message){


  let payload = {
    'replyToken': replyToken,
    'messages': [{
        'type': 'text',
        'text': message
      }]
  };
  //HTTPSのPOST時のオプションパラメータを設定する
  let options = {
    'payload' : JSON.stringify(payload),
    'myamethod'  : 'POST',
    'headers' : {"Authorization" : "Bearer " + token},
    'contentType' : 'application/json'
  };
  //LINE Messaging APIにリクエストし、ユーザーからの投稿に返答する
  UrlFetchApp.fetch(url, options);

  }

}









