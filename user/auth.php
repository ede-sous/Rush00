<?PHP
function auth($login, $passwd)
{
	if (!($sql = mysqli_connect("localhost", "root", "superpass")))
		return (false);

	mysqli_select_db($sql, "edegsc");
	$pwd = hash("whirlpool", $passwd);
	if (!(mysqli_fetch_array(mysqli_query($sql, "SELECT * FROM Users WHERE login='".mysqli_real_escape_string($sql, $login)."' and passwd='".mysqli_real_escape_string($sql, $pwd)."';"))))
		return (false);
	mysqli_close($sql);
	return (true);
}
?>
