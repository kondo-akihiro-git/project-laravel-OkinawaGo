using lineLocation.Config;
using MySql.Data.MySqlClient;

namespace lineLocation.Models
{
	public class Update
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



		public static void UpdateLoginData(string mailaddress, string password, string userId)
		{
			try
			{
				// 接続
				MySqlConnection connection = new MySqlConnection(connectionString);
				connection.Open();

				// クエリ
				var updateLogin = $"UPDATE {logintable} SET " +
					$"mailaddress = '{mailaddress}'," +
					$"pass = '{password}' " +
					$" WHERE userId = '{userId}';";

				var command = new MySqlCommand(updateLogin, connection);
				command.ExecuteNonQuery();

			}
			catch (Exception e)
			{

			}
		}

	}
}
