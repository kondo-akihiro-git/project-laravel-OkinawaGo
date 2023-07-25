using MySql.Data.MySqlClient;
using lineLocation.Config;
using MiNET.Utils;

namespace lineLocation.Models
{
	public class Insert
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




		public static void InsertLoginData(string mailaddress, string password)
		{
			try
			{
				Guid MyUniqueId = Guid.NewGuid();
				string convertedUUID = MyUniqueId.ToString();

				// 接続
				MySqlConnection connection = new MySqlConnection(connectionString);
				connection.Open();

				// クエリ
				var selectLine = $"INSERT {logintable} VALUES ('{mailaddress}','{password}','{convertedUUID}')";

				var command = new MySqlCommand(selectLine, connection);
				command.ExecuteNonQuery();

			}
			catch (Exception e)
			{

			}
		}
	}
}
