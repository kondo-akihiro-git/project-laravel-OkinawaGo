using MySql.Data.MySqlClient;
using lineLocation.Config;

namespace lineLocation.Models
{
    public class Select
    {

        //----------------------------------------------------------------
        //--------------------------定義情報-------------------------------
        //----------------------------------------------------------------

        // 接続文字列格納用
        private static string connectionString =
            $"Server={Config.Data.server};" +
            $"Database={Config.Data.database};" +
            $"Uid={Config.Data.user};" +
            $"Pwd={Config.Data.pass};" +
            $"Charset={Config.Data.charset}";

        // テーブル情報
        private static string linetable = Table.linetable;
        private static string usertable = Table.usertable;
        private static string logintable = Table.logintable;

        //----------------------------------------------------------------
        //-----------------------UserID取得-------------------------------
        //----------------------------------------------------------------

        public static string SelectUserIdByAddressPassword(string address, string password)
        {
            string userId = "";
            try
            {
                List<object> data = new List<object>();
                data = SelectAll();

                List<object> logindata = (List<object>)data[2];
                List<object> addressData = (List<object>)logindata[0];
                List<object> passwordData = (List<object>)logindata[1];
                List<object> userIdData = (List<object>)logindata[2];


                int count = 0;
                while (count <= addressData.Count-1)
                {
                    if (address == (string)addressData[count] &
                        password == (string)passwordData[count])
                    {

                        userId = (string)userIdData[count];
                    }
                    count++;
                }
            }
            catch (Exception e)
            {
                Console.WriteLine("ERROR: " + e.Message);
            }

            return userId;
        }
        //----------------------------------------------------------------
        //-----------------------LINEID取得-------------------------------
        //----------------------------------------------------------------

        public static string SelectLineIdByUserId(string userId)
        {
            string lineId = "";
            try
            {
                List<object> data = new List<object>();
                data = SelectAll();

                List<object> userdata = (List<object>)data[0];
                List<object> userIdData = (List<object>)userdata[0];
                List<object> LineIdData = (List<object>)userdata[1];

                int count = 0;
                while (count <= userIdData.Count-1)
                {
                    if (userId == (string)userIdData[count])

                        lineId = (string)LineIdData[count];

                    count++;
                }
            }
            catch (Exception e)
            {
                Console.WriteLine("ERROR: " + e.Message);
            }

            return lineId;
        }

        //----------------------------------------------------------------
        //-------------------------場所の取得------------------------------
        //----------------------------------------------------------------

        public static string SelectLocationByLineId(string lineId)
        {
            string location = "";

            try
            {
                List<object> data = new List<object>();
                data = SelectAll();

                List<object> linedata = (List<object>)data[1];
                List<object> lineIdData = (List<object>)linedata[0];
                List<object> locationData = (List<object>)linedata[1];

                int count = lineIdData.Count - 1;
                while (count >= 0)
                {
                    if (lineId == (string)lineIdData[count])
                    {
                        location = (string)locationData[count];
                        return location;
                    }
					count--;
				}

            }
            catch (Exception e)
            {
                Console.WriteLine("ERROR: " + e.Message);
            }
            return location;
        }

        //----------------------------------------------------------------
        //-----------------------全データの取得----------------------------
        //----------------------------------------------------------------
        public static List<object> SelectAll()
        {
            List<object> strResult = new List<object>();
            try
            {
                // 接続
                MySqlConnection connection = new MySqlConnection(connectionString);
                connection.Open();

                // クエリ
                var selectLine = $"SELECT * FROM {linetable}";
                var selectUser = $"SELECT * FROM {usertable}";
                var selectlogin = $"SELECT * FROM {logintable}";

                // データ取得
                List<object> linedata = new List<object>();
                List<object> userdata = new List<object>();
                List<object> logindata = new List<object>();

                linedata = GetLineUserData(selectLine, connection);
                userdata = GetLineUserData(selectUser, connection);
                logindata = GetLoginData(selectlogin, connection);

                strResult.Add(userdata);
                strResult.Add(linedata);
                strResult.Add(logindata);

            }
            catch (MySqlException e)
            {
                Console.WriteLine("ERROR: " + e.Message);
            }
            return strResult;
        }

        //----------------------------------------------------------------
        //-----------------------クエリの実行------------------------------
        //----------------------------------------------------------------
        public static List<object> GetLineUserData(string sql, MySqlConnection connection)
        {
            List<object> data = new List<object>();

            List<object> dataZero = new List<object>();
            List<object> dataOne = new List<object>();


            using (var command = new MySqlCommand(sql, connection))
            using (var reader = command.ExecuteReader())
            {
                while (reader.Read())
                {
                    dataZero.Add(reader[0]);
                    dataOne.Add(reader[1]);
                }
            }
            data.Add(dataZero);
            data.Add(dataOne);

            return data;
        }
        public static List<object> GetLoginData(string sql, MySqlConnection connection)
        {
            List<object> data = new List<object>();

            List<object> dataZero = new List<object>();
            List<object> dataOne = new List<object>();
            List<object> dataTwo = new List<object>();

            using (var command = new MySqlCommand(sql, connection))
            using (var reader = command.ExecuteReader())
            {
                while (reader.Read())
                {
                    dataZero.Add(reader[0]);
                    dataOne.Add(reader[1]);
                    dataTwo.Add(reader[2]);
                }
            }
            data.Add(dataZero);
            data.Add(dataOne);
            data.Add(dataTwo);

            return data;
        }
        //----------------------------------------------------------------
        //-------------------------場所の取得------------------------------
        //----------------------------------------------------------------

        public static bool FlagSelectLogintable(string address, string password)
        {
            bool flag = false;
			try
			{
				List<object> data = new List<object>();
				data = SelectAll();

				List<object> logindata = (List<object>)data[2];
				List<object> addressData = (List<object>)logindata[0];
				List<object> passwordData = (List<object>)logindata[1];
				List<object> userIdData = (List<object>)logindata[2];


				int count = 0;
				while (count <= addressData.Count)
				{
                    if (address == (string)addressData[count] &
                        password == (string)passwordData[count])

                        flag = true;// 存在するパターン = true

					count++;
				}
			}
			catch (Exception e)
			{
				Console.WriteLine("ERROR: " + e.Message);
			}

			return flag;
        }
    }
}
