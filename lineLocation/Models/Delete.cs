using lineLocation.Config;
using MiNET.Plugins;
using MySql.Data.MySqlClient;
using Org.BouncyCastle.Asn1;

namespace lineLocation.Models
{
	public class Delete
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



		public static void DeleteAllData(string mailaddress, string password)
		{
			try
			{
				string userId = Select.SelectUserIdByAddressPassword(mailaddress, password);
				string lineId = Select.SelectLineIdByUserId(userId);

				// 接続
				MySqlConnection connection = new MySqlConnection(connectionString);
				connection.Open();

				// クエリ
				var deleteLine = $"DELETE FROM {linetable} WHERE" +
					$" lineId = '{lineId}';";
				var deleteUser = $"DELETE FROM {usertable} WHERE" +
					$" userId = '{userId}';";
				var deleteLogin = $"DELETE FROM {logintable} WHERE" +
					$" userId = '{userId}';";


				var commandLine = new MySqlCommand(deleteLine, connection);
				var commandUser = new MySqlCommand(deleteUser, connection);
				var commandLogin = new MySqlCommand(deleteLogin, connection);

				commandLine.ExecuteNonQuery();
				commandUser.ExecuteNonQuery();
				commandLogin.ExecuteNonQuery();

			}
			catch (Exception e)
			{
				Console.WriteLine(e.ToString());
			}
		}
	}
}
